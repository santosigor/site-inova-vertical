<?php
  include('header.php');
  include('nav.php');

  include 'banco.php';
  $pdo = Banco::conectar();
  $sql = 'SELECT * FROM projeto ORDER BY id DESC';
  $sql2 = 'SELECT * FROM cliente ORDER BY id DESC';
                            
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
                      <?php/*
                        // Pega o total de visitas únicas de hoje
                        $total = pegaVisitas();
                        // Pega o total de visitas únicas desde o começo do mês
                        $total = pegaVisitas('uniques', 'mes');
                        // Pega o total de visitas únicas desde o começo do ano
                        $total = pegaVisitas('uniques', 'ano');
                        // Pega o total de pageviews de hoje
                        $total = pegaVisitas('pageviews');
                        // Pega o total de pageviews desde o começo do mês
                        $total = pegaVisitas('pageviews', 'mes');
                        // Pega o total de pageviews desde o começo do ano
                        $total = pegaVisitas('pageviews', 'ano');*/
                      ?>
                        <h2 class="number">100</h2>
                        <span class="desc">Acessos</span>
                        <div class="icon">
                            <i class="zmdi zmdi-calendar-note"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="statistic__item statistic__item--blue">
                        <h2 class="number">20</h2>
                        <span class="desc">Projetos</span>
                        <div class="icon">
                            <i class="zmdi zmdi-money"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="statistic__item statistic__item--orange">
                        <h2 class="number">10</h2>
                        <span class="desc">Clientes</span>
                        <div class="icon">
                            <i class="zmdi zmdi-account-o"></i>
                        </div>
                    </div>
                </div>
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
                          <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                              <i class="zmdi zmdi-plus"></i>add projeto</button>
                      </div>
                  </div>
                  <div class="table-responsive table-responsive-data2">
                      <table class="table table-data2">
                          <thead>
                              <tr>
                                  <th>Projeto</th>
                                  <th>Descrição</th>
                                  <th>Realizado em</th>
                                  <th></th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php
                            foreach($pdo->query($sql)as $row)
                            {
                                echo '<tr  class="tr-shadow">';
                                echo '<td>'. $row['name'] . '</td>';
                                echo '<td>'. $row['description'] . '</td>';
                                echo '<td>'. $row['performance_date'] . '</td>';
                                echo '<td>
                                        <div class="table-data-feature">
                                          <a class="item" data-toggle="tooltip" data-placement="top" title="Atualizar" href="update.php?id='.$row['id'].'">
                                              <i class="zmdi zmdi-edit"></i>
                                          </a>
                                          <a class="item" data-toggle="tooltip" data-placement="top" title="Excluir" href="delete.php?id='.$row['id'].'">
                                              <i class="zmdi zmdi-delete"></i>
                                          </a>
                                      </div>
                                  </td>';
                                echo '<tr>';
                                echo '<tr class="spacer"></tr>';
                            }
                            ?>
                          </tbody>
                      </table>
                  </div>
              </div>
              <div class="col-md-6">
                  <h3 class="title-5 m-b-35">Clientes</h3>
                  <div class="table-data__tool">
                      <div class="table-data_">
                          <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                              <i class="zmdi zmdi-plus"></i>add cliente</button>
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
                            foreach($pdo->query($sql2)as $row2)
                            {
                                echo '<tr  class="tr-shadow">';
                                echo '<td>'. $row2['name'] . '</td>';
                                echo '<td>'. $row2['image'] . '</td>';
                                echo '<td>
                                        <div class="table-data-feature">
                                          <a class="item" data-toggle="tooltip" data-placement="top" title="Atualizar" href="update.php?id='.$row2['id'].'">
                                              <i class="zmdi zmdi-edit"></i>
                                          </a>
                                          <a class="item" data-toggle="tooltip" data-placement="top" title="Excluir" href="delete.php?id='.$row2['id'].'">
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
            </div>
        </div>
    </section>
    <!-- END DATA TABLE-->

    <?php include('copyright.php'); ?>

</div>

<?php include('footer.php'); ?>