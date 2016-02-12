<?php
DEFINE (SERVER, "localhost");
DEFINE (LOGIN, "adminsql");
DEFINE (MDP, "mdpsql");
DEFINE (BASE, "test");

$connect = mysqli_connect(SERVER,LOGIN,MDP,BASE);


// var_dump($_GET);
// echo "<br>";
// print_r($_GET);
// echo "<br>";
// var_dump($_GET["q"]);
// echo "<br>";
// print_r($_GET["q"]);

$idClients = $_GET["q"];

$sqlajax = 'SELECT * FROM clients WHERE idClient='.$idClients;
$resajax = mysqli_query($connect,$sqlajax);

 while ($data = mysqli_fetch_assoc($resajax)){
   echo "<td>".$data['nom']."</td>";
   echo "<td>".$data['prenom']."</td>";
   echo "<td>".$data['age']."</td>";
   echo "<td>".$data['profession']."</td>";
   echo "<td>".$data['email']."</td>";
   echo "<td>".$data['telephone']."</td>";
 };

 ?>
