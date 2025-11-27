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

    
    $sql = "INSERT INTO Produto (Nome, Valor_Custo, Valor_Venda, Quantidade) VALUES ('$nome','$valor_c','$valor_v','$quantidade')";

    if(mysqli_query($con, $sql)){

        $id_p = mysqli_insert_id($con);
                    
        $sql2 = "INSERT INTO Func_Prod (Id_f, Id_p) VALUES ('$id_f','$id_p')";

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
