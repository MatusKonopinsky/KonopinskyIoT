<!DOCTYPE HTML>  
<html>
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <meta name="description" content="Discord bot events site">
    <meta name="keywords" content="html, discord, bot, events">
    <meta name="author" content="Matúš Konopinský">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="5">
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

            $temperature = $_GET["temperature"];
            $lightAmount = $_GET["lightAmount"];
            $height = $_GET["height"];

            

            if(isset($_GET['temperature'])){

                $txt = fopen('sensorData.txt','w') or die("Unable to open file!");

                fwrite($txt, "Temperature: ".$_GET['temperature'].PHP_EOL);
                fwrite($txt, "Part of day: ".$_GET['lightAmount'].PHP_EOL);
                fwrite($txt, "Height of water: ".$_GET['height'].PHP_EOL);

                fclose($txt);

            }

            $lines_array = file("sensorData.txt");
            $search_string = "Temperature";

            foreach ($lines_array as $line) {
                f(strpos($line, $search_string) !== false){
                    list(, $new_str) = explode(":", $line);
                    $new_str = trim($new_str);
                }
            }

            echo "<h2>Sensor data:</h2>";
            echo "Temperature: ".$new_str;
            echo "<br>";
            echo "Part of day: ".$_GET['lightAmount'];
            echo "<br>";
            echo "Height of water: ".$_GET['height'];
            echo "<br>";


            
        ?>
    </div>  

    
</body>
</html>