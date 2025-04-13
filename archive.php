<?php get_header(); ?>

    <main class="page-archive">

    <!-- パンくずリスト -->
    <div class="c-breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
    <?php if (function_exists('bcn_display'))
    {
        bcn_display();
    } ?>
    </div>

      <section class="archiveList">
        <div class="archiveList__inner c-sectionPadding">
          <div class="c-sectionTitleWrap">
            <h1 class="archiveList__title c-sectionTitle"><span>A</span>rchive</h1>
            <p class="archiveList__subTitle c-sectionSubTitle">制作作品の一覧</p>
          </div>

          <div class="archiveList__filterWrap">
            <ul class="archiveList__filterList">
              <li class="archiveList__filterListItem">
                <button class="archiveList__filterBtn archiveList__filterBtn--all" data-filter="all">すべて</button>
              </li>
              <?php
              $categories = get_categories(array(
                'oderby' => 'name',
                'order' => 'DESC',
              ));

              foreach($categories as $category) :
              ?>
              <li class="archiveList__filterListItem">
                <button class="archiveList__filterBtn c-categoryTag c-categoryTag--<?php echo esc_attr($category->slug); ?>" data-filter="<?php echo esc_attr($category->slug); ?>">
                  <?php echo esc_html($category->name); ?>
                </button>
              </li>
              <?php endforeach; ?>
            </ul>
          </div>

          <div class="archiveList__itemListWrap">
            <ul class="archiveList__itemList c-worksCardList">

              <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                  <?php
                    //投稿のカテゴリー情報を取得
                    $categories = get_the_category();
                    $category_slug = !empty($categories) ? esc_attr($categories[0]->slug) : '';
                  ?>
                  <li class="archiveList__cardItem c-worksCard" data-category="<?php echo esc_attr($category_slug); ?>">
                    <a class="c-worksCard__link" href="<?php the_permalink(); ?>">

                      <div class="c-worksCard__image">
                        <?php if (has_post_thumbnail()) : ?>
                          <?php the_post_thumbnail(); ?>
                        <?php else : ?>
                          <img src="<?php echo esc_url(get_theme_file_uri('img/noimg.png')); ?>" alt="no image">
                        <?php endif; ?>
                      </div>

                      <div class="c-worksCard__info">
                        <div class="c-worksCard__titleWrap">
                          <?php if (get_field('client')) : ?>
                            <p class="c-worksCard__client"><?php the_field('client'); ?>様</p>
                          <?php endif; ?>
                          <p class="c-worksCard__title"><?php the_title(); ?></p>
                        </div>
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
                    </a>
                  </li>
                <?php endwhile; ?>
              <?php else : ?>
                <p>投稿が見つかりませんでした。</p>
              <?php endif; ?>
            </ul>

            <?php
            $args = array(
              'mid_size' => 1,
              'prev_text' => '<i class="fa-solid fa-angle-left"></i>',
              'next_text' => '<i class="fa-solid fa-angle-right"></i>',
              'screen_reader_text' => ' ',
            );
            the_posts_pagination($args);
            ?>
          </div>
        </div>
      </section>
    </main>

<?php get_footer(); ?>



