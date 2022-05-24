<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2022-05-18 11:50:22 --- CRITICAL: Error [ 0 ]: Call to undefined method Request::redirect() ~ APPPATH\classes\Controller\Register.php [ 33 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-18 11:50:22 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_Register->action_register()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Register))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-18 11:50:42 --- CRITICAL: Kohana_Exception [ 0 ]: A valid cookie salt is required. Please set Cookie::$salt in your bootstrap.php. For more information check the documentation ~ SYSPATH\classes\Kohana\Cookie.php [ 158 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Cookie.php:67
2022-05-18 11:50:42 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Cookie.php(67): Kohana_Cookie::salt('session', NULL)
#1 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(151): Kohana_Cookie::get('session')
#2 C:\xampp\htdocs\kohana\index.php(117): Kohana_Request::factory('/register/regis...', Array, false)
#3 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Cookie.php:67
2022-05-18 11:53:19 --- CRITICAL: Error [ 0 ]: Call to undefined method Request::redirect() ~ APPPATH\classes\Controller\Register.php [ 33 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-18 11:53:19 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_Register->action_register()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Register))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-18 12:02:11 --- CRITICAL: Error [ 0 ]: Call to undefined method Request::redirect() ~ APPPATH\classes\Controller\Register.php [ 34 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-18 12:02:11 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_Register->action_register()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Register))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-18 12:03:06 --- CRITICAL: Kohana_Exception [ 0 ]: Untrusted host localhost. If you trust localhost, add it to the trusted hosts in the `url` config file. ~ SYSPATH\classes\Kohana\URL.php [ 107 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\URL.php:144
2022-05-18 12:03:06 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\URL.php(144): Kohana_URL::base('http', true)
#1 C:\xampp\htdocs\kohana\system\classes\Kohana\HTTP\Exception\Redirect.php(29): Kohana_URL::site('/', true, true)
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\HTTP.php(40): Kohana_HTTP_Exception_Redirect->location('/')
#3 C:\xampp\htdocs\kohana\application\classes\Controller\Register.php(34): Kohana_HTTP::redirect('/')
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_Register->action_register()
#5 [internal function]: Kohana_Controller->execute()
#6 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Register))
#7 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#9 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#10 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\URL.php:144
2022-05-18 15:08:47 --- CRITICAL: Kohana_Exception [ 0 ]: View variable is not set: main ~ SYSPATH\classes\Kohana\View.php [ 179 ] in C:\xampp\htdocs\kohana\application\classes\Controller\Register.php:47
2022-05-18 15:08:47 --- DEBUG: #0 C:\xampp\htdocs\kohana\application\classes\Controller\Register.php(47): Kohana_View->__get('main')
#1 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_Register->action_login()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Register))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#6 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#7 {main} in C:\xampp\htdocs\kohana\application\classes\Controller\Register.php:47
2022-05-18 15:13:41 --- CRITICAL: Kohana_Exception [ 0 ]: View variable is not set: main ~ SYSPATH\classes\Kohana\View.php [ 179 ] in C:\xampp\htdocs\kohana\application\classes\Controller\Register.php:47
2022-05-18 15:13:41 --- DEBUG: #0 C:\xampp\htdocs\kohana\application\classes\Controller\Register.php(47): Kohana_View->__get('main')
#1 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_Register->action_login()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Register))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#6 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#7 {main} in C:\xampp\htdocs\kohana\application\classes\Controller\Register.php:47
2022-05-18 15:34:09 --- CRITICAL: Error [ 0 ]: Call to undefined method Request::quer() ~ APPPATH\classes\Controller\Register.php [ 44 ] in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-18 15:34:09 --- DEBUG: #0 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_Register->action_login()
#1 [internal function]: Kohana_Controller->execute()
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Register))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#5 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#6 {main} in C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php:84
2022-05-18 15:36:31 --- CRITICAL: ParseError [ 0 ]: syntax error, unexpected identifier "Model_User" ~ APPPATH\classes\Controller\Register.php [ 26 ] in file:line
2022-05-18 15:36:31 --- DEBUG: #0 [internal function]: Kohana_Core::auto_load('Controller_Regi...')
#1 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(74): class_exists('Controller_Regi...')
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#4 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#5 {main} in file:line
2022-05-18 15:37:06 --- CRITICAL: Kohana_Exception [ 0 ]: View variable is not set: main ~ SYSPATH\classes\Kohana\View.php [ 179 ] in C:\xampp\htdocs\kohana\application\classes\Controller\Register.php:23
2022-05-18 15:37:06 --- DEBUG: #0 C:\xampp\htdocs\kohana\application\classes\Controller\Register.php(23): Kohana_View->__get('main')
#1 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_Register->action_register()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Register))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#6 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#7 {main} in C:\xampp\htdocs\kohana\application\classes\Controller\Register.php:23
2022-05-18 15:38:20 --- CRITICAL: Kohana_Exception [ 0 ]: View variable is not set: main ~ SYSPATH\classes\Kohana\View.php [ 179 ] in C:\xampp\htdocs\kohana\application\classes\Controller\Register.php:23
2022-05-18 15:38:20 --- DEBUG: #0 C:\xampp\htdocs\kohana\application\classes\Controller\Register.php(23): Kohana_View->__get('main')
#1 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_Register->action_register()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Register))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#6 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#7 {main} in C:\xampp\htdocs\kohana\application\classes\Controller\Register.php:23
2022-05-18 15:38:36 --- CRITICAL: Kohana_Exception [ 0 ]: View variable is not set: main ~ SYSPATH\classes\Kohana\View.php [ 179 ] in C:\xampp\htdocs\kohana\application\classes\Controller\Register.php:23
2022-05-18 15:38:36 --- DEBUG: #0 C:\xampp\htdocs\kohana\application\classes\Controller\Register.php(23): Kohana_View->__get('main')
#1 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_Register->action_register()
#2 [internal function]: Kohana_Controller->execute()
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Register))
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#6 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#7 {main} in C:\xampp\htdocs\kohana\application\classes\Controller\Register.php:23