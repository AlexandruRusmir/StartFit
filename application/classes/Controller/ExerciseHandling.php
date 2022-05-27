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

        $this->response->body("{$categoryId}");
    }

    public function action_displayExerciseCategories()
    {
        $this->template->main = View::factory('allExerciseCategories');
    }

    public function action_returnCategoriesList()
    {
        $categories = ORM::factory('exercise_category')->find_all();

        $categoryListViews = [];
        forEach ($categories as $category) {
                $categoryListViews[] = View::factory('exerciseCategoryListItem', [ 'category' => $category]);
            }

        $this->response->body(View::factory('exerciseCategoriesList', [ 'categoryListViews' => $categoryListViews] ));
    }

    public function action_addCategory()
    {
        $category = $this->request->post('category');
        $categoryModel = ORM::factory('exercise_Category');
        $categoryModel->category = $category;

        if(ORM::factory('exercise_category')->where('category', '=', $category)->loaded()) {
            $this->response->body('Category name already in use!');
            return;
        }

        $categoryModel->save();
    }
}