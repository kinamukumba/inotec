<?php
require_once 'db.php'; // Inclui a conexão com o banco de dados
session_start(); // Inicia ou retoma a sessão

header('Content-Type: application/json'); // Define o retorno como JSON

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura os dados enviados via POST
    $email = $_POST['email-login'] ?? '';
    $senha = $_POST['pass-login'] ?? '';

    // Validação básica dos campos
    if (empty($email) || empty($senha)) {
        #echo json_encode(['success' => false, 'message' => 'Por favor, preencha todos os campos.']);
        exit;
    }

    try {
        // Consulta o banco de dados para verificar o email
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute([':email' => $email]);
        $user = $stmt->fetch();

        // Verifica se o usuário existe e a senha está correta
        if ($user && password_verify($senha, $user['senha'])) {
            // Armazena os dados na sessão
            $_SESSION['user_id'] = $user['id']; 
            $_SESSION['user_name'] = $user['nome']; 
            /*$_SESSION['user_apelido'] = $user['apelido']; 
            $_SESSION['user_telefone'] = $user['telefone']; 
            $_SESSION['user_idade'] = $user['idade']; 
            $_SESSION['user_morada'] = $user['morada']; 
            $_SESSION['user_statu'] = $user['statu']; 
            $_SESSION['user_email'] = $user['email']; 
            $_SESSION['user_n_bi'] = $user['n_bi']; 
            $_SESSION['user_status'] = $user['status']; 
            $_SESSION['user_data_nascimento'] = $user['data_nascimento'];*/ 

            // Retorna sucesso
            echo json_encode(['success' => true, 'message' => 'Login realizado com sucesso!']);
        } else {
            // Login falhou
            echo json_encode(['success' => false, 'message' => 'E-mail ou senha inválidos.']);
        }
    } catch (PDOException $e) {
        // Erro no banco de dados
        echo json_encode(['success' => false, 'message' => 'Erro ao acessar o banco de dados: ' . $e->getMessage()]);
    }
} else {
    // Caso a requisição não seja POST
    echo json_encode(['success' => false, 'message' => 'Método inválido.']);
}
?>
