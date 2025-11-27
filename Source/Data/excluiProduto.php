<?php
    session_start();
    require_once 'conexao.php';

    $id_f = $_SESSION['Id_f'] ?? null;
    
    if ($id_f === null) {
        echo json_encode(["Erro" => "Usuário não logado."]);
        exit;
    }
    
    $nome = $_POST['Nome'] ?? null;

    if(empty($nome)){
        echo json_encode(["Erro" => "Diga o nome do produto."]);
    exit;
    }

    $sql = "DELETE FROM Produto WHERE Nome = '$nome'";

    if(mysqli_query($con,$sql)){
        echo json_encode(["Sucesso" => "Produto excluído com sucesso!"]);
    } else {
        echo json_encode(["Erro" => "Erro na Exclusão!"]);
    }

    mysqli_close($con);
?>
