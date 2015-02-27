<?php

/* SonataDoctrineORMAdminBundle:CRUD:edit_orm_one_association_script.html.twig */
class __TwigTemplate_57d6e4c15f5aa704846bf6d4d30d38a7e39e43e16975ac5a8c6804a2960b3b78 extends Twig_Template
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
<!-- edit one association -->

<script type=\"text/javascript\">

    // handle the add link
    var field_add_";
        // line 26
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo " = function(event) {

        event.preventDefault();
        event.stopPropagation();

        var form = jQuery(this).closest('form');

        // the ajax post
        jQuery(form).ajaxSubmit({
            url: '";
        // line 35
        echo $this->env->getExtension('routing')->getUrl("sonata_admin_append_form_element", (array("code" => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "root", array()), "code", array()), "elementId" => (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "objectId" => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "root", array()), "id", array(0 => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "root", array()), "subject", array())), "method"), "uniqid" => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "admin", array()), "root", array()), "uniqid", array())) + $this->getAttribute($this->getAttribute((isset($context["sonata_admin"]) ? $context["sonata_admin"] : $this->getContext($context, "sonata_admin")), "field_description", array()), "getOption", array(0 => "link_parameters", 1 => array()), "method")));
        // line 40
        echo "',
            type: \"POST\",
            dataType: 'html',
            data: { _xml_http_request: true },
            success: function(html) {
                if (!html.length) {
                    return;
                }

                jQuery('#field_container_";
        // line 49
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo "').replaceWith(html); // replace the html
                Admin.setup_select2(jQuery('#field_container_";
        // line 50
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo "'));

                if(jQuery('input[type=\"file\"]', form).length > 0) {
                    jQuery(form).attr('enctype', 'multipart/form-data');
                    jQuery(form).attr('encoding', 'multipart/form-data');
                }
                jQuery('#sonata-ba-field-container-";
        // line 56
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo "').trigger('sonata.add_element');
                jQuery('#field_container_";
        // line 57
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo "').trigger('sonata.add_element');
            }
        });

        return false;
    };

    var field_widget_";
        // line 64
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo " = false;

    // this function initialize the popup
    // this can be only done this way has popup can be cascaded
    function start_field_retrieve_";
        // line 68
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo "(link) {

        link.onclick = null;

        // initialize component
        field_widget_";
        // line 73
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo " = jQuery(\"#field_widget_";
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo "\");

        // add the jQuery event to the a element
        jQuery(link)
            .click(field_add_";
        // line 77
        echo (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"));
        echo ")
            .trigger('click')
        ;

        return false;
    }
</script>

<!-- / edit one association -->

";
    }

    public function getTemplateName()
    {
        return "SonataDoctrineORMAdminBundle:CRUD:edit_orm_one_association_script.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  110 => 77,  101 => 73,  93 => 68,  86 => 64,  76 => 57,  72 => 56,  63 => 50,  59 => 49,  48 => 40,  46 => 35,  34 => 26,  26 => 20,  23 => 18,  19 => 11,);
    }
}
