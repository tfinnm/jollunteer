<!DOCTYPE html>
<html>
<head>
<title>Login | Jollunteer</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>
<body>
<center style="color:white;"><h1><b>Jollunteer</b>.com</h1><h3>A better way to manage volunteers.</h3></center><br><br>
<form method="post" action="">
  <div class="container">
    <h1>Login</h1>
    <p>Welcome Back!</p>
    <hr>

    <label for="usrnm"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="usrnm" id="usrnm" required>

    <label for="usrnm"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pswd" id="pswd" required>

    <hr>

    <button type="submit" class="registerbtn">Log In</button>
  </div>
  
  <div class="container signin">
    <p>Need an account? <a href="signup">Sign Up</a>.</p>
  </div>
</form>

</body>
</html>
