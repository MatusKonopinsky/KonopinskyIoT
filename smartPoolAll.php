<!DOCTYPE HTML>  
<html>
<head>
    <title>Smart pool IoT</title>
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
        $temperatureFromSensor = $temperatureFromUser = $lightAmount = $height =  "";
        $lights = $water = "off";
        
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

            Set temperature: <input type="range" name="temperature" min="26" max="32" value="<?php echo $$temperatureFromUser;?>" id="myRange">
            <p>Value: <span id="demo"></span></p>
            <script>
                var slider = document.getElementById("myRange");
                var output = document.getElementById("demo");
                output.innerHTML = slider.value;

                slider.oninput = function() {
                  output.innerHTML = this.value;
                }
            </script>
            <br><br>

            Lights: <label class="toggle">
                        <input type="checkbox" name="lights" value="on">
                        <span class="slider"></span>
                    </label>

            <br><br>

            Turn on the water: <label class="toggle">
                                    <input type="checkbox" name="water" value="on">
                                    <span class="slider"></span>
                                </label>
            <br><br>

            

            <input type="submit" name="submit" value="Submit">  

        </form>

        <?php

            $temperatureFromUser = $_POST["temperature"];

            if(isset($_POST['lights'])){
              $lights = $_POST["lights"];
            }
            if(isset($_POST['water'])){
              $water = $_POST["water"];
            }

            if(isset($_POST['submit'])){
              $txt = fopen('inputData.txt','w') or die("Unable to open file!");
              fwrite($txt, "Temperature: ".$_POST['temperature'].PHP_EOL);

              if(isset($_POST['lights'])){
                fwrite($txt, "Lights: ".$_POST['lights'].PHP_EOL);
              }
              else{
                fwrite($txt, "Lights: "."off".PHP_EOL);
              }
              if(isset($_POST['water'])){
                fwrite($txt, "Water: ".$_POST['water'].PHP_EOL);
              }
              else{
                fwrite($txt, "Water: "."off".PHP_EOL);
              }

              fclose($txt);
            }

        ?>
    </div>  
    
    <div class="bottom">
        <?php
            echo "<h2>Entered data:</h2>";
            echo "Temp: ".$temperatureFromUser;
            echo "<br>";
            echo "Lights: ".$lights;
            echo "<br>";
            echo "Water: ".$water;
            echo "<br>";
        ?>
    </div>

    

    
</body>
</html>