<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/bootstrap.min.js"></script>
    </head>
    
    <body>
        <div class="container">
            <div clas="span10 offset1">
                <div class="row">
                    <h3 class="well"> Adicionar Contato </h3>
                    <form class="form-horizontal" action="create.php" method="post" enctype="multipart/form-data">
                        
                        <div class="control-group <?php echo !empty($nomeErro)?'error ' : '';?>">
                            <label class="control-label">Nome</label>
                            <div class="controls">
                                <input size= "50" name="nome" type="text" placeholder="Nome" required="" value="<?php echo !empty($nome)?$nome: '';?>">
                                <?php if(!empty($nomeErro)): ?>
                                    <span class="help-inline"><?php echo $nomeErro;?></span>
                                <?php endif;?>
                            </div>
                        </div>
                        
                        <div class="control-group <?php echo !empty($descricaoErro)?'error ': '';?>">
                            <label class="control-label">Descrição</label>
                            <div class="controls">
                                <input size="80" name="descricao" type="text" placeholder="Descrição" required="" value="<?php echo !empty($descricao)?$descricao: '';?>">
                                <?php if(!empty($descricaoErro)): ?>
                                <span class="help-inline"><?php echo $descricaoErro;?></span>
                                <?php endif;?>
                        </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label">Imagens</label>
                            <div class="controls">
                              <input type="file" name="arquivos[]" multiple>
                            </div>
                        </div>
                        
                        <div class="control-group <?php echo !empty($performanceDateErro)?'error ': '';?>">
                            <label class="control-label">Realizado em</label>
                            <div class="controls">
                                <input size="40" name="realizadoem" type="text" placeholder="Realizado em" required="" value="<?php echo !empty($performanceDate)?$performanceDate: '';?>">
                                <?php if(!empty($performanceDateErro)): ?>
                                <span class="help-inline"><?php echo $performanceDateErro;?></span>
                                <?php endif;?>
                        </div>
                        </div>
                        
                        <div class="form-actions">
                            <br/>
                
                            <button type="submit" class="btn btn-success">Adicionar</button>
                            <a href="index.php" type="btn" class="btn btn-default">Voltar</a>
                        
                        </div>
                    </form>
                </div>
        </div>
    </body>
</html>


<?php
    require 'banco.php';
    
    if(!empty($_POST))
    {

        //Acompanha os erros de validação
        $nomeErro = null;
        $descricaoErro = null;
        $performanceDateErro = null;
        
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $performanceDate = $_POST['realizadoem'];
        
        //Validaçao dos campos:
        $validacao = true;
        if(empty($nome))
        {
            $nomeErro = 'Por favor digite o seu nome!';
            $validacao = false;
        }
        
        if(empty($descricao))
        {
            $descricaoErro = 'Por favor digite a Descrição!';
            $validacao = false;
        }
        
        if(empty($performanceDate))
        {
            $imagesErro = 'Por favor digite o Descrição de performanceDate';
            $validacao = false;
        }
        
        //Inserindo no Banco:
        if($validacao)
        {
          // diretório de destino do arquivo
          define('DEST_DIR', __DIR__ . '/images/projetos/');

          $imagesArray = '';
           
          if (isset($_FILES['arquivos']) && !empty($_FILES['arquivos']['name'])) {
            // se o "name" estiver vazio, é porque nenhum arquivo foi enviado
             
            // cria uma variável para facilitar
            $arquivos = $_FILES['arquivos'];

            // total de arquivos enviados
            $total = count($arquivos['name']);

            for ($i = 0; $i < $total; $i++) {

              // podemos acessar os dados de cada arquivo desta forma:
              // - $arquivos['name'][$i]
              // - $arquivos['tmp_name'][$i]
              // - $arquivos['size'][$i]
              // - $arquivos['error'][$i]
              // - $arquivos['type'][$i]

              // pega a extensão do arquivo
              $ext = explode('.', $arquivos['name'][$i]);
              $ext = end($ext);
           
              // gera o novo nome
              $novoNome = uniqid() . '.' . $ext;

              $imagesArray .= $novoNome;
               
              if (!move_uploaded_file($arquivos['tmp_name'][$i], DEST_DIR . '/' . $novoNome)) {
                echo "Erro ao enviar o arquivo: " . $novoNome;
              }

              $imagesArray .= ',';

            }

            //echo "<br>Arquivos enviados com sucesso";
          }

          $images = $imagesArray;

          $pdo = Banco::conectar();
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sql = "INSERT INTO projeto (name, description, images, performance_date) VALUES(?,?,?,?)";
          $q = $pdo->prepare($sql);
          $q->execute(array($nome,$descricao,$images,$performanceDate));
          Banco::desconectar();
          header("Location: cad-projetos.php?res=1");
        }
    }
?>
