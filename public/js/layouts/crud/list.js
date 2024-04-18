var LIST_CRUD = (function () {

    var state = {};

    function load() {

        state.datatable = null;
        state.crudListBox = $('#crud-list');
        state.table = $('table', state.crudListBox);

        state.table.on('submit', '.delete-form', function (e) {
            var tr = $(this).parents('tr');

            HELPER.behaviorOnSubmit(e, $(this), function (data) {
                DASHBOARD.setTopMessage(data.response.message, {
                    withFadeOut: true
                });

                if (!data.status) {
                    return;
                }

                if (!state.datatable) {
                    return;
                }

                state.datatable
                        .row(tr)
                        .remove()
                        .draw();
            });
        });
    }

    function initTable(config) {

        if (typeof (config.table) == 'undefined') {
            config.table = state.table;
        }
        if (typeof (config.ajax) == 'undefined') {
            config.ajax = state.table.data('route');
        }

        $.fn.dataTable.ext.errMode = 'none';

        state.datatable = state.table.DataTable({
            order: [[0, 'desc']],
            processing: true,
            paging: true,
            serverSide: true,
            searchDelay: 1500,
            ajax: config.ajax,
            language: languagePTDatatable,
            columns: config.columns,
            drawCallback: function (settings) {
                APP.replaceIcons();
            }
        }).on('error.dt', function (e, settings, techNote, message) {
            console.log('An error has been reported by DataTables: ', {e, settings, techNote, message});

            message = APP.convertMessageToAlert(
                'Ocorreu um problema durante a renderização da tabela, tente recarregar a página.',
                'danger'
            );

            DASHBOARD.setTopMessage(message);
        });
    }

    return {load, initTable, state};
})();