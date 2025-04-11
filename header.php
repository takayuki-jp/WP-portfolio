<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="<?php echo esc_url(get_theme_file_uri('img/favicon.ico')); ?>">
  <?php wp_head(); ?>
</head>

<body>
  <header id="js_header" class="header">
    <div class="header__inner">
      <div class="header__siteLogo">
        <a class="header__siteLink" href="<?php echo esc_url(home_url()) ?>">
          <img src="<?php echo esc_url(get_theme_file_uri('img/logo.webp')); ?>" alt="WEBデザイナーたかゆきのポートフォリオサイトのロゴ">
        </a>
      </div>
      <nav class="header__menu">
        <div class="header__menuL">
          <ul class="header__menuL-list">
            <li class="header__menuL-listItem">
              <a class="header__menuLink header__menuLink--arrowR" href="<?php echo esc_url(home_url('/archive/')); ?>"><span>works</span></a>
            </li>
            <li class="header__menuL-listItem">
              <a class="header__menuLink header__menuLink--arrowR" href="<?php echo esc_url(home_url('/service/')); ?>"><span>service</span></a>
            </li>
            <li class="header__menuL-listItem">
              <a class="header__menuLink header__menuLink--arrowB" href="<?php
                if (is_front_page()) {
                  echo esc_url('#js_topAbout');
                } else {
                  echo esc_url(home_url('/#js_topAbout'));
                }
              ?>">
                <span>about</span></a>
            </li>
          </ul>
        </div>
        <div class="header__menuR">
          <button>
            <a class="header__menuLink header__menuLink--contact header__menuLink--arrowR" href="<?php echo esc_url(home_url('/contact/')); ?>">contact</a>
          </button>
        </div>
      </nav>
      <button id="js_spMenuBtn" class="header__sp-menuBtn">
        <span class="header__sp-menuBar"></span>
        <span class="header__sp-menuBar"></span>
      </button>
    </div>

    <!-- スマホメニュー -->
    <nav class="sp-menu">
      <div class="sp-menu__inner">
        <ul class="sp-menu__list">
          <li class="sp-menu__listItem">
            <a class="sp-menu__link" href="<?php echo esc_url(home_url('/archive/')); ?>">works</a>
          </li>
          <li class="sp-menu__listItem">
            <a class="sp-menu__link" href="<?php echo esc_url(home_url('/service/')); ?>">service</a>
          </li>
          <li class="sp-menu__listItem">
            <a class="sp-menu__link sp-menu__link--contact" href="<?php echo esc_url(home_url('/contact/')); ?>">contact</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>