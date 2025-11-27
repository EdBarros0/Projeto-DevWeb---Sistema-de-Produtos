<?php
    require_once 'conexao.php';

    $nome = $_POST['Nome'];
    $email =$_POST['Email'];
    $senha =$_POST['Senha'];
    $telefone = $_POST['Telefone'];
    $cargo = $_POST['Cargo'];

    if (empty($nome) || empty($email) || empty($senha) || empty($telefone) || empty($cargo)) {
    echo json_encode(["erro" => "Preencha todos os campos!"]);
    exit;
}
    $sql = "INSERT INTO Funcionario (Nome, Email, Senha, Telefone, Cargo) VALUES ('$nome','$email','$senha','$telefone','$cargo')";

    if(mysqli_query($con, $sql)){
                    
        echo json_encode(["mensagem" => "Funcionário cadastrado com sucesso!!!!"]);
            
    }
    else{
        echo json_encode(["Erro" => "Não foi possível cadastrar o Funcionário!"]);
    }
                
    mysqli_close($con);
        
?>



