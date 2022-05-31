<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2022-05-30 15:27:08 --- CRITICAL: Error [ 0 ]: Class "Model_exercise_Category" not found ~ MODPATH\orm\classes\Kohana\ORM.php [ 46 ] in C:\xampp\htdocs\kohana\application\classes\Controller\ExerciseHandling.php:60
2022-05-30 15:27:08 --- DEBUG: #0 C:\xampp\htdocs\kohana\application\classes\Controller\ExerciseHandling.php(60): Kohana_ORM::factory('Model_exercise_...')
#1 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_ExerciseHandling->action_addCategory()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_ExerciseHandling))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#6 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#7 {main} in C:\xampp\htdocs\kohana\application\classes\Controller\ExerciseHandling.php:60
2022-05-30 15:27:56 --- CRITICAL: Error [ 0 ]: Class "Model_exercise_Category" not found ~ MODPATH\orm\classes\Kohana\ORM.php [ 46 ] in C:\xampp\htdocs\kohana\application\classes\Controller\ExerciseHandling.php:60
2022-05-30 15:27:56 --- DEBUG: #0 C:\xampp\htdocs\kohana\application\classes\Controller\ExerciseHandling.php(60): Kohana_ORM::factory('Model_exercise_...')
#1 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_ExerciseHandling->action_addCategory()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_ExerciseHandling))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#6 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#7 {main} in C:\xampp\htdocs\kohana\application\classes\Controller\ExerciseHandling.php:60
2022-05-30 15:28:32 --- CRITICAL: Kohana_Exception [ 0 ]: The category property does not exist in the Model_Category class ~ MODPATH\orm\classes\Kohana\ORM.php [ 687 ] in C:\xampp\htdocs\kohana\modules\orm\classes\Kohana\ORM.php:603
2022-05-30 15:28:32 --- DEBUG: #0 C:\xampp\htdocs\kohana\modules\orm\classes\Kohana\ORM.php(603): Kohana_ORM->get('category')
#1 C:\xampp\htdocs\kohana\application\views\exerciseCategoryListItem.php(11): Kohana_ORM->__get('category')
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\View.php(236): Kohana_View->render()
#5 C:\xampp\htdocs\kohana\application\views\exerciseCategoriesList.php(6): Kohana_View->__toString()
#6 C:\xampp\htdocs\kohana\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#7 C:\xampp\htdocs\kohana\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#8 C:\xampp\htdocs\kohana\system\classes\Kohana\View.php(236): Kohana_View->render()
#9 C:\xampp\htdocs\kohana\system\classes\Kohana\Response.php(160): Kohana_View->__toString()
#10 C:\xampp\htdocs\kohana\application\classes\Controller\ExerciseHandling.php(47): Kohana_Response->body(Object(View))
#11 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_ExerciseHandling->action_returnCategoriesList()
#12 [internal function]: Kohana_Controller->execute()
#13 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_ExerciseHandling))
#14 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#15 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#16 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#17 {main} in C:\xampp\htdocs\kohana\modules\orm\classes\Kohana\ORM.php:603
2022-05-30 15:41:47 --- CRITICAL: Database_Exception [ 1054 ]: Unknown column 'username' in 'where clause' [ SELECT `category`.`id` AS `id`, `category`.`name` AS `name` FROM `categories` AS `category` WHERE `username` LIKE '%a%' ] ~ MODPATH\database\classes\Kohana\Database\MySQLi.php [ 171 ] in C:\xampp\htdocs\kohana\modules\database\classes\Kohana\Database\Query.php:251
2022-05-30 15:41:47 --- DEBUG: #0 C:\xampp\htdocs\kohana\modules\database\classes\Kohana\Database\Query.php(251): Kohana_Database_MySQLi->query(1, 'SELECT `categor...', 'Model_Category', Array)
#1 C:\xampp\htdocs\kohana\modules\orm\classes\Kohana\ORM.php(1063): Kohana_Database_Query->execute(Object(Database_MySQLi))
#2 C:\xampp\htdocs\kohana\modules\orm\classes\Kohana\ORM.php(1004): Kohana_ORM->_load_result(true)
#3 C:\xampp\htdocs\kohana\application\classes\Controller\ExerciseHandling.php(58): Kohana_ORM->find_all()
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_ExerciseHandling->action_returnCategoriesJsonByKeyword()
#5 [internal function]: Kohana_Controller->execute()
#6 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_ExerciseHandling))
#7 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#9 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#10 {main} in C:\xampp\htdocs\kohana\modules\database\classes\Kohana\Database\Query.php:251
2022-05-30 15:49:45 --- CRITICAL: TypeError [ 0 ]: array_map(): Argument #2 ($array) must be of type array, Database_MySQLi_Result given ~ APPPATH\classes\Controller\ExerciseHandling.php [ 63 ] in C:\xampp\htdocs\kohana\application\classes\Controller\ExerciseHandling.php:63
2022-05-30 15:49:45 --- DEBUG: #0 C:\xampp\htdocs\kohana\application\classes\Controller\ExerciseHandling.php(63): array_map(Object(Closure), Object(Database_MySQLi_Result))
#1 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_ExerciseHandling->action_returnCategoriesJsonByKeyword()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_ExerciseHandling))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#6 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#7 {main} in C:\xampp\htdocs\kohana\application\classes\Controller\ExerciseHandling.php:63