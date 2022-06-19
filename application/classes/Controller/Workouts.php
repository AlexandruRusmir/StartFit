<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Workouts extends Controller_UserStandard
{
    public function action_index()
    {
        $this->template->main = View::factory('createWorkout');
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
        $query = $query->where('exercises.name', 'LIKE', "%{$searchInput}%");
        $exercises = $query->limit(20)->execute();

        $exercisesArray = [];
        $alreadyInArray = false;
        foreach ($exercises as $exercise) {
            foreach ($exercisesArray as $exerciseObject) {
                $alreadyInArray = false;
                if ($exerciseObject->id === $exercise['id']) {
                    $alreadyInArray = true;
                }
            }
            if (!$alreadyInArray) {
                $exercisesArray[] = $this->getExerciseObject($exercise);
            }
        }

        $matchingExercises = json_encode($exercisesArray);

        $this->response->body($matchingExercises);
    }

    private function getExerciseObject(array $exercise): object
    {
        $exerciseObject = (object)[];
        $exerciseObject->id = $exercise['id'];
        $exerciseObject->name = $exercise['name'];
        $animation = new Model_Animation($exercise['animation_id']);
        $exerciseObject->gifUrl = $animation->getURL();

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