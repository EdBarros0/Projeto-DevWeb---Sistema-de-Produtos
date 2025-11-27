<?php
    session_start();
    require_once 'conexao.php';

    $id_f = $_SESSION['Id_f'] ?? null;
    
    if ($id_f === null) {
        echo json_encode(["Erro" => "Usuário não logado."]);
        exit;
    }
    
    $id_p = $_POST['Id_p'] ?? null;

    if(empty($id_p)){
        echo json_encode(["Erro" => "Diga o id do produto."]);
    exit;
    }
    
    $sql = " DELETE FROM Func_Prod WHERE Id_p = '$id_p'";

    $sql2 = "DELETE FROM Produto WHERE Id_p = '$id_p'";

    if(mysqli_query($con,$sql) && mysqli_query($con,$sql2) ){
        echo json_encode(["Sucesso" => "Produto excluído com sucesso!"]);
    } else {
        echo json_encode(["Erro" => "Erro na Exclusão!"]);
    }

    mysqli_close($con);
?>
