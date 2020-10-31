
<?php

require "config.php";
?>
<?php

$errors=array();


if (isset($_POST['submit'])) {
$username=isset($_POST['username'])?$_POST['username']:'';
$userpassword=isset($_POST['password'])?$_POST['password']:'';
$userpassword2=isset($_POST['password2'])?$_POST['password2']:'';
$email=isset($_POST['email'])?$_POST['email']:'';
$phone=isset($_POST['phone'])?$_POST['phone']:'';

if ($userpassword != $userpassword2) {
    $errors[]=array("input"=>"password","msg"=>"password missmatch");
}
$sql1="SELECT * from users WHERE username='".$username."'
 OR email='".$email."'";
$result=$conn->query($sql1);
if ($result->num_rows > 0) {
    $errors[]=array("input"=>"form","msg"=>"Username already present");

} 
if (count($errors)==0) {

    $sql="INSERT INTO users (username,userpassword,email,phone,Role)
    VALUES ('".$username."','".$userpassword."','".$email."','".$phone."','examinee')";

    if ($conn->query($sql)===true) {
        echo "New record created successfully";
        header("Location: login.php");
    } else {
        $errors[]=array("input"=>"form","msg"=>"New record not created.");
        echo $conn->error;
    }

} else {
    foreach ($errors as $error) {
        echo "*".$error['msg']."<br>";
    }
}

$conn->close();
}



?>



<!DOCTYPE html>
<html>
<head>
<title>
Register
</title>

</head>
<body>
<div id="wrapper">
<div id="login">
<p style='text-align:right;'><a id="login1" href="login.php">Login</a></p>
</div>

<div id="signup-form" >
<h2>Sign Up</h2>
<form action="#" method="POST">
<p>
<label for="username">Username: <input type="text" name="username" required></label>
</p>
<p>
<label for="password">Password: <input type="password"
name="password" required></label>
</p>
<p>
<label for="password2">Re-Password: <input type="password"
name="password2" required></label>
</p>
<p>
<label for="email">Email: <input type="email" name="email" required></label>
</p>
<p>
<label for="phone">phone: <input type="number" name="phone" required></label>
</p>
<p>
<input type="submit" id="sub" name="submit" value="Submit">
</p>
</form>
</div>

</div>
<style>
body {
        background-image: url('reg.jpg');
    }
    a{
        text-decoration: none;
        color: red;
        font-size: 2em;
        font-weight: bold;
        margin-right: 60px;
        
    }
    #sub{
        background-color: red;
    }

    
    input {
        width: 180px;
        height: 30px;
        margin: 10px;
    }
    
    #sub {
        background-color: aqua;
        color: black;
        font-style: italic;
        font-size: medium;
        font-weight: bold;
    }
    
    #signup-form {
        margin-top: 50px;
        margin-left: 500px;
    }
    
    form {
        margin-top: 20px;
    }
</style>
</body>
</html>


