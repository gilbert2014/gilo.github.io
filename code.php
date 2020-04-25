<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "adminpanel";



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['registerbtn']))
{
$username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
if ($password === $confirmpassword){
    $sql = "INSERT INTO register (username,email, password)VALUES ('$username', '$email', '$password')";


if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    $_SESSION['success']= "Admin Profile added";
    
    header ('Location:register.php');
} else 
{
    echo "Error: " . $sql . "<br>" . $conn->error;
    header ('Location:register.php');
}
}else {
	echo "password not matching";
	 $_SESSION['success']= "password not matching";
	header ('Location:register.php');
}
}


$conn->close();

$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['updatebtn']))
{
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];
    
$sql = "UPDATE register SET username='$username',email='$email',password='$password'  WHERE id='$id'";

 if ($conn->query($sql) === TRUE) {
$_SESSION['success']="your data is updated";
header('Location:register.php');
    }
    else
    {
        $_SESSION['status']="your data is not updated";
        header('Location:register.php');

    }
}
mysqli_close($conn);
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['deletebtn']))
{
    $id = $_POST['delete_id'];
    
$sql =  "DELETE FROM register WHERE id='$id'";

 if ($conn->query($sql) === TRUE) {
$_SESSION['success']="your data is deleted";
header('Location:register.php');
    }
    else
    {
        $_SESSION['status']="your data is not deleted";
        header('Location:register.php');

    }
}
mysqli_close($conn);



?> 

<?php
include('security.php');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "adminpanel";
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Create connection
if (isset($_POST['loginbtn']))
{
 $email_login = $_POST['email'] ;
$password_login = $_POST['password']; 

$query = "SELECT * FROM register WHERE email='$email_login' AND password='$password_login'";

$query_run = mysqli_query($conn, $query);
//$query_run = mysqli_master_query($conn,$query);
//if(mysqli_num_rows($query_run) == 1)
if (mysqli_fetch_array($query_run))

{

$_SESSION['username']=$email_login;
header ('Location:index.php');



} 

else{

    $_SESSION['status'] ='Email id/Password is invalid';
    header('Location: login.php');
}

}

?>