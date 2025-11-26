<?php

require_once 'conexao.php';

$idproduto = $_POST['Id_p'];
$idfuncionario = $_POST['Id_f'];
$nome = $_POST['Nome'];
$validade =$_POST['Validade'];
$valor_c =$_POST['Valor_Custo'];
$valor_v = $_POST['Valor_Venda'];


if(empty($idproduto)){
    echo json_encode(["Erro" => "Digite o id do Produto."]);
    exit;
}

$idfuncionario = intval($idfuncionario);
$idproduto = intval($idproduto);

$sql = "UPDATE Produto  
SET Nome = '$nome', 
Validade = '$validade',
Valor_Custo = '$valor_c',
Valor_Venda = '$valor_v'
WHERE Id_p = '$idproduto'";

$sql2 = "UPDATE Func_Prod
SET Id_f = '$idfuncionario'
WHERE Id_p = '$idproduto'"; 

if(mysqli_query($con,$sql) && mysqli_query($con,$sql2)){
    echo json_encode(["Sucesso" => "Produto atualizado com sucesso!"]);
} else {
    echo json_encode(["Erro" => "Erro na Atualização!"]);
}

mysqli_close($con);
?>
