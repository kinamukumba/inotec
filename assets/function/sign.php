<?php
require_once 'db.php';
header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['name-sign'] ?? '';
    $sobrenome = $_POST['subname-sign'] ?? '';
    $usuario = $_POST['user-sign'] ?? '';
    $telefone = $_POST['phone-sign'] ?? '';
    $email = $_POST['email-sign'] ?? '';
    $senha = $_POST['pass-sign'] ?? '';
    if (empty($nome) || empty($sobrenome) || empty($usuario) || empty($email) || empty($senha)) {
        echo json_encode(['success' => false, 'message' => 'Por favor, preencha todos os campos obrigatórios.']);
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['success' => false, 'message' => 'E-mail inválido.']);
        exit;
    }

    if (!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,15}$/', $senha)) {
        echo json_encode(['success' => false, 'message' => 'A senha não atende aos requisitos mínimos.']);
        exit;
    }
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
    try {
        $stmt = $pdo->prepare("INSERT INTO users (nome, apelido, telefone, email, senha) VALUES (:nome, :apelido, :telefone, :email, :senha)");
        $stmt->execute([
            ':nome' => $nome,
            ':apelido' => $sobrenome,
            ':telefone' => $telefone,
            ':email' => $email,
            ':senha' => $senhaHash,
        ]);

        echo json_encode(['success' => true, 'message' => 'Cadastro realizado com sucesso!']);
    } catch (PDOException $e) {
        // Retornar erro genérico em produção
        echo json_encode(['success' => false, 'message' => 'Erro ao cadastrar. Tente novamente.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Método inválido.']);
}
?>
