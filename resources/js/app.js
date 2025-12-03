import './bootstrap';

toastr.options = {
    "closeButton": false,
    "debug": true,
    "newestOnTop": true,
    "progressBar": true,
    "positionClass": "toastr-top-right",
    "preventDuplicates": false,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};

$(function () {
    function showSpinner(el) {
        el.find('#overlay').addClass("overlay overlay-block");
        el.find('#data').html('<div class="overlay-layer bg-dark-o-10"><div class="spinner-border"></div></div>');
    }

    function hideSpinner(el) {
        el.find('#overlay').removeClass("overlay overlay-block");
        el.find('#data').html('');
    }

    $(document).on("submit", "form", function (event) {

        let btn = $(this).find("button[type='submit']");

        console.log(event);

        btn.attr("disabled", true);

        btn.attr("data-kt-indicator", "on");

        showSpinner($(this));
    });

    $(document).on("click", ".show-indicator", function () {
        $(this).attr("disabled", true);
        $(this).attr("data-kt-indicator", "on");
    });

    $('.openAccordion').parent().parent().addClass("show");

    $('.openAccordion').parent().parent().parent().addClass("show");

});
