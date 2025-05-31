<?php
require_once './assets/function/db.php'; // Verifica a sessão e recupera os dados do usuário
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos | INOTEC</title>
    <link rel="shortcut icon" href="./assets/img/logo/faicon.png" type="image/x-icon">
    <link rel="stylesheet" href="./assets/css/index.css">
    <link rel="stylesheet" href="./assets/css/style-service.css">
    <link rel="stylesheet" href="./assets/css/style-course.css">
    <link rel="stylesheet" href="./assets/css/style-main.css">
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
            <header class="header-container main-header-site active">
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
                    <h1>ACADEMIA INOTEC - CURSOS</h1>
                    <p>A Academia Inotec oferece uma variedade de cursos voltados para capacitação profissional em áreas
                        tecnológicas e criativas, com foco no mercado digital moderno. Os cursos são projetados para
                        equipar os alunos com habilidades práticas e conhecimentos atualizados, ajudando-os a se
                        destacar em suas carreiras ou iniciar projetos próprios.
                    </p>
                </section>
            </div>
        </section>
        <main class="main-container main-body">
            <section class="cart-service">
                <h1>APERFEIÇOE SUAS <i>HABILIDADES</i> E ESTEJA PREPARADO PARA O MERCADO.</h1>
                <section class="tolk">
                    <div class="data-cart">
                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                        <h3>Certificados reconhecidos</h3>
                    </div>
                    <div class="data-cart">
                        <i class="fa fa-book" aria-hidden="true"></i>
                        <h3>Cursos modernos para mentes inovadoras.</h3>
                    </div>
                    <div class="data-cart">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <h3>Ambiente de aprendizado​</h3>
                    </div>
                </section>
            </section>

            <div class="carts-service">
                <section>
                    <h1>NOSSOS CURSOS</h1>
                    <div class="main-course">
                        <div class="nav-course">
                            <h3>Categorias</h3>
                            <ul>
                                <li class="cat-item active">Todos cursos</li>
                                <li class="cat-item">Tecnologia</li>
                                <li class="cat-item">Gestão Empresarial</li>
                            </ul>
                        </div>
                        <div class="group-cart all active">

                        <?php

                            $all_course = $pdo->query("SELECT * FROM course")->fetchAll();
                            foreach($all_course as $row){
                                echo "
                                    <article class='pacote-service'>
                                        <div class='img'><img src=".'./assets/function/'. $row['img'] ." alt=''></div>
                                        <h2 class='info-name'>". $row['nome'] ."</h2>
                                        <span class='span'>
                                            <span>
                                                <i class='fa fa-clock-o' aria-hidden='true'></i>
                                                <p>". $row['duracao'] ."</p>
                                                <i>semanas</i>
                                            </span>
                                            <span>
                                                <p class='info-price'>". $row['preco'] ."</p>
                                                <i>AOA</i>
                                            </span>
                                        </span>
                                        <button class='btn-add-car'>Adicionar ao carrinho</button>
                                    </article>
                                ";
                            }
                        ?>
                      </div>
                        
                        <div class="group-cart tech">
                        <?php

                            $tech_course = $pdo->query("SELECT * FROM course WHERE categoria LIKE 'tecnologia'")->fetchAll();
                            foreach($tech_course as $row){
                                echo "
                                    <article class='pacote-service'>
                                        <div class='img'><img src=".'./assets/function/'. $row['img'] ." alt=''></div>
                                        <h2 class='info-name'>". $row['nome'] ."</h2>
                                        <span class='span'>
                                            <span>
                                                <i class='fa fa-clock-o' aria-hidden='true'></i>
                                                <p>". $row['duracao'] ."</p>
                                                <i>semanas</i>
                                            </span>
                                            <span>
                                                <p class='info-price'>". $row['preco'] ."</p>
                                                <i>AOA</i>
                                            </span>
                                        </span>
                                        <button class='btn-add-car'>Adicionar ao carrinho</button>
                                    </article>
                                ";
                            }
                        ?>
                        </div>

                        <div class="group-cart gest">
                        <?php

                            $gest_course = $pdo->query("SELECT * FROM course WHERE categoria LIKE 'gestao'")->fetchAll();
                            foreach($gest_course as $row){
                                echo "
                                    <article class='pacote-service'>
                                        <div class='img'><img src=".'./assets/function/'. $row['img'] ." alt=''></div>
                                        <h2 class='info-name'>". $row['nome'] ."</h2>
                                        <span class='span'>
                                            <span>
                                                <i class='fa fa-clock-o' aria-hidden='true'></i>
                                                <p>". $row['duracao'] ."</p>
                                                <i>semanas</i>
                                            </span>
                                            <span>
                                                <p class='info-price'>". $row['preco'] ."</p>
                                                <i>AOA</i>
                                            </span>
                                        </span>
                                        <button class='btn-add-car'>Adicionar ao carrinho</button>
                                    </article>
                                ";
                            }
                        ?>
                        </div>
                    </div>
                </section>
            </div>

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

    
    <form class="form-login form-set-login" method="post" enctype="multipart/form-data">
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

    <div class="shop-car">
        <i class="fa fa-arrow-right" aria-hidden="true"></i>
        <div class="shop-car-m"></div>
        <button><i class="fa fa-check-circle" aria-hidden="true"></i>Finalizar</button>
    </div>

    <script src="./assets/js/alert.js"></script>
    <script src="./assets/js/index.js"></script>
    <script src="./assets/js/script-course.js"></script>
    <script src="./assets/js/login.js"></script>
    <script src="./assets/js/script-main.js"></script>
</body>

</html>