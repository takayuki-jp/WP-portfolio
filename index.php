<?php get_header(); ?>

<main>
  <div class="mainVisual">
    <div class="mainVisual__inner c-sectionPadding">
      <div class="mainVisual__siteTitleWrap">
        <h1 class="mainVisual__siteTitle">
          <span>WEBデザイナー　たかゆき</span>
          ポートフォリオサイト
        </h1>
        <p class="mainVisual__siteSubTitle">WEBデザインで、あなたの想いをかたちに。</p>
      </div>

      <div id="js_pageLink" class="mainVisual__pageLink pageLink">
        <ul class="pageLink__list">
          <li class="pageLink__listItem">
            <a href="#js_topWorks" class="pageLink__link">works</a>
          </li>
          <li class="pageLink__listItem">
            <a href="#js_topService" class="pageLink__link">service</a>
          </li>
          <li class="pageLink__listItem">
            <a href="#js_topAbout" class="pageLink__link">about</a>
          </li>
          <li class="pageLink__listItem">
            <a href="#js_topContact" class="pageLink__link">contact</a>
          </li>
        </ul>
      </div>
    </div>

    <img class="mainVisual__image mainVisual__image--PC" src="<?php echo esc_url(get_theme_file_uri('img/mv-pc.webp')); ?>" alt="PC画像">
    <img class="mainVisual__image mainVisual__image--desk" src="<?php echo esc_url(get_theme_file_uri('img/mv-desk.webp')); ?>" alt="デスク画像">
    <img class="mainVisual__image mainVisual__image--light" src="<?php echo esc_url(get_theme_file_uri('img/mv-light.webp')) ?>" alt="電球の画像">
  </div><!-- mainVisual -->


  <section id="js_topWorks" class="top-works">
    <div class="top-works__inner c-sectionPadding">
      <div class="c-sectionTitleWrap">
        <h2 class="top-works__title c-sectionTitle"><span>W</span>orks</h2>
        <p class="top-works__subTitle c-sectionSubTitle">制作作品の紹介</p>
      </div>

      <!-- splide area -->
      <div class="splide top-works__slide animeTarget fadeIn" role="group" aria-label="Splideの基本的なHTML">
        <div class="splide__track">
          <ul class="splide__list">

            <?php
              $args = array(
                'posts_per_page' => 5,
                'orderby' => 'rand',
                'order' => 'DESC'
              );
              $posts = get_posts($args);

              if (empty($posts)) {
                echo '<p>投稿が見つかりません。</p>';
            }
            ?>

            <?php foreach($posts as $post) : setup_postdata($post); ?>

              <li class="splide__slide top-works__cardItem c-worksCard">
                <a class="c-worksCard__link" href="<?php the_permalink(); ?>">
                  <div class="c-worksCard__image">
                    <?php the_post_thumbnail(); ?>
                  </div>
                  <div class="c-worksCard__titleWrap">
                    <?php if (get_field('client')) : ?>
                      <p class="c-worksCard__client"><?php the_field('client'); ?><span>様</span></p>
                    <?php endif; ?>
                    <p class="c-worksCard__title"><?php the_title(); ?></p>
                  </div>
                  <div class="c-worksCard__category c-categoryTag c-categoryTag--<?php
                    $categories = get_the_category();
                    $category_slug = !empty($categories) ? esc_attr($categories[0]->slug) : '';
                    $category_name = !empty($categories) ? esc_html($categories[0]->name) : '';
                    echo $category_slug;
                    ?>">
                    <span><?php echo $category_name; ?></span>
                  </div>
                </a>
              </li>
            <?php endforeach; wp_reset_postdata(); ?>
          </ul>
        </div>
        <div class="splide__arrows">
          <button class="splide__arrow splide__arrow--prev button prev"><i class="fa-solid fa-circle-chevron-left"></i></button>
          <button class="splide__arrow splide__arrow--next button next"><i class="fa-solid fa-circle-chevron-right"></i></button>
        </div>
      </div>

      <div class="top-works__btnWrap c-btnWrap">
        <a class="top-works__btnLink c-btn" href="<?php echo esc_url(home_url('/archive/')); ?>">more</a>
      </div>
    </div><!--top-works__inner-->
  </section><!--top-works-->

  <section id="js_topService" class="top-service">
    <div class="top-service__inner c-sectionPadding">
      <div class="c-sectionTitleWrap">
        <h2 class="top-service__title c-sectionTitle"><span>S</span>ervice</h2>
        <p class="top-service__subTitle c-sectionSubTitle">提供できるサービス</p>
      </div>

      <div class="top-service__itemWrap">
        <ul class="top-service__list">
          <li class="top-service__listItem animeTarget slideInLtoR">
            <div class="top-service__itemImage">
              <img src="<?php echo esc_url(get_theme_file_uri('img/service-pc.webp')) ?>" alt="PCのイラスト">
            </div>
            <div class="top-service__textArea">
              <h3 class="top-service__itemTitle">WEBサイト制作</h3>
              <p class="top-service__itemDesc">
                デザインからコーディングまでを一貫して担当することができます。<br>
                見やすい、わかりやすい、管理しやすいサイト作りを大切にしています。<br>
                Wordpressのカスタムテーマ作成も対応可。<br>
                デザインのみ、コーディングのみのお仕事も承ります。
              </p>
            </div>
          </li>
          <li class="top-service__listItem animeTarget slideInRtoL">
            <div class="top-service__itemImage">
              <img src="<?php echo esc_url(get_theme_file_uri('img/service-sp.webp')) ?>" alt="スマートフォンのイラスト">
            </div>
            <div class="top-service__textArea">
              <h3 class="top-service__itemTitle">LP制作</h3>
              <p class="top-service__itemDesc">
                集客、販売、商品認知のきっかけとなるランディングページの作成を承ります。<br>
                キャッチーなヘッダーをはじめ、興味を持たせ、メリットを提供し、購入や会員登録に繋がるような、アクションに重きをおいたページ制作を大切にしています。<br>
                スマホサイズはもちろん、PCサイズにも適応したレスポンシブなサイトページ制作が可能です。
              </p>
            </div>
          </li>
          <li class="top-service__listItem animeTarget slideInLtoR">
            <div class="top-service__itemImage">
              <img src="<?php echo esc_url(get_theme_file_uri('img/service-brush.webp'))?>" alt="ブラシのイラスト">
            </div>
            <div class="top-service__textArea">
              <h3 class="top-service__itemTitle">バナー画像制作</h3>
              <p class="top-service__itemDesc">
                広告バナーや、WEBサイトのパーツ、ECサイトの商品画像などの画像コンテンツを承ります。<br>
                パッと見につくようなデザイン、各案件に適したイメージに沿ったデザインで商品やサイトの魅力を引き上げます。
              </p>
            </div>
          </li>
        </ul>
      </div>
      <div class="top-service__usedTool animeTarget fadeIn">
        <p class="top-service__usedToolTitle">主な使用ツール</p>
        <ul class="top-service__toolList">
          <li class="top-service__toolListItem c-toolTag c-toolTag--code">VSCode</li>
          <li class="top-service__toolListItem c-toolTag c-toolTag--code">WordPress</li>
          <li class="top-service__toolListItem c-toolTag c-toolTag--code">Local</li>
          <li class="top-service__toolListItem c-toolTag c-toolTag--design">Fimga</li>
          <li class="top-service__toolListItem c-toolTag c-toolTag--design">photoshop</li>
        </ul>
      </div>

      <div class="top-service__btnWrap c-btnWrap">
        <a class="top-service__btnLink c-btn" href="<?php echo esc_url(home_url('/service/')); ?>">more</a>
      </div>
    </div>
  </section>

  <section id="js_topAbout" class="top-about">
    <div class="top-about__inner  c-sectionPadding">
      <div class="c-sectionTitleWrap">
        <h2 class="top-about__title c-sectionTitle"><span>A</span>bout</h2>
        <p class="top-about__subTitle c-sectionSubTitle">自己紹介</p>
      </div>
      <div class="top-about__contentWrap">
        <div class="top-about__image animeTarget slideInLtoR">
          <img src="<?php echo esc_url(get_theme_file_uri('img/my-image.webp')) ?>" alt="わたしのアイコンの画像">
        </div>
        <div class="top-about__commentWrap animeTarget slideInRtoL">
          <p class="top-about__comment">
            はじめまして。ポートフォリオサイトへお越しいただきありがとうございます。<br>
            WEBデザイナーのたかゆきと申します。京都、札幌と転勤を経て、現在は東京に在住しています。<br><br>
            こちらのWEBサイトでは過去の実績を紹介しております。<br>
            案件依頼の参考になれば幸いです。<br>
          </p>
          <p class="top-about__comment">
            「大好きなパソコンを使って、時間や場所に囚われない、自分らしい働き方」という夢の実現を目指して、日々楽しく勉強に励んでおります。<br>
          </p>
          <p class="top-about__comment">
            これまではホテルを初めととする接客業を中心に活動。<br>
            本業では、自社展開のECサイト（カートシステム：makeshop）のデザインリニューアル、企画イベントのバナーの作成や、新規サービスの説明ページ作成（デザイン及びコーディング）、サイト全体のコード保守を中心に担当しています。
          </p>
          <p class="top-about__comment">
            副業のWEBデザインで、メルカリの画像制作、専門学校のバナー制作、最近ではLP制作やWEBサイト制作へ活動の幅を増やせるよう積極的に活動をしております。
          </p>
          <div class="c-sns__snsWrap top-about__sns">
            <ul class="c-sns__snsList">
              <li class="c-sns__snsItem">
                <a class="c-sns__snsLink" href="https://x.com/TakayukiTech" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-x-twitter"></i></a>
              </li>
              <li class="c-sns__snsItem">
                <a class="c-sns__snsLink" href="https://github.com/takayuki-jp" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-github"></i></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="js_topContact" class="top-contact">
    <div class="top-contact__inner c-sectionPadding">
      <div class="c-sectionTitleWrap">
        <h2 class="top-contact__title c-sectionTitle"><span>C</span>ontact</h2>
        <p class="top-contact__subTitle c-sectionSubTitle">お問い合わせ</p>
      </div>

      <div class="top-contact__contentWrap animeTarget">
        <div class="top-contact__image top-contact__image--sp animeTarget slideInLtoR">
          <img src="<?php echo esc_url(get_theme_file_uri('img/top-contact__iphone.webp')) ?>" alt="iphoneのはめ込み画像">
        </div>
        <p class="top-contact__message animeTarget slideInBtoU">
          興味をもっていただけましたら、<br>
          下記コンタクトフォームより<br class="sp-only">お気軽にご相談ください。<br>
          サイト制作全般はもちろん、<br>
          コーディングのみや、一部画像など、<br class="sp-only">ご要望に沿った<br>
          お手伝いをさせていただきます。<br>
        </p>
        <div class="top-contact__image top-contact__image--pc animeTarget slideInRtoL">
          <img src="<?php echo esc_url(get_theme_file_uri('img/top-contact__macbook.webp')) ?>" alt="macbookのはめ込み画像">
        </div>
      </div>
      <div class="top-service__btnWrap c-btnWrap">
        <a class="top-service__btnLink c-btn" href="<?php echo esc_url(home_url('/contact/'))  ?>">contact</a>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>



