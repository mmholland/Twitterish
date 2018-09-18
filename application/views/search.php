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
.textbox {
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
.button {
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
<title>Search Messages</title>
</head>
<!--loads logo image from third party host :(-->
<h1 class="title"><img src="http://i.imgur.com/NPRwvrg.png" alt="Chatter" /></h1>
</head>
<body>
<div class="navbar">
	<ul class="navbar">
	<!--redirects user to message view-->
		<li><a href='/proj/co539m/microblog/mmh32/index.php/message/'>Post a Message</a></li>
		<!--since any user may view this page, checks to see if user_login variable is set, if so, displays link to user's feed-->
		<li><?php if (isset($_SESSION["user_login"])) { echo "<a href='/proj/co539m/microblog/mmh32/index.php/user/feed/".$_SESSION["user_login"]."'>View Feed</a>"; } else { echo "<font color='white'>Please log in for more features!</font>"; }?></li>
		<!--checks to see if the session ID is set, if so it displays a logout button, if not it displays a login button-->
		<li><?php if (isset($_SESSION["user_login"])) { echo "<a href='/proj/co539m/microblog/mmh32/index.php/user/logout/'>Logout</a>"; } else { echo "<a href='/proj/co539m/microblog/mmh32/index.php/user/login/'>Login</a>"; } ?></li>
	</ul>
</div>
<p>Using the form below, you can search through all messages on Chatter.</p>
<!--form submits search term to the doSearch function via GET-->
<form id="search" method="GET" action='/proj/co539m/microblog/mmh32/index.php/search/doSearch' />
<!--input search term, using "required" boolean to ensure a term is entered-->
<input class="textbox" type="text" value="Enter a search term..." name="string" required />
<!--submits the form-->
<input class="button" type="submit" />
</form>
</body>
</html>	