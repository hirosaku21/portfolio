$(function () {
  //合計金額の計算
  $(".calc").change(function () {
    let $item01 = $("#item01").val();
    let $item02 = $("#item02").val();
    console.log($item01 + "," + $item02);
    $("#total").load(
      "php/order.php",
      {
        item01: $item01,
        item02: $item02,
      },
      function (data, textStatus, XMLHttpRequest) {}
    );
  });

  //住所検索
  $("#postcode").focusout(function () {
    let $postcode = $(this).val();
    $("[id^=address]").val("検索中").attr("disabled", true);
    $.getJSON(
      "../php/postcode.php",
      { postcode: $postcode },
      function (date, textStaus, XMLHttpRequest) {
        console.log(date);
        $("#address1").val(date.address1);
        $("#address2").val(date.address2);
        $("#address3").val(date.address3);
        $("[id^=address]").attr("disabled", false);
      }
    );
  });
});
