<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Destroi a sessão
    session_unset();
    session_destroy();

    echo json_encode(['status' => 'success', 'message' => 'Logout realizado com sucesso.']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Método de requisição inválido.']);
    http_response_code(405); // Método não permitido
}
