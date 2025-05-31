<?php
require_once './assets/function/user_session.php'; // Verifica a sessão e recupera os dados do usuário
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD | INOTEC</title>
    <link rel="shortcut icon" href="./assets/img/logo/faicon.png" type="image/x-icon">
    <link rel="stylesheet" href="./assets/css/index-dash.css">
    <link rel="stylesheet" href="./assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.0/dist/sweetalert2.min.css" rel="stylesheet">
</head>

<body>
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
                    <li class="itens"><i class="fa fa-graduation-cap" aria-hidden="true"></i>Cursos</li>
                    <li class="itens"><i class="fa fa-file-text" aria-hidden="true"></i>Conteúdos</li>
                    <li class="itens"><i class="fa fa-cog" aria-hidden="true"></i>Configurações<i class="active fa fa-link" aria-hidden="true"></i></li>
                </nav>
            </aside>
            <div class="main-container">
                <!--DATA-COUNT-->
                <section class="section-data count">
                    <form id="updateForm" action="" class="form-update-data cout">
                        <div class="title">
                            <h1>Conta</h1>
                            <button><i class="fa fa-check" aria-hidden="true"></i> Salvar</button>
                        </div>
                        <div class="update-photo">
                            <span>
                                <p>Foto do perfil</p>
                                <img src="./assets/img/ilustrate/perfil-removebg-preview.png" alt="">
                            </span>
                            <span>
                                <p><i class="fa fa-upload" aria-hidden="true"></i>Carregar uma foto</p>
                                <p><i class="fa fa-trash" aria-hidden="true"></i>Remover uma foto</p>
                            </span>
                        </div>
                        <div class="input">
                            <p>Email principal <i>Excluir conta</i></p>
                            <input value="<?php echo htmlspecialchars($user_email)?>" name="up-email" type="email" placeholder="Digite o email">
                        </div>
                        <div class="input">
                            <p>Palavra-passe <i>Nova Palavra-passe</i></p>
                            <input value="xxxxxxxx" name="up-pass" type="password" placeholder="Digite o Palavra-passe">
                        </div>
                        <div class="input">
                            <p>Idiomas</p>
                           <select name="up-linguage" id="">
                                <option value="" disabled>-- Seleciona um idioma --</option>
                                <option value="português">Português</option>
                         </select>
                        </div>
                    </form>
                </section>
                <!--DATA-USER-->
                <section class="section-data user">
                    <form action="" class="form-update-data user">
                        <div class="title">
                            <h1>Dados pessoais</h1>
                            <button><i class="fa fa-check" aria-hidden="true"></i> Salvar dados pessoais</button>
                        </div>
                        <div class="input">
                            <p>Nome de usuário <i>Excluir dados</i></p>
                            <input name="up-user" type="email" placeholder="Editar o nome de usuário">
                        </div>
                        <div class="input">
                            <p>Nº telefone <i>Nova nº telefone</i></p>
                            <input value="<?php echo htmlspecialchars($user_telefone)?>" name="up-phone" type="tel" placeholder="Editar nº telefone">
                        </div>
                        <div class="input">
                            <p>Bilhete de Identidade <i></i></p>
                            <input value="<?php echo htmlspecialchars($user_n_bi)?>" name="up-phone" type="text" placeholder="Bilhete de Identidade">
                        </div>
                        <div class="input">
                            <p>Data de nascimento <i></i></p>
                            <input value="<?php echo htmlspecialchars($user_data_nascimento)?>" name="up-phone" type="date" placeholder="">
                        </div>
                        <div class="input">
                            <p>Nacionalidade</p>
                           <select name="up-country" id="">
                                <option value="" disabled>-- Seleciona um idioma --</option>
                                <option value="angola">Angola</option>
                                <option value="portugal">Portugal</option>
                                <option value="brasil">Brasil</option>
                         </select>
                        </div>
                        <div class="double-input">
                            <div class="input">
                                <input hidden type="file" placeholder="Digite o email">
                                <i class="fa fa-file-pdf" aria-hidden="true"></i>
                                <img src="" alt="">
                                <em>Anexos (01)</em>
                            </div>
                            <div class="input">
                                <input hidden type="file" placeholder="Palavra-passe">
                                <i class="fa fa-file-pdf" aria-hidden="true"></i>
                                <img src="" alt="">
                                <em>Anexos (02)</em>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </main>
    </div>


    <!--HIDDEN-->

    <script src="./assets/js/alert.js"></script>
    <script src="./assets/js/script-dash.js"></script>
    <script src="./assets/js/update-user.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.4/dist/sweetalert2.all.min.js"></script>
</body>

</html>