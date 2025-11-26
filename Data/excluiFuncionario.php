<?php

require_once 'conexao.php';

$idfuncionario = $_POST['Id_f'];

if(empty($idfuncionario)){
    echo json_encode(["Erro" => "Diga o id do funcionário."]);
    exit;
}

$idfuncionario = intval($idfuncionario);

$sql = "DELETE FROM Funcionario WHERE Id_f = '$idfuncionario'";

if(mysqli_query($con,$sql)){
    echo json_encode(["Sucesso" => "Funcionario excluído com sucesso!"]);
} else {
    echo json_encode(["Erro" => "Erro na Exclusão!"]);
}

mysqli_close($con);
?>
