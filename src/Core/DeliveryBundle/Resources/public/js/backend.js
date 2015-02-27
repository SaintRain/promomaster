"use strict";
(function($){
    $(function(){

        // подгрузка AJAX внутренних сис-х имен
       $("select[id$='company']").on('change',function(e){
            var $this = $(this),
                isEnabled = false,
                codesSelect = $("select[id$='internalCode']"),
                options = '<option value="">Необходимо выбрать</option>';
            codesSelect.html('<option value="0"><b>Загрузка...</b></option>');
            codesSelect.prop('disabled',!isEnabled);
            codesSelect.select2({
                           enable: isEnabled,
                            val: 0
                        });
            setStatusShipmentTypes(null, null, this);
            $.ajax({
                url: adminRoutes['delivery_bundle_internal_codes'],
                type: 'POST',
                data: 'id=' + e.val,
                success: function(data) {
                    if (data.result) {
                        for(var key in data.codes) {
                            options += '<option value="' + key + '">' + data.codes[key] + '</option>';
                        }
                        isEnabled = (data.codes.length === 0) ? false : true;
                    }
                    codesSelect.prop('disabled',!isEnabled);
                    codesSelect.prop('required', isEnabled);
                    codesSelect.html(options);
                    codesSelect.select2({
                        enable: isEnabled,
                        val: ''
                    });

               },
               error: function(data) {
                   codesSelect.html('<option value=""><b>Произошла ошибка</b></option>');
                   codesSelect.select2({
                       val: ''
                   })
               }
           })
       });

        // автопростановка склад дверь
        // если у компании это жестко прошито
        $("select[id$='internalCode']").on('change', function(e) {
            var $this = $(this),
                types = $("option:selected", $this).html(),
                from = $("select[id$='deliveryFrom']"),
                to = $("select[id$='deliveryTo']"),
                isReadOnly = false,
                valuesFrom = {},
                valuesTo = {},
                replaceArr = [from.val(),to.val()];
            var expr = new RegExp('склад|дверь','igm');
            types = types.match(expr);

            if(types) {
                // значения совпадаю со значениями в селектах
                for(var i = 0, typesLen = types.length; i < typesLen; i++) {
                    if ('склад' == types[i]) {
                        replaceArr[i] = 0;
                    } else {
                        replaceArr[i] = 1;
                    }
                }
                isReadOnly = true;
            }
            valuesFrom = {
                val: replaceArr[0],
                readonly: isReadOnly
            }
            valuesTo = {
                val: replaceArr[1],
                readonly: isReadOnly
            }

            setStatusShipmentTypes(from, valuesFrom, null);
            setStatusShipmentTypes(to, valuesTo, null);
        });

        /**
         *
         * @param {object} element
         * @param {object} values
         * @param {object} curElement
         * @returns {boolean}
         */
        var setStatusShipmentTypes = function(element, values, curElement) {
            if (element && values) {
                element.val(values.val);
                element.prop('readonly', values.readonly);
                element.select2(values);
            } else {
                var companyName = (curElement) ? $('option:selected', curElement).attr('data-companyname') : $("select[id$='company'] option:selected").attr('data-companyname');
                $("select[id$='deliveryFrom'], select[id$='deliveryTo']").each(function(index, element){
                    var $this = $(element);
                    if (companyName == 'cdek') {
                        $this.prop('readonly',true);
                        $this.select2({
                            readonly: true
                        });
                    } else {
                        if (curElement) {
                            $this.val(0)
                        }
                        $this.prop('readonly',false);
                        $this.select2({
                            readonly: false,
                            val: (curElement) ? 0 : $this.val()
                        });
                    }

                });
            }

        }
        setStatusShipmentTypes(null, null, null);

    });
})(jQuery)