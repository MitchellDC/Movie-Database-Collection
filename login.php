<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
   


include "conn.php";

if(isset($_POST['but_submit'])){

    $uname = mysqli_real_escape_string($conn,$_POST['txt_uname']);
    $password = mysqli_real_escape_string($conn,$_POST['txt_pwd']);

    if ($uname != "" && $password != ""){

        $sql_query = "select count(*) as cntUser from blueraytb where username='".$uname."' and pwd='".$password."'";
        $result = mysqli_query($conn,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['uname'] = $uname;
            header('Location: main_blueray.php');
        }else{
            echo "Invalid username and password";
        }

    }

}


?> 
    

    <form class="lables" method="POST" name="login">
        <h1>Login</h1>
        <input type="text" class="textbox" id="txt_uname" name="txt_uname" placeholder="Username" />
        <input type="password" class="textbox" id="txt_uname" name="txt_pwd" placeholder="Password"/>
        <input type="submit" value="Submit" name="but_submit" id="but_submit" />
        <a href="signup.php">Didn't Create An Account? Signup here!</a>
  </form>

</body>
</html>
