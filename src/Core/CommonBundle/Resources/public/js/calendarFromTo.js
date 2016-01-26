function initCalendarFromTo(startDateTime, finishDateTime) {

  //  $("#datepicker").datepicker();

    // Date range
    $('.' + startDateTime).datepicker({
        dateFormat: 'dd-mm-yy',
        prevText: '<i class="fa fa-angle-left"></i>',
        nextText: '<i class="fa fa-angle-right"></i>',
        onSelect: function (selectedDate) {
            $('.' + finishDateTime).datepicker('option', 'minDate', selectedDate);
        }
    });
    $('.' + finishDateTime).datepicker({
        dateFormat: 'dd-mm-yy',
        prevText: '<i class="fa fa-angle-left"></i>',
        nextText: '<i class="fa fa-angle-right"></i>',
        onSelect: function (selectedDate) {
            $('.' + startDateTime).datepicker('option', 'maxDate', selectedDate);
        }
    });


    $(document).on('change', '.' + startDateTime + 'Start', function () {

        var value = $('.' + startDateTime + 'Start:checked').val();   //два варианта по в разных ситуациях

        //var value = $('.' + startDateTime + 'Start[checked="checked"]').val();

        if (parseInt(value) == 1) {
            $('.' + startDateTime).parents('div.col-sm-6').show();
            $('.' + startDateTime).val('').focus();
            $('.' + startDateTime).attr('required', 'required');
            $('.' + startDateTime + 'StartLabel').html('');
        }
        else {
            $('.' + startDateTime).parents('div.col-sm-6').hide();
            $('.' + startDateTime).val('');
            $('.' + startDateTime).removeAttr('required');
            $('.' + startDateTime + 'StartLabel').html('Дата начала показов');
        }
    });


    $(document).on('change', '.' + finishDateTime + 'Finish', function () {
        var value = $('.' + finishDateTime + 'Finish:checked').val();
        //var value = $('.' + finishDateTime + 'Finish[checked="checked"]').val();
        console.log('end='+value);

        if (parseInt(value) == 1) {
            $('.' + finishDateTime).parents('div.col-sm-6').show();
            $('.' + finishDateTime).val('').focus();
            $('.' + finishDateTime).attr('required', 'required');
            $('.' + finishDateTime + 'FinishLabel').html('');
        }
        else {
            $('.' + finishDateTime).parents('div.col-sm-6').hide();
            $('.' + finishDateTime).val('');
            $('.' + finishDateTime).removeAttr('required');
            $('.' + finishDateTime + 'FinishLabel').html('Дата окончания показов');
        }
    });
}
