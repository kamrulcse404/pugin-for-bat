jQuery(document).ready(function ($) {
  $("#search-device-result").change(function () {
    // var ajaxUrl = "http://localhost/azbt/wp-admin/admin-ajax.php";

    var ajax_url = jQuery(this).attr("ajax_url");

    // alert(ajaxUrl);

    var form = $("#search-device-result").serialize();

    // alert(form);

    var formdata = new FormData();

    formdata.append("action", "get_products_by_taxonomy");
    formdata.append("get_products_by_taxonomy", form);

    // alert(formdata);

    $.ajax(ajax_url, {
      type: "POST",
      data: formdata,
      processData: false,
      contentType: false,
      success: function (res) {
        // $(".show-device-by-search").removeClass("processing-loader");
        $(".show_product").html(res);
      },

      error: function (err) {},
    });
  });


  $("#customBatBtn").on("click", function () {
    alert('kamrul');
    $("#myModal").modal("show");
  });



});
