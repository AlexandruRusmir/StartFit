<?php defined('SYSPATH') or die('No direct script access.');

class Controller_ExerciseHandling extends Controller_AdminStandard
{
    public function action_displayExercises()
    {
        $this->template->main = View::factory('allExercises');
    }

    public function action_displayAddExercise()
    {
        $this->template->main = View::factory('addExercise');
    }

    public function action_addExercise()
    {

    }

    public function action_getExercises()
    {

    }

    public function action_deleteCategoryByPostID()
    {
        $categoryId = $this->request->post('id');

        $category = ORM::factory('category', $categoryId);
        $category->delete();
    }

    public function action_displayExerciseCategories()
    {
        $this->template->main = View::factory('allExerciseCategories');
    }

    public function action_returnCategoriesList()
    {
        $categories = ORM::factory('category')->find_all();

        $categoryListViews = [];
        foreach ($categories as $category) {
            $categoryListViews[] = View::factory('exerciseCategoryListItem', ['category' => $category]);
        }

        $this->response->body(View::factory('exerciseCategoriesList', ['categoryListViews' => $categoryListViews]));
    }

    public function action_returnCategoriesJsonByKeyword()
    {
        $keyword = $this->request->query('keyword');

        if(!$keyword) {
            $this->response->body('[]');
            return;
        }

        $categories = ORM::factory('category');
        if ($keyword) {
            $categories = $categories->where('name', 'LIKE', "%{$keyword}%");
        }

        $categoriesResponse = [];
        $categories = $categories->find_all();

        $categoriesResponse = [];
        foreach ($categories as $category) {
            $categoriesResponse[] = (object)['id' => $category->id, 'name' => $category->name];
        }

        $categoriesJson = json_encode($categoriesResponse);

        $this->response->body($categoriesJson);
    }

    public function action_addCategory()
    {
        $category = $this->request->post('category');

        $alreadyExistentName = false;
        $existentCategories = ORM::factory('category')->where('name', '=', $category);
        if ($existentCategories->loaded()) {
            $alreadyExistentName = true;
            $this->response->body('Category name already in use!');
            return;
        }

        if (! $alreadyExistentName) {
            $categoryModel = ORM::factory('category');
            $categoryModel->name = $category;

            $categoryModel->save();
        }
    }
}