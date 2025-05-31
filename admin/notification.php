<?php
// Conectar ao banco de dados
require_once '../assets/function/db.php';

//CONTAR BLOG
$sqlBlog = "SELECT COUNT(*) AS total_cursos FROM blog";
$stmtBlog = $pdo->prepare($sqlBlog);
$stmtBlog->execute();
$resultadoBolg = $stmtBlog->fetch(PDO::FETCH_ASSOC);




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD-ADM | INOTEC</title>
    <link rel="shortcut icon" href="../assets/img/logo/faicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/index-dash.css">
    <link rel="stylesheet" href="../assets/css/controle.css">
    <link rel="stylesheet" href="../assets/css/styles-admin.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.0/dist/sweetalert2.min.css" rel="stylesheet">
</head>

<body>
    <div class="load">
        <div class="loader">
            <div class="circle circle-1"></div>
            <div class="circle circle-2"></div>
            <div class="circle circle-3"></div>
            <div class="circle circle-4"></div>
        </div>
    </div>
    <div class="container-body">
        <header class="header-dash start">
            <img src="../assets/img/logo/logo.png" alt="" class="logo">
            <nav class="header-nav-bar">
                <section class="drop-data-user">
                    <div class="top">
                        <span class="logo-user"></span>
                        <p class="p-name-user">administrador - inotec</p>
                        <i class="fa fa-caret-down" aria-hidden="true"></i>
                    </div>
                    <ul class="element-drop">
                        <li class="drop-item">Meus Cursos</li>
                        <li class="drop-item">Saír</li>
                    </ul>
                </section>
                <i class="fa fa-bars" aria-hidden="true"></i>
            </nav>
        </header>
        <main class="main-dash start">
            <aside class="aside-nav">
                <nav class="aside-nav-item">
                    <li class="itens i"><i class="fa fa-home" aria-hidden="true"></i>Inicio</li>
                    <li class="itens i"><i class="fa fa-graduation-cap" aria-hidden="true"></i>Cursos</li>
                    <li class="itens i"><i class="fa fa-briefcase" aria-hidden="true"></i>Serviços</li>
                    <li class="itens i"><i class="fa fa-commenting" aria-hidden="true"></i>Messagem</li>
                    <li class="itens i"><i class="fa fa-bell" aria-hidden="true"></i>Notificações<i
                            class="active fa fa-link" aria-hidden="true"></i></li>
                    <li class="itens i"><i class="fa fa-cog" aria-hidden="true"></i>Configurações</li>
                </nav>
            </aside>
            <div class="main-container">
                <section class="main-carts-data">
                    <article class="carts-data">
                        <div class="context-card">
                            <em>Total de Notificações</em>
                            <p>0
                                <?php echo htmlspecialchars($resultadoBolg['total_cursos']); ?>
                            </p>
                        </div>
                        <div class="icons">
                            <img src="../assets/img/ilustrate/icons8-em-andamento-100.png" alt="">
                        </div>
                    </article>

                    <article class="carts-data">
                        <div class="context-card">
                            <em>Total no Blog</em>
                            <p>0 <?php echo htmlspecialchars($resultadoBolg['total_cursos']); ?></p>
                        </div>
                        <div class="icons">
                            <img src="../assets/img/ilustrate/icons8-bandeira-de-chegada-100.png" alt="">
                        </div>
                    </article>

                    <article class="carts-data">
                        <div class="context-card">
                            <em>Novidades</em>
                            <p>0 <?php echo htmlspecialchars($resultadoBolg['total_cursos']); ?></p>
                        </div>
                        <div class="icons">
                            <img src="../assets/img/ilustrate/icons8-bandeira-de-chegada-100.png" alt="">
                        </div>
                    </article>
                </section>

                <form action="" class="subscribe-course ok get-info-course notify" id="notification-form">
                    <i class="fa fa-times" aria-hidden="true"></i>
                    <h1>Formulário envio de notificações</h1>
                    <div class="main-inputs">
                        <div class="input-simple">
                            <input name="title-not" type="text" placeholder="Título" required>
                s        </div>
                        <div class="input-simple">
                            <input name="img-not" type="file" required>
                        </div>
                        <div class="input">
                            <p>Categoria da notificação</p>
                            <select name="category-not" required>
                                <option value="" disabled selected>-- Seleciona uma categoria --</option>
                                <option value="servico">Serviços</option>
                                <option value="cursos">Cursos</option>
                                <option value="outros">Outro</option>
                            </select>
                        </div>
                        <textarea name="content-not" placeholder="Conteúdo" required></textarea>
                        <button type="submit" class="button-sub">Enviar</button>
                    </div>
                </form>
                
            </div>
        </main>
    </div>


    <!--HIDDEN-->

    <script src="../assets/js/alert.js"></script>
    <script src="../assets/js/script-admin.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.4/dist/sweetalert2.all.min.js"></script>
</body>

</html>