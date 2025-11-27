<?php
    session_start();
    require_once 'conexao.php';


    $id_f = $_SESSION['Id_f'] ?? null;
   
    if ($id_f === null) {
        echo json_encode(["Erro" => "Usuário não logado."]);
    exit;
    }
   
    $nome = $_POST['Nome'];
    $valor_c =$_POST['Valor_Custo'];
    $valor_v = $_POST['Valor_Venda'];
    $quantidade =$_POST['Quantidade'];
    


    
    if(empty($nome) || empty($valor_c) || empty($valor_v) || empty($quantidade)){
        echo json_encode(["erro" => "Preencha os campos necessários!"]);
    exit;
    }

    
    $sql = "INSERT INTO Produto (Nome, Valor_Custo, Valor_Venda, Quantidade, Id_f) VALUES ('$nome','$valor_c','$valor_v','$quantidade','$id_f')";

    if(mysqli_query($con, $sql)){

        echo json_encode(["mensagem" => "Produto cadastrado e relação criada!"]);
        } else {
            echo json_encode(["Erro" => "Não foi possivel cadastrar o Produto!"]);
        }
          
            
    
                
    mysqli_close($con);
        
?>
