var LIST_CRUD = (function () {

    var state = {};

    function load() {
        state.datatable = {};
        state.crudListBox = $('#crud-list');
    }

    function initTable(config) {
        if (typeof (config.name) == 'undefined') {
            config.name = 'main';
        }
        if (typeof (config.table) == 'undefined') {
            config.table = $('table[data-name="' + config.name + '"]', state.crudListBox);
        }
        if (typeof (config.ajax) == 'undefined') {
            config.ajax = {
                url: config.table.data('route'),
            };
        }

        $.fn.dataTable.ext.errMode = 'none';

        state.datatable[config.name] = config.table.DataTable({
            order: [[0, 'desc']],
            processing: true,
            searching: (typeof (config.searching) == 'undefined') ? true : config.searching,
            paging: true,
            serverSide: true,
            searchDelay: 1500,
            ajax: config.ajax,
            language: languagePTDatatable,
            columns: config.columns,
            drawCallback: function (settings) {
                // APP.replaceIcons();
            }
        }).on('error.dt', function (e, settings, techNote, message) {
            console.log('An error has been reported by DataTables: ', { e, settings, techNote, message });

            message = APP.convertMessageToAlert(
                'Ocorreu um problema durante a renderização da tabela, tente recarregar a página.',
                'danger'
            );

            DASHBOARD.setTopMessage(message);
        });

        config.table.on('submit', '.delete-form', function (e) {
            var self = $(this);
            var tr = self.parents('tr');
            var table = self.parents('table');

            HELPER.behaviorOnSubmit(e, self, function (data) {
                DASHBOARD.setTopMessage(data.response.message, {
                    withFadeOut: true
                });

                if (!data.status) {
                    return;
                }

                const name = table.data('name');
                if (!state.datatable[name]) {
                    return;
                }

                state.datatable[name]
                    .row(tr)
                    .remove()
                    .draw();
            });
        });
    }

    return { load, initTable, state };
})();