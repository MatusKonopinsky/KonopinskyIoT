<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS.css" type="text/css">
    <link rel="shortcut icon" href="image-bonfire-icon.png" type="image/icon type">
    <title>IoT Zadanie 2</title>
    <style>
        html,body{
    margin:0;
    padding:0;
        }

        body {
            width: 70%;
            margin: 1% auto;
            background-position: center top;
            background-image: url(background1.jpg);
            background-attachment: fixed;
            color: black;
        }

        header,article {
            display: block;
            width: 700px;
            margin: auto;
            padding: 5px 30px 5px 30px;
        }
        
        header {
            height: 160px;
            text-align: center;
            position: relative;
            animation: animation 7s linear 3s infinite alternate;
        }
        
        article {
            min-height: 200px;
            border: 1px solid blueviolet;
            border-radius: 20px;
            box-shadow: 10px 10px 40px 0px #150063 inset;   
            background-color: #ffffff;
            opacity: 0.8;
            filter: alpha(opacity=80);
            font-size: 15px;
            font-family: 'Dancing Script', 'Palatino Linotype', Georgia, 'Times New Roman';
            font-weight: bold;
            color: black;
        } 

        form {
            padding: 2rem;
        }
                
        h1.b {
        text-shadow: none;
        font-size: 55px;
        font-family: Akzidenz-Grotesk, Clarendon, Georgia, Palatino, 'Palatino Linotype', Times, 'Times New Roman', serif;
        color: dark silver;
        }   

        input {
            border-radius: 5px;
            border-style: none;
            border-color: blueviolet;
            padding: 0.5rem;
            text-align: center;
            background-color: aliceblue;
        }

        input[type="text"] {
            font-size: 15px;
            font-family: 'Palatino Linotype', Georgia, 'Times New Roman';
            font-weight: bold;
            color: black;
        }

        input[type="radio"] {
            margin-left: 20px;
            font-size: 15px;
            font-family: 'Palatino Linotype', Georgia, 'Times New Roman';
            font-weight: bold;
            color: black;
        }

        input[type="submit"] {
            border-style: solid;
            font-size: 20px;
            font-family: 'Dancing Script', 'Palatino Linotype', Georgia, 'Times New Roman';
            font-weight: bold;
            color: white;
            background-color: red;
        }

        input[type="submit"]:hover {
            border-style: solid;
            background-color: blue;
            cursor: pointer;
        }

        .error {
            margin-right: 50px;
            color: red; 
        }

        .error2 {
            color: red; 
        }


        @keyframes animation {
            0%   {color: black; left:0px;}
            25%  {color: red; left:-200px;}
            50%  {color: white; left:0px;}
            75%  {color: green; left:200px;}
            100% {color: black; left:0px;}
        }
    </style>
</head>

<body>
<?php
    

    $name = $surname = $tel_num = $email = $gender = $status = $gamer = "";
?>

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
<<<<<<< HEAD



</body>

</html>


>>>>>>> b507ae8aa09ffce10f886829dbd40e8c775fa494