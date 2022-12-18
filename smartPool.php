<!DOCTYPE HTML>  
<html>
<head>
    <title>MarkBot-HomePage</title>
    <meta charset="UTF-8">
    <meta name="description" content="Discord bot events site">
    <meta name="keywords" content="html, discord, bot, events">
    <meta name="author" content="Matúš Konopinský">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
</head>

<body>  

<div class="bg-image"></div>

<div class="bg-text">

<?php
// define variables and set to empty values
$name = $email = $gender = $age = $occupation = $permission = "";

?>

<h2>Webform</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <br><br>

  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <br><br>

  Age: <input type="text" name="age" value="<?php echo $age;?>">
  <br><br>

  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <br><br>

  Occupation:
  <input type="radio" name="occupation" <?php if (isset($occupation) && $occupation=="student") echo "checked";?> value="student">Student
  <input type="radio" name="occupation" <?php if (isset($occupation) && $occupation=="teacher") echo "checked";?> value="teacher">Teacher
  <input type="radio" name="occupation" <?php if (isset($occupation) && $occupation=="other") echo "checked";?> value="other">Other 
  <br><br>
  <br><br>

  Permission level:
  <input type="radio" name="permission" <?php if (isset($permission) && $permission=="visitor") echo "checked";?> value="visitor">Visitor
  <input type="radio" name="permission" <?php if (isset($permission) && $permission=="user") echo "checked";?> value="user">User
  <input type="radio" name="permission" <?php if (isset($permission) && $permission=="admin") echo "checked";?> value="admin">Admin
  <br><br>

  <input type="submit" name="submit" value="Submit">  
</form>

<?php

$name = $_POST["name"];
$email = $_POST["email"];
$gender = $_POST["gender"];
$age = $_POST["age"];
$occupation = $_POST["occupation"];
$permission = $_POST["permission"];




if(isset($_POST['submit'])){
  $txt = fopen('output.txt','a') or die("Unable to open file!");
  fwrite($txt, "Name: ".$_POST['name'].PHP_EOL);
  fwrite($txt, "E-mail: ".$_POST['email'].PHP_EOL);
  fwrite($txt, "Gender: ".$_POST['gender'].PHP_EOL);
  fwrite($txt, "Age: ".$_POST['age'].PHP_EOL);
  fwrite($txt, "Occupation: ".$_POST['occupation'].PHP_EOL);
  fwrite($txt, "Permission level: ".$_POST['permission'].PHP_EOL);
  fwrite($txt, PHP_EOL);
  fclose($txt);
}


echo "<h2>Entered data:</h2>";
echo "Name: ".$name;
echo "<br>";
echo "E-mail: ".$email;
echo "<br>";
echo "Age: ".$age;
echo "<br>";
echo "Gender: ".$gender;
echo "<br>";
echo "Occupation: ".$occupation;
echo "<br>";
echo "Permission level: ".$permission;
echo "<br>";
?>

<form method="post">

  <input class="reset" type="submit" name="submit1" value="Reset txt file">  
</form>

<?php
  if(isset($_POST['submit1'])){
    $txt = fopen('output.txt','w') or die("Unable to open file!");
    fwrite($txt, PHP_EOL);
    fclose($txt);
  }
?>

</div>

</body>
</html>