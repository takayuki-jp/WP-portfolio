<?php get_header(); ?>

    <main class="page-service service">

      <!-- パンくずリスト -->
      <div class="c-breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
      <?php if (function_exists('bcn_display'))
      {
          bcn_display();
      } ?>
      </div>

      <div class="service__inner c-sectionPadding">
        <div class="c-sectionTitleWrap">
          <h1 class="service__title c-sectionTitle"><span>S</span>ervice</h1>
          <p class="service__subTitle c-sectionSubTitle">提供できるサービス</p>
        </div>

        <div class="service__listWrap">
          <ul class="service__list">
            <li class="service__listItem">
              <a href="#web" class="service__link service__link--web active">website</a>
            </li>
            <li class="service__listItem">
              <a href="#lp" class="service__link service__link--lp">LP</a>
            </li>
            <li class="service__listItem">
              <a href="#banner" class="service__link service__link--banner">banner</a>
            </li>
          </ul>
        </div>

        <section id="web" class="service__section service__section--website svSection active">
          <div class="svSection__inner">
            <h2 class="svSection__title svSection__title--website">
              <span class="char char-1">W</span>
              <span class="char char-2">E</span>
              <span class="char char-3">B</span>
              <span class="char char-4">サ</span>
              <span class="char char-5">イ</span>
              <span class="char char-6">ト</span>
              <span class="char char-7">制</span>
              <span class="char char-8">作</span>
            </h2>

            <div class="svSection__contentWrap">
              <div class="svSection__price">
                <h3 class="svSection__priceTitle">料金一例</h3>
                <div class="svSection__priceContentWrap">
                  <div class="svSection__priceDefListWrap">
                    <dl class="svSection__priceDefList">
                      <dt class="svSection__priceDataTitle">【トップページ】<br>デザイン＋コーディング</dt>
                      <dd class="svSection__priceDataDesc">30,000<span>円〜</span></dd>
                    </dl>
                    <dl class="svSection__priceDefList">
                      <dt class="svSection__priceDataTitle">【トップページ】<br>デザイン or コーディング</dt>
                      <dd class="svSection__priceDataDesc">20,000<span>円〜</span></dd>
                    </dl>
                    <dl class="svSection__priceDefList">
                      <dt class="svSection__priceDataTitle">【下層ページ】<br>デザイン＋コーディング</dt>
                      <dd class="svSection__priceDataDesc">15,000<span>円〜</span></dd>
                    </dl>
                    <dl class="svSection__priceDefList">
                      <dt class="svSection__priceDataTitle">【下層ページ】<br>デザイン or コーディング</dt>
                      <dd class="svSection__priceDataDesc">10,000<span>円〜</span></dd>
                    </dl>
                    <dl class="svSection__priceDefList">
                      <dt class="svSection__priceDataTitle">WordPressへの実装</dt>
                      <dd class="svSection__priceDataDesc">+30,000<span>円~</span></dd>
                    </dl>
                    <dl class="svSection__priceDefList">
                      <dt class="svSection__priceDataTitle">WordPressプラグイン実装</dt>
                      <dd class="svSection__priceDataDesc">+5,000<span>円〜</span></dd>
                    </dl>
                  </div>
                  <ul class="svSection__priceNoteList">
                    <li class="svSection__priceNoteItem">※商品やサービスの画像提供をお願いします。</li>
                    <li class="svSection__priceNoteItem">※こちらで用意する画像については基本的に著作権フリー素材を使用します。</li>
                    <li class="svSection__priceNoteItem">※料金は制作物のサイズによって上下します。詳しくはお問い合わせにてご相談ください。</li>
                  </ul>
                </div>
              </div>
              <div class="svSection__commentWrap svSection__commentWrap--website">
                <p class="svSection__comment">
                  Webサイトの制作を承ります。<br>
                  デザインからコーディングまではもちろん、デザインのみ、コーディングのみ、トップページのみ、追加したいページのみ等、それぞれのご要望に応じて柔軟に対応いたします。<br>
                  また、WordPressでのカスタムテーマデザインの実装も可能です。<br>
                </p>
              </div>
            </div>
          </div>
        </section>

        <section id="lp" class="service__section service__section--lp svSection">
          <div class="svSection__inner">
            <h2 class="svSection__title svSection__title--lp">
              <span class="char char-1">L</span>
              <span class="char char-2">P</span>
              <span class="char char-3">サ</span>
              <span class="char char-4">イ</span>
              <span class="char char-5">ト</span>
              <span class="char char-6">制</span>
              <span class="char char-7">作</span>
            </h2>

            <div class="svSection__contentWrap svSection__contentWrap--lp">
              <div class="svSection__price svSection__price--lp">
                <h3 class="svSection__priceTitle">料金一例</h3>
                <div class="svSection__priceContentWrap">
                  <div class="svSection__priceDefListWrap">
                    <dl class="svSection__priceDefList">
                      <dt class="svSection__priceDataTitle">デザイン＋コーディング</dt>
                      <dd class="svSection__priceDataDesc">50,000<span>円〜</span></dd>
                    </dl>
                    <dl class="svSection__priceDefList">
                      <dt class="svSection__priceDataTitle">コーディングのみ</dt>
                      <dd class="svSection__priceDataDesc">30,000<span>円〜</span></dd>
                    </dl>
                    <dl class="svSection__priceDefList">
                      <dt class="svSection__priceDataTitle">デザインのみ</dt>
                      <dd class="svSection__priceDataDesc">30,000<span>円〜</span></dd>
                    </dl>
                  </div>
                  <ul class="svSection__priceNoteList">
                    <li class="svSection__priceNoteItem">※商品やサービスの画像提供をお願いします。</li>
                    <li class="svSection__priceNoteItem">※こちらで用意する画像については基本的に著作権フリー素材を使用します。</li>
                    <li class="svSection__priceNoteItem">※料金は制作物のサイズによって上下します。詳しくはお問い合わせにてご相談ください。</li>
                  </ul>
                </div>
              </div>

              <div class="svSection__commentWrap svSection__commentWrap--lp">
                <p class="svSection__comment">
                  LPページ制作を承ります。<br>
                  「課題」→「解決策」→「商品紹介」のフローを組むことで、商品の魅力が伝わり、購買につながる効果のあるページを作成します。<br>
                </p>
              </div>
            </div>
          </div>
        </section>

        <section id="banner" class="service__section service__section--banner svSection">
          <div class="svSection__inner">
            <h2 class="svSection__title svSection__title--banner">
              <span class="char char-1">バ</span>
              <span class="char char-2">ナ</span>
              <span class="char char-3">ー</span>
              <span class="char char-4">等</span>
              <span class="char char-5">W</span>
              <span class="char char-6">E</span>
              <span class="char char-7">B</span>
              <span class="char char-8">画</span>
              <span class="char char-9">像</span>
              <span class="char char-10">制</span>
              <span class="char char-11">作</span>
            </h2>

            <div class="svSection__contentWrap">
              <div class="svSection__price">
                <h3 class="svSection__priceTitle">料金一例</h3>
                <div class="svSection__priceContentWrap">
                  <div class="svSection__priceDefListWrap">
                    <dl class="svSection__priceDefList">
                      <dt class="svSection__priceDataTitle">1枚</dt>
                      <dd class="svSection__priceDataDesc">5,000<span>円〜</span></dd>
                    </dl>
                    <dl class="svSection__priceDefList">
                      <dt class="svSection__priceDataTitle">サイズ展開<span>※1</span></dt>
                      <dd class="svSection__priceDataDesc">2,000<span>円~/枚</span></dd>
                    </dl>
                    <dl class="svSection__priceDefList">
                      <dt class="svSection__priceDataTitle">早仕上げ<span>※2</span></dt>
                      <dd class="svSection__priceDataDesc">+3,000<span>円~</span></dd>
                    </dl>
                  </div>
                  <ul class="svSection__priceNoteList">
                    <li class="svSection__priceNoteItem">※1 同じデザインでサイズを変える場合の料金です。</li>
                    <li class="svSection__priceNoteItem">※2 通常よりも早く納品する場合の料金です。</li>
                    <li class="svSection__priceNoteItem">※商品やサービスの画像提供をお願いします。</li>
                    <li class="svSection__priceNoteItem">※こちらで用意する画像については基本的に著作権フリー素材を使用します。</li>
                    <li class="svSection__priceNoteItem">※料金は制作物のサイズによって上下します。詳しくはお問い合わせにてご相談ください。</li>
                  </ul>
                </div>
              </div>

              <div class="svSection__commentWrap svSection__commentWrap--banner">
                <p class="svSection__comment">
                  各種画像制作を承ります。<br>
                  photoshopを使用しての画像制作を行います。<br>
                  広告バナーをはじめ、LPサイトのヘッダー、Xやinstagram等で使用する画像、SNSWebサイトのパーツ画像等のちょっとした画像制作もお気軽にお問い合わせください。<br>
                </p>
              </div>
            </div>
          </div>
        </section>

        </div>
      </main>

<?php get_footer(); ?>