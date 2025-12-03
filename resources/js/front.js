import './bootstrap';

$(function () {

    $(document).on('submit', 'form.loadingBtn', function (e) {
        let btn = $(this).find('button[type="submit"]');
        btn.prop("disabled", true);
        btn.text("جاري التحميل ...");
    });

});
