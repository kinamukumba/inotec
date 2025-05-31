<?php
require_once './assets/function/user_session.php'; // Verifica a sessão e recupera os dados do usuário

// Conectar ao banco de dados
require_once './assets/function/db.php';


$user_id = $_SESSION['user_id'];
$sql = "SELECT COUNT(*) AS total_cursos FROM class WHERE id = :usuario_id";

    // Preparar e executar a consulta
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':usuario_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();

    // Obter o resultado
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD | INOTEC</title>
    <link rel="shortcut icon" href="./assets/img/logo/faicon.png" type="image/x-icon">
    <link rel="stylesheet" href="./assets/css/index-dash.css">
    <link rel="stylesheet" href="./assets/css/controle.css">
    <link rel="stylesheet" href="./assets/css/font-awesome.min.css">
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
            <img src="./assets/img/logo/logo.png" alt="" class="logo">
            <nav class="header-nav-bar">
                <section class="drop-data-user">
                    <div class="top">
                        <span class="logo-user"></span>
                        <p class="p-name-user"><?php echo htmlspecialchars($user_name) . ' ' . htmlspecialchars($user_apelido); ?>
                        </p>
                        <i class="fa fa-caret-down" aria-hidden="true"></i>
                    </div>
                    <ul class="element-drop">
                        <li class="drop-item">Meus perfil</li>
                        <li class="drop-item">Meus Cursos</li>
                        <li class="drop-item">Meus conteúdos</li>
                        <li class="drop-item" id="logout-btn">Saír</li>
                    </ul>
                </section>
                <i class="fa fa-bars" aria-hidden="true"></i>
            </nav>
        </header>
        <main class="main-dash start">
            <aside class="aside-nav">
                <nav class="aside-nav-item">
                    <li class="itens"><i class="fa fa-home" aria-hidden="true"></i>Inicio<i class="active fa fa-link" aria-hidden="true"></i></li>
                    <li class="itens"><i class="fa fa-user-circle" aria-hidden="true"></i>Perfil</li>
                    <li class="itens"><i class="fa fa-users" aria-hidden="true"></i>Comunidades</li>
                    <li class="itens"><i class="fa fa-graduation-cap" aria-hidden="true"></i>Cursos</li>
                    <li class="itens"><i class="fa fa-file-text" aria-hidden="true"></i>Conteúdos</li>
                    <li class="itens"><i class="fa fa-cog" aria-hidden="true"></i>Configurações</li>
                </nav>
            </aside>
            <div class="main-container">
                <section class="welcome-dash">
                    <i>Dashboard</i>
                    <p>Bem-vindo, <?php echo htmlspecialchars($user_name) . ' ' . htmlspecialchars($user_apelido); ?>!</p>
                    <span>
                        <button>Ver meus cursos</button>
                    </span>
                </section>
                <section class="main-carts-data">
                    <article class="carts-data">
                        <div class="context-card">
                            <em>Total de Cursos</em>
                            <p>0<?php echo htmlspecialchars($resultado['total_cursos']); ?></p>
                        </div>
                        <div class="icons">
                            <img src="./assets/img/ilustrate/icons8-estudando-o-grupo-on-line-100 (1).png" alt="">
                        </div>
                    </article>

                    <article class="carts-data">
                        <div class="context-card">
                            <em>Cursos em andamanto</em>
                            <p>00</p>
                        </div>
                        <div class="icons">
                            <img src="./assets/img/ilustrate/icons8-em-andamento-100.png" alt="">
                        </div>
                    </article>

                    <article class="carts-data">
                        <div class="context-card">
                            <em>Cursos encerrados</em>
                            <p>00</p>
                        </div>
                        <div class="icons">
                            <img src="./assets/img/ilustrate/icons8-bandeira-de-chegada-100.png" alt="">
                        </div>
                    </article>
                </section>
                <section class="tables-step">
                    <h1>Últimos actividades</h1>
                    <table class="table-controle">
                        <thead>
                            <tr>
                                <th>Actividade</th>
                                <th>Tipo de actividade</th>
                                <th>Data</th>
                                <th>Valor</th>
                                <th>Statu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Curso</td>
                                <td>Curso online</td>
                                <td>06/12/2024</td>
                                <td>10.000 AOA</td>
                                <td class="statu">ativo</td>
                            </tr>
                            <tr>
                                <td>Curso</td>
                                <td>Curso online</td>
                                <td>06/12/2024</td>
                                <td>10.000 AOA</td>
                                <td class="statu">ativo</td>
                            </tr>
                            <tr>
                                <td>Curso</td>
                                <td>Curso online</td>
                                <td>06/12/2024</td>
                                <td>10.000 AOA</td>
                                <td class="statu">ativo</td>
                            </tr>
                            <tr>
                                <td>Curso</td>
                                <td>Curso online</td>
                                <td>06/12/2024</td>
                                <td>10.000 AOA</td>
                                <td class="statu">ativo</td>
                            </tr>
                        </tbody>
                    </table>
                </section>
            </div>
        </main>
    </div>


    <!--HIDDEN-->

    <script src="./assets/js/alert.js"></script>
    <script src="./assets/js/script-dash.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.4/dist/sweetalert2.all.min.js"></script>
</body>

</html>