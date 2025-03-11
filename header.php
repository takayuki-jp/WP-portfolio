<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title><?php echo blog('name'); ?></title>
  <meta name="description" content="<?php echo bloginfo('description'); ?>">
  <link rel="icon" href="<?php echo esc_url(get_theme_file_uri('img/favicon.ico')); ?>">
</head>


<body>
  <header id="js_header" class="header">
    <div class="header__inner">
      <div class="header__siteLogo">
        <a href="#" class="header__siteLink">
          <img src="../img/logo.png" alt="WEBデザイナーたかゆきのポートフォリオサイトのロゴ">
        </a>
      </div>
      <nav class="header__menu">
        <div class="header__menuL">
          <ul class="header__menuL-list">
            <li class="header__menuL-listItem">
              <a href="./archive--works.html" class="header__menuLink header__menuLink--arrowR"><span>works</span></a>
            </li>
            <li class="header__menuL-listItem">
              <a href="./service.html" class="header__menuLink header__menuLink--arrowR"><span>service</span></a>
            </li>
            <li class="header__menuL-listItem">
              <a href="#js_topAbout" class="header__menuLink header__menuLink--arrowB"><span>about</span></a>
            </li>
          </ul>
        </div>
        <div class="header__menuR">
          <button>
            <a class="header__menuLink header__menuLink--contact header__menuLink--arrowR" href="./contact.html">contact</a>
          </button>
        </div>
      </nav>
      <button id="js_spMenuBtn" class="header__sp-menuBtn">
        <span class="header__sp-menuBar"></span>
        <span class="header__sp-menuBar"></span>
      </button>
    </div>

    <nav class="sp-menu">
      <div class="sp-menu__inner">
        <ul class="sp-menu__list">
          <li class="sp-menu__listItem">
            <a class="sp-menu__link" href="./archive--works.html">works</a>
          </li>
          <li class="sp-menu__listItem">
            <a class="sp-menu__link" href="./service.html">service</a>
          </li>
          <li class="sp-menu__listItem">
            <a class="sp-menu__link sp-menu__link--contact" href="./contact.html">contact</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>