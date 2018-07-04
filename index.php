<?php 
  //include('in-admin/contador-visitas.php');
  include 'in-admin/banco.php';
  require 'in-admin/init.php';

  $PDO = db_connect();

  $sql = "SELECT * FROM cliente";
  $stmt = $PDO->prepare($sql);
  $stmt->execute();
  $cli = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $clientes = count($cli);

  $sql = "SELECT * FROM projeto";
  $stmt = $PDO->prepare($sql);
  $stmt->execute();
  $proj = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $projetos = count($proj);

?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Igor dos Santos - Front End Developer">
    <meta name="keywords" content="Inova Vertical, Alpinismo Industrial, Lavagem e Pintura, Instalação, Jateamento, Elétrica, Letreiros, Fixaçoes, Eventos, Serviços de Manutenção, Corporativo, Residencial, Projetos especiais"/>
    <meta name="description" content="Site oficial da Inova Vertical. Dê uma olhada nos projetos e serviços realizados e conheça um pouco mais sobre nós."/>
    <title>Inova Vertical - Alpinismo Industrial</title>
    <link rel="shortcut icon" href="images/favicon.png">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/photoswipe.css">
    <link rel="stylesheet" href="assets/css/default-skin/default-skin.css"> 
    <link rel="stylesheet" href="assets/css/main.css">
  </head>
  <body>

    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
      <button class="navbar-toggler float-right" type="button" data-toggle="collapse" data-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="clearfix"></div>
      <div class="collapse navbar-collapse" id="menu">
        <ul class="navbar-nav text-right">
          <li class="nav-item">
            <a class="nav-link acr" href="#sct-1">SOBRE NÓS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link acr" href="#sct-2">CERTIFICAÇÃO</a>
          </li>
          <li class="nav-item">
            <a class="nav-link acr" href="#sct-3">ONDE ATUAMOS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link acr" href="#sct-4">O QUE FAZEMOS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link acr" href="#sct-5">CLIENTES ATENDIDOS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link acr" href="#sct-6">PROJETOS E SERVIÇOS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link acr" href="#contato">CONTATO</a>
          </li>
        </ul>
      </div>
    </nav>

  	<header class="d-flex">
  		<div class="container align-self-center text-center">
  			<div class="logo-icon logo-animation">
          <img src="images/logo-icon.png" class="img-fluid img-fluid-custom" alt="">
        </div>
        <div class="logo-text logo-animation">
          <img src="images/logo-text.png" class="img-fluid" alt="">
        </div>
        <span class="d-none">https://codepen.io/nxworld/pen/OyRrGy</span>
  		</div>
  	</header>

    <section class="section-container background-white d-flex" id="sct-1">
      <div class="container align-self-center">
      	<div class="row">
      		<div class="col-12 col-lg-8 offset-lg-2">
    				<div class="line-vertical-top">
    					<hr><hr>
    				</div>
		        <h1 class="text-center">SOBRE NÓS</h1>
		        <p class="text-justify">
		        	Somos uma empresa que nasceu para oferecer excelência em todas as fases de um projeto em altura. Inovando nas soluções e superando as expectativas. Para nós, um ótimo atendimento é mais que um sorriso simpático. Vai muito além. Está no esforço de entender as necessidades de cada cliente e dar o máximo para entregar um trabalho exemplar. Dentro dos mais elevados níveis de qualidade, rapidez e segurança.
		        </p>
		        <div class="line-vertical-bottom">
    					<hr><hr>
    				</div>
	        </div>
        </div>
      </div>
    </section>
    
  	<section class="section-container background-gray d-flex" id="sct-2">
  		<div class="container align-self-center text-center">
  			<div class="row">
      		<div class="col-12 col-lg-10 offset-lg-1">
		  			<h1>CERTIFICAÇÃO</h1>
		  			<p>
		  				Nossas equipes são altamente capacitadas para atender qualquer tipo de demanda. Cada membro possui certificações referenciais, e busca atualizações constantes, além das exigidas pela legislação.
		  			</p>
		  		</div>
	  		</div>
	  		<div class="row">
      		<div class="col-12 col-lg-10 offset-lg-1">
			  		<div class="row">
		      		<div class="col-12 col-lg-4 mg-top">
				  			<h2>SEGURANÇA</h2>
				  			<p>
				  				Proteger as pessoas envolvidas em cada projeto, assim como as edificações e estruturas trabalhadas.
				  			</p>
				  		</div>
		      		<div class="col-12 col-lg-4 mg-top">
				  			<h2>TÉCNICA</h2>
				  			<p>
				  				Estar em dia com as<br> inovações técnicas e<br> metodológicas<br> utilizadas.
				  			</p>
				  		</div>
		      		<div class="col-12 col-lg-4 mg-top">
				  			<h2>RESPEITO</h2>
				  			<p>
				  				Agir com compromisso, seriedade e profissionalismo junto a equipe, clientes e fornecedores.
				  			</p>
				  		</div>
			  		</div>
					</div>
  			</div>
  		</div>
  	</section>
    
  	<section class="section-container background-white d-flex" id="sct-3">
  		<div class="container align-self-center">
  			<div class="row">
      		<div class="col-12 col-lg-10 offset-lg-1">
      			<h1 class="text-center">ONDE ATUAMOS</h1>
      			<div class="row">
		      		<div class="col-12 col-md-4 mg-top">
								<img src="images/onde-at-1.jpg" alt="" class="img-fluid">
				  			<span class="text-center font-gotham-book">CORPORATIVO</span>
				  		</div>
		      		<div class="col-12 col-md-4 mg-top">
								<img src="images/onde-at-2.jpg" alt="" class="img-fluid">
				  			<span class="text-center font-gotham-book">RESIDENCIAL</span>
				  		</div>
		      		<div class="col-12 col-md-4 mg-top">
								<img src="images/onde-at-3.jpg" alt="" class="img-fluid">
				  			<span class="text-center font-gotham-book">PROJETOS ESPECIAIS</span>
				  		</div>
			  		</div>
  				</div>
  			</div>
  		</div>
  	</section>

  	<section class="section-container section-dark background-gray d-flex" id="sct-4">
  		<div class="container align-self-center">
  			<div class="row">
      		<div class="col-12 col-lg-10 offset-lg-1">
  					<div class="row">
		      		<div class="col-12 col-lg-7">
								<h1>O QUE FAZEMOS</h1>
								<p>
									Trabalhamos em altura por cordas ou plataforma.<br> Elaboramos o planejamento operacional.<br>
									<b>FOCO: Serviços de Manutenção</b>
								</p>
								<ul>
									<li>Lavagem e Pintura</li>
									<li>Instalação</li>
									<li>Jateamento</li>
									<li>Elétrica</li>
									<li>Letreiros</li>
									<li>Fixaçoes</li>
									<li>Eventos</li>
								</ul>
				  		</div>
		      		<div class="col-12 col-lg-5"></div>
			  		</div>
  				</div>
  			</div>
  		</div>
  	</section>

  	<section class="section-container background-white d-flex" id="sct-5">
  		<div class="container align-self-center">
  			<div class="row">
      		<div class="col-12 col-lg-10 offset-lg-1">
      			<h1 class="text-center">CLIENTES ATENDIDOS</h1>
            <?php if ($clientes > 0) { ?>
            <div class="owl-carousel owl-theme" id="clientes">
              <?php
                $pdo = Banco::conectar();
                $sql = 'SELECT * FROM cliente ORDER BY id DESC';
                foreach($pdo->query($sql)as $row)
                {
                  echo '<div class="item">';
                  echo '<img src="in-admin/images/clientes/'. $row['image'] .'" alt="'. $row['name'] .'">';
                  echo '</div>';
                }
                Banco::desconectar();
              ?>
            </div>
            <?php } else { ?>
              <p class="text-danger text-center">Nenhum cliente cadastrado.</p>
            <?php } ?>
	  			</div>
	  		</div>
  		</div>
  	</section>

  	<section class="section-container background-gray" id="sct-6">
      <div class="pjt-1 clearfix">
        <div class="text-circle d-flex">
          <div class="align-self-center text-center">
            <h1>Projetos <small class="d-block">e Serviços</small></h1>
            <?php if ($projetos > 0) { ?>
            <a href="#pjt2" class="bt-veja-mais transition-all-400-ms acr" title="Clique aqui">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 485 485" xml:space="preserve"><polygon points="485,227.5 257.5,227.5 257.5,0 227.5,0 227.5,227.5 0,227.5 0,257.5 227.5,257.5 227.5,485 257.5,485 257.5,257.5 485,257.5 " fill="#FFFFFF"/><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
            </a>
            <span href="#pjt2" class="acr"></span>
            <?php } ?>
          </div>
        </div>
  			<div class="item-pjt it-pjt-1">
          <img src="images/img-1-projetos-servicos.jpg">
        </div>
        <div class="item-pjt it-pjt-2">
          <img src="images/img-2-projetos-servicos.jpg" class="mg-bottom">
          <img src="images/img-3-projetos-servicos.jpg">
        </div>
      </div>
      <?php if ($projetos > 0) { ?>
      <span id="pjt2"></span>
      <div class="pjt-2">
        <div class="container">
          <div class="row">
            <div class="col-12 col-lg-10 offset-lg-1">
              <?php
                $pdo = Banco::conectar();
                $sql = 'SELECT * FROM projeto ORDER BY id DESC';
                foreach($pdo->query($sql)as $row)
                {
                  echo '<div class="pjt-serv">';
                    echo '<h2>'. $row['name'] .'</h2>';
                    echo '<p>'. $row['description'] .'<p>';
                    echo '<p><b>'. $row['performance_date'] .'</b><p>';
                    echo '<div class="my-gallery">';
                      $images = explode(",", $row['images']);
                      foreach($images as $img) {
                        list($width, $height) = getimagesize("in-admin/images/projetos/".$img);
                        echo '<figure>';
                          echo '<a href="in-admin/images/projetos/'. $img .'" data-size="'. $width .'x'. $height .'">';
                            echo '<img src="in-admin/images/projetos/'. $img .'" alt="" />';
                          echo '</a>';
                        echo '</figure>';
                      }
                    echo '</div>';
                  echo '</div>';
                }
                Banco::desconectar();
              ?>   
              <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="pswp__bg"></div>
                <div class="pswp__scroll-wrap">
                  <div class="pswp__container">
                    <div class="pswp__item"></div>
                    <div class="pswp__item"></div>
                    <div class="pswp__item"></div>
                  </div>
                  <div class="pswp__ui pswp__ui--hidden">
                    <div class="pswp__top-bar">
                      <div class="pswp__counter"></div>
                      <button class="pswp__button pswp__button--close" title="Fechar (Esc)"></button>
                      <button class="pswp__button pswp__button--fs" title="Alternar para o modo tela cheia"></button>
                      <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                      <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                          <div class="pswp__preloader__cut">
                            <div class="pswp__preloader__donut"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                      <div class="pswp__share-tooltip"></div> 
                    </div>
                    <button class="pswp__button pswp__button--arrow--left" title="Anterior (seta para a esquerda)">
                    </button>
                    <button class="pswp__button pswp__button--arrow--right" title="Próximo (seta para a direita)">
                    </button>
                    <div class="pswp__caption">
                      <div class="pswp__caption__center"></div>
                    </div>
                  </div>
                </div>
              </div>
              <?php if ($projetos > 1) { ?>
              <div class="text-center">
                <a href="#" class="bt-carregar-mais transition-all-400-ms">Mais Projetos e Serviços</a>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
  	</section>

  	<section class="section-container background-white d-flex" id="sct-7">
      <div class="container align-self-center">
      	<div class="row">
      		<div class="col-12 col-lg-10 offset-lg-1">
    				<div class="line-vertical-top">
    					<hr><hr>
    				</div>
		        <h1 class="text-center">"A ÚNICA MANEIRA DE FAZER UM EXCELENTE TRABALHO É AMAR O QUE VOCÊ FAZ."</h1>
		        <p class="text-center">
		        	Steve Jobs
		        </p>
		        <div class="line-vertical-bottom">
    					<hr><hr>
    				</div>
	        </div>
        </div>
      </div>
    </section>

  	<footer class="d-flex" id="contato">
  		<div class="container align-self-center">
        <div class="row">
          <div class="col-12 col-lg-10 offset-lg-1">
          	<div class="line-vertical-top">
    					<hr><hr>
    				</div>
            <h1 class="text-center">CONTATO</h1>
            <p>
              Levaremos sua satisfação às alturas. Solicite um orçamento!
            </p><br>
            <p>
              +55 11 4168-8979<br>
              <a href="mailto:inovavertical@inovavertical.com.br" target="_blank" style="color:#fff">
                inovavertical@inovavertical.com.br</a>
            </p><br>
            <p class="copy">2018 © INOVA VERTICAL. Todos os direitos reservados.</p>
          </div>
        </div>
      </div>
  	</footer>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/photoswipe.min.js"></script>
    <script src="assets/js/photoswipe-ui-default.min.js"></script>
    <script src="assets/js/main.js"></script>

  </body>
</html>