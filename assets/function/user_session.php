<?php
require_once 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    // Redirecionar para a página de login se o usuário não estiver logado
    header("Location: login");
    exit;
}

try {
    // Recuperar os dados do usuário logado
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->execute([':id' => $_SESSION['user_id']]);
    $user = $stmt->fetch();

    if (!$user) {
        // Se o usuário não existir, encerra a sessão e redireciona para o login
        session_destroy();
        header("Location: login.php");
        exit;
    }

    // Disponibilizar os dados do usuário como uma variável global
    $user_name = $user['nome'];
    $user_email = $user['email'];
    $user_apelido = $user['apelido'];
    $user_telefone = $user['telefone'];
    $user_idade = $user['idade'];
    $user_morada = $user['morada'];
    $user_n_bi = $user['n_bi'];
    $user_status = $user['status'];
    $user_data_nascimento = $user['data_nascimento'];
    $user_id = $user['id'];
} catch (PDOException $e) {
    die("Erro ao recuperar os dados do usuário: " . $e->getMessage());
}
?>
