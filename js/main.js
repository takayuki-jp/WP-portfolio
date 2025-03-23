//ページ共通のスクリプト

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


//topページ__mainVisual内のページ内リンク
document.addEventListener("DOMContentLoaded", function() {
  const header = document.querySelector('.header');
  const links = document.querySelectorAll('.pageLink__link, .header__menuLink--arrowB');

  links.forEach(link => {
    link.addEventListener('click', function(event) {
      event.preventDefault();

      const targetId = this.getAttribute('href').substring(1);
      const targetElement = document.getElementById(targetId);

      if(targetElement) {
        const headerHeight = header.offsetHeight;
        const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset - headerHeight;

        window.scrollTo({
          top: targetPosition,
          behavior: 'smooth'
        });
      }
    });
  });
});

//topページ__セクションのフェードイン
document.addEventListener('DOMContentLoaded', function() {
  const animeTargets = document.querySelectorAll(".animeTarget");

  animeTargets.forEach(animeTarget => {
    const observerOptions = {
      root: null,
      rootMargin: "0px",
      threshold: 0.4
    };

    const observer = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add("animeTrigger");
          observer.unobserve(entry.target);
        }
      });
    }, observerOptions);

    observer.observe(animeTarget);
  });
});


//topページ__top-worksのslide(splide.js)
document.addEventListener("DOMContentLoaded", function() {
  new Splide(".splide", {
    autoplay: true,
    interval: 3000,
    speed: 400,
    rewind: true,
    perPage: 3,
    focus: "center",
    trimSpace: false,
    classes: {
      pagination: "splide__pagination top-works-pagination",
      page: "splide__pagination__page top-works-page",
    },
    breakpoints: {
      800: {
        perPage: 2,
      },
      600: {
        perPage: 1,
      }
    },
  }).mount();
});



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












