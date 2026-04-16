<?php 
    header("Content-Type: application/json");

    $metodo = $_SERVER['REQUEST_METHOD']; 

    $arquivo = 'usuarios.json';

    if (!file_exists($arquivo)) {
        file_put_contents($arquivo, json_encode([], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

    $usuarios = json_decode(file_get_contents($arquivo), true);
    // vetor indexado do php
    // $usuarios = [
    //     ["id" => 1, "nome" => "Maria Souza", "email" => "maria@email.com"],
    //     ["id" => 2, "nome" => "joão Silva", "email" => "joao@email.com"]
        
    // ];

    switch ($metodo) {
        case 'GET':
            echo json_encode($usuarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            break;
        case 'POST':
            // echo "AQUI AÇÕES DO MÉTODO POST";
            $dados = json_decode(file_get_contents('php://input'), true);
            // print_r($dados);

            if (!isset($dados["id"]) || !isset($dados["nome"]) || !isset($dados["email"])) {
                http_response_code(400);
                echo json_encode(["erro" => "Dados Incompletos. "], JSON_UNESCAPED_UNICODE);
                exit;
            }
            $novousuario = [
                "id" => $dados["id"],
                "nome" => $dados["nome"],
                "email" => $dados["email"]
            ];

            $usuarios[] = $novousuario;

            file_put_contents($arquivo, json_encode($usuarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

            echo json_encode(["mensagem" => "Usuario inserido com sucesso!", "usuarios" => $usuarios], JSON_UNESCAPED_UNICODE);
            break;

            // array_push($usuarios, $novousuario);
            // echo json_encode('Usuario inserido com Sucesso!!');
            // print_r($usuarios);

            break;
        default:
            http_response_code(405);
            echo json_encode(["erro" => "Método nao permitido!"], JSON_UNESCAPED_UNICODE);
            break;
    }


    // echo "Método da requisiçao: " . $metodo;

    

    

?>