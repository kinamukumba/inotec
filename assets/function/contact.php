<?php
require_once 'db.php'; // Inclua a conexão com o banco de dados

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name-contact'] ?? '';
    $email = $_POST['email-contact'] ?? '';
    $phone = $_POST['tel-contact'] ?? '';
    $message = $_POST['sms-contact'] ?? '';

    // Validação básica
    if (empty($name) || empty($email) || empty($message)) {
        echo json_encode(['success' => false, 'message' => 'Por favor, preencha os campos obrigatórios.']);
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['success' => false, 'message' => 'E-mail inválido.']);
        exit;
    }

    try {
        // Inserir os dados na tabela `contact`
        $stmt = $pdo->prepare("INSERT INTO contact (name, email, phone, message) VALUES (:name, :email, :phone, :message)");
        $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':phone' => $phone,
            ':message' => $message
        ]);

        echo json_encode(['success' => true, 'message' => 'Mensagem enviada com sucesso!']);
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'Erro ao enviar mensagem: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Método inválido.']);
}
?>
