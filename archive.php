<?php get_header(); ?>

    <main class="page-archive">
      <section class="archiveList">
        <div class="archiveList__inner c-sectionPadding">
          <div class="c-sectionTitleWrap">
            <h1 class="archiveList__title c-sectionTitle"><span>A</span>rchive</h1>
            <p class="archiveList__subTitle c-sectionSubTitle">制作作品の一覧</p>
          </div>

          <div class="archiveList__itemListWrap">
            <ul class="archiveList__itemList c-worksCardList">

              <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                  <li class="archiveList__cardItem c-worksCard">
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
                        <div class="c-categoryTag c-categoryTag--<?php echo esc_attr(get_post_type()); ?>">
                          <?php
                          $categories = get_the_category();
                          if (!empty($categories)) {
                            echo esc_html($categories[0]->name);
                          }
                          ?>
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
      </section>
    </main>

<?php get_footer(); ?>



