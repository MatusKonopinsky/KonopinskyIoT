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

            

            if(isset($_GET['temperature']) && isset($_GET['lightAmount']) && isset($_GET['height'])){

                $txt = fopen('sensorData.txt','w') or die("Unable to open file!");

                fwrite($txt, "Temperature: ".$_GET['temperature'].PHP_EOL);
                fwrite($txt, "Part of day: ".$_GET['lightAmount'].PHP_EOL);
                fwrite($txt, "Level of water: ".$_GET['height'].PHP_EOL);

                fclose($txt);

            }

            $lines_array = file("sensorData.txt");
            $search_temp = "Temperature";
            $search_day = "Part of day";
            $search_water = "Level of water";

            foreach ($lines_array as $line) {
                if(strpos($line, $search_temp) !== false){
                    list(, $new_str1) = explode(":", $line);
                    $new_str1 = trim($new_str1);
                }
                else if(strpos($line, $search_day) !== false){
                    list(, $new_str2) = explode(":", $line);
                    $new_str2 = trim($new_str2);
                }
                else if(strpos($line, $search_water) !== false){
                    list(, $new_str3) = explode(":", $line);
                    $new_str3 = trim($new_str3);
                }
            }

            echo "<h2>Sensor data:</h2>";
            echo "Temperature: ".$new_str1;
            echo "<br>";
            echo "Part of day: ".$new_str2;
            echo "<br>";
            echo "Level of water: ".$new_str3;
            echo "<br>";


            
        ?>
    </div>  

    
</body>
</html>