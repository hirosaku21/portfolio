$(function () {
  // 訪問者別、検索メニューの開閉
  let $visitorIcon = $(".header__middle__sp__item--visitor-icon");
  let $searchIcon = $(".header__middle__sp__item--search-icon");
  let $visitorList = $(".visitor-list");
  let $searchBox = $(".search__box");

  $visitorIcon.on("click", function () {
    if ($searchBox.hasClass("appear")) {
      $searchBox.removeClass("appear");
      $searchIcon.removeClass("close");
    }
    $(this).toggleClass("close");
    $visitorList.toggleClass("appear");
    let $visitorIconText = $(".header__middle__sp__item--visitor-icon__text");
    $visitorIconText.text(
      $visitorIconText.text() === "訪問者別" ? "閉じる" : "訪問者別"
    );
  });

  $searchIcon.on("click", function () {
    if ($visitorList.hasClass("appear")) {
      $visitorList.removeClass("appear");
      $visitorIcon.removeClass("close");
    }
    $(this).toggleClass("close");
    $searchBox.toggleClass("appear");
    let $searchIconText = $(".header__middle__sp__item--search-icon__text");
    $searchIconText.text($searchIconText.text() === "検索" ? "閉じる" : "検索");
  });

  // ハンバーガーメニュー
  let $hamburger = $(".cta__sp-menu");
  let $spMenu = $(".sp-menu");

  $hamburger.on("click", function () {
    // ハンバーガーメニューの開閉
    $(this).toggleClass("close");
    let newHtml =
      $(this).html() === '<span class="hamburger"></span>メニュー'
        ? '<span class="hamburger"></span>閉じる'
        : '<span class="hamburger"></span>メニュー';
    $(this).html(newHtml);

    // SPメニュー
    $spMenu.toggleClass("open");

    // スクロールを止める
    $("body").toggleClass("fixed");
  });

  // ハンバーガーメニューの中のメニュー
  let $spMenuHeading = $(".sp-menu__heading");
  let $spMenuItem = $(".sp-menu__item");

  $spMenuHeading.on("click", function () {
    $(this).toggleClass("open");
    $(this).next($spMenuItem).slideToggle();
  });

  // CTAを卒業生の声・フッターエリアで非表示
  let $cta = $(".cta");
  let $voiceTop = $(".voice").offset().top;
  let $voiceBottom = $voiceTop + $(".voice").height();
  let $ctaHeight = $(".cta__document").height() * 4;
  let $footerTop = $(".footer").offset().top;

  if (window.matchMedia("(max-width: 767px)").matches) {
    //画面横幅が767px以下のときの処理
  } else {
    //画面横幅が768px以上のときの処理
    $(window).scroll(function () {
      if (
        ($(window).scrollTop() > $voiceTop - $ctaHeight &&
          $(window).scrollTop() < $voiceBottom - $ctaHeight) ||
        $(window).scrollTop() > $footerTop - $ctaHeight
      ) {
        $cta.fadeOut();
      } else {
        $cta.fadeIn();
      }
    });
  }

  // ページトップに戻るボタン
  let $pageTop = $(".page-top");
  if (window.matchMedia("(max-width: 767px)").matches) {
    //画面横幅が767px以下のときの処理
    $pageTop.hide();
  } else {
    //画面横幅が768px以上のときの処理
    $(window).scroll(function () {
      if ($(window).scrollTop() > 300) {
        $pageTop.fadeIn();
      } else {
        $pageTop.fadeOut();
      }
    });
    $pageTop.on("click", function () {
      $("body,html").animate(
        {
          scrollTop: 0,
        },
        300
      );
      return false;
    });
  }

  //MVのスワイパー
  const swiper1 = new Swiper(".js-swiper1", {
    loop: true,
    autoplay: true,
    delay: 5000,
    speed: 2000,
    effect: "fade",

    //ページネーション
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });

  //卒業生の声のスワイパー
  if (window.matchMedia("(max-width: 767px)").matches) {
    //画面横幅が767px以下のときの処理
    const swiper2 = new Swiper(".js-swiper2", {
      effect: "slide",
      slidesPerView: 1.5,
      spaceBetween: 20,
      initialSlide: 1,
      centeredSlides: true,

      //ナビゲーションボタン
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
  } else if (window.matchMedia("(max-width: 1200px)").matches) {
    //画面横幅が1200px～768pxのときの処理
    const swiper2 = new Swiper(".js-swiper2", {
      effect: "slide",
      slidesPerView: 2.5,
      spaceBetween: 20,
      initialSlide: 1,
      centeredSlides: true,

      //ナビゲーションボタン
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
  } else {
    //画面横幅が1201px以上のときの処理
    const swiper2 = new Swiper(".js-swiper2", {
      effect: "slide",
      slidesPerView: 3.5,
      spaceBetween: 30,
      initialSlide: 2,
      centeredSlides: true,

      //ナビゲーションボタン
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
  }

  //MVのキャッチコピーを１枚目の画像の時のみ表示
  $(window).on("load", function () {
    if ($(".swiper-slide").children("img").attr("src") == "img/mv01.jpg") {
      $(".mv__copy").show();
    } else {
      $(".mv__copy").hide();
    }
  });
});
