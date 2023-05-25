$(function () {
  // 767px以上で、スティッキースクロール
  $(window).on("load resize", function () {
    if ($(window).outerWidth(true) > 766) {
      $(".main-content-wrapper").stickyStack({
        stackingElement: ".section",
      });
    }
  });

  // ヘッダーロゴの色の切り替え
  $(window).scroll(function () {
    let $scrollPos = $(this).scrollTop();

    $(".section__desc").each(function () {
      let $sectionDesc = $(this);
      let $sectionDescTop = $sectionDesc.offset().top - 100;
      let $sectionDescBottom = $sectionDescTop + $sectionDesc.outerHeight();

      if ($scrollPos >= $sectionDescTop && $scrollPos < $sectionDescBottom) {
        $sectionDesc.addClass("active");
      } else {
        $sectionDesc.removeClass("active");
      }
    });

    if ($(".section__desc.active").length > 0) {
      $(".header__logo--w").hide();
      $(".header__logo--b").fadeIn(1000);
    } else {
      $(".header__logo--w").fadeIn(1000);
      $(".header__logo--b").hide();
    }
  });

  // サイドメニュー、ハンバーガーメニュー
  let $hamburger = $(".header__hamburger");
  let $sideMenu = $(".side-menu");

  $(window).on("load resize", function () {
    if ($(window).outerWidth(true) < 767) {
      $hamburger.on("click", function () {
        $sideMenu.toggleClass("active");
        $(this).toggleClass("close");
      });
    }
  });

  // お部屋のslick
  $(".slick1").slick({
    // slick1のオプション
    centerMode: true,
    centerPadding: "20%",
    speed: 2000,
    autoplay: true,
    slidesToShow: 1,
    autoplaySpeed: 3000,
    arrows: false,
    asNavFor: ".thumbnail1",
    responsive: [
      {
        // 1535px以下の時
        breakpoint: 1536,
        settings: {
          centerPadding: "10%",
        },
      },
      {
        // 959px以下の時
        breakpoint: 960,
        settings: {
          centerMode: false,
        },
      },
    ],
  });

  $(".slick2").slick({
    // slick2のオプション
    speed: 2000,
    autoplay: true,
    autoplaySpeed: 3000,
    arrows: false,
    asNavFor: ".thumbnail2",
  });

  $(".thumbnail1").slick({
    // thumbnail1のオプション
    autoplay: false,
    slidesToShow: 6,
    asNavFor: ".slick1",
    focusOnSelect: true,
    arrows: false,
    responsive: [
      {
        // 959px以下の時
        breakpoint: 960,
        settings: {
          slidesToShow: 3,
        },
      },
    ],
  });

  $(".thumbnail2").slick({
    // thumbnail2のオプション
    autoplay: false,
    slidesToShow: 3,
    asNavFor: ".slick2",
    focusOnSelect: true,
  });

  // 過ごし方のblur検知
  $spendingTop = $(".spending__box").offset().top - 600;

  $(window).scroll(function () {
    let $scrollPos = $(this).scrollTop();

    if ($scrollPos >= $spendingTop) {
      $(".spending__box").addClass("active");
    }
  });

  // ページトップに戻るボタン
  let $pageTop = $(".page-top");
  $pageTop.on("click", function () {
    $("body,html").animate(
      {
        scrollTop: 0,
      },
      1500
    );
    return false;
  });
});
