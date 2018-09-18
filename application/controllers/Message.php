<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	// start session 
	session_start();
	
class Message extends CI_Controller 
{
	public function index()
	{
		// checks if user is logged in
		if (isset($_SESSION["user_login"]))
		{
			// loads the post view
			$this->load->view('post');
		}
		else
		{
			// redirects user to login page
			$this->load->helper('url');
			redirect('/user/login/');
		}
	}
	public function doPost()
	{
		// checks if user is logged in
		if (isset($_SESSION["user_login"]))
		{
			// load messages model
			$this->load->model('Messages_model');
			// declare values for db query
			$poster = $_SESSION["user_login"];
			$string = $this->input->post('message');
			// insert message into database using declared values
			$this->Messages_model->insertMessage($poster, $string);
			// redirect to the poster's page displaying latest message
			$this->load->helper('url');
			redirect('/user/view/' . $poster);
		}
		else
		{
			// if not logged in redirects user to login page
			$this->load->helper('url');
			redirect('/user/login/');
		}	
	}
}
?>