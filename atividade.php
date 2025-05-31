<?php
require_once './assets/function/user_session.php'; 

// Conectar ao banco de dados
require_once './assets/function/db.php';

$user_name = $_SESSION['user_name'];

// Consulta para obter os cursos em que o usuário está inscrito
$sql = "SELECT * FROM class WHERE nome LIKE :user_name";
$stmt = $pdo->prepare($sql);
$stmt->execute([':user_name' => $user_name]);

// Preencher a tabela com os dados
// Verifica a sessão e recupera os dados do usuário
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
    <link rel="stylesheet" href="./assets/css/style-atividade.css">
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
    <div class="mask"></div>
    <div class="container-body">
        <header class="header-dash start">
            <img src="./assets/img/logo/logo.png" alt="" class="logo">
            <nav class="header-nav-bar">
                <section class="drop-data-user">
                    <div class="top">
                        <span class="logo-user"></span>
                        <p class="p-name-user"><?php echo htmlspecialchars($user_name) . ' ' . htmlspecialchars($user_apelido); ?></p>
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
                    <li class="itens"><i class="fa fa-home" aria-hidden="true"></i>Inicio</li>
                    <li class="itens"><i class="fa fa-user-circle" aria-hidden="true"></i>Perfil</li>
                    <li class="itens"><i class="fa fa-users" aria-hidden="true"></i>Comunidades</li>
                    <li class="itens"><i class="fa fa-graduation-cap" aria-hidden="true"></i>Cursos<i
                        class="active fa fa-link" aria-hidden="true"></i></li>
                    <li class="itens"><i class="fa fa-file-text" aria-hidden="true"></i>Conteúdos</li>
                    <li class="itens"><i class="fa fa-cog" aria-hidden="true"></i>Configurações</li>
                </nav>
            </aside>
            <div class="main-container">
                <div class="get-my-event">
                    <div class="title">
                        <h1>Meus Cursos</h1>
                        <input type="text" name="" id="" placeholder="Buscar cursos">
                    </div>
                    <section class="email-get-event">
                        <h2 class="title2">Receba os melhores cursos da sua área</h2>
                        <div class="input-e">
                            <input class="elem_email_event" type="email" placeholder="Digite o email">
                            <button disabled>Receber cursos</button>
                        </div>
                    </section>
                </div>

                <form action="" class="subscribe-course get-info-course" id="subscribe-form">
                    <h1>Formulário de Inscrição</h1>
                    <div class="main-inputs">
                        <div class="double-input">
                            <div class="input">
                                <input value="<?php echo htmlspecialchars($user_name)?>" name="name-course" type="text" placeholder="Digite o nome">
                            </div>
                            <div class="input">
                                <input value="<?php echo htmlspecialchars($user_email)?>" name="email-course" type="text" placeholder="Digite o email">
                            </div>
                        </div>
                        <div class="double-input">
                            <div class="input">
                                <input value="<?php echo htmlspecialchars($user_telefone)?>" name="phone-course" type="tel" placeholder="Nº telefone">
                            </div>
                            <div class="input">
                                <input value="<?php echo htmlspecialchars($user_data_nascimento)?>" name="date-course" type="date" placeholder="Data">
                            </div>
                        </div>
                        <div class="double-input">
                            <div class="input">
                                <input value="<?php echo htmlspecialchars($user_morada)?>" name="location-course" type="text" placeholder="Digite a morada">
                            </div>
                            <div class="input">
                                <input value="<?php echo htmlspecialchars($user_n_bi)?>" name="n_bi-course" type="text" id="password" placeholder="Nº BI">
                            </div>
                        </div>
                        <div class="input">
                            <p>Curso</p>
                            <select name="course" id="">
                                <option value="" disabled selected>-- Seleciona um curso --</option>
                                <?php
                                    require_once './assets/function/db.php';
                                    $selectCourse = $pdo->query("SELECT * FROM course")->fetchAll();
                                    foreach($selectCourse as $el){
                                        echo "
                                            <option value=".$el['nome']." >" . $el['nome'] ."</option>
                                        ";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="input">
                            <p>Periódo</p>
                            <select name="time-course" id="">
                                <option value="" disabled>-- Seleciona uma opção --</option>
                                <option value="manhã">Manhã</option>
                                <option value="tarde">Tarde</option>
                                <option value="noite">Noite</option>
                            </select>
                        </div>
                        <div class="input">
                            <p>Dias</p>
                            <select name="day-course" id="">
                                <option value="" disabled>-- Seleciona uma opção --</option>
                                <option value="segunda - sexta">Segunda - Sexta</option>
                                <option value="sábado">Sábado</option>
                            </select>
                        </div>
                        <button class="button-sub">Enviar</button>
                </form>

                <button class="button-fixed">Exibir meus cursos</button>
            </div>
        </main>
    </div>
    <!--HIDDEN-->
    <form class="set-type-event">
        <div class="top-set">
            <i class="fa fa-times" aria-hidden="true"></i>
        </div>
        <img src="./assets/img/ilustrate/undraw_cloud-files_8upc.png" alt="" class="ilustrate-set-email">
        <h1 class="title3">Receba os melhores cursos no seu e-mail</h1>
        <div class="input">
            <p>Email</p>
            <input type="email" class="get-email" placeholder="Digite o email">
        </div>
        <div class="categoria-event">
            <p>Categoria</p>
            <section class="cat">
                <p><i class="fa fa-check" aria-hidden="true"></i>Educação</p>
                <p><i class="fa fa-check" aria-hidden="true"></i>Computação e Tecnologia da Infoemação</p>
                <p><i class="fa fa-check" aria-hidden="true"></i>Medicina</p>
                <p><i class="fa fa-check" aria-hidden="true"></i>Arte</p>
                <p><i class="fa fa-check" aria-hidden="true"></i>Empreendedorismo e Inovação</p>
                <p><i class="fa fa-check" aria-hidden="true"></i>Direito</p>
                <p><i class="fa fa-check" aria-hidden="true"></i>Negócios</p>
            </section>
        </div>

        <button><i class="fa fa-check" aria-hidden="true"></i> Receber os melhores eventos de Angola</button>
    </form>

    <div class="painel-your-course">
        <i class="fa fa-times" aria-hidden="true"></i>
        <div class="top-element">
            <input type="text" name="" id="" placeholder="Buscar cursos">
            <button>Adicionar mais cursos</button>
        </div>
        <table class="table-course">
            <thead>
                <tr>
                    <th># do Curso</th>
                    <th>Curso</th>
                    <th>Data</th>
                    <th>Statu</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['course']); ?></td>
                        <td><?php echo htmlspecialchars($row['data_inscricao']); ?></td>
                        <td>
                            <?php echo $row['status'] != 0 ? 'ativo' : 'inativo'; ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <script src="./assets/js/alert.js"></script>
    <script src="./assets/js/script-dash.js"></script>
    <script src="./assets/js/subscribes.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.4/dist/sweetalert2.all.min.js"></script>
</body>

</html>