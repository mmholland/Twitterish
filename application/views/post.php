<html>
<head>
<style>
body {
	background-color: #3366ff;
}
p {
	color: white;
	font-family: Arial, sans-serif;
	text-align: center;
	position: fixed;
	left: 50%;
	top: 20%;
	transform: translate(-50%,-50%);
}
input.textbox {
	color: grey;
	font-family: Arial, sans-serif;
	position: fixed;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
	width: 1000px;
	height: 70px;
}
h1.title {
	position: fixed;
	left: 50%;
	top: 10%;
	transform: translate(-50%, -50%);
}
input.button {
	background-color: white;
    border: none;
    color: #3366ff;
    padding: 10px 80px;
    text-align: center;
    display: inline-block;
    font-size: 16px;
	position: fixed;
	top: 61%;
	left: 50%;
	transform: translate(-50%, -50%);
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
	width: 33.33%;
}
</style>
<title>Post a Message</title>
</head>
<body>
<!--loads logo from third party hosting-->
<h1 class="title"><img src="http://i.imgur.com/NPRwvrg.png" alt="Chatter" /></h1>
<div class="navbar">
	<ul class="navbar">
	<!--directs user to search messages page-->
		<li><a href='/proj/co539m/microblog/mmh32/index.php/search/'>Search Messages</a></li>
		<!--since users must be logged in to view this page, there's no need to check if $_SESSION is set. this links to the user's feed-->
		<li><?php echo "<a href='/proj/co539m/microblog/mmh32/index.php/user/feed/".$_SESSION["user_login"]."'>View Feed</a>" ?></li>
		<!--runs the logout() function-->
		<li><a href='/proj/co539m/microblog/mmh32/index.php/user/logout/'>Logout</a></li>
	</ul>
</div>
<p>Feel free to use the form below to post a short message (no longer than 140 characters) to your followers. Why don't you say hello?</p>
<!--this form submits the message via POST to the doPost function.-->
<form id='post' action='/proj/co539m/microblog/mmh32/index.php/message/dopost/' method='post'>
<!--limited to 140 characters since a popular microblogging service has similar restrictions... :) input is required from the user to continue-->
<input class="textbox" type="text" name="message" id="message" maxlength="140" value="Enter a message here..." required /><br><br>
<!--submits the form to the doPost function-->
<input class="button" type="submit" name="Submit" value="Submit" />
</body>
</html>