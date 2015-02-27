(function(){
    $(function(){
        $('#cite-desc').click(function() {
            var citePerson = $('#cite-person'),
                citeContent = $('#cite-content'),
                msgBody = $('.msg-body:first'),
                cites = [],
                citeText;
            if (CKEDITOR && CKEDITOR.instances[msgBody.attr('id')]) {
                citeText = citePerson.text() + ' писал(а): <blockquote>' + citeContent.text() + '</blockquote><br />';
            } else {
                cites = citeContent.text().split(/(\r\n|\n\r|\r|\n)/g);
                
                for (var i = 0, len = cites.length; i < len; i++) {
                    if (!cites[i].match(/(\r\n|\n\r|\r|\n)/g)) {
                        cites[i] = cites[i].trim();
                        if (cites[i].length) {
                            cites[i] = '> ' + cites[i];
                        } else {
                            delete(cites[i]);
                        }

                    }
                }
                citeText = '> ' + citePerson.text().trim() + ' писал(а):\n\r' + cites.join('');
                
            }
            
            makeCite(citeText);
        });

        $('.display-form').click(function(){
            var troubleTicketForm = $('#trouble-ticket-form');
            troubleTicketForm.removeClass('hidden');
            $('html, body').animate({
                scrollTop: troubleTicketForm.offset().top
            }, 10);
        });

        $('.trouble-ticket-more-info').hide();
        $('.more-info-ctrl').click(function(){
            $('.trouble-ticket-more-info').toggle();
        });

        $('body').on('click','.ticket-cite',function(){
            var $this = $(this),
                parentBlock = $this.parents('.ticket-history.inner'),
                citePerson = $('.ticket-history-header-owner',parentBlock),
                citeContent = $('.ticket-msg-num',parentBlock),
                msgBody = $('.msg-body:first'),
                cites = [],
                citeText;
                
            if (CKEDITOR && CKEDITOR.instances[msgBody.attr('id')]) {
                citeText = citePerson.text() + ' писал(а): <blockquote>' + citeContent.text() + '</blockquote><br />';
            } else {
                cites = citeContent.text().split(/(\r\n|\n\r|\r|\n)/g);

                for (var i = 0, len = cites.length; i < len; i++) {
                    if (!cites[i].match(/(\r\n|\n\r|\r|\n)/g)) {
                        cites[i] = cites[i].trim();
                        if (cites[i].length) {
                            cites[i] = '> ' + cites[i];
                        } else {
                            delete(cites[i]);
                        }
                        
                    }
                }
                citeText = '> ' + citePerson.text().trim() + ' писал(а):\n\r' + cites.join('');

            }
            makeCite(citeText);
            
            return false;
        });

        $('body').on('click', '.ticket-msg-edit', function() {
            var $this = $(this),
                msgId = $this.attr('data-msg-num'),
                managerId = $this.attr('data-manager'),
                logId = $this.attr('data-log-num'),
                parent = $('.log-num-' + logId),
                msgBody = $('.ticket-msg-num',parent),
                msgForm = $('.trouble-ticket-msg-form',parent),
                troubleTicketId = $('.trouble-ticket-form #objectId').val(),
                formUrl = $this.attr('href');
            if ($this.hasClass('off')) {
                return false;
            }
            if (msgForm.length && !msgForm.is(':visible')) {
                msgForm.show();
                msgBody.hide();
            } else if(!msgForm.length) {
                $.ajax({
                    type: "GET",
                     url: formUrl,
                     success: function(data){
                         msgBody.hide();
                         msgBody.after(data);
                         if (!msgId) {
                             $('input[name*="troubleTicket"]',parent).val(troubleTicketId);
                             $('input[name*="manager"]',parent).val(managerId);
                             $('input[name*="log"]',parent).val(logId);
                         }
                         $this.removeClass('off');
                     },
                     error: function(data) {
                         console.log('error');
                     }
                 });
                 $this.addClass('off');
            }
            return false;
        });

        $('body').on('submit', '.trouble-ticket-msg-form', function(){
            var $this = $(this),
                curDate = $('input[name*="date"]',$this),
                modalWindow = $('.modal',$this),
                formParentBlock = $this.parent('.alone'),
                parentBlock = $this.parents('.ticket-history.inner'),
                mainParentBlock = $this.parents('[id*="log-pos"]'),
                msgBody = $('.ticket-msg-num',parentBlock),
                changeList = $('ul', parentBlock),
                ctrLink = $('.ticket-msg-edit',parentBlock),
                msgId = ctrLink.attr('data-msg-num'),
                citeLink = $('.ticket-cite',parentBlock),
                previewContent = $('textarea',$this),
                formUrl = $this.attr('action'),
                route;
            if (CKEDITOR && CKEDITOR.instances[previewContent.attr('id')]) {
                previewContent = CKEDITOR.instances[previewContent.attr('id')].getData();
            } else {
                previewContent = nl2br(previewContent.val());
            }
            if (previewContent) {
                $.ajax({
                    type: "POST",
                    url: formUrl,
                    data: $this.serialize(),
                    success: function(data){
                        modalWindow.modal('hide');
                        formParentBlock.remove();
                        msgBody.replaceWith('<article class="ticket-msg-num">' + previewContent + '</article>');
                        msgBody.show();
                        route = adminRoutes['admin_core_troubleticket_message_edit'];
                        ctrLink.attr('href',route.replace("PLACEHOLDER", data.objectId));
                        if (!msgId) {
                            ctrLink.attr('data-msg-num',data.objectId);
                            ctrLink.after('<a class="ticket-cite btn btn-default" href="#edit-msg"><i class="icon-bullhorn"></i></a>');
                        }
                    },
                    error: function(data) {
                        console.log('error');
                    }
                });
            } else if (msgId && !previewContent) {
                if (!changeList.length) {
                    formUrl = adminRoutes['admin_core_troubleticket_log_delete'];
                    formUrl = formUrl.replace("PLACEHOLDER", ctrLink.attr('data-log-num'));
                    $.ajax({
                        type: "POST",
                        url: formUrl,
                        data: '_method=DELETE&_sonata_csrf_token=' + adminRoutes['deleteToken'],
                        success: function(data) {
                            modalWindow.modal('hide');
                            mainParentBlock.remove();
                        },
                        error: function(data) {
                            console.log('error');
                        }
                    });
                } else {
                    formUrl = adminRoutes['admin_core_troubleticket_message_delete'];
                    formUrl = formUrl.replace("PLACEHOLDER", msgId);
                    $.ajax({
                        type: "POST",
                        url: formUrl,
                        data: '_method=DELETE&_sonata_csrf_token=' + adminRoutes['deleteToken'],
                        success: function(data) {
                            modalWindow.modal('hide');
                            formParentBlock.remove();
                            msgBody.replaceWith('<i class="ticket-msg-num"></i>');
                            ctrLink.attr('href',"{{path('admin_core_troubleticket_message_create')}}");
                            ctrLink.removeAttr('data-msg-num');
                            citeLink.remove();
                        },
                        error: function(data) {
                            console.log('error');
                        }
                    });
                }

            }

            return false;
        });

        // отменить
        $('body').on('click', '.decline-action', function(){
            var $this = $(this),
                parentForm = $this.parents('.trouble-ticket-msg-form'),
                parentMainBlock = $this.parents('.ticket-history.inner'),
                previewBlock = $('.preview-block',parentForm),
                msgBlock = $('.ticket-msg-num', parentMainBlock);
            /*
            if (previewBlock.length) {
                previewBlock.remove();
            }*/
            msgBlock.show();
            parentForm.hide();

            return false;
        });

        // предросмотр
        $('body').on('click', '.preview-action', function(){
            var $this = $(this),
                parentForm = ($this.parents('.trouble-ticket-msg-form').length) ? $this.parents('.trouble-ticket-msg-form') : $this.parents('.trouble-ticket-form'),
                previewBlock = $('.preview-block .modal-body', parentForm),
                modalBlock = $('.preview-block', parentForm),
                formActions = $('.preview-container',parentForm),
                previewContent = $('textarea.msg-body',parentForm);
                if (CKEDITOR && CKEDITOR.instances[previewContent.attr('id')]) {
                    previewContent = CKEDITOR.instances[previewContent.attr('id')].getData();
                } else {
                    previewContent = nl2br(previewContent.val());
                }
                if(!previewContent) {
                    return false;
                }
                if (previewBlock.length) {
                    previewBlock.html(previewContent);
                } else {
                    formActions.after(previewContent);
                }
                modalBlock.modal('show');
            return false;
        });

        var makeCite = function(content) {

            var troubleTicketForm = $('#trouble-ticket-form'),
                previewContent = $('.trouble-ticket-form .msg-body.main'),
                oldContent;

            troubleTicketForm.removeClass('hidden');

            if (CKEDITOR && CKEDITOR.instances[previewContent.attr('id')]) {
                    oldContent = CKEDITOR.instances[previewContent.attr('id')].getData();
                    CKEDITOR.instances[previewContent.attr('id')].setData(oldContent + content);
            } else {
                oldContent = previewContent.val()
                previewContent.val(oldContent + content);
            }


            $('html, body').animate({
                scrollTop: $(document).height()-$(window).height()
            }, 10);
        }

        // add watchers
        $('body').on('click','.watcher',function(){
            var $this = $(this);
            if ($this.hasClass('off')) {
                return false;
            }
            $.ajax({
                type: "POST",
                url: $this.attr('href'),
                success:function(data) {
                    if (data.result) {
                        //$this.attr('data-content',data.text);
                        //$this.attr('data-title',data.text);
                        $this.popover({
                            title: 'Обновления',
                            html: 'true',
                            placement: 'top',
                            content : data.text
                        });
                        $this.popover('show');
                        $this.removeClass('off');
                        setTimeout(function(){$this.popover('destroy');},2000);
                        $this.toggleClass('active');
                    }
                },
                error: function() {
                    console.log('error');
                }
            });
            $this.addClass('off');
            return false;

        });

        var mainFormVisibility = function () {
            if ($('.alert-error:visible').length || $('.alert-success:visible').length) {
                $('#trouble-ticket-form').removeClass('hidden');
            }
        }
        mainFormVisibility();

        $('body').on('click', '.trouble-remove-file', function(){
            if (confirm('Подтвердите удаление файла.')) {
                var $this = $(this),
                    parentBlock = $this.parents('ul'),
                    fieldName = $('.ajax-field').val(),
                    namespaceToAttach = $('.ajax-namespace_to_attach').val(),
                    elToRemove = $this.parents('.file-donwload'),
                    sameInTable,
                    formData;
                formData = 'data[id_to_attach]='+ parentBlock.attr('data-id') +'&data[fieldName]=' + fieldName + '&data[namespace_to_attach]=' + namespaceToAttach + '&id=' + $this.attr('data-id') + '&data[id_to_attach]=' + $('.ajax-id:first').val();
                sameInTable =  $('.remove-file[data-id="' + $this.attr('data-id') + '"]');
                $.ajax({
                    type: "POST",
                    url: core_file_ajax_remove_file,
                    data: formData,
                    success:function(data) {
                        elToRemove.remove();
                        removeRow(sameInTable);
                        popupResult($this, data, parentBlock, false);
                    },
                    error: function() {
                        console.log('error');
                    }
                });
            }
        });

        var removeRow = function(element) {
            mainContainer = element.closest('div.field-container');
            element.parent().parent('tr.main-row-collection').fadeOut(function() {
                $(this).remove();
                mainContainer.find('.image-table tbody tr.main-row-collection, .document-table tbody tr.main-row-collection').each(function(i) {
                    $(this).find('input').each(function() {
                        if (!$(this).hasClass('static')) {
                            if (this.id.match(/_\d+_/im)) {
                                this.id = this.id.replace(/_\d+_/im, '_' + i + '_');
                            }
                            if (this.name.match(/\[\d+\]/im)) {
                                this.name = this.name.replace(/\[\d+\]/im, '[' + i + ']');
                            }
                            if ($(this).hasClass('file-indexPosition')) {
                                this.value = i + 1;
                            }
                        }
                    });
                });
            });
        }

        $('body').on('click', '.popup-success .close', function(){
            var $this = $(this),
                parentBlock = $this.parents('.popup-success');
            parentBlock.fadeOut(function(){
                $(this).remove
            });
        });

        var popupResult = function(element, data, place, autoClose) {
           data = $.parseJSON(data);
           var popupWindow = $('<div class="popup-success alert alert-success"><button class="close" type="button">×</button><div class="content"></div></div>'),
               parentBlock = element.parents('ul'),
               popupSuccess = $('.popup-success');
           if (popupSuccess.length) {
               popupSuccess.remove();
           }
           place = (place) ? place : parentBlock;
           place.prepend(popupWindow);
           $('.content', popupWindow).html(data.success);
           if (autoClose) {
               setTimeout(function(){popupWindow.fadeOut(function(){$(this).remove})},2000);
           }
        }

        $('body').on('click','.predefinded-answers',function() {
            var $this = $(this),
                parentBlock = $this.parents('.control-group'),
                selectBlock = $('#edit-msg').find('.predefined-block'),
                categories;

            if (selectBlock.length) {
                selectBlock.toggle();
                return false;
            } else {
                $.ajax({
                    type: "POST",
                    url: $this.attr('href'),
                    success:function(data) {
                        categories = data;
                        getNested(categories);
                        options += '</select></div></div></div></div>';
                        $(options).insertAfter(parentBlock);
                        selectBlock = $('#edit-msg').find('.predefined-answers-select');
                        $('<label class="control-label">Категория Отв.</label>').insertBefore(selectBlock.parents('.control-group'));
                        selectBlock.select2({minimumResultsForSearch: '-1', containerCssClass:'span11'});
                    },
                    error: function() {
                        console.log('error happens');
                    }
                });
            }
            return false;
        });

        $('body').on('change', '.predefined-answers-select.categories', function(e) {
            var predefinedBlock = $('.predefined-block'),
                selectBlock = $('.articles').parents('.controls.span6'),
                options = '<div class="controls span6"><div class="control-group"><div class="controls"><select class="predefined-answers-select articles"><option value="">Необходимо выбрать</option>';

            if (selectBlock.length) {
                selectBlock.remove();
            }
            if (!e.val) {
                return false;
            }
            $.ajax({
                type: "POST",
                url: adminRoutes['admin_faq_articles_articles_by_category'],
                data: "id=" + e.val,
                success:function(data) {
                    if (data) {
                        for (var i = 0, curLength = data.length; i < curLength; i++) {
                            if (data[i].id) {
                                options += '<option value="' + data[i].id + '">' + data[i].captionRu + '</option>';
                            }
                        }
                    }
                    options += '</select></div></div></div>';
                    /*
                    if (selectBlock.length) {
                        selectBlock.remove();
                    }*/
                    predefinedBlock.append(options);
                    selectBlock = $('.articles');
                    $('<label class="control-label">Ответы</label>').insertBefore(selectBlock.parents('.control-group'));
                    selectBlock.select2({minimumResultsForSearch: '-1', containerCssClass:'span11'});

                },
                error: function() {
                    console.log('error happens');
                }
            });
        });

        $('body').on('change', '.predefined-answers-select.articles', function(e) {

            var previewContent = $('.trouble-ticket-form .msg-body.main'),
                $id = e.val;
            if ($id) {
                $.ajax({
                    type: "POST",
                    url: adminRoutes['admin_faq_articles_show_ajax'],
                    data: "id=" + $id,
                    success:function(data) {
                        if (data.id) {
                            setContent(previewContent, data.bodyRu);
                        }
                    },
                    error: function() {
                        console.log('error happens');
                    }
                });
            } else {
                setContent(previewContent, '');
            }

        });

        var setContent = function(container, data) {

            if (CKEDITOR && CKEDITOR.instances[container.attr('id')]) {
                        CKEDITOR.instances[container.attr('id')].setData(data);
            } else {
                container.val(data);
            }
        }

        var options = '<div class="row-fluid predefined-block"><div class="controls span6"><div class="control-group"><div class="controls"><select class="predefined-answers-select categories"><option value="">Необходимо выбрать</option>';
        var getNested = function(categories) {
                for(var i = 0, curLength = categories.length; i < curLength; i++) {
                    options += '<option value="' + categories[i].id + '">' + strReplace(categories[i].lvl, '-') + categories[i].captionRu + '</option>';
                    if (categories[i].__children && categories[i].__children.length) {
                        getNested(categories[i].__children);
                    }
                }
        }

        var strReplace = function(nums, separator) {
            return new Array(nums + 1).join(separator);
        }

    });
})(jQuery)

function nl2br (str, is_xhtml) {
    var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
    return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1'+ breakTag +'$2');
}

function makeCiteText(citePerson, citeContent) {
    console.log(citePerson);
    console.log(citeContent);
    var cites = citeContent.text().split(/(\r\n|\n\r|\r|\n)/g);

    for (var i = 0, len = cites.length; i < len; i++) {
        if (!cites[i].match(/(\r\n|\n\r|\r|\n)/g)) {
            cites[i] = '> ' + cites[i];
        }
    }
    citeText = '> ' + citePerson.text() + ' писал(а):\n\r' + cites.join('');
}