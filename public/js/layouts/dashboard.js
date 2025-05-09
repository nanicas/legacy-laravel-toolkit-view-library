var DASHBOARD = (function () {

    var state = {};
    var callbacks = {};

    function behaviorOnSubmitNoForm(clicked, data, callback, personalizedConfig) {

        if (typeof (personalizedConfig) == 'undefined') {
            personalizedConfig = {}
        }

        var config = {
            ...{
                isModal: true
            }, personalizedConfig
        };

        HELPER.behaviorOnSubmitNoForm(clicked, data, function (serverResponse) {
            if (config.isModal) {
                state.fastResultBox.html(serverResponse.response.message);
            }

            callback(serverResponse);
        });
    }

    function saveModal(form, e, callback, hideModalOnTrue) {

        HELPER.behaviorOnSubmit(e, form, function (data) {

            var resultBox = state.fastResultBox
            hasResultBox = (resultBox.length > 0);

            if (data.status == true) {
                if (hideModalOnTrue === true || typeof (hideModalOnTrue) == 'undefined') {
                    DASHBOARD.hideModal();
                    DASHBOARD.setTopMessage(data.response.message);
                } else {
                    if (hasResultBox) {
                        resultBox.html(data.response.message);
                    }
                }
            } else {
                if (hasResultBox) {
                    resultBox.html(data.response.message);
                }
            }

            if (typeof callback == 'function') {
                callback(data.status, data);
            }
        });
    }

    function setFastResultModal(data) {
        state.fastResultBox.html(data);
    }

    function setModalTitle(title) {
        state.fastTitleModal.html(title);
    }

    function hideModal() {
        state.fastModalBootstrap.hide();
    }

    function showModal() {
        state.fastModalBootstrap.show();
    }

    function removeSaveButtonInModal() {
        state.fastFooterModal.find('.save').remove();
    }

    function fillModal(content) {
        state.fastBodyModal.html(content);
    }

    function addStaticBackdropOnModal() {
        state.fastModalBootstrap._config.backdrop = 'static';
        state.fastModalBootstrap._config.keyboard = false;
    }

    function setSizeModal(newSize) {
        const prefix = 'modal-';
        const sizes = ['sm', 'lg', 'xl'];
        const element = state.fastModal.find('.modal-dialog');

        sizes.forEach(size => {
            element.removeClass(prefix + size);
        });

        if (newSize) {
            element.addClass(prefix + newSize);
        }
    }

    function loadModal(url, callback) {
        state.fastBodyModal.html('Aguarde um momento, por gentileza ...');
        showModal();

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'JSON',
            error: function () {
                state.fastBodyModal.html(APP.convertMessageToAlert('Ocorreu um problema durante o processamento dessa ação, tente novamente', 'danger'));
                callback(false);
            },
            success: function (data) {
                if (!data.status) {
                    fillModal(data.response.message);
                } else {
                    fillModal(data.response.html);
                }

                callback(data.status, data.response);
            }
        });
    }

    function load() {

        APP.load();
        // APP.replaceIcons();

        state.navbarHeader = $('#navbar-header');
        state.fastModal = $('#fast-modal');
        state.fastModalBootstrap = new bootstrap.Modal(state.fastModal.get(0));
        state.fastTitleModal = $('.modal-title', state.fastModal);
        state.fastBodyModal = $('.modal-body', state.fastModal);
        state.fastFooterModal = $('.modal-footer', state.fastModal);
        state.fastResultBox = $('#fast-result-box', state.fastModal);
        state.menu = $('#menu-box ul');
        state.topMessageElement = $('#top-dashboard-message');
        state.bottomMessageElement = $('#bottom-dashboard-message');
        state.changeScopeForm = $('form#change-scope');
        state.reloadPageElement = $('.reload-page');

        state.reloadPageElement.click(function (e) {
            e.preventDefault();

            let clicked = $(this);
            if (clicked.hasClass('ladda-button')) {
                var ladda = Ladda.create(clicked.get(0));
                ladda.start();
            }

            window.location.reload();
        });

        state.changeScopeForm.submit(function (e) {
            HELPER.behaviorOnSubmit(e, $(this), function (data) {
                APP.setTopMessage(data.response.message);

                if (data.status == true) {
                    window.location.reload();
                }
            });
        });

        state.fastModal.on('show.bs.modal', event => {
            state.fastResultBox.html('');
        });

        state.fastModal.on('hidden.bs.modal', event => {
            setSizeModal();
            setModalTitle('');
        })

        window.addEventListener('resize', event => {
            if (window.innerWidth <= 768) {
                state.menu.addClass('list-group-horizontal');
            } else {
                state.menu.removeClass('list-group-horizontal');
            }

            if (typeof DASHBOARD.callbacks.resize == 'function') {
                DASHBOARD.callbacks.resize(window.innerWidth);
            }
        });

        let resizeEvent = new Event('resize');
        window.dispatchEvent(resizeEvent);

        onSearch();
    }

    function beforeSetMessage(element) {
        if (element.hasClass('none')) {
            element.removeClass('none');
        }
        if (!element.is(':visible')) {
            element.show();
        }
    }

    function afterSetMessage(element, config) {
        if (config.withFadeOut) {
            element.fadeOut(5000);
        }
    }

    function setTopMessage(message, config) {
        beforeSetMessage(state.topMessageElement);

        state.topMessageElement.html(message);

        afterSetMessage(
            state.topMessageElement,
            (typeof config != 'object') ? {} : config
        );
    }

    function setBottomMessage(message, config) {
        beforeSetMessage(state.bottomMessageElement);

        state.bottomMessageElement.html(message);

        afterSetMessage(
            state.bottomMessageElement,
            (typeof config != 'object') ? {} : config
        );
    }

    function onSearch() {
        const searchInput = $('#search-input', state.navbarHeader);
        const searchButton = $('#search-button', state.navbarHeader);
        const searchDropdown = $('#search-dropdown', state.navbarHeader);
        const resultsDropdown = $('#search-dropdown-menu', state.navbarHeader);

        if (!searchInput.length) {
            return;
        }

        var dropdown = new bootstrap.Dropdown(searchDropdown.get(0));

        searchButton.on('click', function () {

            const query = searchInput.val().trim();
            if (!query) return;

            resultsDropdown.empty();
            dropdown.show();
            resultsDropdown.append('<li><span class="dropdown-item text-muted">Buscando dados ...</span></li>');

            $.ajax({
                url: searchButton.data('route'),
                type: 'GET',
                dataType: 'JSON',
                data: {
                    query: query
                },
                success: function (data) {
                    resultsDropdown.empty();

                    if (!data.status) {
                        resultsDropdown.append('<li><span class="dropdown-item text-danger">' + data.response.message + '</span></li>');
                    } else {
                        if (data.response.result && data.response.result.length > 0) {
                            data.response.result.forEach(row => {
                                if (typeof DASHBOARD.callbacks.eachSearchItem == 'function') {
                                    DASHBOARD.callbacks.eachSearchItem(row, resultsDropdown);
                                } else {
                                    resultsDropdown.append(`
                                        <li>
                                            <a class="dropdown-item" href="${row.url}">
                                                <div>${row.name}</div>
                                            </a>
                                        </li>`);
                                }
                            });
                        } else {
                            resultsDropdown.append('<li><span class="dropdown-item text-danger">Nenhum resultado encontrado</span></li>');
                        }
                    }
                },
                error: function () {
                    resultsDropdown.empty();
                    resultsDropdown.append('<li><span class="dropdown-item text-danger">Ocorreu um erro ao buscar os dados</span></li>');
                },
            })
        });

        $('#clear-search-button', state.navbarHeader).on('click', function () {
            searchInput.val('');
            resultsDropdown.empty();
            dropdown.hide();
        });

        $(document).on('click', function (e) {
            if (!$(e.target).closest('#navbar-header').length) {
                dropdown.hide();
            }
        });
    }

    return {
        state,
        load,
        setTopMessage,
        setFastResultModal,
        setBottomMessage,
        setSizeModal,
        setModalTitle,
        loadModal,
        hideModal,
        saveModal,
        showModal,
        fillModal,
        callbacks,
        addStaticBackdropOnModal,
        removeSaveButtonInModal,
        behaviorOnSubmitNoForm,
    };
})();