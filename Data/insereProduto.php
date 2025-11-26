<?php
    require_once 'conexao.php';

    session_start();

    $id_f = $_SESSION['Id_f'] ?? null;
    $nome = $_POST['Nome'];
    $validade =$_POST['Validade'];
    $valor_c =$_POST['Valor_Custo'];
    $valor_v = $_POST['Valor_Venda'];
    


    
    if(empty($nome) || empty($valor_c) || empty($valor_v)){
        echo json_encode(["erro" => "Preencha os campos necessários!"]);
    exit;
    }
    
    $sql = "INSERT INTO Produto (Nome, Validade, Valor_Custo, Valor_Venda) VALUES ('$nome','$validade','$valor_c','$valor_v')";

    if(mysqli_query($con, $sql)){

        $idproduto = mysqli_insert_id($con);
                    
        $sql2 = "INSERT INTO Func_Prod (Id_f, Id_p) VALUES ('$id_f','$idproduto')";

        if(mysqli_query($con,$sql2)){

            echo json_encode(["mensagem" => "Produto cadastrado e relação criada!"]);
    } else {
        echo  json_encode(["Mensagem" => "Produto inserido, mas falhou ao criar relação!"]);
        }
       
            
    }
    else{
        echo json_encode(["Erro" => "Não foi possivel cadastrar o Produto!"]);
    }
                
    mysqli_close($con);
        
?>
