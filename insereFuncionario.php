<?php
    require_once 'conexao.php';

    $nome = $_POST['Nome'];
    $email =$_POST['Email'];
    $senha =$_POST['Senha'];
    $telefone = $_POST['Telefone'];

    if (empty($nome) || empty($email) || empty($senha) || empty($telefone)) {
    echo json_encode(["erro" => "Preencha todos os campos!"]);
    exit;
}
    $sql = "INSERT INTO Funcionario (Nome, Email, Senha, Telefone) VALUES ('$nome','$email','$senha','$telefone')";

    if(mysqli_query($con, $sql)){
                    
        echo json_encode(["mensagem" => "Funcionario cadastrado com sucesso!!!!"]);
            
    }
    else{
        echo "Erro não foi possivel cadastrar o Funcionario";
    }
                
    mysqli_close($con);
        
?>



