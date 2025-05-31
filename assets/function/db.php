<?php
// Configurações de conexão com o banco de dados
$host = 'localhost';       // Endereço do servidor
$dbname = 'inotec';        // Nome do banco de dados
$username = 'root';        // Nome de usuário do banco de dados
$password = '';            // Senha do banco de dados

try {
    // Criar uma nova instância de PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    // Configurações adicionais para o PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Relatar erros como exceções
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // Retornar resultados como array associativo

    // Mensagem opcional para verificar a conexão (pode ser removida em produção)
    // echo "Conexão bem-sucedida!";
} catch (PDOException $e) {
    // Capturar e exibir erros de conexão
    die("Erro de conexão: " . $e->getMessage());
}
?>
