<?php
session_start();
require 'db.php'; // Conexão com o banco de dados

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'Usuário não autenticado.']);
    http_response_code(401); // Não autorizado
    exit;
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['up-email'];
    $password = $_POST['up-pass'];
    $language = $_POST['up-language'];

    try {
        $query = "UPDATE users SET email = ?, password = ?, language = ? WHERE id = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            $email,
            password_hash($password, PASSWORD_DEFAULT),
            $language,
            $user_id
        ]);

        echo json_encode(['status' => 'success', 'message' => 'Dados atualizados com sucesso!']);
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Erro ao atualizar os dados.']);
        http_response_code(500); // Erro interno do servidor
    }
}
