<?php
require 'db.php'; // Inclui o arquivo de conexão ao banco de dados

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura os dados enviados pelo formulário
    $id_curso = $_POST['id-course'] ?? null;
    $nome_curso = $_POST['name-course'] ?? null;
    $preco_curso = $_POST['email-course'] ?? null;
    $duracao_curso = $_POST['phone-course'] ?? null;
    $vagas_curso = $_POST['vaga-course'] ?? null;
    $categoria_curso = $_POST['course'] ?? null;

    if (!$id_curso) {
        echo json_encode(['success' => false, 'message' => 'O ID do curso é obrigatório.']);
        exit;
    }

    try {
        // Verifica se o curso existe
        $stmt = $pdo->prepare("SELECT * FROM course WHERE code = ?");
        $stmt->execute([$id_curso]);
        $curso = $stmt->fetch();

        if (!$curso) {
            echo json_encode(['success' => false, 'message' => 'Curso não encontrado.']);
            exit;
        }

        // Verifica se uma nova imagem foi enviada
        $destino_imagem = $curso['imagem']; // Usa a imagem existente como padrão
        if (isset($_FILES['img-course']) && $_FILES['img-course']['error'] === 0) {
            $imagem = $_FILES['img-course'];
            $extensao = pathinfo($imagem['name'], PATHINFO_EXTENSION);
            $nome_imagem = uniqid() . '.' . $extensao;
            $destino_imagem = 'uploads/' . $nome_imagem;

            // Move o arquivo de imagem para o diretório de uploads
            if (!move_uploaded_file($imagem['tmp_name'], $destino_imagem)) {
                echo json_encode(['success' => false, 'message' => 'Erro ao fazer upload da nova imagem.']);
                exit;
            }
        }

        // Atualiza os dados do curso
        $stmt = $pdo->prepare("
            UPDATE course 
            SET nome = ?, preco = ?, duracao = ?, vagas = ?, categoria = ?, img = ? 
            WHERE id = ?
        ");
        $stmt->execute([
            $nome_curso ?? $curso['nome'],
            $preco_curso ?? $curso['preco'],
            $duracao_curso ?? $curso['duracao'],
            $vagas_curso ?? $curso['vagas'],
            $categoria_curso ?? $curso['categoria'],
            $destino_imagem,
            $id_curso
        ]);

        echo json_encode(['success' => true, 'message' => 'Curso atualizado com sucesso!']);
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'Erro ao atualizar o curso: ' . $e->getMessage()]);
    }
}
?>
