<?php
    session_start();
    require_once 'conexao.php';

    $id_f = $_SESSION['Id_f'] ?? null;

    if ($id_f === null) {
        echo json_encode(["Erro" => "Usuário não logado."]);
    exit;
    }

    $id_p       = $_POST['Id_p'] ?? null;
    $nome       = $_POST['Nome'] ?? null;
    $valor_c    = $_POST['Valor_Custo'] ?? null;
    $valor_v    = $_POST['Valor_Venda'] ?? null;
    $quantidade = $_POST['Quantidade'] ?? null;

    if (empty($id_p)) {
        echo json_encode(["Erro" => "Id do produto não informado!"]);
    exit;
    }

    if (empty($nome)) {
        echo json_encode(["Erro" => "O produto precisa ter um nome!"]);
    exit;
    }

    if (empty($valor_c)) {
        echo json_encode(["Erro" => "O produto precisa ter um valor de custo!"]);
    exit;
    }

    if (empty($valor_v)) {
        echo json_encode(["Erro" => "O produto precisa ter um valor de venda!"]);
    exit;
    }

    if (empty($quantidade)) {
        echo json_encode(["Erro" => "O produto precisa ter uma quantidade!"]);
    exit;
    }

    $sql = "UPDATE Produto
    SET Nome = '$nome',
    Valor_Custo = '$valor_c',
    Valor_Venda = '$valor_v',
    Quantidade = '$quantidade',
    Id_f = '$id_f'
    WHERE Id_p = '$id_p'";


    if (mysqli_query($con, $sql)) {
        echo json_encode(["Sucesso" => "Produto atualizado com sucesso!"]);
    } else {
        echo json_encode(["Erro" => "Erro na atualização!"]);
    }

mysqli_close($con);
