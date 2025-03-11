//トップページのみで使用するスクリプト


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


//topページ__top-worksのsilde(splide.js)
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