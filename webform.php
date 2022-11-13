<!DOCTYPE HTML>  
<html>
<head>
<style>
body, html {
  height: 100%;
  margin: 0;
  font-family: 'Roboto', sans-serif;
}
* {
  box-sizing: border-box;
}
.bg-image{
    background-image: url("road.jpg");
    height: 100%; 
  
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    filter: blur(8px);
}
.bg-text {
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  color: white;
  font-weight: bold;

  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 80%;
  padding: 20px;
  text-align: center;
}
</style>
</head>
<body>  

<div class="bg-image"></div>

<div class="bg-text">

<?php
// define variables and set to empty values
$name = $email = $gender = $age = $occupation = $visitor = $user = $admin = "";

?>

<h2>Webform</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <br><br>

  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <br><br>

  Age: <input type="text" name="age" value="<?php echo $age;?>">
  <br><br>

  Occupation:
  <input type="radio" name="occupation" <?php if (isset($occupation) && $occupation=="student") echo "checked";?> value="student">Student
  <input type="radio" name="occupation" <?php if (isset($occupation) && $occupation=="teacher") echo "checked";?> value="teacher">Teacher
  <input type="radio" name="occupation" <?php if (isset($occupation) && $occupation=="other") echo "checked";?> value="other">Other 
  <br><br>

  Intention of visit: 
  <input type="checkbox" id="visitor" name="visitor" value="<?php echo $visitor;?>">
  <label for="visitor"> Looking for inspiration</label><br>
  <input type="checkbox" id="user" name="user" value="<?php echo $user;?>">
  <label for="user"> Want to edit</label><br>
  <input type="checkbox" id="admin" name="admin" value="<?php echo $admin;?>">
  <label for="admin"> Ask for admin privilege</label><br>

  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <br><br>

  <input type="submit" name="submit" value="Submit">  
</form>

<?php

$name = $email = $gender = $age = $occupation = $visitor = $user = $admin = "";

$name = $_POST["name"];
$email = $_POST["email"];
$gender = $_POST["gender"];
$age = $_POST["age"];
$occupation = $_POST["occupation"];
$visitor = $_POST["visitor"];
$user = $_POST["user"];
$admin = $_POST["admin"];

$txt = fopen('output.txt','w') or die("Unable to open file!");
        
fwrite($txt, "Name: ".$_POST['name'].PHP_EOL);
fwrite($txt, "E-mail: ".$_POST['email'].PHP_EOL);
fwrite($txt, "Gender: ".$_POST['gender'].PHP_EOL);
fwrite($txt, "Age: ".$_POST['age'].PHP_EOL);
fwrite($txt, "Occupation".$_POST['occupation'].PHP_EOL);
fwrite($txt, "Intention of visit: ".$_POST["visitor"]." ".$_POST["user"]." ".$_POST["admin"].PHP_EOL);

fwrite($txt, PHP_EOL);
fclose($txt);

echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $age;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?>

</div>

</body>
</html>