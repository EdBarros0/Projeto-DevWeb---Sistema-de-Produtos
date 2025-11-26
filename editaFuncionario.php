<?php

require_once 'conexao.php';

$idfuncionario = $_POST['Id_f'];
$nome = $_POST['Nome'];
$email = $_POST['Email'];
$senha = $_POST['Senha'];
$telefone = $_POST['Telefone'];

if(empty($idfuncionario)){
    echo json_encode(["Erro" => "Diga o id do funcionário."]);
    exit;
}

$idfuncionario = intval($idfuncionario);

$sql = "UPDATE Funcionario  
SET Nome = '$nome', 
Email = '$email',
Senha = '$senha',
Telefone = '$telefone'
WHERE Id_f = '$idfuncionario'";

if(mysqli_query($con,$sql)){
    echo json_encode(["Sucesso" => "Funcionario atualizado com sucesso!"]);
} else {
    echo json_encode(["Erro" => "Erro na Atualização!"]);
}

mysqli_close($con);
?>
