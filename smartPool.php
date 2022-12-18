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
    <?php
        // define variables and set to empty values
        $temperature = $lightAmount = $height = $valveDeg = $lights = $water = "";
        
    ?>

    <div class="header">
        <h1>Header</h1>
    </div>

    <div class="main">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

            Set temperature: <input type="text" name="temperature" value="<?php echo $temperature;?>">
            <br><br>

            Lights: <label class="toggle">
                        <input type="checkbox" name="lights" value="<?php echo $lights;?>">
                        <span class="slider"></span>
                    </label>

            <br><br>

            Turn on the water: <label class="toggle">
                                    <input type="checkbox" name="water" value="<?php echo $water;?>">
                                    <span class="slider"></span>
                                </label>
            <br><br>

            

            <input type="submit" name="submit" value="Submit">  

        </form>
    </div>  

    <?php

$temperature = $_POST["temperature"];
$lights = $_POST["lights"];
$water = $_POST["water"];

if(isset($_POST['submit'])){
  $txt = fopen('inputData.txt','w') or die("Unable to open file!");
  fwrite($txt, "Temperature: ".$_POST['temperature'].PHP_EOL);
  fwrite($txt, "Lights: ".$_POST['lights'].PHP_EOL);
  fwrite($txt, "Water: ".$_POST['water'].PHP_EOL);
  fclose($txt);
}


echo "<h2>Entered data:</h2>";
echo "Temp: ".$temperature;
echo "<br>";
echo "Lights: ".$lights;
echo "<br>";
echo "Water: ".$water;
echo "<br>";
?>

    
</body>
</html>