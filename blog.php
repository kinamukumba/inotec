<?php
require_once './assets/function/db.php'; // Verifica a sessão e recupera os dados do usuário
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog de Notícias | INOTEC</title>
    <link rel="shortcut icon" href="./assets/img/logo/faicon.png" type="image/x-icon">
    <link rel="stylesheet" href="./assets/css/index.css">
    <link rel="stylesheet" href="./assets/css/style-term.css">
    <link rel="stylesheet" href="./assets/css/style-blogs.css">
    <link rel="stylesheet" href="./assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.0/dist/sweetalert2.min.css" rel="stylesheet">
</head>

<body>
    <div class="mask"></div>
    <div class="load">
        <div class="loader">
            <div class="circle circle-1"></div>
            <div class="circle circle-2"></div>
            <div class="circle circle-3"></div>
            <div class="circle circle-4"></div>
        </div>
    </div>
    <div class="container-body">
        <section class="section-spoiler section-step-start">
            <header class="header-container main-header-site">
                <img src="./assets/img/logo/logo.png" alt="" class="logo">
                <nav class="menu-nav main-nav">
                    <li class="item-nav"><i>Home</i></li>
                    <li class="item-nav"><i>Sobre nós</i></li>
                    <li class="item-nav">
                        <i>Explorar</i>
                        <div class="drop-menu">
                            <section class="section-drop">
                                <p>Serviços</p>
                                <ul>
                                    <li class="section-drop-item">Website</li>
                                    <li class="section-drop-item">Design</li>
                                    <li class="section-drop-item">Marketing</li>
                                    <li class="section-drop-item">Hospedagem</li>
                                    <li class="section-drop-item">Consultoria TI</li>
                                </ul>
                            </section>
                            <section class="section-drop">
                                <p>Academia</p>
                                <ul>
                                    <li class="section-drop-item">Cursos</li>
                                    <li class="section-drop-item">Treinamentos</li>
                                    <li class="section-drop-item">Bolsas</li>
                                    <li class="section-drop-item">Estágios</li>
                                    <li class="section-drop-item">Clubs de desenvolvimento</li>
                                </ul>
                            </section>
                            <section class="section-drop">
                                <p>Projectos</p>
                                <ul>
                                    <li class="section-drop-item">Angotransit</li>
                                    <li class="section-drop-item">Tech4all</li>
                                    <li class="section-drop-item">Sistema de Educação e Capacitação Profissional</li>
                                    <li class="section-drop-item">LuandaTur</li>
                                    <li class="section-drop-item">Be read to the next level</li>
                                </ul>
                            </section>
                        </div>
                    </li>
                    <li class="item-nav"><i>Blog</i></li>
                    <li class="item-nav"><i>Contacto</i></li>
                </nav>
                <div class="search-space">
                    <form action="">
                        <input type="text" placeholder="Buscas por ...?">
                        <button><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>
                <div class="your-car-shop">
                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                </div>
                <div class="buttons-header">
                    <button>Entrar</button>
                    <button>Criar conta</button>
                </div>

                <div class="buttons-menu-stack">
                    <i class="fa fa-bars sign-menu" aria-hidden="true"></i>
                    <i class="fa fa-bars all-menu" aria-hidden="true"></i>
                </div>
            </header>
            <div class="context-header">
                <section class="slide active">
                    <h1>Blog de Notícias</h1>
                </section>
            </div>
        </section>
        <main class="main-container main-body">
            <section class="itens-blog">
                <article class="select-categoria">
                    <p>Categoria da notícia</p>
                    <ul>
                        <li class="active">Todos</li>
                        <li>Cursos</li>
                        <li>Serviços</li>
                    </ul>
                </article>

                <section class="show-blog">
                <?php
                    $all_blog = $pdo->query("SELECT * FROM blog")->fetchAll();
                    foreach($all_blog as $row){
                        echo "
                           <div class='notif'>
                                <img src=".'./assets/function/'. $row['img'] ." alt=''>
                                <h1>". $row['titulo'] ."</h1>
                                <span>
                                    <p><i class='fa fa-clock-o' aria-hidden='true'></i>". $row['data_post'] ."</p>
                                    <p><i class='fa fa-user-circle' aria-hidden='true'></i>INOTEC</p>
                                </span>
                                <p>". $row['conteudo'] ."</p>
                            </div>
                        ";
                    }
                    ?>
                </section>
            </section>
        </main>
        <footer>
            <section class="section-link-footer">
                <article class="footer-column">
                    <p>LINKS</p>
                    <ul>
                        <li>Home</li>
                        <li>Sobre</li>
                        <li>FAQS</li>
                    </ul>
                </article>

                <article class="footer-column">
                    <p>CONTACTOS</p>
                    <ul>
                        <li>Luanda | Angola</li>
                        <li>Whatsapp +244 928 873 795</li>
                        <li>inotec.it.ao/contacto</li>
                    </ul>
                </article>
                <article class="footer-column">
                    <p>NEWSLETTER</p>
                    <form action="" class="form-not">
                        <input type="text" placeholder="Informe o seu email">
                        <button><i class="fa fa-paper-plane" aria-hidden="true"></i> Enviar</button>
                    </form>
                </article>
            </section>

            <section>
                <p>&copy; 2024 INOTEC. Todos Direitos Reservados</p>
                <p>04.892.207/0001-79 – INOTEC – Rede de startups LTDA</p>
            </section>
        </footer>
    </div>

    <!--HIDDEN-->
    <div class="menu-start menu-all-stack">
        <div class="search-space">
            <form action="">
                <input type="text" placeholder="Buscar por eventos">
                <button><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>
        </div>
        <div class="buttons-header">
            <button>Entrar</button>
            <button>Cadastar-se</button>
        </div>
        <nav class="menu-nav main-nav">
            <li class="item-nav"><i>Home</i></li>
            <li class="item-nav"><i>Sobre nós</i></li>
            <li class="item-nav">
                <i>Explorar <i class="fa fa-sort-desc" aria-hidden="true"></i></i>
                <div class="drop-menu-stack">
                    <section class="section-drop">
                        <p>Serviços</p>
                        <ul>
                            <li class="section-drop-item">Website</li>
                            <li class="section-drop-item">Design</li>
                            <li class="section-drop-item">Marketing</li>
                            <li class="section-drop-item">Hospedagem</li>
                            <li class="section-drop-item">Consultoria TI</li>
                        </ul>
                    </section>
                    <section class="section-drop">
                        <p>Academia</p>
                        <ul>
                            <li class="section-drop-item">Cursos</li>
                            <li class="section-drop-item">Treinamentos</li>
                            <li class="section-drop-item">Bolsas</li>
                            <li class="section-drop-item">Estágios</li>
                            <li class="section-drop-item">Clubs de desenvolvimento</li>
                        </ul>
                    </section>
                    <section class="section-drop">
                        <p>Projectos</p>
                        <ul>
                            <li class="section-drop-item">Angotransit</li>
                            <li class="section-drop-item">Tech4all</li>
                            <li class="section-drop-item">Sistema de Educação e Capacitação Profissional</li>
                            <li class="section-drop-item">LuandaTur</li>
                            <li class="section-drop-item">Be read to the next level</li>
                        </ul>
                    </section>
                </div>
            </li>
            <li class="item-nav"><i>Blog</i></li>
            <li class="item-nav"><i>Contacto</i></li>
        </nav>

    </div>

    <div class="menu-start menu-sign-stack">
        <div class="search-space">
            <form action="">
                <input type="text" placeholder="Buscar por eventos">
                <button><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>
        </div>
        <div class="buttons-header">
            <button>Entrar</button>
            <button>Cadastar-se</button>
        </div>
    </div>

    
    <form class="form-login form-set-login" method="post" action="./asset/function/login.php" enctype="multipart/form-data">
        <section class="top-form">
            <h1>Entrar na sua conta</h1>
            <i class="fa fa-times" aria-hidden="true"></i>
        </section>

        <section class="container-form">
            <div class="row-select">
                <input type="email" name="email-login" placeholder="Email..." required>
            </div>
            <div class="row-select">
                <input type="password" name="pass-login" placeholder="Senha..." required>
            </div>
            <div class="last-elem">
                <p>Redefinir Palavra-passe</p>
                <p>Criar conta</p>
            </div>
            <button type="submit">
                <i class="fa fa-spinner hid" aria-hidden="true"></i>
                Entrar
            </button>
        </section>
    </form>
    <script src="./assets/js/alert.js"></script>
    <script src="./assets/js/index.js"></script>
    <script src="./assets/js/login.js"></script>
</body>

</html>