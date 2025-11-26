<?php 
	    require_once 'conexao.php';

		$nome = $_POST['Nome'];
        
		$sql = "SELECT Nome, Validade, Valor_Custo, Valor_Venda FROM Produto WHERE Nome LIKE '%$nome%'";

		$result = mysqli_query($con, $sql);
        $produtos = [];

        while($row = $result->fetch_assoc()){
            $produtos[] = $row;
        }

        if (count($produtos) > 0) {
            echo json_encode($produtos);
        } else {
            echo json_encode(["Erro" => "Produto não encontrado!"]);
        }

?>
