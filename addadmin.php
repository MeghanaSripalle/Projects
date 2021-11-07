<?php
session_start();
$adminusername = $_SESSION['adminusername'];
$adminpassword = $_SESSION['adminpassword'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add New Books Page</title>
    <link rel="stylesheet" href="addadmin.css">
    
</head>

<body>

    <div class="container">
        <div class="welcome"><h1 style="font-size:50px;">IIT DHARWAD LIBRARY SYSTEM</h1></div>
        <div class="line"><h1 style="font-size:20px;">the portal to unlimited knowledge</h1></div>
    </div>
    <div style="height: 30px;"></div>
    <div>
    <nav class="menu">
        <ul >
        <li class="menubar"><a href="homeadmin.php">Home</a></li>
        <li class="menubar"> <a href="orderadmin.php">View Orders</a></li>
        <li class="menubar"> <a href="fineadmin.php">View Fine</a></li>
        <li class="menubar"> <a href="viewadmin.php">View</a></li>
        <li class="menubar"> <a href="searchadmin.php">Search</a></li>
        <li class="menubar"> <a href="updateadmin.php">Update</a></li>
        <li class="menubar"> <a href="deleteadmin.php">Delete</a></li>
        <li class="menubar"><a  class="active" href="addadmin.php">Add</a></li>
        <li class="logout"> <a href="main.php">Logout</a></li>
        </ul>
         
    </nav>
    </div>
    <div>
    <h3>Add New Books to the Inventory</h3>
    <div style="color:rgb(148, 108, 85);">Enter the details of the book you wish to add to the inventory:<br><br></div>
    <span style="width:50%;">
    <img src="book1.png" style="width:300px;height:200px;float:right;margin-right:100px;border:2px solid rgb(148, 108, 85); " ></span>
<script>
function big(x) {
  x.style.height = "50px";
  x.style.width = "100px";
}

function normal(x) {
  x.style.height = "30px";
  x.style.width = "70px";
}
</script>
    <form method="post" action="addadmin.php">
        Title: <input type="text" name="booktitle" id="booktitle" class=details ><br><br>
        Quantity: <input type="number" name="bookquantity" id="bookquantity" min=1 max=1000 class=details><br><br>
        Author: <input type="text" name="bookauthor" id="bookauthor" class=details><br><br>
        Publisher: <input type="text" name="bookpublisher" id="bookpublisher" class=details><br><br>
        Genre: <input type="text" name="bookgenre" id="bookgenre" class=details><br><br>
        <input type="submit" value="Add Book" name="add" id="add" style="color:white;"onmouseover="big(this)" onmouseout="normal(this)"  >
    </form>
    
</div>

</body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Library";

$conn = new mysqli($servername, $username, $password,$dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['add'])){
    $title = $_POST['booktitle'];
    $quantity = $_POST['bookquantity'];
    $author= $_POST['bookauthor'];
    $publisher = $_POST['bookpublisher'];
    $genre = $_POST['bookgenre'];

    if(is_string($author) && strlen($author)<=120 && strlen($author)>0 && is_string($publisher) && strlen($publisher)>0 && strlen($publisher)<=120 
    && is_string($title) && strlen($title)<=120 && strlen($title)>0 && is_string($genre) && strlen($genre)<=50 && strlen($genre)>0)
    {
     $query = "INSERT INTO Books (Title,Quantity,Author,Publisher,Genre)
     VALUES ('$title', $quantity,'$author','$publisher','$genre')";
 
        if ($conn->query($query) === TRUE) {
           echo "<script>alert('New record created successfully!')</script>";
     }
    }
    else{
       echo"<script>alert('There is a data type mismatch or some details haven't been filled.')</script>";
     }
 
}


?>
