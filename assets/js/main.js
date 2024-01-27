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
});



















// (function ($) {

//     $('#search-device-result').change(function (event) {
//         // event.preventDefault();
//         // $('.show-device-by-search').addClass('processing-loader');

//         // alert('search-device-result') ;
//         var endpoint = '<?php echo admin_url('admin-ajax.php'); ?>';
//         var form = $('#search-device-result').serialize();
//         var formdata = new FormData;
//         formdata.append('action', 'search_device_result');
//         formdata.append('search_device_result', form);

//         $.ajax(endpoint, {
//             type: 'POST',
//             data: formdata,
//             processData: false,
//             contentType: false,
//             success: function (res) {
//                 $('.show-device-by-search').removeClass('processing-loader');
//                 $('.show-device-by-search').html(res);
//             },

//             error: function (err) {

//             }
//         })

//     })

// })(jQuery)
