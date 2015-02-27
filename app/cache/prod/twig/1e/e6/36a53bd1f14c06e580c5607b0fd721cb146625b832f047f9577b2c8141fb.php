<?php

/* FOSUserBundle:Resetting:request_content.html.twig */
class __TwigTemplate_1ee636a53bd1f14c06e580c5607b0fd721cb146625b832f047f9577b2c8141fb extends Twig_Template
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
        // line 1
        echo "<form class=\"auto_size\" action=\"";
        echo $this->env->getExtension('routing')->getPath("fos_user_resetting_send_email");
        echo "\" method=\"POST\" class=\"fos_user_resetting_request\">
    <fieldset class=\"form_fieldset\">
        <div class=\"form_row\">
            <label class=\"form_label\" for=\"username\">";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("resetting.request.username", array(), "FOSUserBundle"), "html", null, true);
        echo "</label>
            <div class=\"form_field\">
                <input size=\"40\" class=\"text_input\" type=\"email\" id=\"username\" name=\"username\" required=\"required\" />
            </div>
        </div>
    </fieldset>
    <div class=\"form_row form_padding_group\">
        <button type=\"submit\" class=\"common_button big\">
            <span>";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("resetting.request.submit", array(), "FOSUserBundle"), "html", null, true);
        echo "</span>
        </button> или
        <a href=\"";
        // line 14
        echo $this->env->getExtension('routing')->getPath("core_common_index");
        echo "\">Отменить</a>
    </div>
</form>
";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Resetting:request_content.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 14,  37 => 12,  26 => 4,  19 => 1,);
    }
}
