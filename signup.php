
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
$db = mysqli_connect("localhost", "root", "", "basic1");
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
if (isset($_POST['submit'])) {

  $name = mysqli_real_escape_string($db, $_POST['name']);
  $address = mysqli_real_escape_string($db, $_POST['address']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // yeta validation
  if (empty($name)) { array_push($errors, "Username is required"); }
  if (empty($address)) { array_push($errors, "Address is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
  array_push($errors, "The two passwords do not match");
  }
}

$sql = "INSERT INTO users (name, adderss, email, password)
VALUES ('$name', '$address', '$email', '$password_2')";

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
           <td>Full Name: </td>
           <td><input type="text" name="name"></td>
       </tr>
       <tr>
           <td>Address: </td>
           <td><input type="address" name="address"></td>
       </tr>
       <tr>
           <td>Email: </td>
           <td><input type="email" name="email"></td>
       </tr>
       <tr>
           <td>Password: </td>
           <td><input type="password" name="password_1"></td>
       </tr>
       <tr>
           <td>Re-Password: </td>
           <td><input type="password" name="password_2"></td>
       </tr>
       <tr>
           <td><button name="submit">register</button></td>
       </tr>
    </table>
    </form>
  </div>
</body>
</html>