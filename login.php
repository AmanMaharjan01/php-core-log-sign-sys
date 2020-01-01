
<!DOCTYPE html>
<html>
<head>
  <title>
    Login In
  </title>
  <style type="text/css">
    .container
    {
      position: absolute;
      top: 40%;
      left: 40%
    }
  </style>
</head>
<body>
<div>
   <?php
session_start();

$errors = array(); 
// Create connection
$db = mysqli_connect("localhost", "root", "", "basic");
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
if (isset($_POST['submit'])) {

  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  // yeta validation
  if (empty($name)) { array_push($errors, "Username is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
}

$sql = "SELECT "
if ($db->query($sql) === TRUE) {
    echo "New record created successfully";
   } 
else {
    echo "Error: " . $sql . "<br>" . $db->error;
}

$db->close();
?> 
</div>
  <div class="container">
    <form action="signup.php" method="POST">
      <table>
       <tr>
           <td>Email: </td>
           <td><input type="email" name="email"></td>
       </tr>
       <tr>
           <td>Password: </td>
           <td><input type="password" name="password"></td>
       </tr>
       <tr>
           <td><button name="submit">Login</button></td>
       </tr>
    </table>
    </form>
  </div>
</body>
</html>