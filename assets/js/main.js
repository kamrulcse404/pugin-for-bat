jQuery(document).ready(function ($) {
  $("body").delegate("#customBatBtn", "click", function (event) {
    // Show the modal
    $("#myModal").modal("show");
  });

  $(document).on("click", "#sendEmailBtn", function (event) {
    var name = $("#name").val();
    var email = $("#email").val();

    var ajax_url = $("#customBatForm").attr("ajax_url");

    var formdata = new FormData();
    formdata.append("name", name);
    formdata.append("email", email);

    // Additional parameters
    formdata.append("action", "get_custom_form_email");
    formdata.append("get_custom_form_email", "true");

    // Close the modal
    $("#myModal").modal("hide");

    // Send AJAX request
    $.ajax({
      url: ajax_url,
      type: "POST",
      data: formdata,
      processData: false,
      contentType: false,
      success: function (response) {
        // Handle the success response
        alert(response.data.message);
      },
      error: function (xhr, status, error) {
        // Handle errors
        alert("Error: " + xhr.responseJSON.message);
      },
    });
  });

  $("#search-device-result").change(function () {
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
