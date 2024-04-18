var CRUD_FORM = (function () {

    var state = {};

    function behaviorOnSubmitFinish(data) {
        if (data.status == true) {
            return window.location.href = data.response.url_redir;
        }

        var hasPropertyWrapped = data.response.hasOwnProperty('wrapped');
        
        if (!hasPropertyWrapped || data.response.wrapped == true) {
            DASHBOARD.setTopMessage(data.response.message);
        } else {
            DASHBOARD.setTopMessage(
                APP.convertMessageToAlert(data.response.message, 'danger')
            );
        }
        
        //state.formResultBox.html(data.response.message);
    }

    function load() {

        DASHBOARD.load();

        state.crudForm = $('#crud-form');
        //state.formResultBox = $('#form-result-box');
        state.id = $('input[type="hidden"][name="id"]');
        state.isUpdate = (state.id.length > 0);

        state.crudForm.submit(function (e) {
            HELPER.behaviorOnSubmit(e, $(this), function (data) {
                behaviorOnSubmitFinish(data);
            });
        });
    }

    return {load, state, behaviorOnSubmitFinish};
})();