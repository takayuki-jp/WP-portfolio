//サービスページのみで使用するスクリプト


//serviceページ__タブコンテンツの表示
document.addEventListener("DOMContentLoaded", function() {
  const serviceLinks = document.querySelectorAll(".service__link");
  const sections= document.querySelectorAll(".service__section");

  serviceLinks.forEach(link => {
    link.addEventListener('click', function(event) {
      event.preventDefault();

      //タブのアクティブ状態を切り替える
      serviceLinks.forEach(link => link.classList.remove('active'));
      this.classList.add('active');

      //コンテンツの表示を切り替える
      sections.forEach(section => section.classList.remove("active"));

      const targetId = this.getAttribute("href").slice(1);
      const targetSection = document.getElementById(targetId);
      targetSection.classList.add("active");
    });
  });
});