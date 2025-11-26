<?php
    require_once 'conexao.php';

    $nome = $_POST['Nome'];
    $validade =$_POST['Validade'];
    $valor_c =$_POST['Valor_Custo'];
    $valor_v = $_POST['Valor_Venda'];
    $id_f = $_POST['Id_f'];

    
    if(empty($nome) || empty($valor_c) || empty($valor_v) || empty($id_f)){
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
        echo "Produto inserido, mas falhou ao criar relação!";
        }
       
            
    }
    else{
        echo "Erro não foi possivel cadastrar";
    }
                
    mysqli_close($con);
        
?>
