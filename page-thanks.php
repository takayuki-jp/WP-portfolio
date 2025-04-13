<?php get_header(); ?>

<main class="page-thanks">

  <!-- パンくずリスト -->
  <div class="c-breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
  <?php if (function_exists('bcn_display'))
  {
      bcn_display();
  } ?>
  </div>

  <div class="thanks__inner c-sectionPadding">
    <h1 class="thanks__title">ご相談を承りました</h1>

    <div class="thanks__messageWrap c-message__wrap">
      <p class="thanks__message c-message__message">
        ありがとうございます。<br>
        ご依頼を受け付けました。<br>
        内容確認後、ご入力いただいきましたe-mail宛に<br>
        返信いたしますので、おまちくださいませ。<br>
      </p>
    </div>

    <div class="thanks__btnWrap">
      <a class="thanks__button c-btn" href="<?php echo esc_url(home_url()) ?>">HOME</a>
    </div>
  </div>
</main>

<?php get_footer(); ?>