//common__sp-menu
document.querySelector('.header__sp-menuBtn').addEventListener('click', function() {
  document.querySelector('.header').classList.toggle('panelActive');
});

//common__header-fix
document.addEventListener("DOMContentLoaded", function() {
  const header = document.querySelector('#js_header');
  const mainVisual = document.querySelector(".mainVisual");
  const fixTarget = document.querySelector('#js_topWorks');

  const fixTargetPosition = fixTarget.offsetTop;


  function onScroll() {
    const scrollPosition = window.scrollY;

    if (scrollPosition >= fixTargetPosition) {
      header.classList.add("fix");
      mainVisual.classList.add("fix");
    } else {
      header.classList.remove("fix");
      mainVisual.classList.remove("fix");
    }
  }

  window.addEventListener('scroll', onScroll);
});


//common__トップに戻るボタン
document.addEventListener("DOMContentLoaded", function () {
  const toTopButton = document.querySelector(".toTop__link");

  //Topに戻るボタンを押したとき
  toTopButton.addEventListener('click', function(e) {
    e.preventDefault();
    toTopButton.classList.add("active");
    window.scrollTo({
      top: 0,
      behavior: 'smooth',
    });

  //スクロールが完了したらクラスを削除
  window.addEventListener("scroll", function onScroll() {
    if(this.window.scrollY === 0) {
      toTopButton.classList.remove("active");
      window.removeEventListener("scroll", onScroll);
      }
    });
  });


  //ホバー時のアニメーション
  toTopButton.addEventListener("mouseenter", function () {
    this.style.transition = "transform 0.5s ease-out, opacity 0.5s ease";
    this.style.transform = "translateY(-16px)";
    this.style.opacity = "1";
  });

  toTopButton.addEventListener("mouseleave", function () {
    this.style.transition = "transform 0.5s ease, opacity 0.5s ease";
    this.style.transform = "translateY(0)";
    this.style.opacity = "0.5";
  });
});



















