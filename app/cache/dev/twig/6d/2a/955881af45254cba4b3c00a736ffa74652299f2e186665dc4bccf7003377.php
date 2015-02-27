<?php

/* FOSUserBundle:Resetting:request_content.html.twig */
class __TwigTemplate_6d2a955881af45254cba4b3c00a736ffa74652299f2e186665dc4bccf7003377 extends Twig_Template
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
        echo "<div class=\"row\">
    <div class=\"col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3\">
        <form id=\"auth_form\" class=\"reg-page\" action=\"";
        // line 3
        echo $this->env->getExtension('routing')->getPath("fos_user_resetting_send_email");
        echo "\"
              method=\"post\">
            <div class=\"reg-header\">
                <h2>Восстановление пароля</h2>
            </div>


            ";
        // line 10
        if (array_key_exists("invalid_username", $context)) {
            // line 11
            echo "                <div class=\"form_field_error_txt \">
                    ";
            // line 12
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("resetting.request.invalid_username", array("%username%" => (isset($context["invalid_username"]) ? $context["invalid_username"] : $this->getContext($context, "invalid_username"))), "FOSUserBundle"), "html", null, true);
            echo "
                </div>
            ";
        }
        // line 15
        echo "

            <div class=\"input-group margin-bottom-20\">
                <span class=\"input-group-addon\"><i class=\"fa fa-user\"></i></span>
                <input type=\"email\" id=\"username\" name=\"username\" required=\"required\" placeholder=\"Email\"
                       class=\"form-control\">
            </div>


            <div class=\"row\">
                <div class=\"col-md-6\">

                </div>
                <div class=\"col-md-6\">
                    <button class=\"btn-u pull-right\" type=\"submit\">Выслать</button>
                </div>
            </div>

        </form>
    </div>
</div>";
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
        return array (  44 => 15,  38 => 12,  35 => 11,  33 => 10,  23 => 3,  19 => 1,);
    }
}
