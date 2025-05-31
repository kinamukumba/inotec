<?php
// Conectar ao banco de dados
require_once '../assets/function/db.php';

//CONTAR CURSO
$sqlCourse = "SELECT COUNT(*) AS total_cursos FROM course";
// Preparando e executando a consulta
$stmtCourse = $pdo->prepare($sqlCourse);
$stmtCourse->execute();

// Obtendo o resultado
$resultadoCourse = $stmtCourse->fetch(PDO::FETCH_ASSOC);

//CONTAR ALUNOS
$sqlClass = "SELECT COUNT(*) AS total_cursos FROM class";

// Preparando e executando a consulta
$stmtClass = $pdo->prepare($sqlClass);
$stmtClass->execute();

// Obtendo o resultado
$resultadoClass = $stmtClass->fetch(PDO::FETCH_ASSOC);
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
                    <li class="itens i"><i class="fa fa-graduation-cap" aria-hidden="true"></i>Cursos<i class="active fa fa-link" aria-hidden="true"></i></li>
                    <li class="itens i"><i class="fa fa-briefcase" aria-hidden="true"></i>Serviços</li>
                    <li class="itens i"><i class="fa fa-commenting" aria-hidden="true"></i>Messagem</li>
                    <li class="itens i"><i class="fa fa-bell" aria-hidden="true"></i>Notificações</li>
                    <li class="itens i"><i class="fa fa-cog" aria-hidden="true"></i>Configurações</li>
                </nav>
            </aside>
            <div class="main-container">
                <section class="main-carts-data">
                    <article class="carts-data">
                        <div class="context-card">
                            <em>Total de Alunos</em>
                            <p>0<?php echo htmlspecialchars($resultadoClass['total_cursos']); ?>
                            </p>
                        </div>
                        <div class="icons">
                            <img src="../assets/img/ilustrate/icons8-estudando-o-grupo-on-line-100 (1).png" alt="">
                        </div>
                    </article>

                    <article class="carts-data">
                        <div class="context-card">
                            <em>Total de Cursos</em>
                            <p>0<?php echo htmlspecialchars($resultadoCourse['total_cursos']); ?></p>
                        </div>
                        <div class="icons">
                            <img src="../assets/img/ilustrate/icons8-em-andamento-100.png" alt="">
                        </div>
                    </article>

                    <article class="carts-data">
                        <div class="context-card">
                            <em>Cursos encerrados</em>
                            <p>00</p>
                        </div>
                        <div class="icons">
                            <img src="../assets/img/ilustrate/icons8-bandeira-de-chegada-100.png" alt="">
                        </div>
                    </article>
                </section>
                <section class="add-button">
                    <div>
                        <button>Editar um curso</button>
                        <button>Adicionar mais cursos</button>
                    </div>
                </section>
                <section class="tables-step">
                    <h1>Todos Cursos - INOTEC</h1>
                    <table class="table-controle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Código</th>
                                <th>Cursos</th>
                                <th>Categoria</th>
                                <th>Preço (AOA)</th>
                                <th>Duração (semana)</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $select_all_user = $pdo->query("SELECT * FROM course")->fetchAll();
                                foreach($select_all_user as $row){
                                    echo "
                                         <tr>
                                            <td>" .$row['id']."</td>
                                            <td>" .$row['code']."</td>
                                            <td>" .$row['nome']."</td>
                                            <td>" .$row['categoria']. "</td>
                                            <td>" .$row['preco']. "</td>
                                              <td>" .$row['duracao']. "</td>
                                            <td class='statu'>" .$row['status']. "</td>
                                        </tr>
                                    
                                    ";
                                }
                            ?>
                           
                           
                        </tbody>
                    </table>
                </section>
            </div>
        </main>
    </div>


    <!--HIDDEN-->
    <form action="" class="subscribe-course get-info-course" id="subscribe-form">
        <i class="fa fa-times" aria-hidden="true"></i>
        <h1>Formulário cadastro de curso</h1>
        <div class="main-inputs">
            <div class="double-input">
                <div class="input">
                    <input name="name-course" type="text" placeholder="Nome do curso">
                </div>
                <div class="input">
                    <input name="email-course" type="text" placeholder="Preço do curso (AOA)">
                </div>
            </div>
            <div class="double-input">
                <div class="input">
                    <input name="phone-course" type="text" placeholder="Duração do curso (em semanas)">
                </div>
                <div class="input">
                    <input name="img-course" type="file" placeholder="Data">
                </div>
            </div>
            <div class="input-simple">
                <input name="vaga-course" type="text" placeholder="Vagas do curso">
            </div>
            <div class="input">
                <p>Categoria do curso</p>
                <select name="course" id="">
                    <option value="" disabled>-- Seleciona uma categoria --</option>
                    <option value="tecnologia">Tecnologia</option>
                    <option value="gestao">Gestão</option>
                </select>
            </div>
            
            <button disabled class="button-sub">Enviar</button>
    </form>

    <form action="" class="subscribe-course updata-course get-info-course" id="updata-form">
        <i class="fa fa-times" aria-hidden="true"></i>
        <h1>Formulário editar de curso</h1>
        <div class="main-inputs">
            <div class="input-simple">
                <input name="id-course" type="text" placeholder="id (#) ou Código do curso">
            </div>
            <div class="double-input">
                <div class="input">
                    <input name="name-course" type="text" placeholder="Nome do curso">
                </div>
                <div class="input">
                    <input name="email-course" type="text" placeholder="Preço do curso (AOA)">
                </div>
            </div>
            <div class="double-input">
                <div class="input">
                    <input name="phone-course" type="text" placeholder="Duração do curso (em semanas)">
                </div>
                <div class="input">
                    <input name="img-course" type="file" placeholder="Data">
                </div>
            </div>
            <div class="input-simple">
                <input name="vaga-course" type="text" placeholder="Vagas do curso">
            </div>
            <div class="input">
                <p>Categoria do curso</p>
                <select name="course" id="">
                    <option value="" disabled>-- Seleciona uma categoria --</option>
                    <option value="tecnologia">Tecnologia</option>
                    <option value="gestao">Gestão</option>
                </select>
            </div>
            
            <button disabled class="button-sub">Enviar</button>
    </form>

    <script src="../assets/js/alert.js"></script>
    <script src="../assets/js/script-admin.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.4/dist/sweetalert2.all.min.js"></script>
</body>

</html>