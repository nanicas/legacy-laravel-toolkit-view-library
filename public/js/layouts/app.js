var APP = (function () {

    var state = {};

    function load() {
        state.body = $('body');
        state.topMessage = $('#top-message');
    }

    function replaceIcons() {
        feather.replace();
    }

    function getBaseUrl() {
        return state.body.data('base-url');
    }

    function setTopMessage(message, type) {
        state.topMessage.removeClass('none');
        state.topMessage.html(message);
    }

    function convertMessageToAlert(message, type) {
        var options = [
            'primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark'
        ];

        if ($.inArray(type, options) == -1) {
            type = 'primary';
        }

        var alertMessage = $(document.createElement('div'));

        alertMessage.addClass('alert-' + type).addClass('alert');
        alertMessage.html(message);

        return alertMessage.prop("outerHTML");
    }

    return {state, load, getBaseUrl, setTopMessage, replaceIcons, convertMessageToAlert};
})();