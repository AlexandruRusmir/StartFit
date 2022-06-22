<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Workouts extends Controller_UserStandard
{
    public function action_index()
    {
        $this->template->main = View::factory('createWorkout');
    }

    public function action_my_workouts()
    {
        $this->template->main = View::factory('myWorkouts');
    }

    public function action_get_categories_list()
    {
        $categories = (new Model_Category())->find_all();

        $categoriesArray = [];
        foreach ($categories as $category) {
            $categoriesArray[] = $this->getCategoryObject($category);
        }
        $categoriesJson = json_encode($categoriesArray);

        $this->response->body($categoriesJson);
    }

    public function action_get_matching_exercises()
    {
        $receivedSearchDetails = json_decode($this->request->post('searchDetails'));

        $searchInput = $receivedSearchDetails->searchText;
        $categoryIDs = $receivedSearchDetails->selectedCategoryIDsArray;
        $query = DB::select('*')->from('exercises')
            ->join('categories_exercises')->on('exercises.id', '=', 'categories_exercises.exercise_id');

        if (isset($categoryIDs) && is_array($categoryIDs) && count($categoryIDs)) {
            $query = $query->where('categories_exercises.category_id', 'IN', $categoryIDs);
        }
        $query = $query->where('exercises.name', 'LIKE', "%{$searchInput}%")->group_by('exercises.id');
        $exercises = $query->limit(21)->execute();

        $exercisesArray = [];
        foreach ($exercises as $exercise) {
            $exercisesArray[] = $this->getExerciseObject($exercise);
        }

        $matchingExercises = json_encode($exercisesArray);

        $this->response->body($matchingExercises);
    }

    public function action_check_workout_name()
    {
        $workoutName = $this->request->post('name');

        if (!$workoutName) {
            $this->response->status(404);
            $this->response->body('No workout name provided!');
            return;
        }

        $userId = Auth::instance()->get_user();

        if (!$userId) {
            $this->response->body('[]');
            return;
        }

        $workouts = ORM::factory('workout');
        $workouts = $workouts->where('user_id', '=', "{$userId}");
        $workouts = $workouts->find_all();

        $workoutsResponse = [];
        foreach ($workouts as $workout) {
            if ($workout->name === $workoutName) {
                $this->response->status(409);
                $this->response->body('A workout with this name is already linked to this account!');
                return;
            }
        }

        $this->response->body('All good in the hood!');
    }

    public function action_save_workout()
    {
        $workoutDetails = json_decode($this->request->post('workout'));

        if (!isset($workoutDetails->workoutExercises)) {
            $this->response->body('Can not save a workout without exercises!');
            $this->response->status(400);
            return;
        }

        if (!isset($workoutDetails->name)) {
            $this->response->body('Can not save a workout without a name!');
            $this->response->status(400);
            return;
        }

        $workoutExercises = $workoutDetails->workoutExercises;
        $response = $this->validatePayload($workoutExercises);
        if ($response['success'] === false) {
            $this->response->body(json_encode($response['errors']));
            $this->response->status(400);
            return;
        }

        $workout = new Model_Workout();
        $this->saveWorkout($workout, $workoutDetails);

        $this->response->body('Workout successfully added!');
    }

    public function action_get_workouts_by_keyword()
    {
        $keyword = $this->request->query('keyword');


        $allAnimations = (new Model_Animation())->where('name', 'LIKE', "%{$keyword}%")->find_all();
        $animationsArray = [];
        foreach ($allAnimations as $animation) {
            $animationsArray[] = $this->getAnimationObject($animation);
        }
        $animationJson = json_encode($animationsArray);

        $this->response->body($animationJson);
    }

    private function saveWorkout(Model_Workout $workoutModel, $workoutDetails): void
    {
        $workoutExercises = $workoutDetails->workoutExercises;
        $workoutModel->setUserID(Auth::instance()->get_user());
        $workoutModel->setName($workoutDetails->name);
        $workoutModel->save();

        $k = 0;
        foreach ($workoutExercises as $exercise) {
            $k++;
            $workoutExercise = new Model_WorkoutExercise();

            if (!(new Model_Exercise($exercise->exerciseId))->loaded()) {
                $responseArray['success'] = false;
                $responseArray['errors'][] = "Exercise with id {$exercise->exerciseId} doesn't exist";
            }
            $workoutExercise->setExerciseID($exercise->exerciseId);
            $workoutExercise->setWorkoutID($workoutModel->getID());
            $workoutExercise->setExerciseOrder($k);

            $workoutExercise->save();
        }
    }

    private function validatePayload(array $workoutExercises): array
    {
        $responseArray = [
            'success' => true,
            'errors' => [
            ]
        ];

        foreach ($workoutExercises as $exercise) {
            if (!(new Model_Exercise($exercise->exerciseId))->loaded()) {
                $responseArray['success'] = false;
                $responseArray['errors'][] = "Exercise with id {$exercise->exerciseId} doesn't exist";
            }
        }

        return $responseArray;
    }

    private function getExerciseObject(array $exercise): object
    {
        $exerciseObject = (object)[];
        $exerciseObject->id = $exercise['id'];
        $exerciseObject->name = $exercise['name'];
        $animation = new Model_Animation($exercise['animation_id']);
        $exerciseObject->gifUrl = $animation->getURL();
        $exerciseObject->duration = $exercise['default_duration'];
        $exerciseObject->breakTime = $exercise['default_break_time'];

        return $exerciseObject;
    }

    private function getCategoryObject(Model_Category $category): object
    {
        $categoryObject = (object)[];
        $categoryObject->id = $category->getID();
        $categoryObject->name = $category->getName();

        return $categoryObject;
    }
}