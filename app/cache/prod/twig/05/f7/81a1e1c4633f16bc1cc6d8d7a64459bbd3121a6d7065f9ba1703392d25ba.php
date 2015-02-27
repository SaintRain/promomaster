<?php

/* SonataDoctrineORMAdminBundle:CRUD:edit_orm_many_association_script.html.twig */
class __TwigTemplate_05f781a1e1c4633f16bc1cc6d8d7a64459bbd3121a6d7065f9ba1703392d25ba extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 11
        echo "

";
        // line 18
        echo "
";
        // line 20
        echo "
";
        // line 21
        $context["associationadmin"] = $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "field_description", array()), "associationadmin", array());
        // line 22
        echo "
<!-- edit many association -->

<script type=\"text/javascript\">

    ";
        // line 32
        echo "    var field_dialog_form_list_link_";
        echo (isset($context["id"]) ? $context["id"] : null);
        echo " = function(event) {
        initialize_popup_";
        // line 33
        echo (isset($context["id"]) ? $context["id"] : null);
        echo "();

        event.preventDefault();
        event.stopPropagation();

        Admin.log('[";
        // line 38
        echo (isset($context["id"]) ? $context["id"] : null);
        echo "|field_dialog_form_list_link] handle link click in a list');

        var element = jQuery(this).parents('#field_dialog_";
        // line 40
        echo (isset($context["id"]) ? $context["id"] : null);
        echo " .sonata-ba-list-field');

        // the user does not click on a row column
        if (element.length == 0) {
            // make a recursive call (ie: reset the filter)
            jQuery.ajax({
                type: 'GET',
                url: jQuery(this).attr('href'),
                dataType: 'html',
                success: function(html) {
                    Admin.log('[";
        // line 50
        echo (isset($context["id"]) ? $context["id"] : null);
        echo "|field_dialog_form_list_link] callback success, attach valid js event');

                    field_dialog_";
        // line 52
        echo (isset($context["id"]) ? $context["id"] : null);
        echo ".html(html);
                    field_dialog_form_list_handle_action_";
        // line 53
        echo (isset($context["id"]) ? $context["id"] : null);
        echo "();
                }
            });

            return;
        }

        jQuery('#";
        // line 60
        echo (isset($context["id"]) ? $context["id"] : null);
        echo "').val(element.attr('objectId'));
        jQuery('#";
        // line 61
        echo (isset($context["id"]) ? $context["id"] : null);
        echo "').trigger('change');

        field_dialog_";
        // line 63
        echo (isset($context["id"]) ? $context["id"] : null);
        echo ".dialog('close');
    }

    // this function handle action on the modal list when inside a selected list
    var field_dialog_form_list_handle_action_";
        // line 67
        echo (isset($context["id"]) ? $context["id"] : null);
        echo "  =  function() {

        Admin.log('[";
        // line 69
        echo (isset($context["id"]) ? $context["id"] : null);
        echo "|field_dialog_form_list_handle_action] attaching valid js event');

        Admin.add_filters(field_dialog_";
        // line 71
        echo (isset($context["id"]) ? $context["id"] : null);
        echo ");

        // capture the submit event to make an ajax call, ie : POST data to the
        // related create admin
        jQuery('a', field_dialog_";
        // line 75
        echo (isset($context["id"]) ? $context["id"] : null);
        echo ").on('click', field_dialog_form_list_link_";
        echo (isset($context["id"]) ? $context["id"] : null);
        echo ");
        jQuery('form', field_dialog_";
        // line 76
        echo (isset($context["id"]) ? $context["id"] : null);
        echo ").on('submit', function(event) {
            event.preventDefault();

            var form = jQuery(this);

            Admin.log('[";
        // line 81
        echo (isset($context["id"]) ? $context["id"] : null);
        echo "|field_dialog_form_list_handle_action] catching submit event, sending ajax request');

            jQuery(form).ajaxSubmit({
                type: form.attr('method'),
                url: form.attr('action'),
                dataType: 'html',
                data: {_xml_http_request: true},
                success: function(html) {

                    Admin.log('[";
        // line 90
        echo (isset($context["id"]) ? $context["id"] : null);
        echo "|field_dialog_form_list_handle_action] form submit success, restoring event');

                    field_dialog_";
        // line 92
        echo (isset($context["id"]) ? $context["id"] : null);
        echo ".html(html);
                    field_dialog_form_list_handle_action_";
        // line 93
        echo (isset($context["id"]) ? $context["id"] : null);
        echo "();
                }
            });
        });
    }

    // handle the add link
    var field_dialog_form_list_";
        // line 100
        echo (isset($context["id"]) ? $context["id"] : null);
        echo " = function(event) {

        initialize_popup_";
        // line 102
        echo (isset($context["id"]) ? $context["id"] : null);
        echo "();

        event.preventDefault();
        event.stopPropagation();

        Admin.log('[";
        // line 107
        echo (isset($context["id"]) ? $context["id"] : null);
        echo "|field_dialog_form_list] open the list modal');

        var a = jQuery(this);

        field_dialog_";
        // line 111
        echo (isset($context["id"]) ? $context["id"] : null);
        echo ".html('');

        // retrieve the form element from the related admin generator
        jQuery.ajax({
            url: a.attr('href'),
            dataType: 'html',
            success: function(html) {

                Admin.log('[";
        // line 119
        echo (isset($context["id"]) ? $context["id"] : null);
        echo "|field_dialog_form_list] retrieving the list content');

                // populate the popup container
                field_dialog_";
        // line 122
        echo (isset($context["id"]) ? $context["id"] : null);
        echo ".html(html);

                Admin.add_filters(field_dialog_";
        // line 124
        echo (isset($context["id"]) ? $context["id"] : null);
        echo ");

                field_dialog_form_list_handle_action_";
        // line 126
        echo (isset($context["id"]) ? $context["id"] : null);
        echo "();

                // open the dialog in modal mode
                field_dialog_";
        // line 129
        echo (isset($context["id"]) ? $context["id"] : null);
        echo ".dialog({
                    height: 'auto',
                    width: 980,
                    modal: true,
                    resizable: true,
                    title: '";
        // line 134
        echo $this->env->getExtension('translator')->trans($this->getAttribute((isset($context["associationadmin"]) ? $context["associationadmin"] : null), "label", array()), array(), $this->getAttribute((isset($context["associationadmin"]) ? $context["associationadmin"] : null), "translationdomain", array()));
        echo "',
                    close: function(event, ui) {
                        Admin.log('[";
        // line 136
        echo (isset($context["id"]) ? $context["id"] : null);
        echo "|field_dialog_form_list] close callback, removing js event');

                        // make sure we have a clean state
                        jQuery('a', field_dialog_";
        // line 139
        echo (isset($context["id"]) ? $context["id"] : null);
        echo ").off('click');
                        jQuery('form', field_dialog_";
        // line 140
        echo (isset($context["id"]) ? $context["id"] : null);
        echo ").off('submit');
                    }
                });
            }
        });
    };

    // handle the add link
    var field_dialog_form_add_";
        // line 148
        echo (isset($context["id"]) ? $context["id"] : null);
        echo " = function(event) {
        initialize_popup_";
        // line 149
        echo (isset($context["id"]) ? $context["id"] : null);
        echo "();

        event.preventDefault();
        event.stopPropagation();

        var a = jQuery(this);

        field_dialog_";
        // line 156
        echo (isset($context["id"]) ? $context["id"] : null);
        echo ".html('');

        Admin.log('[";
        // line 158
        echo (isset($context["id"]) ? $context["id"] : null);
        echo "|field_dialog_form_add] add link action');

        // retrieve the form element from the related admin generator
        jQuery.ajax({
            url: a.attr('href'),
            dataType: 'html',
            success: function(html) {

                Admin.log('[";
        // line 166
        echo (isset($context["id"]) ? $context["id"] : null);
        echo "|field_dialog_form_add] ajax success', field_dialog_";
        echo (isset($context["id"]) ? $context["id"] : null);
        echo ");

                // populate the popup container
                field_dialog_";
        // line 169
        echo (isset($context["id"]) ? $context["id"] : null);
        echo ".html(html);

                // capture the submit event to make an ajax call, ie : POST data to the
                // related create admin
                jQuery('a', field_dialog_";
        // line 173
        echo (isset($context["id"]) ? $context["id"] : null);
        echo ").on('click', field_dialog_form_action_";
        echo (isset($context["id"]) ? $context["id"] : null);
        echo ");
                jQuery('form', field_dialog_";
        // line 174
        echo (isset($context["id"]) ? $context["id"] : null);
        echo ").on('submit', field_dialog_form_action_";
        echo (isset($context["id"]) ? $context["id"] : null);
        echo ");

                // open the dialog in modal mode
                field_dialog_";
        // line 177
        echo (isset($context["id"]) ? $context["id"] : null);
        echo ".dialog({
                    height: 'auto',
                    width: 850,
                    modal: true,
                    autoOpen: true,
                    resizable: true,
                    title: '";
        // line 183
        echo $this->env->getExtension('translator')->trans($this->getAttribute((isset($context["associationadmin"]) ? $context["associationadmin"] : null), "label", array()), array(), $this->getAttribute((isset($context["associationadmin"]) ? $context["associationadmin"] : null), "translationdomain", array()));
        echo "',
                    close: function(event, ui) {
                        Admin.log('[";
        // line 185
        echo (isset($context["id"]) ? $context["id"] : null);
        echo "|field_dialog_form_add] dialog closed - removing  events');
                        // make sure we have a clean state
                        jQuery('a', field_dialog_";
        // line 187
        echo (isset($context["id"]) ? $context["id"] : null);
        echo ").off('click');
                        jQuery('form', field_dialog_";
        // line 188
        echo (isset($context["id"]) ? $context["id"] : null);
        echo ").off('submit');
                    }
                });
            }
        });
    };

    // handle the post data
    var field_dialog_form_action_";
        // line 196
        echo (isset($context["id"]) ? $context["id"] : null);
        echo " = function(event) {

        var element = jQuery(this);

        // return if the link is an anchor inside the same page
        if (this.nodeName == 'A' && (element.attr('href').length == 0 || element.attr('href')[0] == '#')) {
            return;
        }

        event.preventDefault();
        event.stopPropagation();

        Admin.log('[";
        // line 208
        echo (isset($context["id"]) ? $context["id"] : null);
        echo "|field_dialog_form_action] action catch', this);

        initialize_popup_";
        // line 210
        echo (isset($context["id"]) ? $context["id"] : null);
        echo "();

        if (this.nodeName == 'FORM') {
            var url  = element.attr('action');
            var type = element.attr('method');
        } else if (this.nodeName == 'A') {
            var url  = element.attr('href');
            var type = 'GET';
        } else {
            alert('unexpected element : @' + this.nodeName + '@');
            return;
        }

        if (element.hasClass('sonata-ba-action')) {
            Admin.log('[";
        // line 224
        echo (isset($context["id"]) ? $context["id"] : null);
        echo "|field_dialog_form_action] reserved action stop catch all events');
            return;
        }

        var data = {
            _xml_http_request: true
        }

        var form = jQuery(this);

        Admin.log('[";
        // line 234
        echo (isset($context["id"]) ? $context["id"] : null);
        echo "|field_dialog_form_action] execute ajax call');

        // the ajax post
        jQuery(form).ajaxSubmit({
            url: url,
            type: type,
            data: data,
            success: function(data) {
                Admin.log('[";
        // line 242
        echo (isset($context["id"]) ? $context["id"] : null);
        echo "|field_dialog_form_action] ajax success');

                // if the crud action return ok, then the element has been added
                // so the widget container must be refresh with the last option available
                if (typeof data != 'string' && data.result == 'ok') {
                    field_dialog_";
        // line 247
        echo (isset($context["id"]) ? $context["id"] : null);
        echo ".dialog('close');

                    ";
        // line 249
        if (($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "edit", array()) == "list")) {
            // line 250
            echo "                        ";
            // line 254
            echo "                        jQuery('#";
            echo (isset($context["id"]) ? $context["id"] : null);
            echo "').val(data.objectId);
                        jQuery('#";
            // line 255
            echo (isset($context["id"]) ? $context["id"] : null);
            echo "').change();

                    ";
        } else {
            // line 258
            echo "
                        // reload the form element
                        jQuery('#field_widget_";
            // line 260
            echo (isset($context["id"]) ? $context["id"] : null);
            echo "').closest('form').ajaxSubmit({
                            url: '";
            // line 261
            echo $this->env->getExtension('routing')->getUrl("sonata_admin_retrieve_form_element", array("elementId" => (isset($context["id"]) ? $context["id"] : null), "subclass" => $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "getActiveSubclassCode", array(), "method"), "objectId" => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "root", array()), "id", array(0 => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "root", array()), "subject", array())), "method"), "uniqid" => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "root", array()), "uniqid", array()), "code" => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "admin", array()), "root", array()), "code", array())));
            // line 267
            echo "',
                            data: {_xml_http_request: true },
                            dataType: 'html',
                            type: 'POST',
                            success: function(html) {
                                jQuery('#field_container_";
            // line 272
            echo (isset($context["id"]) ? $context["id"] : null);
            echo "').replaceWith(html);
                                var newElement = jQuery('#";
            // line 273
            echo (isset($context["id"]) ? $context["id"] : null);
            echo " [value=\"' + data.objectId + '\"]');
                                if (newElement.is(\"input\")) {
                                    newElement.attr('checked', 'checked');
                                } else {
                                    newElement.attr('selected', 'selected');
                                }

                                jQuery('#field_container_";
            // line 280
            echo (isset($context["id"]) ? $context["id"] : null);
            echo "').trigger('sonata-admin-append-form-element');
                            }
                        });

                    ";
        }
        // line 285
        echo "
                    return;
                }

                // otherwise, display form error
                field_dialog_";
        // line 290
        echo (isset($context["id"]) ? $context["id"] : null);
        echo ".html(data);

                Admin.add_pretty_errors(field_dialog_";
        // line 292
        echo (isset($context["id"]) ? $context["id"] : null);
        echo ");

                // reattach the event
                jQuery('form', field_dialog_";
        // line 295
        echo (isset($context["id"]) ? $context["id"] : null);
        echo ").submit(field_dialog_form_action_";
        echo (isset($context["id"]) ? $context["id"] : null);
        echo ");
            }
        });

        return false;
    }

    var field_dialog_";
        // line 302
        echo (isset($context["id"]) ? $context["id"] : null);
        echo " = false;

    function initialize_popup_";
        // line 304
        echo (isset($context["id"]) ? $context["id"] : null);
        echo "() {
        // initialize component
        if (!field_dialog_";
        // line 306
        echo (isset($context["id"]) ? $context["id"] : null);
        echo ") {
            field_dialog_";
        // line 307
        echo (isset($context["id"]) ? $context["id"] : null);
        echo " = jQuery(\"#field_dialog_";
        echo (isset($context["id"]) ? $context["id"] : null);
        echo "\");

            // move the dialog as a child of the root element, nested form breaks html ...
            jQuery(document.body).append(field_dialog_";
        // line 310
        echo (isset($context["id"]) ? $context["id"] : null);
        echo ");

            Admin.log('[";
        // line 312
        echo (isset($context["id"]) ? $context["id"] : null);
        echo "|field_dialog] move dialog container as a document child');
        }
    }

    ";
        // line 319
        echo "    // this function initialize the popup
    // this can be only done this way has popup can be cascaded
    function start_field_dialog_form_add_";
        // line 321
        echo (isset($context["id"]) ? $context["id"] : null);
        echo "(link) {

        // remove the html event
        link.onclick = null;

        initialize_popup_";
        // line 326
        echo (isset($context["id"]) ? $context["id"] : null);
        echo "();

        // add the jQuery event to the a element
        jQuery(link)
            .click(field_dialog_form_add_";
        // line 330
        echo (isset($context["id"]) ? $context["id"] : null);
        echo ")
            .trigger('click')
        ;

        return false;
    }

    if (field_dialog_";
        // line 337
        echo (isset($context["id"]) ? $context["id"] : null);
        echo ") {
        Admin.add_pretty_errors(field_dialog_";
        // line 338
        echo (isset($context["id"]) ? $context["id"] : null);
        echo ");
    }

    ";
        // line 341
        if (($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "edit", array()) == "list")) {
            // line 342
            echo "        ";
            // line 345
            echo "        // this function initialize the popup
        // this can be only done this way has popup can be cascaded
        function start_field_dialog_form_list_";
            // line 347
            echo (isset($context["id"]) ? $context["id"] : null);
            echo "(link) {

            link.onclick = null;

            initialize_popup_";
            // line 351
            echo (isset($context["id"]) ? $context["id"] : null);
            echo "();

            // add the jQuery event to the a element
            jQuery(link)
                .click(field_dialog_form_list_";
            // line 355
            echo (isset($context["id"]) ? $context["id"] : null);
            echo ")
                .trigger('click')
            ;

            return false;
        }

        function remove_selected_element_";
            // line 362
            echo (isset($context["id"]) ? $context["id"] : null);
            echo "(link) {

            link.onclick = null;

            jQuery(link)
                .click(field_remove_element_";
            // line 367
            echo (isset($context["id"]) ? $context["id"] : null);
            echo ")
                .trigger('click')
            ;

            return false;
        }

        function field_remove_element_";
            // line 374
            echo (isset($context["id"]) ? $context["id"] : null);
            echo "(event) {
            event.preventDefault();

            if (jQuery('#";
            // line 377
            echo (isset($context["id"]) ? $context["id"] : null);
            echo " option').get(0)) {
                jQuery('#";
            // line 378
            echo (isset($context["id"]) ? $context["id"] : null);
            echo "').attr('selectedIndex', '-1').children(\"option:selected\").attr(\"selected\", false);
            }

            jQuery('#";
            // line 381
            echo (isset($context["id"]) ? $context["id"] : null);
            echo "').val('');
            jQuery('#";
            // line 382
            echo (isset($context["id"]) ? $context["id"] : null);
            echo "').trigger('change');

            return false;
        }
        ";
            // line 389
            echo "
        // update the label
        jQuery('#";
            // line 391
            echo (isset($context["id"]) ? $context["id"] : null);
            echo "').on('change', function(event) {

            Admin.log('[";
            // line 393
            echo (isset($context["id"]) ? $context["id"] : null);
            echo "] update the label');

            jQuery('#field_widget_";
            // line 395
            echo (isset($context["id"]) ? $context["id"] : null);
            echo "').html(\"<span><img src=\\\"";
            echo $this->env->getExtension('assets')->getAssetUrl("bundles/sonataadmin/ajax-loader.gif");
            echo "\\\" style=\\\"vertical-align: middle; margin-right: 10px\\\"/>";
            echo $this->env->getExtension('translator')->trans("loading_information", array(), "SonataAdminBundle");
            echo "</span>\");
            jQuery.ajax({
                type: 'GET',
                url: '";
            // line 398
            echo $this->env->getExtension('routing')->getUrl("sonata_admin_short_object_information", array("objectId" => "OBJECT_ID", "uniqid" => $this->getAttribute((isset($context["associationadmin"]) ? $context["associationadmin"] : null), "uniqid", array()), "code" => $this->getAttribute((isset($context["associationadmin"]) ? $context["associationadmin"] : null), "code", array()), "linkParameters" => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : null), "field_description", array()), "options", array()), "link_parameters", array())));
            // line 403
            echo "'.replace('OBJECT_ID', jQuery(this).val()),
                dataType: 'html',
                success: function(html) {
                    jQuery('#field_widget_";
            // line 406
            echo (isset($context["id"]) ? $context["id"] : null);
            echo "').html(html);
                }
            });
        });

    ";
        }
        // line 412
        echo "

</script>
<!-- / edit many association -->

";
    }

    public function getTemplateName()
    {
        return "SonataDoctrineORMAdminBundle:CRUD:edit_orm_many_association_script.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  694 => 412,  685 => 406,  680 => 403,  678 => 398,  668 => 395,  663 => 393,  658 => 391,  654 => 389,  647 => 382,  643 => 381,  637 => 378,  633 => 377,  627 => 374,  617 => 367,  609 => 362,  599 => 355,  592 => 351,  585 => 347,  581 => 345,  579 => 342,  577 => 341,  571 => 338,  567 => 337,  557 => 330,  550 => 326,  542 => 321,  538 => 319,  531 => 312,  526 => 310,  518 => 307,  514 => 306,  509 => 304,  504 => 302,  492 => 295,  486 => 292,  481 => 290,  474 => 285,  466 => 280,  456 => 273,  452 => 272,  445 => 267,  443 => 261,  439 => 260,  435 => 258,  429 => 255,  424 => 254,  422 => 250,  420 => 249,  415 => 247,  407 => 242,  396 => 234,  383 => 224,  366 => 210,  361 => 208,  346 => 196,  335 => 188,  331 => 187,  326 => 185,  321 => 183,  312 => 177,  304 => 174,  298 => 173,  291 => 169,  283 => 166,  272 => 158,  267 => 156,  257 => 149,  253 => 148,  242 => 140,  238 => 139,  232 => 136,  227 => 134,  219 => 129,  213 => 126,  208 => 124,  203 => 122,  197 => 119,  186 => 111,  179 => 107,  171 => 102,  166 => 100,  156 => 93,  152 => 92,  147 => 90,  135 => 81,  127 => 76,  121 => 75,  114 => 71,  109 => 69,  104 => 67,  97 => 63,  92 => 61,  88 => 60,  78 => 53,  74 => 52,  69 => 50,  56 => 40,  51 => 38,  43 => 33,  38 => 32,  31 => 22,  29 => 21,  26 => 20,  23 => 18,  19 => 11,);
    }
}
