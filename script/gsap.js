// gsap
const wrapper = document.querySelector(".js-gsap-wrapper");
const list = document.querySelector(".js-gsap-list");

gsap.to(list, {
  x: () => -(list.clientWidth - wrapper.clientWidth),
  ease: "none",
  scrollTrigger: {
    trigger: "#process",
    start: "top -5%", //'triggerのどの部分 画面のどの部分'
    end: () => `+=${list.clientWidth - wrapper.clientWidth}`,
    scrub: true, //アニメーションがスクロールに同期
    pin: true, //要素を画面に固定
    anticipatePin: 1, //pin止めの検知を早め、がたつき抑える
    invalidateOnRefresh: true, //リサイズの調整のため
  },
});

// アンカーボタン
$(window).on("scroll", function () {
  var props = $(".js-gsap-list").css("transform");
  var values = props.split(/[()]/)[1].split(",");
  var translateX = parseInt(values[4]);
  if ($(window).outerWidth() > 960) {
    if (translateX > -400) {
      $(".js-anchor-item1").addClass("active");
    } else {
      $(".js-anchor-item1").removeClass("active");
    }
    if (translateX < -400 && translateX > -1000) {
      $(".js-anchor-item2").addClass("active");
    } else {
      $(".js-anchor-item2").removeClass("active");
    }
    if (translateX < -1000 && translateX > -1500) {
      $(".js-anchor-item3").addClass("active");
    } else {
      $(".js-anchor-item3").removeClass("active");
    }
    if (translateX < -1500) {
      $(".js-anchor-item4").addClass("active");
    } else {
      $(".js-anchor-item4").removeClass("active");
    }
  } else if ($(window).outerWidth() > 767) {
    if (translateX > -400) {
      $(".js-anchor-item1").addClass("active");
    } else {
      $(".js-anchor-item1").removeClass("active");
    }
    if (translateX < -400 && translateX > -950) {
      $(".js-anchor-item2").addClass("active");
    } else {
      $(".js-anchor-item2").removeClass("active");
    }
    if (translateX < -950 && translateX > -1400) {
      $(".js-anchor-item3").addClass("active");
    } else {
      $(".js-anchor-item3").removeClass("active");
    }
    if (translateX < -1400) {
      $(".js-anchor-item4").addClass("active");
    } else {
      $(".js-anchor-item4").removeClass("active");
    }
  } else if ($(window).outerWidth() > 500) {
    if (translateX > -250) {
      $(".js-anchor-item1").addClass("active");
    } else {
      $(".js-anchor-item1").removeClass("active");
    }
    if (translateX < -250 && translateX > -600) {
      $(".js-anchor-item2").addClass("active");
    } else {
      $(".js-anchor-item2").removeClass("active");
    }
    if (translateX < -600 && translateX > -900) {
      $(".js-anchor-item3").addClass("active");
    } else {
      $(".js-anchor-item3").removeClass("active");
    }
    if (translateX < -900) {
      $(".js-anchor-item4").addClass("active");
    } else {
      $(".js-anchor-item4").removeClass("active");
    }
  } else {
    if (translateX > -200) {
      $(".js-anchor-item1").addClass("active");
    } else {
      $(".js-anchor-item1").removeClass("active");
    }
    if (translateX < -200 && translateX > -500) {
      $(".js-anchor-item2").addClass("active");
    } else {
      $(".js-anchor-item2").removeClass("active");
    }
    if (translateX < -500 && translateX > -700) {
      $(".js-anchor-item3").addClass("active");
    } else {
      $(".js-anchor-item3").removeClass("active");
    }
    if (translateX < -700) {
      $(".js-anchor-item4").addClass("active");
    } else {
      $(".js-anchor-item4").removeClass("active");
    }
  }
});
