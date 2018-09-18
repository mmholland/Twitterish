<?php
class Messages_model extends CI_Model {
	public function __construct() 
	{
		parent::__construct();
		$this->load->database();
	}
	public function getMessagesByPoster($name) 
	{
		// return all messages by poster with $name, in descending order by time posted
		$sql = "SELECT user_username,posted_at,text FROM Messages WHERE user_username = ? ORDER BY posted_at DESC";
		return $this->db->query($sql,$name);
	}
	public function searchMessages($string) 
	{
		// return all messages which contain $string, in descending order by time posted
		$sql = "SELECT user_username,posted_at,text FROM Messages WHERE text LIKE '%$string%' ORDER BY posted_at DESC";
		return $this->db->query($sql,$string);
	}
	public function insertMessage($poster, $string) 
	{
		// insert row into database with poster name, the contents of their message and the current time
		$this->db->query("INSERT INTO Messages(user_username,text,posted_at) VALUES('$poster','$string',NOW())");
	}
	public function getFollowedMessages($name)
	{
		// select messages from all users that the specified $name follows
		$sql = "SELECT user_username,posted_at,text FROM Messages WHERE user_username IN (SELECT followed_username FROM User_Follows WHERE follower_username = ?) ORDER BY posted_at DESC";
		return $this->db->query($sql,$name);
	}
}