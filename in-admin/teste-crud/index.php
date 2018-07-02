<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/bootstrap.min.js"></script>
    </head>
    
    <body>
        <div class="jumbotron">
        <div class="container">
            <div class="row">
                <h1> CRUD em PHP - Glaucia Lemos</h1>
            </div>
            </br>
            <div class="row">
                <p>
                    <a href="create.php" class="btn btn-success">Adicionar</a>
                </p>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Projeto</th>
                            <th>Descrição</th>
                            <th>Imagens</th>
                            <th>Realizado em</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'banco.php';
                        $pdo = Banco::conectar();
                        $sql = 'SELECT * FROM projeto ORDER BY id DESC';
                        
                        foreach($pdo->query($sql)as $row)
                        {
                            echo '<tr>';
                            echo '<td>'. $row['name'] . '</td>';
                            echo '<td>'. $row['description'] . '</td>';
                            echo '<td>'. $row['images'] . '</td>';
                            echo '<td>'. $row['performance_date'] . '</td>';
                            echo '<td width=250>';
                            echo '<a class="btn btn-primary" href="read.php?id='.$row['id'].'">Listar</a>';
                            echo ' ';
                            echo '<a class="btn btn-warning" href="update.php?id='.$row['id'].'">Atualizar</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Excluir</a>';
                            echo '</td>';
                            echo '<tr>';
                        }
                        Banco::desconectar();
                        ?>
                    </tbody>                   
                </table>               
            </div>
        </div>
        </div>
    </body>
</html>
