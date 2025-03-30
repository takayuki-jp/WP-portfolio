//**********【すべてのページ共通のスクリプト】**********
window.addEventListener('DOMContentLoaded', function() {

//----------ページ読み込み時にフェードイン----------
  this.document.body.classList.add('loaded');


//----------sp-menuの開閉----------
  document.querySelector('.header__sp-menuBtn').addEventListener('click', function() {
    document.querySelector('.header').classList.toggle('panelActive');
  });


//---------スクロールでヘッダーが出てくる----------
  const header = document.querySelector('#js_header');
  const mainVisual = document.querySelector(".mainVisual");
  const topWorks = document.querySelector('#js_topWorks');
  const toTop = document.querySelector('.toTop__link');

  const fixTargetPosition = topWorks ? topWorks.offsetTop : 200;

  function onScroll() {
    const scrollPosition = window.scrollY;

    if (scrollPosition >= fixTargetPosition) {
      header.classList.add("fix");
      toTop.classList.add("fix");
      if (mainVisual) {
        mainVisual.classList.add("fix");
      }
    } else {
      header.classList.remove("fix");
      toTop.classList.remove("fix");
      if (mainVisual) {
        mainVisual.classList.remove("fix");
      }
    }
  }

  window.addEventListener('scroll', onScroll);


//-----------トップに戻るボタン----------
const toTopButton = document.querySelector(".toTop__link");

// トップに戻るボタンを押したとき
toTopButton.addEventListener('click', function(e) {
  e.preventDefault();
  toTopButton.classList.add("active");

  window.scrollTo({
    top: 0,
    behavior: 'smooth',
  });

  window.addEventListener('scroll', function checkScroll() {
    if (window.scrollY === 0) {
      toTopButton.classList.remove("active");
      window.removeEventListener('scroll', checkScroll); // イベントリスナーを削除
    }
  });
});




}); // 'DOMContentLoaded' 終了