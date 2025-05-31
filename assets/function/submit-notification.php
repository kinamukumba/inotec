<?php
require 'db.php'; // Arquivo de conexão com o banco de dados

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title-not'];
    $category = $_POST['category-not'];
    $content = $_POST['content-not'];
    $date_post = date('Y-m-d H:i:s');

    // Verifica se a imagem foi enviada
    if (isset($_FILES['img-not']) && $_FILES['img-not']['error'] === UPLOAD_ERR_OK) {
        $imgTmpPath = $_FILES['img-not']['tmp_name'];
        $imgName = $_FILES['img-not']['name'];
        $imgDestination = 'uploads/' . $imgName;

        // Move a imagem para a pasta de destino
        if (move_uploaded_file($imgTmpPath, $imgDestination)) {
            try {
                // Inserção no banco de dados
                $query = "INSERT INTO blog (titulo, categoria, data_post, conteudo, img) VALUES (?, ?, ?, ?, ?)";
                $stmt = $pdo->prepare($query);
                $stmt->execute([$title, $category, $date_post, $content, $imgDestination]);

                echo json_encode(['status' => 'success', 'message' => 'Notificação cadastrada com sucesso!']);
            } catch (PDOException $e) {
                echo json_encode(['status' => 'error', 'message' => 'Erro ao salvar os dados no banco.']);
                http_response_code(500);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Erro ao fazer upload da imagem.']);
            http_response_code(500);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Imagem não foi enviada ou é inválida.']);
        http_response_code(400);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Método de requisição inválido.']);
    http_response_code(405);
}
