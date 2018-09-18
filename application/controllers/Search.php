<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	session_start();

class Search extends CI_Controller 
{
	public function index()
	{
		// load the search view
		$this->load->view('search');
	}
	public function doSearch() 
	{
		// load the messages model
		$this->load->model('Messages_model');
		// declare search value from form via GET method
		$string = $_GET['string'];
		// run search query in database
		$data['loadMessages'] = $this->Messages_model->searchMessages($string);
		// load view messages view with search results
		$this->load->view('view_messages',$data);
	}
}
?>