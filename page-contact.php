<?php get_header(); ?>

<main class="page-contact">
  <div class="contact__inner c-sectionPadding ">
    <div class="c-sectionTitleWrap">
      <h1 class="contact__title c-sectionTitle"><span>C</span>ontact</h1>
      <p class="contact__subTitle c-sectionSubTitle">お問い合わせ</p>
    </div>

    <div class="contact__messageWrap c-message__wrap">
      <p class="contact__message c-message__message">
        まずはご相談だけでもかまいません。<br>
        まずはお気軽にお問い合わせください。<br>
        平日2日以内にご返信をさせていただきます。
      </p>
    </div>

    <?php echo do_shortcode('[contact-form-7 id="a7874ff" title="コンタクトフォーム 1"]'); ?>

  </div>
</main>

<?php get_footer(); ?>