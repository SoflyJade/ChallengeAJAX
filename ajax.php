<?php
DEFINE (SERVER, "localhost");
DEFINE (LOGIN, "adminsql");
DEFINE (MDP, "mdpsql");
DEFINE (BASE, "test");

$connect = mysqli_connect(SERVER,LOGIN,MDP,BASE);

//////////////////////////////////////// création de donnée
// $reqInseet = mysqli_query($connect,"INSERT INTO clients VALUES('','Iris','Frozen',28,'marketing','irisjaifroid@hotmail.fr',0645986534)");

/////////////////////////////////////// afficher les données
$res = mysqli_query($connect,"SELECT * FROM clients");
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

  <title>Challenge AJAX</title>

  <script type="text/javascript">

  // xhr = new XMLHttpRequest();

    function userInfo (numberId){
      xhr = new XMLHttpRequest();
      console.log(numberId);

      xhr.open("GET","traitement.php?q="+numberId,true);
      xhr.send();

      if (numberId=="") {
        document.getElementById('result').innerHTML = "";
        return;
      } else {
        console.log("résultat");
        xhr.onreadystatechange = function (){
          console.log("entrée dans fonction");
          if (xhr.readyState == 4 && xhr.status == 200) {
            console.log(xhr.readystate);
            console.log(numberId);
            document.getElementById('result').innerHTML = xhr.responseText;
            console.log("serveur OK");
          }
        };
        // xhr.open('POST','traitement.php',true);
        // params="var1=".idClient;
        // xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        // xhr.send(params);
        // xhr.open("GET","traitement.php?q="+numberId,true);
        // xhr.send();
      }


    }



  </script>




</head>
<body>

  <form method="get">
    <label for="">Sélectionnez :</label>
    <select class="dropdown-toggle" name="users" onchange = "userInfo(this.value)" >
      <option selected>--</option>
      <?php   while ($data = mysqli_fetch_assoc($res)) {
        echo "<option value=".$data['idClient'].">".$data['nom'].' '.$data['prenom']."</option>";
      }
      ?>
    </select>
  </form>

<div>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Prénom</th>
        <th>Nom</th>
        <th>Age</th>
        <th>Profession</th>
        <th>Email</th>
        <th>Téléphone</th>
      </tr>
    </thead>
    <tbody>
      <tr id="result">

      </tr>
    </tbody>
  </table>
</div>
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

</body>
</html>
