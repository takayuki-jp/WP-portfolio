//topページ__mainVisual内のページ内リンク
document.addEventListener("DOMContentLoaded", function() {

  const header = document.querySelector('.header');
  if (!header) return; // 要素が存在しない場合は処理を中断
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


  //topページ__top-worksのslide(splide.js)
  let splideInitialized = false;

  const splide = new Splide(".splide", {
    type: "loop",
    autoplay: false,
    interval: 3000,
    speed: 400,
    perPage: 3,
    perMove: 1,
    focus: "center",
    trimSpace: true,
    pagination: true,
    clones: 5,
    cloneStatus: false,
    breakpoints: {
      800: {
        perPage: 2,
      },
      600: {
        perPage: 1,
      },
    },
  });

  splide.mount();



  //topページ__セクションのフェードイン
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


