<?php
require_once 'db.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email-update-pass'] ?? '';
    $novaSenha = $_POST['new-pass'] ?? '';

    if (empty($email) || empty($novaSenha)) {
        echo json_encode(['success' => false, 'message' => 'Por favor, preencha todos os campos.']);
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['success' => false, 'message' => 'E-mail inválido.']);
        exit;
    }

    try {
        // Verificar se o e-mail existe no banco
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = :email");
        $stmt->execute([':email' => $email]);

        if ($stmt->rowCount() === 0) {
            echo json_encode(['success' => false, 'message' => 'E-mail não encontrado.']);
            exit;
        }

        // Hash da nova senha
        $senhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);

        // Atualizar a senha no banco
        $updateStmt = $pdo->prepare("UPDATE users SET senha = :senha WHERE email = :email");
        $updateStmt->execute([
            ':senha' => $senhaHash,
            ':email' => $email,
        ]);

        echo json_encode(['success' => true, 'message' => 'Senha redefinida com sucesso!']);
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'Erro ao redefinir a senha: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Método inválido.']);
}
?>
