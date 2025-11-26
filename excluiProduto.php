<?php

require_once 'conexao.php';

$idproduto = $_POST['Id_p'];
$idfuncionario = $_POST['Id_f'];

if(empty($idproduto)){
    echo json_encode(["Erro" => "Diga o id do produto."]);
    exit;
}

$idproduto = intval($idproduto);
$idfuncionario = intval($idfuncionario);

$sql = " DELETE FROM Func_Prod WHERE Id_p = ('$idproduto') AND (Id_f = '$idfuncionario')";

$sql2 = "DELETE FROM Produto WHERE Id_p = '$idproduto'";

if(mysqli_query($con,$sql) && mysqli_query($con,$sql2) ){
    echo json_encode(["Sucesso" => "Produto excluído com sucesso!"]);
} else {
    echo json_encode(["Erro" => "Erro na Exclusão!"]);
}

mysqli_close($con);
?>
