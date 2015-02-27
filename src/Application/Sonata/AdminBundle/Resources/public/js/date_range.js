// обработчик datepicker
(function($){
    $(function(){
        $('.date-range').click(function(){
            var $this = $(this),
                parentBlock = $(this).parents('div.date-range-wrapper'),
                dateFromField = $('input[name*="from"]', parentBlock),
                dateToField = $('input[name*="to"]', parentBlock),
                dateFrom = $this.attr('data-from'),
                dateTo = $this.attr('data-to'),
                minDateTo;
            dateFromField.val(dateFrom);
            dateToField.val(dateTo);
            minDateTo = dateFrom.split('.').reverse();
            minDateTo = new Date(minDateTo.join('/'));
            dates.filter(dateToField).datepicker("option", 'minDate', minDateTo);
        });

        var dates = $('.datepicker-with-range').datepicker({
                    minDate: new Date(2008, 11, 1),
                    maxDate: "+0D",
                    dateFormat: "dd.mm.yy",
                    changeMonth: true,
                    changeYear: true,
                    onClose: function (selectedDate)
                    {
                        var $this = $(this),
                            instance = $this.data("datepicker"),
                            dateToField = $this.parents('.date-range-wrapper').find('input[name*="to"]'),
                            date = $.datepicker.parseDate(
                                instance.settings.dateFormat ||
                                $.datepicker._defaults.dateFormat,
                                selectedDate, instance.settings);
                        if ($this.is('input[name*="from"]'))
                        {
                            dates.filter(dateToField).datepicker("option", 'minDate', date);
                        }
                    }
                });
    });
})(jQuery)