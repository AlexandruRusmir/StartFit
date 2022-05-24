<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2022-05-16 16:35:53 --- CRITICAL: ArgumentCountError [ 0 ]: Too few arguments to function Kohana_HTML::style(), 0 passed in C:\xampp\htdocs\kohana\application\views\index.php on line 11 and at least 1 expected ~ SYSPATH\classes\Kohana\HTML.php [ 207 ] in C:\xampp\htdocs\kohana\application\views\index.php:11
2022-05-16 16:35:53 --- DEBUG: #0 C:\xampp\htdocs\kohana\application\views\index.php(11): Kohana_HTML::style()
#1 C:\xampp\htdocs\kohana\system\classes\Kohana\View.php(62): include('C:\\xampp\\htdocs...')
#2 C:\xampp\htdocs\kohana\system\classes\Kohana\View.php(359): Kohana_View::capture('C:\\xampp\\htdocs...', Array)
#3 C:\xampp\htdocs\kohana\system\classes\Kohana\View.php(236): Kohana_View->render()
#4 C:\xampp\htdocs\kohana\system\classes\Kohana\Response.php(160): Kohana_View->__toString()
#5 C:\xampp\htdocs\kohana\application\classes\Controller\Index.php(7): Kohana_Response->body(Object(View))
#6 C:\xampp\htdocs\kohana\system\classes\Kohana\Controller.php(84): Controller_Index->action_index()
#7 [internal function]: Kohana_Controller->execute()
#8 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client\Internal.php(97): ReflectionMethod->invoke(Object(Controller_Index))
#9 C:\xampp\htdocs\kohana\system\classes\Kohana\Request\Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 C:\xampp\htdocs\kohana\system\classes\Kohana\Request.php(993): Kohana_Request_Client->execute(Object(Request))
#11 C:\xampp\htdocs\kohana\index.php(118): Kohana_Request->execute()
#12 {main} in C:\xampp\htdocs\kohana\application\views\index.php:11