<?php get_header(); ?>

<main class="page-works">

  <!-- パンくずリスト -->
  <div class="c-breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
  <?php if (function_exists('bcn_display'))
  {
      bcn_display();
  } ?>
  </div>

  <div class="works__inner c-sectionPadding ">
    <div class="c-sectionTitleWrap">
      <h1 class="works__title c-sectionTitle"><span>W</span>orks</h1>
      <p class="works__subTitle c-sectionSubTitle">制作作品の紹介</p>
    </div>

    <article>
      <div class="worksHead">
        <!-- クライアント名（入力されている場合のみ表示） -->
        <?php if (get_field('client')) : ?>
          <p class="worksHead__client"><?php the_field('client'); ?> 様</p>
        <?php endif; ?>

        <!-- 作品タイトル -->
        <h1 class="worksHead__workTitle"><?php the_title(); ?></h1>

        <!-- カテゴリ（入力されている場合のみ表示) -->
        <?php
        $categories = get_the_category();
        $category_slug = !empty($categories) ? esc_attr($categories[0]->slug) : '';
        $category_name = !empty($categories) ? esc_html($categories[0]->slug) : '';
        ?>
        <div class="worksHead__category c-categoryTag c-categoryTag--<?php echo $category_slug; ?>">
          <span><?php echo $category_name; ?></span>
        </div>
      </div>

      <div class="worksImage">
        <?php if (has_post_thumbnail()) : ?>
          <?php the_post_thumbnail('large', array('alt' => get_the_title(), 'class' => 'worksImage__img')); ?>
        <?php else : ?>
          <img src="<?php echo esc_url(get_theme_file_uri('img/works__noImage.png')); ?>" alt="画像なし" class="worksImage__img">
        <?php endif; ?>
      </div>

      <div class="worksInfo">
        <div class="worksInfo__dataListWrap">
          <?php if (get_field('date_create')) : ?>
            <dl class="worksInfo__dateList worksInfo__dateList--dateCreate">
              <dt class="worksInfo__dateTitle">制作日</dt>
              <dd class="worksInfo__dateDesc">
                <?php the_field('date_create'); ?>
              </dd>
            </dl>
          <?php endif; ?>

          <?php if (get_field('work_days')) : ?>
            <dl class="worksInfo__dateList worksInfo__dateList--workDays">
              <dt class="worksInfo__dateTitle">制作日数</dt>
              <dd class="worksInfo__dateDesc">
                <?php the_field('work_days'); ?>
              </dd>
            </dl>
          <?php endif; ?>

          <?php if (get_field('tools')) : ?>
            <dl class="worksInfo__dateList worksInfo__dateList--tools">
              <dt class="worksInfo__dateTitle">使用ツール</dt>
              <dd class="worksInfo__dateDesc">
                <?php
                $tools = get_field('tools'); //フィールドの値を取得
                if (is_array($tools)) : //配列の場合
                  foreach ($tools as $tool) :
                ?>
                <p class="c-toolTag c-toolTag--<?php echo esc_attr($tool); ?>">
                  <?php echo esc_html($tool); ?>
                </p>
                <?php
                    endforeach;
                else : //配列でない（単一選択）の場合
                ?>
                <p class="c-toolTag c-toolTag--<?php echo esc_attr($tools); ?>">
                  <?php echo esc_html($tools); ?>
                </p>
                <?php endif; ?>
              </dd>
            </dl>
          <?php endif; ?>


          <?php if (get_field('web_link')) : ?>
            <dl class="worksInfo__dateList worksInfo__dateList--link">
              <dt class="worksInfo__dateTitle">リンク</dt>
              <dd class="worksInfo__dateDesc">
                <a href="<?php the_field('web_link'); ?>" target="_blank" rel="noopener noreferrer">サイトを見る<i class="fa-solid fa-up-right-from-square"></i></a>
              </dd>
            </dl>
          <?php endif; ?>
        </div>

        <div class="worksInfo__comment">
          <?php the_content(); ?>
        </div>
      </div>
    </article>

    <div class="articlePager">
      <div class="articlePager__prev">
        <?php
        $prev_post = get_previous_post();
        if (!empty($prev_post)) : ?>
          <a class="articlePager__link articlePager__link--prev" href="<?php echo get_permalink($prev_post->ID); ?>">
            <?php echo esc_html($prev_post->post_title); ?>
          </a>
        <?php endif; ?>
      </div>
      <div class="articlePager__next">
        <?php
        $next_post = get_next_post();
        if (!empty($next_post)) : ?>
          <a class="articlePager__link articlePager__link--next" href="<?php echo get_permalink($next_post->ID); ?>">
            <?php echo esc_html($next_post->post_title); ?>
          </a>
        <?php endif; ?>
      </div>
    </div>


  </div>
</main>

<?php get_footer(); ?>