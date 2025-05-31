<?php
require_once 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura os dados do formulário
    $name = $_POST['name-course'] ?? '';
    $email = $_POST['email-course'] ?? '';
    $phone = $_POST['phone-course'] ?? '';
    $birth_date = $_POST['date-course'] ?? '';
    $location = $_POST['location-course'] ?? '';
    $n_bi = $_POST['n_bi-course'] ?? '';
    $course = $_POST['course'] ?? '';
    $period = $_POST['time-course'] ?? '';
    $days = $_POST['day-course'] ?? '';

    // Validação básica dos campos
    if (empty($name) || empty($email) || empty($phone) || empty($course) || empty($period) || empty($days)) {
        echo "Todos os campos são obrigatórios!";
        exit;
    }

    try {
        // Insira os dados na tabela 'class' (inscrição)
        $stmt = $pdo->prepare("INSERT INTO class (nome, email, telefone, data_nascimento, morada, n_bi, course, periodo, dia) 
                               VALUES (:nome, :email, :telefone, :data_nascimento, :morada, :n_bi, :course, :periodo, :dia)");
        $stmt->execute([
            ':nome' => $name,
            ':email' => $email,
            ':telefone' => $phone,
            ':data_nascimento' => $birth_date,
            ':morada' => $location,
            ':n_bi' => $n_bi,
            ':course' => $course,
            ':periodo' => $period,
            ':dia' => $days
        ]);

        echo "Inscrição realizada com sucesso!";
    } catch (PDOException $e) {
        echo "Erro ao processar inscrição: " . $e->getMessage();
    }
}
?>
