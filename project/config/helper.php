<?php
	function rootDir($file)
	{
			// local configuration
			$url = $_SERVER['DOCUMENT_ROOT'].$file;
			//server configuration 
			//$url = $_SERVER['DOCUMENT_ROOT'].'/' . $file . '.php';
			return $url;
	}
	function localhost($file)
	 {
			// local configuration
			$url =  $file ;
			//server configuration 
		//	 $url = 'http://www.eventopedia.com/' . $file . '.php';
			return $url;
	}
	function controllers($file)
	{

		// you can even specify it something like this

			// local configuration
			$url = $file ;
			//server configuration 
			$url = 'controllers/'. $file;
			return $url;
	}

	function flash($level,$message)
	{
		$flash['level'] = $level;
		$flash['message'] = $message; 
		$_SESSION['flash'] = $flash;
		//print_r($message);
		//echo $message;
	}

	function redirectTo($file)
	{
		header('location:' .'../'. $file);
		die();
	}
	function login($id)
	{
		if(isset($_SESSION['_login'])){
			flash('danger','you are already logged in');
			redirectTo(localhost('index.php'));
		}else{
			$_SESSION['_login'] = $id;
		}
	}
	function logout()
	{
		if(isset($_SESSION['_login'])){
			unset($_SESSION['_login']);
		}else{
			redirectTo(localhost('login'));
		}
	}

 ?>