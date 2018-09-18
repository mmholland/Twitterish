<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	// note: I tried to use a folder (public_html/images) to host the logo but it doesn't appear to allow me access so I used
	// third party hosting instead. I hope this is okay.
	// start session 
	session_start();

class User extends CI_Controller {
	public function index()
	{
		// redirect user to login page
		$this->load->helper('url');
		redirect('/user/login/');
	}
	public function view($name)
	{
		// load messages model
		$this->load->model('Messages_model');
		// run database query
		$data['loadMessages'] = $this->Messages_model->getMessagesByPoster($name);
		// load users model
		$this->load->model('Users_model');
		// check if user is logged in
		if (isset($_SESSION["user_login"]))
		{
			// declare variables for database query
			$follower = $_SESSION["user_login"];
			$followed = $name;
			// perform isFollowing method to search database and return boolean value
			$data['following'] = $this->Users_model->isFollowing($follower,$followed);
		}
		else {
			// declare user as logged out
			$data['following'] = false;
		}
		// load view messages with data
		$this->load->view('view_messages',$data);
	}
	public function login()
	{
		// load login view
		$this->load->view('login');
	}
	public function doLogin()
	{
		// load users model
		$this->load->model('Users_model');
		// obtain username from form via POST method
		$username = $this->input->post('username');
		// obtain password from form via POST method
		$pass = $this->input->post('pass');
		// run checkLogin method with user credentials
		$auth = $this->Users_model->checkLogin($username, $pass);
		if ($auth == true)
		{
			// set user session as their username
			$_SESSION["user_login"] = $username;
			// redirect user to their page
			$this->load->helper('url');
			redirect('/user/view/' . $username);
		}
		else
		{
			// if credientials are incorrect, redirect to login page
			$this->load->helper('url');
			redirect('/user/login');
		}
	}
	public function logout()
	{
		// remove session variable
		unset($_SESSION["user_login"]);
		// redirect user to login page
		$this->load->helper('url');
		redirect('/user/login/');
	}
	public function feed($name)
	{
		// load messages model
		$this->load->model('Messages_model');
		// run getFollowedMessages method with given parameter
		$data['loadMessages'] = $this->Messages_model->getFollowedMessages($name);
		// load users model
		$this->load->model('Users_model');
		if (isset($_SESSION["user_login"]))
		{
			// declare variables for database query
			$follower = $_SESSION["user_login"];
			$followed = $name;
			// run isFollowing method
			$data['following'] = $this->Users_model->isFollowing($follower,$followed);
		}
		else {
			// declare user as logged out
			$data['following'] = false;
		}
		// load view messages with provided data
		$this->load->view('view_messages',$data);
	}
	
	public function follow($followed)
	{
		// declare variable for database query
		$follower = $_SESSION["user_login"];
		// load users model
		$this->load->model('Users_model');
		// run follow method to insert entry into database
		$this->Users_model->follow($follower,$followed);
		// redirect user to the page of the user they followed
		$this->load->helper('url');
		redirect('/user/view/' . $followed);
	}
}
?>