<?php
require 'db.php'; // Inclui o arquivo de conexão ao banco de dados

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura os dados enviados pelo formulário
    $nome_curso = $_POST['name-course'] ?? null;
    $preco_curso = $_POST['email-course'] ?? null;
    $duracao_curso = $_POST['phone-course'] ?? null;
    $vagas_curso = $_POST['vaga-course'] ?? null;
    $categoria_curso = $_POST['course'] ?? null;
    $codigo_course = strtoupper(substr($categoria_curso, 0, 3)) . '-' . strtoupper(substr($nome_curso, 0, 3)) . '-' . rand(1000, 9999);

    // Verifica se um arquivo de imagem foi enviado
    if (isset($_FILES['img-course']) && $_FILES['img-course']['error'] === 0) {
        $imagem = $_FILES['img-course'];
        $extensao = pathinfo($imagem['name'], PATHINFO_EXTENSION);
        $nome_imagem = uniqid() . '.' . $extensao;
        $destino_imagem = 'uploads/' . $nome_imagem;

        // Validações básicas
        if (move_uploaded_file($imagem['tmp_name'], $destino_imagem)) {
            try {
                // Insere os dados na tabela de cursos
                $stmt = $pdo->prepare("INSERT INTO course (nome, preco, duracao, vagas, categoria, img, code) VALUES (?, ?, ?, ?, ?, ?, ?)");
                $stmt->execute([$nome_curso, $preco_curso, $duracao_curso, $vagas_curso, $categoria_curso, $destino_imagem, $codigo_course]);

                echo json_encode(['success' => true, 'message' => 'Curso cadastrado com sucesso!']);
            } catch (PDOException $e) {
                echo json_encode(['success' => false, 'message' => 'Erro ao cadastrar o curso: ' . $e->getMessage()]);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Erro ao fazer upload da imagem.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Imagem não enviada ou inválida.']);
    }
}
?>
