function cancel(el) {
    $(el).on('click', function() {
        window.history.back();
    });
}

(function addClassTable() {
    $('.table').parent().addClass('table-responsive');
})();