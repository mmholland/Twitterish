<html>
<head>
<style>
body {
	background-color: #3366ff;
}
p.subtitle {
	color: white;
	font-family: Arial, sans-serif;
}
div.login {
	position: fixed;
	top: 50%;
	left: 50%;
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
}
.input {
	border: none;
	width: 100%;
	margin: 4px 0;
	padding: 10px 0px;
}
h1.title {
	position: fixed;
	left: 50%;
	top: 15%;
	transform: translate(-50%, -50%);
}
p.intro {
	color: white;
	font-family: Arial, sans-serif;
	text-align: center;
	position: fixed;
	left: 50%;
	top: 30%;
	transform: translate(-50%,-50%);
}
</style>
<title>Login</title>
</head>
<!--loads logo from third party hosting-->
<h1 class="title"><img src="http://i.imgur.com/NPRwvrg.png" alt="Chatter" /></h1>
<body>
<p class="intro">Welcome to Chatter! Please login below.</p>
<!--form submits $username and $pass to the doLogin function via POST method-->
<div class="login"><form id='login' action='/proj/co539m/microblog/mmh32/index.php/user/dologin/' method='post'>
<!-- input username and password in these fields. length is limited to 20 because none of the test logins exceed that :) using required attribute to ensure the user doesn't forget to input their credentials-->
<p class="subtitle">Username:</p><input class="input" type="text" name="username" id="username" maxlength="20" required />
<p class="subtitle">Password:</p><input class="input" type="password" name="pass" id="pass" maxlength="20" required /><br><br>
<input class="button" type="submit" name="Submit" value="Submit" />
</form></div>
</body>
</html>