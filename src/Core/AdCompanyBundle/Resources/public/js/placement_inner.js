$(function () {

    $(document).off('click', '.collection-add');
    $(document).on('click', '.delete', function () {
        var res = confirm('Вы действительно хотите удалить это размещение из системы?');
        if (res) {
            window.location.href = url_placement_delete;
        }
    });

    $(document).on('hidden.bs.modal', '#responsive', function (e) {
        if ($('#placement-modal-content .row').html()) {
            $('#placement-modal-content').modal('show')
        } else if ($('#modal-top-placement #placement-modal').length) {
            $('#modal-top-placement #placement-modal').modal('show');
        }
    });

    $(document).on('show.bs.modal', '#responsive', function (e) {
        $('#modal-top-placement #placement-modal, #placement-modal-content').modal('hide');
    });


    // Date range
    $(document).on('load', '.start-date input', function () {
        $(this).datepicker({
            dateFormat: 'dd-mm-yy',
            prevText: '<i class="fa fa-angle-left"></i>',
            nextText: '<i class="fa fa-angle-right"></i>',
            onSelect: function (selectedDate) {
                $('.end-date input').datepicker('option', 'minDate', selectedDate);
            }
        })
    });

    $(document).on('load', '.end-date input', function () {
        $(this).datepicker({
            dateFormat: 'dd-mm-yy',
            prevText: '<i class="fa fa-angle-left"></i>',
            nextText: '<i class="fa fa-angle-right"></i>',
            onSelect: function (selectedDate) {
                $('.start-date input').datepicker('option', 'maxDate', selectedDate);
            }
        });
    });


    $(document).on('change', '.dateSettingsStart', function () {
        var value = $(this).val();
        if (value == 1) {
            $('.start-date').show();
            $('.start-date input').val('').focus();
            $('.start-date input').attr('required', 'required');
            $('.dateSettingsStartLabel').html('');
        }
        else {
            $('.start-date').hide();
            $('.start-date input').val('');
            $('.start-date input').removeAttr('required');
            $('.dateSettingsStartLabel').html('Дата начала показов');
        }
    });


    $(document).on('change', '.dateSettingsFinish', function () {
        var value = $(this).val();

        if (value == 1) {
            $('.end-date').show();
            $('.end-date input').val('').focus();
            $('.end-date input').attr('required', 'required');
            $('.dateSettingsFinishLabel').html('');
        }
        else {
            $('.end-date').hide();
            $('.end-date input').val('');
            $('.end-date input').removeAttr('required');
            $('.dateSettingsFinishLabel').html('Дата окончания показов');
        }
    });

    $(document).off('click', '.entity-desc');
    // редактирование банера
    $(document).on('click', '.entity-desc', function () {
        var $this = $(this),
            modalPlacement = $('#modal-inner-placement').length ? $('#modal-inner-placement') : $('#modal-placement'),
            curId = $this.attr('data-id');
        modalPlacement.find('#responsive').remove();
        modalPlacement.html('');
        $.ajax({
            type: 'POST',
            url: url_edit_ajax,
            data: 'id=' + curId,
            success: function (data) {
                if (data.result) {
                    modalPlacement.html(data.data);
                    $('#responsive').modal('show');
                }
            },
            error: function () {
                console.log('error');
            }
        });

        return false;
    });

    // get ad-place creation template
    $(document).on('click', '.ad-place-creation', function () {
        var $this = $(this),
            curSite = $('#placement-modal-content select[id$="_site"]'),
            innerModal = $('#modal-inner-placement'),
            placement = $('#modal-top-placement');
        if (!curSite.val()) {
            alert('Необходимо выбрать или добавить площадку.');
            return false;
        }
        $.ajax({
            url: $this.attr('href'),
            method: 'GET',
            data: 'siteId=' + curSite.val(),
            success: function (data) {
                if (data.result) {
                    innerModal.html($(data.data));
                    $('#adplace-modal', innerModal).modal('show');
                }
            }
        });
        return false;
    });

    // adplaces for site
    $(document).on('change', '#placement-modal-content select[id$="_site"]', function () {
        var $this = $(this);
        if (!$this.val()) {
            return false;
        }
        refreshPlacementsBySite($this.val());
    });


    //обновляем список рекламных мест
    function refreshPlacementsBySite(siteId) {
        var adPlacesContainer = $('#placement-modal-content select[id$="_adPlace"]'),
        curOption = '<option value="">Необходимо выбрать или добавить</option>'

        $.ajax({
            url: url_site_adplaces,
            method: 'POST',
            data: 'siteId=' + siteId,
            success: function (data) {
                for (var key in data) {
                    curOption += '<option value="' + data[key].id + '">' + data[key].name + '</option>'
                }

                adPlacesContainer.html(curOption);
            }
        })
    }

    // get site creation template
    $(document).on('click', '.site-creation', function () {
        var $this = $(this),
            innerModal = $('#modal-inner-placement'),
            placement = $('#modal-top-placement');
        $.ajax({
            url: $this.attr('href'),
            method: 'GET',
            success: function (data) {
                if (data.result) {
                    innerModal.html(data.data);
                    $('#site-modal').modal('show');
                }
            }
        });
        return false;
    });

    $(document).on('show.bs.modal', '#site-modal, #adplace-modal', function () {
        $('#placement-modal-content').modal('hide');
    });

    $(document).on('hidden.bs.modal', '#site-modal, #adplace-modal', function () {
        if (!$('#banner-modal:visible').length) {
            $('#placement-modal-content').modal('show');
        }
    });

    // work with tabs
    $(document).on('shown.bs.tab', 'a[data-toggle="tab"]', function (e) {
        var $this = $(e.target),
            $prev = $(e.relatedTarget),
            parent = $this.parents('.tabs'),
            modalBlock = parent.next('.tab-content');
//            console.log(parent);
//            console.log(modalBlock);
//            console.log(modalBlock.find('.' + $this.attr('data-target')));
        modalBlock.find('.' + $this.attr('data-target')).addClass('active').addClass('in');
        modalBlock.find('.' + $prev.attr('data-target')).removeClass('active').removeClass('in');
    });

    $(document).on('click', '.collection-add', function (e) {

        var $this = $(this),
            modalPlacement = $('#modal-inner-placement').length ? $('#modal-inner-placement') : $('#modal-placement');
        modalPlacement.find('#responsive').remove();
        modalPlacement.html('');
        $.ajax({
            type: 'POST',
            url: $this.attr('href'),
            success: function (data) {
                if (data.result) {
                    modalPlacement.html(data.data);
                    $('#responsive').modal('show');
                }
            },
            error: function () {
                console.log('error');
            }
        });

        return false;
    });

    // удаление коллекции
    $(document).on('click', '.collection-row-remove', function (e) {
        var $this = $(this),
            curRow = $this.parents('.collection-row');

        curRow.remove();
        return false;
    });

});


function clickErrorTab() {
    if ($('.state-error').length) {
        var tab = null;
        $('.state-error').each(function(index, element){
            if (!tab) {
                var linksHolder = $(this).parents('.tab-content').prev('.tabs');
                tab = $(this).parents('.tab-pane');
                $('[data-target="'+tab.attr('aria-labelledby').replace('-tab', '')+'"]').click();
            }
        });
    }
}
//function manipulateCollection(collectionCount) {
//    /*
//     // добавление коллекции
//     $('.collection-add').click(function(e) {
//     e.preventDefault();
//     var $this = $(this),
//     parentWrapper = $this.parents('.collection-wrapper'),
//     newWidget = $this.attr('data-prototype');
//     newWidget = newWidget.replace(/__name__/g, collectionCount);
//     parentWrapper.append(newWidget)
//
//     return false;
//     });
//     */
//
//
//}
