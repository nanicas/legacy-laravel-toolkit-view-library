var INDEX_CRUD = (function () {

    var state = {};

    function load() {

        if (typeof DASHBOARD_BUSINESS !== 'undefined') {
            DASHBOARD_BUSINESS.load();
        } else {
            DASHBOARD.load();
        }
    }

    return { load };
})();