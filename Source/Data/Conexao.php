<?php
   $host = "sql305.infinityfree.com";
   $user = "if0_40540182";
   $pass = "dudu1234bj";
   $dbname = "if0_40540182_sysweb";

   // Tenta conectar
   $con = mysqli_connect($host, $user, $pass, $dbname);
   
   if(!$con) {
       die(json_encode(["Erro" => "Falha na conexão: " . mysqli_connect_error()]));
   }
   mysqli_set_charset($con, "utf8mb4");
?>
