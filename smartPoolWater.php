<!DOCTYPE HTML>  
<html>
<head>
    <title>Home</title>
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
        $temperature = $lightAmount = $height = "";
        
    ?>

    <div class="header">
        <h1>Smart pool - control center</h1>
    </div>

    <div class="topnav">
        <a href="https://konopinskyiot.azurewebsites.net/smartPoolHome.php">Home</a>
        <a href="https://konopinskyiot.azurewebsites.net/smartPoolAll.php">Set Program</a>
        <a href="https://konopinskyiot.azurewebsites.net/smartPoolLights.php">Lights</a>
        <a href="https://konopinskyiot.azurewebsites.net/smartPoolTemp.php">Temperature</a>
        <a href="https://konopinskyiot.azurewebsites.net/smartPoolWater.php">Water</a>
    </div>

    <div class="main">
        <?php

            $temperature = $_POST["temperature"];
            $lightAmount = $_POST["lightAmount"];
            $height = $_POST["height"];

            $txt = fopen('sensorData.txt','w') or die("Unable to open file!");

            fwrite($txt, "Temperature: ".$_POST['temperature'].PHP_EOL);
            fwrite($txt, "Part of day: ".$_POST['lights'].PHP_EOL);
            fwrite($txt, "Height of water: "."off".PHP_EOL);

            fclose($txt);



            echo "<h2>Entered data:</h2>";
            echo "Temp: ".$temperature;
            echo "<br>";
            echo "Lights: ".$lightAmount;
            echo "<br>";
            echo "Height: ".$height;
            echo "<br>";
        ?>
    </div>  

    
</body>
</html>