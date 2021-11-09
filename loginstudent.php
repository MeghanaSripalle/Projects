<!DOCTYPE html>
<html>
<head>
    <title>Student Login Page</title>
    <link rel="stylesheet" href="loginstudent.css">
    
</head>

<body>
    <div class="container">
    <div><button style="background-color: rgb(107, 80, 45);color: rgb(77, 45, 22);font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS',sans-serif"><a href="main.php">Back</a></button></div>
        <h1 style="text-align: center;color: antiquewhite;text-indent: 20px;background-color: rgb(77, 45, 22);width: 100%;">Student Login</h1>
        <div class="container1">
    <form method="post" action="loginstudent.php">
        <div class="vertical-center">User ID : <input type="number" name="userst" id="userst" min="200010001" max="200030060"><span>*</span><br><br></div>
       <div class="vertical-center1">Password : <input type="password" name="passst" id="passst" ><span>*</span><br><br></div>
       <div class="vertical-center2"><input style="color: rgb(77, 45, 22);font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;background-color:rgb(172, 145, 126) ;"type="submit" value="Login" name="submitstudent" id="submitstudent" class="submitstudent"></div>
    </form>
    </div>
    </div>
</body>
</html>

<?php
session_start();
     $useriderror = $passworderror = "";
     $userid = $password = "";
  
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Library";

$conn = new mysqli($servername, $username,$password,$dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['submitstudent'])){

    if(($_POST["userst"]) && ($_POST["passst"])){
      $userid = test_input($_POST["userst"]);
      $password = test_input($_POST["passst"]);
      $query2= "SELECT * FROM Students WHERE UserId ='" . $userid . "' and UserPassword = '". $password . "'";
      $result2 = $conn->query($query2);
      if($result2->num_rows==0) {
        echo "<script>alert('Username or Password is wrong. Please enter again.');</script>";
      } else {
        $_SESSION['userid'] = $userid;
        $_SESSION['password'] = $password;
        header('Location: homestudent.php');
      }
      }
      else {
      echo "<script>alert('Enter both the fields provided');</script>";
      }

}


$conn->close();
?>
