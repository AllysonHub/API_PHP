<?php 
    header("Content-Type: application/json");

    $metodo = $_SERVER['REQUEST_METHOD']; 

    switch ($metodo) {
        case 'GET':
            echo "AQUI AÇÔES DO MÈTODO GET";
            break;
        case 'POST':
            echo "AQUI AÇÕES DO MÉTODO POST";
            break;
        default:
            echo "MÉTODO NÃO ENCONTRADO!";
            break;
    }


    // echo "Método da requisiçao: " . $metodo;

    // $usuarios = [
    //     ["id" => 1, "nome" => "Maria Souza", "email" => "maria@email.com"],
    //     ["id" => 2, "nome" => "joão Silva", "email" => "joao@email.com"]
        
    // ];

    // echo json_encode($usuarios)

?>