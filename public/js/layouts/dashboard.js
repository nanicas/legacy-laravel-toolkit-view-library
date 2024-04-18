var DASHBOARD = (function () {

    var state = {};
    var callbacks = {};

    function behaviorOnSubmitNoForm(clicked, data, callback, personalizedConfig) {

        if (typeof (personalizedConfig) == 'undefined') {
            personalizedConfig = {}
        }

        var config = {...{
                    isModal: true
            }, personalizedConfig};

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
        APP.replaceIcons();

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

        state.changeScopeForm.submit(function (e) {
            HELPER.behaviorOnSubmit(e, $(this), function (data) {
                APP.setTopMessage(data.response.message);

                if (data.status == true) {
                    window.location.reload();
                }
            });
        });

//        state.fastModal.on('show.bs.modal', function () {
//            alert('hixx');
//        })

        var pureFastModal = document.getElementById('fast-modal');
        pureFastModal.addEventListener('show.bs.modal', function (event) {
            state.fastResultBox.html('');
        });

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

    return {
        state,
        load,
        setTopMessage,
        setBottomMessage,
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