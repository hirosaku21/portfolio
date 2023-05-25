$(function () {
  // ヘッダー、広告バナーの固定
  $header = $(".js-header");
  $ad = $(".js-ad");
  $adClose = $(".js-ad-close");

  $(window).on("scroll", function () {
    if ($(this).scrollTop() > 500) {
      $header.addClass("fixed");
      $header.animate({ top: 0 }, 600);
      $ad.addClass("appear");
    } else {
      $header.removeClass("fixed");
      $header.stop().removeAttr("style");
      $ad.removeClass("appear");
    }
  });

  $adClose.on("click", function () {
    $ad.removeClass("appear");
    $ad.addClass("hide");
  });

  // ハンバーガーメニュー
  $(".js-hamburger").on("click", function () {
    $(this).toggleClass("open");
    $(".js-gnav").toggleClass("open");
    $("body").toggleClass("fixed");
  });

  // MVのキャッチコピーのアニメーション
  // $(window).on("load", function () {
  $(document).ready(function () {
    $(".js-copy").addClass("active");
    $(".js-copy-text").addClass("appear");
  });

  // 制作実績のタブ切替
  $tabName = $(".js-tab-heading");
  $tabContent = $(".js-tab-list");
  $tabContent1 = $(".js-tab-list1");
  $tabName.on("click", function () {
    $(".active").removeClass("active");
    $(this).addClass("active");
    let index = $tabName.index(this);
    $tabContent.removeClass("show").eq(index).addClass("show fadeUp");
  });

  // バナー・チラシの拡大モーダル
  $(".js-magnify").on("click", function () {
    let imgSrc = $(this).find("img").attr("src");
    let imgAlt = $(this).children().children().attr("alt");
    console.log(imgSrc);
    $(".js-modal-img").children().attr("src", imgSrc);
    $(".js-modal-img").children().attr("alt", imgAlt);
    $(".js-modal").fadeIn();
  });

  $(".js-modal-close").on("click", function () {
    $(".js-modal").fadeOut();
  });
  $(".js-modal-inner").on("click", function () {
    $(".js-modal").fadeOut();
  });

  //スクロールエフェクト
  $(window).scroll(function () {
    $(".js-fadeUpEffect").each(function () {
      if (
        $(window).scrollTop() >=
        $(this).offset().top + 100 - $(window).height()
      ) {
        $(this).addClass("fadeUp");
      }
    });
  });

  // アコーディオン
  $(".js-accordion.active").next().show();
  $(".js-accordion").on("click", function () {
    $(this).toggleClass("active");
    $(this).next().slideToggle(200);
  });
});
