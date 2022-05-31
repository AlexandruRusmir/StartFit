<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2022-05-29 08:04:14 --- CRITICAL: Database_Exception [ 1932 ]: Table 'fitstart.users' doesn't exist in engine [ SHOW FULL COLUMNS FROM `users` ] ~ MODPATH\database\classes\Kohana\Database\MySQLi.php [ 171 ] in C:\xampp\htdocs\kohana\modules\database\classes\Kohana\Database\MySQLi.php:337
2022-05-29 08:04:14 --- DEBUG: #0 C:\xampp\htdocs\kohana\modules\database\classes\Kohana\Database\MySQLi.php(337): Kohana_Database_MySQLi->query(1, 'SHOW FULL COLUM...', false)
#1 C:\xampp\htdocs\kohana\modules\orm\classes\Kohana\ORM.php(1670): Kohana_Database_MySQLi->list_columns('`users`')
#2 C:\xampp\htdocs\kohana\modules\orm\classes\Kohana\ORM.php(444): Kohana_ORM->list_columns()
#3 C:\xampp\htdocs\kohana\modules\orm\classes\Kohana\ORM.php(389): Kohana_ORM->reload_columns()
#4 C:\xampp\htdocs\kohana\modules\orm\classes\Kohana\ORM.php(254): Kohana_ORM->_initialize()
#5 C:\xampp\htdocs\kohana\modules\orm\classes\Kohana\ORM.php(46): Kohana_ORM->__construct(NULL)
#6 C:\xampp\htdocs\kohana\application\classes\Controller\Register.php(27): Kohana_ORM::factory('Model_User')
#7 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_Register->action_register()
#8 [internal function]: Kohana_Controller->execute()
#9 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Register))
#10 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#12 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#13 {main} in C:\xampp\htdocs\kohana\modules\database\classes\Kohana\Database\MySQLi.php:337
2022-05-29 10:32:55 --- CRITICAL: Error [ 0 ]: Call to undefined method Database_MySQLi_Result::loaded() ~ APPPATH\classes\Controller\ExerciseHandling.php [ 55 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-29 10:32:55 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_ExerciseHandling->action_addCategory()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_ExerciseHandling))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-29 10:33:03 --- CRITICAL: Error [ 0 ]: Call to undefined method Database_MySQLi_Result::loaded() ~ APPPATH\classes\Controller\ExerciseHandling.php [ 55 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-29 10:33:03 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_ExerciseHandling->action_addCategory()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_ExerciseHandling))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-29 10:33:21 --- CRITICAL: Error [ 0 ]: Call to undefined method Database_MySQLi_Result::loaded() ~ APPPATH\classes\Controller\ExerciseHandling.php [ 55 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-29 10:33:21 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_ExerciseHandling->action_addCategory()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_ExerciseHandling))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84