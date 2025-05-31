<?php
// Incluir o arquivo de conexão com o banco de dados
require_once 'db.php';

// Receber os dados enviados via POST
$data = json_decode(file_get_contents("php://input"), true);

if (!$data) {
    echo json_encode(["status" => "error", "message" => "Dados inválidos!"]);
    exit;
}

// Extrair os campos do objeto recebido
$client_id = $data['client_id'] ?? null;
$idProduto = $data['idProduct'] ?? null;
$preco = $data['priceProduct'] ?? null;
$nome = $data['nameProduct'] ?? null;
$data_atual = date("Y-m-d"); // Data atual

// Validar os campos obrigatórios
if (!$client_id || !$idProduto || !$preco || !$nome) {
    echo json_encode(["status" => "error", "message" => "Campos obrigatórios ausentes!"]);
    exit;
}

try {
    // Inserir os dados na tabela `shop`
    $sql = "INSERT INTO shop (client_id, idProduto, preco, nome, data) VALUES (:client_id, :idProduto, :preco, :nome, :data)";
    $stmt = $pdo->prepare($sql);

    // Associar os parâmetros
    $stmt->bindParam(':client_id', $client_id);
    $stmt->bindParam(':idProduto', $idProduto, PDO::PARAM_INT);
    $stmt->bindParam(':preco', $preco);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':data', $data_atual);

    // Executar a consulta
    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Item adicionado com sucesso!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Erro ao adicionar item."]);
    }
} catch (PDOException $e) {
    echo json_encode(["status" => "error", "message" => "Erro no banco de dados: " . $e->getMessage()]);
}
