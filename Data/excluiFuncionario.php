<?php
    session_start();
    require_once 'conexao.php';

    $id_f = $_SESSION['Id_f'] ?? null;
    $cargo = $_SESSION['Cargo'] ?? null;
   
    if ($id_f === null) {
        echo json_encode(["Erro" => "Usuário não logado."]);
    exit;
    }

     if ($cargo !== 'Administrador') {
        echo json_encode(["Erro" => "Usuário não tem permissão para essa operação."]);
    exit;
    }

    $idfuncionario = $_POST['Id_f'];

    if(empty($idfuncionario)){
        echo json_encode(["Erro" => "Digite o id do funcionário."]);
    exit;
    }

    $sql = "DELETE FROM Funcionario WHERE Id_f = '$idfuncionario'";

    if(mysqli_query($con,$sql)){
        echo json_encode(["Sucesso" => "Funcionario excluído com sucesso!"]);
    } else {
        echo json_encode(["Erro" => "Erro na Exclusão!"]);
    }

    mysqli_close($con);
?>
