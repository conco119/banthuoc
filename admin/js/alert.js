$(document).ready(function() {

  $.notify.addStyle('thanhcong', {
    html: "<div>" +
            "<div class='alert alert-success'>" +
              "<strong<i class='fa fa-check' aria-hidden='true'></i>    <span data-notify-text/></strong>"+
            "</div>"+
          "</div>",
    classes: {
      base: {
        "padding": "20px",
        "width": "150%"
      }
    }
  });

  $.notify.addStyle('thatbai', {
    html: "<div>" +
            "<div class='alert alert-danger'>" +
              "<strong<i class='fa fa-times' aria-hidden='true'></i>   Thât bại </strong>"+
            "</div>"+
          "</div>"
  });

});
