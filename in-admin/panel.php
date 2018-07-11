<?php

  include 'banco.php';

  include('header.php');
  include('nav.php');
                            
?>

<!-- PAGE CONTENT-->
<div class="page-content--bgf7">

  <br>

    <?php include('welcome.php'); ?>

    <!-- STATISTIC-->
    <section class="statistic statistic2">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="statistic__item statistic__item--red">
                      <?php
                        $arquivo = fopen ('contador.txt', 'r');
                        $linha = '';
                        while(!feof($arquivo)){
                          $linha = fgets($arquivo, 1024);
                        }
                        fclose($arquivo);
                      ?>
                        <h2 class="number"><?php echo $linha; ?></h2>
                        <span class="desc">Acessos</span>
                        <div class="icon">
                            <i class="zmdi zmdi-calendar-note"></i>
                        </div>
                    </div>
                </div>
                <?php
                  $PDO = db_connect();
                  $sql = "SELECT * FROM projeto";
                  $stmt = $PDO->prepare($sql);
                  $stmt->execute();
                  $proj = $stmt->fetchAll(PDO::FETCH_ASSOC);
                  $projetos = count($proj);
                  if ($projetos > 0) {
                ?>
                <div class="col-md-6 col-lg-4">
                  <div class="statistic__item statistic__item--blue">
                    <h2 class="number"><?php echo $projetos; ?></h2>
                    <span class="desc">Projetos</span>
                    <div class="icon">
                        <i class="zmdi zmdi-money"></i>
                    </div>
                  </div>
                </div>
                <?php } ?>
                <?php
                  $PDO = db_connect();
                  $sql = "SELECT * FROM cliente";
                  $stmt = $PDO->prepare($sql);
                  $stmt->execute();
                  $clt = $stmt->fetchAll(PDO::FETCH_ASSOC);
                  $clientes = count($clt);
                  if ($clientes > 0) {
                ?>
                <div class="col-md-6 col-lg-4">
                  <div class="statistic__item statistic__item--orange">
                    <h2 class="number"><?php echo $clientes; ?></h2>
                    <span class="desc">Clientes</span>
                    <div class="icon">
                        <i class="zmdi zmdi-account-o"></i>
                    </div>
                  </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- END STATISTIC-->

    <!-- DATA TABLE-->
    <section class="p-t-20">
        <div class="container">
            <div class="row">
              <div class="col-md-6">
                  <h3 class="title-5 m-b-35">Projetos</h3>
                  <div class="table-data__tool">
                      <div class="table-data_">
                          <a href="cad-projeto.php" class="au-btn au-btn-icon au-btn--green au-btn--small">
                              <i class="zmdi zmdi-plus"></i>add projeto</a>
                      </div>
                  </div>
                  <div class="table-responsive table-responsive-data2">
                      <table class="table table-data2">
                          <thead>
                              <tr>
                                  <th>Projeto</th>
                                  <th>Realizado em</th>
                                  <th></th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php
                              $pdo = Banco::conectar();
                              $sql = 'SELECT * FROM projeto ORDER BY id DESC';
                              foreach($pdo->query($sql)as $row) {
                                echo '<tr  class="tr-shadow">';
                                echo '<td>'. $row['name'] . '</td>';
                                echo '<td>'. $row['performance_date'] . '</td>';
                                echo '<td>
                                        <div class="table-data-feature">
                                          <a class="item" data-toggle="tooltip" data-placement="top" title="Atualizar" href="upd-projeto.php?id='.$row['id'].'">
                                              <i class="zmdi zmdi-edit"></i>
                                          </a>
                                          <a class="item" data-toggle="tooltip" data-placement="top" title="Excluir" href="del-projeto.php?id='.$row['id'].'">
                                              <i class="zmdi zmdi-delete"></i>
                                          </a>
                                      </div>
                                  </td>';
                                echo '<tr>';
                                echo '<tr class="spacer"></tr>';
                              }
                              Banco::desconectar();
                            ?>
                          </tbody>
                      </table>
                  </div>
              </div>
              <div class="col-md-6">
                  <h3 class="title-5 m-b-35">Clientes</h3>
                  <div class="table-data__tool">
                      <div class="table-data_">
                          <a href="cad-cliente.php" class="au-btn au-btn-icon au-btn--green au-btn--small">
                              <i class="zmdi zmdi-plus"></i>add cliente</a>
                      </div>
                  </div>
                  <div class="table-responsive table-responsive-data2">
                      <table class="table table-data2">
                          <thead>
                              <tr>
                                  <th>Cliente</th>
                                  <th>Logo</th>
                                  <th></th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php
                              $pdo = Banco::conectar();
                              $sql = 'SELECT * FROM cliente ORDER BY id DESC';
                              foreach($pdo->query($sql)as $row) {
                                  echo '<tr  class="tr-shadow">';
                                  echo '<td>'. $row['name'] . '</td>';
                                  echo '<td><img src="images/clientes/'. $row['image'] .'" alt="" style="max-width:140px;"></td>';
                                  echo '<td>
                                          <div class="table-data-feature">
                                            <a class="item" data-toggle="tooltip" data-placement="top" title="Atualizar" href="upd-cliente.php?id='.$row['id'].'">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                            <a class="item" data-toggle="tooltip" data-placement="top" title="Excluir" href="del-cliente.php?id='.$row['id'].'">
                                                <i class="zmdi zmdi-delete"></i>
                                            </a>
                                        </div>
                                        <input type="hidden" name="id" value="'.$row['id'].'"/>
                                    </td>';
                                  echo '<tr>';
                                  echo '<tr class="spacer"></tr>';
                              }
                              Banco::desconectar();
                            ?>
                          </tbody>
                      </table>
                  </div>
              </div>
            </div>
        </div>
    </section>
    <!-- END DATA TABLE-->

    <?php include('copyright.php'); ?>
      
    <a id="btres3" href="#" data-toggle="modal" data-target="#res3" style="display: none">modalexclusao</a>
    <div class="modal fade" id="res3" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document" style="max-width: 320px;">
        <div class="modal-content">
          <div class="modal-header" style="border-radius: .3rem;">
            <h5 class="modal-title" id="smallmodalLabel">Exclusão realizada com sucesso!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>
      </div>
    </div>

</div>


<?php include('scripts-js.php'); ?>

<script>
  window.onload = function(){ 
    var url_string = window.location.href;
    var url = new URL(url_string);
    var res = url.searchParams.get("res");
    if(res == 3) {
      $('#btres3').click();
    }
  }
</script>

<?php include('footer.php'); ?>