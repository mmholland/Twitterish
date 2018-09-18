<?php
class Users_model extends CI_Model {
	public function __construct() 
	{
		parent::__construct();
		$this->load->database();
	}
	public function checkLogin($username,$pass)
	{
		// hashes password and runs database query to return records where the input username and password match the records
		$sql = "SELECT * FROM Users WHERE username = ? AND password = '" . SHA1($pass) . "'";
		$checkLogin = $this->db->query($sql,$username);
		// checks if a single record is returned, and if so returns true, otherwise returns false
		if ($checkLogin->num_rows() == 1)
		{
			return true;
		}
		else 
		{
			return false;
		}
	}
	public function isFollowing($follower,$followed)
	{
		// return all records where input $follower matches input $followed
		$sql = "SELECT * FROM User_Follows WHERE follower_username = '$follower' AND followed_username = '$followed'";
		$checkFollowing = $this->db->query($sql,$follower,$followed);
		// if any records are returned, return true, otherwise return false
		if ($checkFollowing->num_rows() > 0)
		{
			return true;
		}
		else 
		{
			return false;
		}
	}
	public function follow($follower,$followed) 
	{
		// insert record into database
		$this->db->query("INSERT INTO User_Follows(follower_username,followed_username) VALUES('$follower','$followed')");
	}
}