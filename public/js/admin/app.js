function cancel(el) {
    $(el).on('click', function() {
        window.history.back();
    });
}