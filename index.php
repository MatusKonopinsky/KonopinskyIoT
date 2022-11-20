<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS.css" type="text/css">
    <link rel="shortcut icon" href="image-bonfire-icon.png" type="image/icon type">
    <title>IoT Zadanie 2</title>
</head>

<body>

<header>
   
   <h1 class="b">Dotazník</h1>
      
</header>

<article>
      
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        
        <label for="name">Meno:</label>
        <input type="text" name="name" placeholder="Jakub" autofocus>
        <span class="error">*</span>
        
        

        <label for="name">Priezvisko:</label>
        <input type="text" name="surname" placeholder="Lovec" autofocus>
        <span class="error2">*</span>
        
        <br> <br>

        <label for="name">Mobil:</label>
        <input type="text" name="tel_num" placeholder="0988 888 882" autofocus>
        <span class="error">*</span>
      
        

        <label>Mail:</label>
        <input type="text" name="email" placeholder="jakublovec@gmail.com" autofocus>
        <span class="error2">*</span>

        <br> <br>

        <label>Pohlavie:</label>
        <input type="radio" name="gender" value="muž">Muž
        <input type="radio" name="gender" value="žena">Žena
        <input type="radio" name="gender" value="iné">Iné

        <br> <br>

        <label>Status:</label>
        <input type="radio" name="status" value="študent">Študent
        <input type="radio" name="status" value="učiteľ">Učiteľ
        <input type="radio" name="status" value="iné">Iné

        <br> <br>

        <label>Hral si Dark Souls:</label>
        <input type="radio" name="gamer" value="áno">Áno
        <input type="radio" name="gamer" value="nie">Nie

        <br> <br>
        <br> <br>
        
        <input type="submit" name="submit" value="Odoslať">  
    </form>
      
      
</article>

<?php
    

    $name = $surname = $tel_num = $email = $gender = $status = $gamer = "";

    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $tel_num = $_POST["tel_num"]
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    $status = $_POST["status"];
    $gamer = $_POST["gamer"];

    if(isset($_POST['submit'])){
        $file1 = fopen("output.txt","w") or die("Unable to open file!");
        fwrite($file1, "Meno: ".$_POST['name'].PHP_EOL);
        fwrite($file1, "Priezvisko: ".$_POST['surname'].PHP_EOL);
        fwrite($file1, "Telefónné číslo: ".$_POST['tel_num'].PHP_EOL);
        fwrite($file1, "E-mail: ".$_POST['email'].PHP_EOL);
        fwrite($file1, "Pohlavie: ".$_POST['gender'].PHP_EOL);
        fwrite($file1, "Socialný status: ".$_POST['status'].PHP_EOL);
        fwrite($file1, "Je God Gamer?: ".$_POST['gamer'].PHP_EOL);
        fclose($file1);
    }

    
?>



</body>

</html>
