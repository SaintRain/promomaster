function initCalendarFromTo(startDateTime, finishDateTime) {
    $("#datepicker").datepicker();

    // Date range
    $(startDateTime).datepicker({
        dateFormat: 'dd-mm-yy',
        prevText: '<i class="fa fa-angle-left"></i>',
        nextText: '<i class="fa fa-angle-right"></i>',
        onSelect: function (selectedDate) {
            $(finishDateTime).datepicker('option', 'minDate', selectedDate);
        }
    });
    $(finishDateTime).datepicker({
        dateFormat: 'dd-mm-yy',
        prevText: '<i class="fa fa-angle-left"></i>',
        nextText: '<i class="fa fa-angle-right"></i>',
        onSelect: function (selectedDate) {
            $(startDateTime).datepicker('option', 'maxDate', selectedDate);
        }
    });


    $('.dateSettingsStart').change(function () {
        var value = $('.dateSettingsStart:checked').val();
        if (value == 1) {
            $(startDateTime).parents('div.col-sm-6').show();
            $(startDateTime).val('').focus();
            $(startDateTime).attr('required', 'required');
            $('.dateSettingsStartLabel').html('');
        }
        else {
            $(startDateTime).parents('div.col-sm-6').hide();
            $(startDateTime).val('');
            $(startDateTime).removeAttr('required');
            $('.dateSettingsStartLabel').html('Дата начала показов');
        }
    });


    $('.dateSettingsFinish').change(function () {
        var value = $('.dateSettingsFinish:checked').val();
        if (value == 1) {
            $(finishDateTime).parents('div.col-sm-6').show();
            $(finishDateTime).val('').focus();
            $(finishDateTime).attr('required', 'required');
            $('.dateSettingsFinishLabel').html('');
        }
        else {
            $(finishDateTime).parents('div.col-sm-6').hide();
            $(finishDateTime).val('');
            $(finishDateTime).removeAttr('required');
            $('.dateSettingsFinishLabel').html('Дата окончания показов');
        }
    });
}
