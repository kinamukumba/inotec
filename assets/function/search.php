<?php
require_once 'db.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $searchTerm = $_GET['q'] ?? '';
    $searchTerm = trim($searchTerm);

    if (empty($searchTerm)) {
        echo json_encode(['success' => false, 'message' => 'Nenhum termo de pesquisa fornecido.']);
        exit;
    }

    try {
        // Consultas para as tabelas `course`, `service`, `blog`
        $query = "
            SELECT  id, nome, preco FROM course WHERE nome LIKE :term OR preco LIKE :term
            UNION
            SELECT id, nome, preco  FROM service WHERE nome LIKE :term OR preco LIKE :term
            UNION
            SELECT id, titulo, conteudo FROM blog WHERE titulo LIKE :term OR conteudo LIKE :term
        ";

        $stmt = $pdo->prepare($query);
        $stmt->execute([':term' => "%$searchTerm%"]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($results) {
            echo json_encode(['success' => true, 'data' => $results]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Nenhum resultado encontrado.']);
        }
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'Erro ao buscar: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Método inválido.']);
}
?>
