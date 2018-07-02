<!-- HEADER DESKTOP-->
<header class="header-desktop3 d-none d-lg-block">
  <div class="section__content section__content--p35">
    <div class="header3-wrap">
      <div class="header__logo">
        <a href="panel.php">
          <img src="images/icon/logo-white.png" alt="" />
        </a>
      </div>
      <div class="header__tool">
        <div class="account-wrap">
          <div class="account-item account-item--style2 clearfix js-item-menu">
            <div class="image">
              <img src="images/icon/avatar-01.jpg" alt="" />
            </div>
            <div class="content">
              <a class="js-acc-btn" href="#"><?php echo $_SESSION['user_name']; ?></a>
            </div>
            <div class="account-dropdown js-dropdown">
              <div class="info clearfix">
                <div class="image">
                  <a href="#">
                    <img src="images/icon/avatar-01.jpg" alt="" />
                  </a>
                </div>
                <div class="content">
                  <h5 class="name">
                    <a href="#"><?php echo $_SESSION['user_name']; ?></a>
                  </h5>
                  <span class="email">INOVA VERTICAL</span>
                </div>
              </div>
              <div class="account-dropdown__footer">
                <a href="logout.php"><i class="zmdi zmdi-power"></i>Sair</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- END HEADER DESKTOP-->

<!-- HEADER MOBILE-->
<header class="header-mobile header-mobile-2 d-block d-lg-none">
  <div class="header-mobile__bar">
    <div class="container-fluid">
      <div class="header-mobile-inner">
        <a class="logo" href="panel.php">
          <img src="images/icon/logo-white.png" alt="" />
        </a>
      </div>
    </div>
  </div>
</header>

<div class="sub-header-mobile-2 d-block d-lg-none">
  <div class="header__tool">
    <div class="account-wrap">
      <div class="account-item account-item--style2 clearfix js-item-menu">
        <div class="image">
            <img src="images/icon/avatar-01.jpg" alt="" />
        </div>
        <div class="content">
            <a class="js-acc-btn" href="#">Marcelo</a>
        </div>
        <div class="account-dropdown js-dropdown">
          <div class="info clearfix">
            <div class="image">
              <a href="#">
                <img src="images/icon/avatar-01.jpg" alt="" />
              </a>
            </div>
            <div class="content">
              <h5 class="name">
                <a href="#"><?php echo $_SESSION['user_name']; ?></a>
              </h5>
              <span class="email">INOVA VERTICAL</span>
            </div>
          </div>
          <div class="account-dropdown__footer">
            <a href="logout.php">
              <i class="zmdi zmdi-power"></i>Sair
            </a>
          </div>  
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END HEADER MOBILE -->