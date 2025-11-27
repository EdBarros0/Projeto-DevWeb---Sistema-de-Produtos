<?php
    session_start();
    require_once 'conexao.php';

    $email =$_POST['Email'];
    $senha =$_POST['Senha'];

    if (empty($email) || empty($senha)) {
    echo json_encode(["erro" => "Preencha todos os campos!"]);
    exit;
}
    $sql = "SELECT * FROM Funcionario WHERE Email = '$email' AND Senha = '$senha'";
    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result) > 0){
        $dados = mysqli_fetch_assoc($result);
        $_SESSION['Id_f'] = $dados['Id_f'];  
        $_SESSION['Cargo'] = $dados['Cargo'];          
        echo json_encode(["mensagem" => "Login feito."]);
            
    }
    else{
        echo json_encode(["Erro" => "Verifique seu Email e Senha!"]);
    }
                
    mysqli_close($con);
        
?>



