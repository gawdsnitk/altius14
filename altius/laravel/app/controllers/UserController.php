<?php
	class UserController extends \BaseController {
		public function login() {
			$recieved_data = Input::all();
			$username = $recieved_data['username'];
			$password = $recieved_data['password'];
			if(isset($username) && isset($password)) {
				$status = DB::table('users')->where('username',$username)->where('password',$password)->pluck('username');
				if(sizeof($status) > 0) {
					Session::put('username',$status);
					return Response::json('1');
				}
				else {
					return Response::json('0');
				}	
			}
			else 
				echo Response::json('0');
		}
		
		public function logout()
		{
			echo "Successfully Logged out";
			Session::flush();
		}
	}
	
?>
