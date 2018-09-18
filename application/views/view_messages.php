<html>
<head>
<style>
body {
	background-color: #3366ff;
}
table {
	border-collapse: collapse;
	width: 1000px;
}
th {
	background-color: white;
	color: #3366ff;
	font-family: Arial, sans-serif;
	padding: 6px;
}
td, table {
	color: white;
	font-family: Arial, sans-serif;
	padding: 10px;
}
div.messages {
	position: fixed;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
}
h1.title {
	position: fixed;
	left: 50%;
	top: 10%;
	transform: translate(-50%, -50%);
}
tr:nth-child(even) {
	background-color: #6699ff;
}
a {
	color: white;
	margin-left: 65px;
	text-decoration: none;
}
a:visited {
	color: white;
	text-decoration: none;
}
div.navbar {
    width: 100%;
    height: 30px;
    border: 1px #6699ff;
    background-color: #6699ff;
    text-align: center;
	font-family: Arial, sans-serif;
}
ul.navbar {
	list-style: none;
	width: 100%;
	height: 100%;
	padding: 0;
	margin: 0;
}
ul.navbar li {
	float: left;
	line-height: 30px;
	height: 100%;
	list-style-type: none;
	margin: 0;
	width: 20%;
}
</style>
<title>View Messages</title>
</head>
<!--I wasn't able to display images from the public_html/images/ folder, so I used third party hosting instead, my apologies if this isn't allowed.-->
<h1 class="title"><img src="http://i.imgur.com/NPRwvrg.png" alt="Chatter" /></h1>
<body>
<div class="navbar">
	<ul class="navbar">
		<!--checks to see if $following is set. if it's false and the user is logged in, then a follow button will appear. if it's true, it'll display "Following" instead. if it isn't set, then a follow button will appear which links to the login page-->
		<li><?php if (isset($following)) { if ($following == false AND isset($_SESSION["user_login"])) { echo "<a href='/proj/co539m/microblog/mmh32/index.php/user/follow/".$this->uri->segment(3)."'>Follow</a>"; } elseif ($following == true) { echo "<font color='white'>Following</font>"; } } ?><?php if (!isset($_SESSION["user_login"])) { echo "<a href='proj/co539m/microblog/mmh32/index.php/user/login'>Follow</a>"; } ?></li>
		<!--redirects user to the post a message view if logged in, or login view if logged out-->
		<li><a href='/proj/co539m/microblog/mmh32/index.php/message/'>Post a Message</a></li>
		<!--redirects user to search page-->
		<li><a href='/proj/co539m/microblog/mmh32/index.php/search/'>Search Messages</a></li>
		<!--redirects user to the their feed-->
		<li><?php if (isset($_SESSION["user_login"])) { echo "<a href='/proj/co539m/microblog/mmh32/index.php/user/feed/".$_SESSION["user_login"]."'>View Feed</a>"; } else { echo "<a href='/proj/co539m/microblog/mmh32/index.php/user/login'>View Feed</a>"; } ?></li>
		<!--if user_login variable is set, displays a logout button. if not, displays a login button, both linking to their respective pages-->
		<li><?php if (isset($_SESSION["user_login"])) { echo "<a href='/proj/co539m/microblog/mmh32/index.php/user/logout/'>Logout</a>"; } else { echo "<a href='/proj/co539m/microblog/mmh32/index.php/user/login/'>Login</a>"; } ?></li>
	</ul>
</div>
<div class="messages">
	<table>
	<tr><th>Username</th><th>Message</th><th>Time</th></tr>
<!--for loop which loads each message from the database results and displays them in a table-->
<?php foreach ($loadMessages->result() as $row): ?>
    <tr><td><?php echo ucfirst($row->user_username); ?></td>
    <td><?php echo $row->text; ?></td>
	<td><?php echo $row->posted_at; ?></td></tr>
<?php endforeach; ?>
	</table>
</div>
</body>
</html>