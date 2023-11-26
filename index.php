<?php
include("config-sessao.php");

//função para exibição do login/btnEntrar
function exibirConteudoLogin()
{
    if (isset($_SESSION["nome"]) && !empty($_SESSION["nome"])) {
        // Usuário está logado
        print "<div class='logado-nome'>
        <span>Olá, " . $_SESSION["nome"] . " 
        <form id='logoutForm' method='post' action='logout.php'>
            <input type='submit' name='cadastrar' value='Sair' onsubmit='submitLogoutForm()'>
        </form>
        
        </span>
      </div>";
    } else {
        // Usuário não está logado
        print "<div class='login-button'>
                <button><a href='tela-login.php'>Entrar</a></button>
            </div>";
    }
}

function exibirConteudoLogin2()
{
    if (isset($_SESSION["nome"]) && !empty($_SESSION["nome"])) {
        // Usuário está logado
        print "<div class='logado-nome2'>
        <span>Olá, " . $_SESSION["nome"] . " 
        <form id='logoutForm' method='post' action='logout.php'>
            <input type='submit' name='cadastrar' value='Sair' onsubmit='submitLogoutForm()'>
        </form>
        
        </span>
      </div>";
    } else {
        // Usuário não está logado
        print "<div class='login-button'>
                <button><a href='tela-login.php'>Entrar</a></button>
            </div>";
    }
}

//função para exibição das páginas baseada no tipo de usuário
function exibirConteudoPages()
{
    if (isset($_SESSION["id_tipo"]) && ($_SESSION["id_tipo"] == 1) || !isset($_SESSION["id_tipo"])) {
        print "<li class='nav-item'><a href='?page=onwerPlano' class='nav-link'>Meu Plano</a></li>";
    } else if (isset($_SESSION["id_tipo"]) && ($_SESSION["id_tipo"] == 2)) {
        print "<li class='nav-item'><a href='?page=consulta' class='nav-link'>Consulta de Usuário</a></li>";
    }

}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title>Projeto Back-end</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/tabela.css">
    <link rel="icon" href="imagens/logo.png">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>

    <!--AQUI COMEÇA O MEU MENU-->
    <header>
        <nav class="nav-bar">
            <div class="logo">
                <img src="imagens/logo.png">
            </div>
            <div class="nav-list">
                <ul>
                    <li class="nav-item"><a href="index.php" class="nav-link">Início</a></li>
                    <li class="nav-item"><a href="?page=modelo" class="nav-link">Modelo BD</a></li>
                    <?php exibirConteudoPages(); ?>
                </ul>
            </div>
            <?php exibirConteudoLogin(); ?>

            <div class="mobile-menu-icon">
                <button onclick="menuShow()"><i class="icon bi-list"></i></button>
            </div>
        </nav>
        <div class="mobile-menu">
            <ul>
                <li class="nav-item"><a href="index.php" class="nav-link">Início</a></li>
                <li class="nav-item"><a href="?page=modelo" class="nav-link">Modelo BD</a></li>
                <?php exibirConteudoPages(); ?>
                <?php exibirConteudoLogin2(); ?>
            </ul>


        </div>
    </header>

    <?php
    //incluindo a conexão com o banco
    
    // verificação das requições do menu
    switch (@$_REQUEST['page']) {
        case 'modelo':
            include('tela-modeloBD.php');
            break;
        case 'consulta':
            include('tela-usuario.php');
            break;
        case 'onwerPlano':
            if (!isset($_SESSION["id_tipo"])) {
                header("Location: tela-login.php");
                exit();
            } else {
                include('tela-usuario-comum.php');
            }
            break;
        default:
            include('index.html');
    }
    // fim da verificação
    ?>
    <main></main>

    <!--AQUI COMEÇA O MEU RODAPÉ-->
    <footer class="site-footer">
        <div id="footer_content">
            <div id="footer_contacts">
                <img src="imagens/logo.png" alt="Logo">
                <p>Tudo sobre conexões!</p>

                <div id="footer_social_media">
                    <a href="https://www.instagram.com/" target="_blank" class="footer-link" id="instagram">
                        <i class="bi-instagram"></i>
                    </a>

                    <a href="https://www.facebook.com/" target="_blank" class="footer-link" id="facebook">
                        <i class="bi-facebook"></i>
                    </a>

                    <a href="https://web.whatsapp.com/" target="_blank" class="footer-link" id="whatsapp">
                        <i class="bi-whatsapp"></i>
                    </a>
                </div>
            </div>


            <ul class="footer-list">
                <li><a href="index.php" class="footer-link">Início</a></li>
                <li><a href="?page=modelo" class="footer-link">Modelo BD</a></li>
                </li>
            </ul>



        </div>

        <div id="footer_copyright">
            Todos os direitos reservados
            &#169
            2023

        </div>
    </footer>
    <!--AQUI TERMINA O MEU RODAPÉ-->

    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="javascript/script.js"></script>
    <script>
        function submitLogoutForm() {
            document.getElementById('logoutForm').submit();
        }
    </script>
    <?php
    // Verifica se o usuário está logado antes de incluir o script JavaScript
    if (isset($_SESSION["nome"]) && !empty($_SESSION["nome"])) {
        ?>
        <script>

            var inatividadeTimeout;

            function realizarLogout() {
                alert("Você ficou mais do que 5 minutos em inatividade e será deslogado")
                document.getElementById('logoutForm').submit();
            }

            function configurarTemporizadorInatividade() {
                inatividadeTimeout = setTimeout(realizarLogout, <?php echo $tempo_expiracao * 1000; ?>);
            }

            // Reinicia o temporizador quando há atividade na página
            function reiniciarTemporizadorInatividade() {
                clearTimeout(inatividadeTimeout);
                configurarTemporizadorInatividade();
            }

            // Configura eventos para reiniciar o temporizador em diferentes interações do usuário
            document.addEventListener('mousemove', reiniciarTemporizadorInatividade);
            document.addEventListener('keypress', reiniciarTemporizadorInatividade);
            document.addEventListener('scroll', reiniciarTemporizadorInatividade);
            document.addEventListener('click', reiniciarTemporizadorInatividade);

            configurarTemporizadorInatividade();
        </script>
        <?php
    }
    ?>
</body>

</html>