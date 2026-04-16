<?php 
    header("Content-Type: application/json");

    $metodo = $_SERVER['REQUEST_METHOD']; 

    // vetor indexado do php
    $usuarios = [
        ["id" => 1, "nome" => "Maria Souza", "email" => "maria@email.com"],
        ["id" => 2, "nome" => "joão Silva", "email" => "joao@email.com"]
        
    ];

    switch ($metodo) {
        case 'GET':
            echo json_encode($usuarios);
            break;
        case 'POST':
            // echo "AQUI AÇÕES DO MÉTODO POST";
            $dados = json_decode(file_get_contents('php://input'), true);
            // print_r($dados);
            $novousuario = [
                "id" => $dados["id"],
                "nome" => $dados["nome"],
                "email" => $dados["email"]
            ];

            array_push($usuarios, $novousuario);
            echo json_encode('Usuario inserido com Sucesso!!');
            print_r($usuarios);
            
            break;
        default:
            echo "MÉTODO NÃO ENCONTRADO!";
            break;
    }


    // echo "Método da requisiçao: " . $metodo;

    

    

?>