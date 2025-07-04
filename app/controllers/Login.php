<?php
class Login extends Controller 
{
		public function index(): void 
	{
				$this->view('login/index', ['error' => '', 'username' => '']);
		}
}