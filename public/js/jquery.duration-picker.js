(function ($) {

    const langs = {
        en: {
            day: 'day',
            hour: 'hour',
            minute: 'minute',
            second: 'second',
            days: 'days',
            hours: 'hours',
            minutes: 'minutes',
            seconds: 'seconds'
        }
    };

    $.fn.durationPicker = function (options) {

        const defaults = {
            lang: 'en',
            formatter: s => s,
            showSeconds: false
        };
        const settings = $.extend( {}, defaults, options );

        this.each((i, mainInput) => {

            mainInput = $(mainInput);

            if (mainInput.data('bdp') === '1')
                return;

            function buildDisplayBlock(id, hidden) {
                return `<div class="bdp-block ${hidden ? 'hidden' : ''}">
                            <a id="bdp-link-${id}" href="" tabindex="-1"><span id="bdp-${id}"></span></a><br>
                            <span class="bdp-label" id="bdp-${id}-label"></span>
                        </div>`;
            }

            const mainInputReplacer = $('<div class="bdp-input">' +
                buildDisplayBlock('days') +
                buildDisplayBlock('hours') +
                buildDisplayBlock('minutes') +
                buildDisplayBlock('seconds', !settings.showSeconds) +
            '</div>');

            mainInput.after(mainInputReplacer).hide().data('bdp', '1');

            let days = 0,
                hours = 0,
                minutes = 0,
                seconds = 0;

            const inputs = [];

            let disabled = false;
            if (mainInput.hasClass('disabled') || mainInput.attr('disabled') === 'disabled') {
                disabled = true;
                mainInputReplacer.addClass('disabled');
            }

            mainInputReplacer.on("click", ".bdp-block", function(e) {
                $(this).find("a").select().focus();
            });

            mainInputReplacer.on("click", "#bdp-link-days, #bdp-link-hours, #bdp-link-minutes, #bdp-link-seconds", function(e) {
                e.preventDefault();
            });

            mainInputReplacer.on("update", "#bdp-link-days, #bdp-link-hours, #bdp-link-minutes, #bdp-link-seconds", function(e, math) {
                switch (e.currentTarget.id) {
                    case "bdp-link-days":
                        days = math(days);
                        break;
                    case "bdp-link-hours":
                        hours = math(hours);
                        break;
                    case "bdp-link-minutes":
                        minutes = math(minutes);
                        break;
                    case "bdp-link-seconds":
                        seconds = math(seconds);
                        break;
                }

                updateMainInput();
                updateMainInputReplacer();
            });

            mainInputReplacer.on("keydown", "#bdp-link-days, #bdp-link-hours, #bdp-link-minutes, #bdp-link-seconds", function(e) {
                // console.log(e)
                if (e.key == "ArrowUp") {
                    $(e.currentTarget).trigger("update", function(value) { return value + 1 });
                } else if (e.key == "ArrowDown") {
                    $(e.currentTarget).trigger("update", function(value) { return value - 1 });
                }
            });

            function updateMainInput() {
                const total = seconds + minutes * 60 + hours * 60 * 60 + days * 24 * 60 * 60;
                mainInput.val(total);
                mainInput.change();
            }

            function updateWordLabel(selector, value, label) {
                const text = value === 1 ? label : `${label}s`;
                mainInputReplacer.find(selector).text(langs[settings.lang][text]);
            }

            function updateValueLabel(selector, value) {
                mainInputReplacer.find(selector).text(settings.formatter(value));
            }

            function updateMainInputReplacer() {
                updateValueLabel('#bdp-days', days);
                updateValueLabel('#bdp-hours', hours);
                updateValueLabel('#bdp-minutes', minutes);
                updateValueLabel('#bdp-seconds', seconds);

                updateWordLabel('#bdp-days-label', days, 'day');
                updateWordLabel('#bdp-hours-label', hours, 'hour');
                updateWordLabel('#bdp-minutes-label', minutes, 'minute');
                updateWordLabel('#bdp-seconds-label', seconds, 'second');
            }

            function updatePicker() {
                if (disabled)
                    return;
                inputs['days'].val(days);
                inputs['hours'].val(hours);
                inputs['minutes'].val(minutes);
                inputs['seconds'].val(seconds);
            }

            function init() {
                if (mainInput.val() === '')
                    mainInput.val(0);
                let total = parseInt(mainInput.val(), 10);
                seconds = total % 60;
                total = Math.floor(total/60);
                minutes = total % 60;
                total = Math.floor(total/60);
                hours = total % 24;
                days = Math.floor(total/24);
                updateMainInputReplacer();
                updatePicker();
            }

            function durationPickerChanged() {
                days =    parseInt(inputs['days'].val(), 10)    || 0;
                hours =   parseInt(inputs['hours'].val(), 10)   || 0;
                minutes = parseInt(inputs['minutes'].val(), 10) || 0;
                seconds = parseInt(inputs['seconds'].val(), 10) || 0;
                updateMainInput();
                updateMainInputReplacer();
            }

            function buildNumericInput(label, hidden, max) {
                const input = $('<input class="form-control input-sm" type="number" min="0" value="0">')
                    .change(durationPickerChanged);
                if (max) {
                    input.attr('max', max);
                }
                inputs[label] = input;
                const ctrl = $('<div> ' + langs[settings.lang][label] + '</div>');
                if (hidden) {
                    ctrl.addClass('hidden');
                }
                return ctrl.prepend(input);
            }

            if (!disabled) {
                const picker = $('<div class="bdp-popover"></div>');
                buildNumericInput('days', false).appendTo(picker);
                buildNumericInput('hours', false, 23).appendTo(picker);
                buildNumericInput('minutes', false, 59).appendTo(picker);
                buildNumericInput('seconds', !settings.showSeconds, 59).appendTo(picker);
                //
                // mainInputReplacer.popover({
                //     placement: 'bottom',
                //     trigger: 'click',
                //     html: true,
                //     content: picker
                // });
            }
            init();
            mainInput.change(init);
        });

    };

}(jQuery));
