<?php

if(isset($_GET["temperature"] , $_GET["humidity"])) {
   $temperature = $_GET["temperature"]; // get temperature value from HTTP GET
   $humidity =  $_GET["humidity"]; // get temperature value from HTTP GET

   $servername = "localhost";
   $username = "root";
   $password = "";
   $database_name = "arduinodata";
   $port = 3308;

   // Create MySQL connection fom PHP to MySQL server
   $connection = new mysqli($servername, $username, $password, $database_name,$port);
   // Check connection
   if ($connection->connect_error) {
      die("MySQL connection failed: " . $connection->connect_error);
   }

   $sql = "INSERT INTO sensorvalue (temperature,humidity) VALUES ($temperature,$humidity)";

   if ($connection->query($sql) === TRUE) {
      echo "New record created successfully";
   } else {
      echo "Error: " . $sql . " => " . $connection->error;
   }

   $connection->close();
} else {
   echo "temperature is not set in the HTTP request";
}
?>
