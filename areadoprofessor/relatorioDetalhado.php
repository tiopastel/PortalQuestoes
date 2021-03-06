<html>
<head>
    <?php
    session_start();
    require '../db/block.php';
    ?>
    <meta charset="UTF-8" http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
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
    <section class="panel panel-primary">
        <div class="panel-heading container-fluid">Relatório de Frequência</div>
        <div class="panel-body">
            <form>
                <div class="form-group"> 
                    <?php  include_once '../db/detalharFrequencia.php' ?>
                </div>
                <div class="form-group">                    
                    <a class="btn btn-default " role="button" href="relatorioFrequencia.php">Voltar</a>
                </div>
            </form>
        </div>
    </section>

    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
