(function () {
  var bar = document.querySelector(".topbar");
  function onScroll() {
    if (bar) bar.classList.toggle("is-scrolled", window.scrollY > 24);
  }
  window.addEventListener("scroll", onScroll, { passive: true });
  onScroll();

  var burger = document.querySelector(".burger");
  var menu = document.querySelector(".menu");
  if (burger && menu) {
    function isOpen() {
      return menu.classList.contains("is-open");
    }
    function open() {
      menu.classList.add("is-open");
      burger.setAttribute("aria-expanded", "true");
    }
    function shut() {
      menu.classList.remove("is-open");
      burger.setAttribute("aria-expanded", "false");
    }
    function toggle() {
      isOpen() ? shut() : open();
    }

    burger.addEventListener("click", function (e) {
      e.stopPropagation();
      toggle();
    });

    menu.querySelectorAll("a").forEach(function (a) {
      a.addEventListener("click", shut);
    });

    document.addEventListener("keydown", function (e) {
      if (e.key === "Escape") shut();
    });

    document.addEventListener("click", function (e) {
      if (!isOpen()) return;
      if (menu.contains(e.target) || burger.contains(e.target)) return;
      shut();
    });

    window.addEventListener("resize", function () {
      if (window.innerWidth > 1180) shut();
    });
  }

  if ("IntersectionObserver" in window) {
    var io = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (en) {
          if (en.isIntersecting) {
            en.target.classList.add("in");
            io.unobserve(en.target);
          }
        });
      },
      { threshold: 0.12 }
    );
    document.querySelectorAll(".rv").forEach(function (el) {
      io.observe(el);
    });
  } else {
    document.querySelectorAll(".rv").forEach(function (el) {
      el.classList.add("in");
    });
  }

  var reelVideos = document.querySelectorAll(".ig-reel__video");
  if (reelVideos.length) {
    if ("IntersectionObserver" in window) {
      var reelIo = new IntersectionObserver(
        function (entries) {
          entries.forEach(function (en) {
            var v = en.target;
            if (en.isIntersecting) {
              if (!v.src && v.querySelector("source")) {
                v.load();
              }
              var playPromise = v.play();
              if (playPromise && playPromise.catch) {
                playPromise.catch(function () {
                });
              }
            } else {
              v.pause();
            }
          });
        },
        { threshold: 0.25 }
      );
      reelVideos.forEach(function (v) {
        reelIo.observe(v);
      });
    } else {
      reelVideos.forEach(function (v) {
        v.play();
      });
    }
  }

  var flipCards = document.querySelectorAll(".flip-card");
  if (flipCards.length) {
    flipCards.forEach(function (card) {
      card.addEventListener("click", function (e) {
        e.stopPropagation();
        card.classList.toggle("is-flipped");
      });
    });
    document.addEventListener("click", function () {
      flipCards.forEach(function (card) {
        card.classList.remove("is-flipped");
      });
    });
  }
})();