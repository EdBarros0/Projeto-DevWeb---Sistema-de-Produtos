<?php
    session_start();
    require_once 'conexao.php';

    $id_f = $_SESSION['Id_f'] ?? null;
    if ($id_f === null) { echo json_encode(["Erro" => "Não logado"]); exit; }

    $id_p = $_GET['id'] ?? '';

    if(empty($id_p)){
        echo json_encode(["Erro" => "ID não fornecido"]);
        exit;
    }


    $sql = "SELECT * FROM Produto WHERE Id_p = '$id_p'";
    $result = mysqli_query($con, $sql);

    if($row = mysqli_fetch_assoc($result)){
        echo json_encode($row);
    } else {
        echo json_encode(["Erro" => "Produto não encontrado"]);
    }
    
    mysqli_close($con);
?>