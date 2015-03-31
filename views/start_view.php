<!DOCTYPE HTML>
<html>
<head>
	<link rel="stylesheet" href="views/css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,700,300,600,400' rel='stylesheet' type='text/css'>
</head>
<body>

	<div id="content">

        <div id="login">

            <form method="POST" action="start/login">
                <input type="text" name="username" placeholder="Username">
                <input type="password" name="password" placeholder="Password">
                <input type="submit" value="Sign in" name="submit_login">
            </form>

        </div>

        <div id="register">
            <h1>Register</h1>

            <form method="post" action='start/register'>
                <select name="sex">
                    <option value="Man">Man</option>
                    <option value="Woman">Woman</option>
                    <option value="Horse">Horse</option>
                </select><br/><br/>

                <select name="situation">
                    <option value="Single">Single</option>
                    <option value="In a relationship">In a relationship</option>
                    <option value="Divorced">Divorced</option>
                    <option value="Married">Married</option>
                </select><br/><br/>


                <input type="text" name="username" placeholder="Username"/><br/>
                <input type="password" name="password" placeholder="Password"/><br/>
                <input type="email" name="email" placeholder="Email"/><br/>
                <textarea rows="6" cols="30" name="about" id="about" placeholder="About you"></textarea><br/>
                <input type="submit" name="submit_register" value="Register"/><br/>
            </form>
        </div>

	</div>
</body>
</html>