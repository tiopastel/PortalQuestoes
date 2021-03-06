<!DOCTYPE html>
<html>
<head>
    <?php
    session_start();
    require '../db/block.php';
    ?>
    <meta charset="UTF-8" http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portal do Professor</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <section class="header">
            <nav class="navbar navbar-default">
              <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="">
                        <?php echo $nome ?>
                    </a>
                </div>
                <p class="navbar-text"><?php echo "Discipila - " . $_SESSION['descDisciplina']?>                    
                </p>
            </div>
        </nav>
    </section>
    <section class="panel panel-primary ">
        <div class="panel-heading container-fluid">Menu Principal</div>
        <div class="panel-body">
        
                <a class="list-group-item" href="novaQuestao.php">Inserir Nova Questão</a>
                <a class="list-group-item" href="apagaQuestao.php">Apagar Questão</a>
                <a class="list-group-item" href="atualizaQuestao.php">Atualizar Questão</a>
                <a class="list-group-item" href="mostraQuestoes.php">Mostrar todas Questões</a>
                <a class="list-group-item" href="montaProva.php">Montar uma Prova</a>
                <a class="list-group-item" href="lancaFrequencia.php">Lançamento de Frequência</a>
                <a class="list-group-item" href="relatorioFrequencia.php">Relatório de Frequência</a>
                <a class="list-group-item list-group-item-warning"" href="../db/destroySession.php">Sair</a>
            </div>
        </section>
    </div>
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
