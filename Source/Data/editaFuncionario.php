<?php
    session_start();
    require_once 'conexao.php';

    $id_f = $_SESSION['Id_f'] ?? null;

    if ($id_f === null) {
        echo json_encode(["Erro" => "Usuário não logado."]);
    exit;
    }

    $nome = $_POST['Nome'];
    $email = $_POST['Email'];
    $senha = $_POST['Senha'];
    $telefone = $_POST['Telefone'];


    $sql = "UPDATE Funcionario  
    SET Nome = '$nome', 
    Email = '$email',
    Senha = '$senha',
    Telefone = '$telefone'
    WHERE Id_f = '$id_f'";

    if(mysqli_query($con,$sql)){
        echo json_encode(["Sucesso" => "Campos atualizados com sucesso!"]);
    } else {
        echo json_encode(["Erro" => "Erro na Atualização!"]);
    }

    mysqli_close($con);
?>
