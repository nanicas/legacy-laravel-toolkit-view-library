const HELPER_TIMEZONE_JS = (function () {

    let state = {
        timezone: null,
        timezoneInputs: null,
    };

    function load() {
        state.timezoneInputs = document.querySelectorAll('input[name="timezone"]');
        defineTimezone(state.timezoneInputs);
    }

    function defineTimezone(inputs) {
        // const timezone = Intl.DateTimeFormat().resolvedOptions().timeZone;
        const defaultTimezone = 'America/Sao_Paulo';
        const momentTimezone = moment.tz.guess(true);

        if (!(typeof momentTimezone == 'string' && momentTimezone.length > 0)) {
            momentTimezone = defaultTimezone;
        }

        for (let i = 0; i < inputs.length; i++) {
            const input = inputs[i];
            input.value = momentTimezone;
        }

        state.timezone = momentTimezone;
    }

    return {
        state,
        load,
    }
})();