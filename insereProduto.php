<?php
    require_once 'conexao.php';

    $nome = $_POST['Nome'];
    $validade =$_POST['Validade'];
    $valor_c =$_POST['Valor_Custo'];
    $valor_v = $_POST['Valor_Venda'];

    $sql = "INSERT INTO Produto (Nome, Validade, Valor_Custo, Valor_Venda) VALUES ('$nome','$validade','$valor_c','$valor_v')";

    if(mysqli_query($con, $sql)){
                    
        echo json_encode(["mensagem" => "Produto cadastrado com sucesso!!!!"]);
            
    }
    else{
        echo "Erro não foi possivel cadastrar";
    }
                
    mysqli_close($con);
        
?>
