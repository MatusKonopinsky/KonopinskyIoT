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
        $temperatureFromUser = "";
        
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

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                Set temperature: <input type="range" name="temperature" min="26" max="32" value="<?php echo $temperatureFromUser;?>">
                <br><br>

                <input type="submit" name="submit" value="Submit">  

        </form>
        <?php

            $temperatureFromUser = $_POST["temperature"];

            if(isset($_POST['submit'])){
                $txt = fopen('inputData.txt','w') or die("Unable to open file!");

                fwrite($txt, "Temperature: ".$_POST['temperature'].PHP_EOL);

                fclose($txt);

                
            }
            echo "<h2>Entered data:</h2>";
                echo "Temperature: ".$temperatureFromUser;
                echo "<br>";
        ?>
    </div>  

    
</body>
</html>