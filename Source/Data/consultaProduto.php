<?php 
	    session_start();
        require_once 'conexao.php';

        $id_f = $_SESSION['Id_f'] ?? null;
   
        if ($id_f === null) {
            echo json_encode(["Erro" => "Usuário não logado."]);
        exit;
        }

		$nome = $_POST['Nome'];
        
		if (empty($nome)) {
        echo json_encode(["Erro" => "Digite um nome para pesquisar."]);
        exit;
        }


		$sql = "SELECT Id_p, Nome, Valor_Custo, Valor_Venda, Quantidade, Id_f FROM Produto WHERE Nome LIKE '%$nome%'";

		
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

        mysqli_close($con);
?>
