<?php
	$host = "localhost:3306";
	$user="root";
	$pass ="";
	$dbname = "SisWeb";
	//Conexao
	 $con = mysqli_connect($host, $user, $pass, $dbname);
          // TESTAR CONEXAO
         if(!$con) {
             echo "<p>ERRO: (" . mysqli_connect_errno($con) . ") " . mysqli_connect_error($con) . "</p>";
             exit;
          } else {
            echo "<p>Conexão realizada com sucesso!</p>";
         }
?>
