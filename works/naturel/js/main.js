$(function () {
  // slick
  $(".slider").slick({
    autoplay: true,
    autoplaySpeed: 4000,
    infinite: true,
    arrows: false,
  });

  // ハンバーガーメニュー
  let $hamburger = $(".hamburger");
  let $gnav = $(".gnav");
  $hamburger.on("click", function () {
    $(this).toggleClass("active");
    $gnav.toggleClass("show");
    $("body").toggleClass("hamfix");
  });
});
