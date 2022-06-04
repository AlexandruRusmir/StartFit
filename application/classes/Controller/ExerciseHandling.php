<?php defined('SYSPATH') or die('No direct script access.');

class Controller_ExerciseHandling extends Controller_AdminStandard
{
    public function action_display_exercises()
    {
        $this->template->main = View::factory('allExercises');
    }

    public function action_display_add_exercise()
    {
        $this->template->main = View::factory('addExercise');
    }

    public function action_deleteCategoryByPostID()
    {
        $categoryId = $this->request->post('id');

        $category = ORM::factory('category', $categoryId);
        $category->delete();
    }

    public function action_display_exercise_categories()
    {
        $this->template->main = View::factory('allExerciseCategories');
    }

    public function action_return_categories_list()
    {
        $categories = ORM::factory('category')->find_all();

        $categoryListViews = [];
        foreach ($categories as $category) {
            $categoryListViews[] = View::factory('exerciseCategoryListItem', ['category' => $category]);
        }

        $this->response->body(View::factory('exerciseCategoriesList', ['categoryListViews' => $categoryListViews]));
    }

    public function action_return_categories_json_by_keyword()
    {
        $keyword = $this->request->query('keyword');

        if (!$keyword) {
            $this->response->body('[]');
            return;
        }

        $categories = ORM::factory('category');
        if ($keyword) {
            $categories = $categories->where('name', 'LIKE', "%{$keyword}%");
        }

        $categories = $categories->find_all();

        $categoriesResponse = [];
        foreach ($categories as $category) {
            $categoriesResponse[] = (object)['id' => $category->id, 'name' => $category->name];
        }

        $categoriesJson = json_encode($categoriesResponse);

        $this->response->body($categoriesJson);
    }

    public function action_add_category()
    {
        $category = $this->request->post('category');

        $alreadyExistentName = false;
        $existentCategories = (new Model_Category())->where('name', '=', $category)->find();
        if ($existentCategories->loaded()) {
            $this->response->body('Category name already in use!');
            return;
        }

        $categoryModel = new Model_Category();
        $categoryModel->setName($category);

        $categoryModel->save();

    }

    public function action_add_exercise()
    {
        $exercise = json_decode($this->request->post('exercise'));

        $exerciseModel = ORM::factory('exercise');
        $exerciseModel->setName($exercise->name);
        $exerciseModel->setGifURL($exercise->gifUrl);
        $exerciseModel->setDefaultDuration($exercise->duration);
        $exerciseModel->setDefaultBreakTime($exercise->breakTime);
        $exerciseModel->save();

        foreach ($exercise->categories as $category) {
            $exerciseModel->add('categories', ORM::factory('category', $category->id));
        }
    }

    public function action_get_exercises_json()
    {
        $allExercises = (new Model_Exercise())->find_all();

        $exercisesArray = [];
        foreach ($allExercises as $exercise) {
            $exercisesArray[] = $this->getCustomExerciseObject($exercise);
        }

        $exercisesJson = json_encode($exercisesArray);

        $this->response->body($exercisesJson);
    }

    private function getCustomExerciseObject($exercise): object
    {
        $exerciseObject = (object)[];
        $exerciseObject->id = $exercise->getID();
        $exerciseObject->name = $exercise->getName();
        $exerciseObject->gifURL = $exercise->getGifURL();
        $exerciseObject->defaultDuration = $exercise->getDefaultDuration();
        $exerciseObject->defaultBreakTime = $exercise->getDefaultBreakTime();

        $categories = $exercise->categories->find_all();
        $categoriesArray = [];
        foreach ($categories as $category) {
            $categoryObject = (object)[];
            $categoryObject->name = $category->getName();
            $categoryObject->id = $category->getID();
            $categoriesArray[] = $categoryObject;
        }

        $exerciseObject->categories = $categoriesArray;

        return $exerciseObject;
    }
}