<?php

/* CoreCategoryBundle:Admin:form.html.twig */
class __TwigTemplate_cde2d757b43ecc931ccfda2db262f557e8daf67932ff6ac3ea3456cc8d63cdde extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'right_side' => array($this, 'block_right_side'),
            'sonata_pre_fieldsets' => array($this, 'block_sonata_pre_fieldsets'),
            'sonata_post_fieldsets' => array($this, 'block_sonata_post_fieldsets'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('right_side', $context, $blocks);
        // line 73
        echo "


";
    }

    // line 1
    public function block_right_side($context, array $blocks = array())
    {
        // line 2
        $context["url"] = (((!(null === $this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "id", array(0 => (isset($context["object"]) ? $context["object"] : $this->getContext($context, "object"))), "method")))) ? ("edit") : ("create"));
        // line 3
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(array(0 => "success", 1 => "error", 2 => "info", 3 => "warning"));
        foreach ($context['_seq'] as $context["_key"] => $context["notice_level"]) {
            // line 4
            echo "    ";
            $context["session_var"] = ("sonata_flash_" . $context["notice_level"]);
            // line 5
            echo "        ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "flashbag", array()), "get", array(0 => (isset($context["session_var"]) ? $context["session_var"] : $this->getContext($context, "session_var"))), "method"));
            foreach ($context['_seq'] as $context["_key"] => $context["flash"]) {
                // line 6
                echo "<div class=\"alert ";
                echo twig_escape_filter($this->env, ("alert-" . $context["notice_level"]), "html", null, true);
                echo "\">
            ";
                // line 7
                echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($context["flash"], array(), "SonataAdminBundle"), "html", null, true);
                echo "
    </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flash'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['notice_level'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 11
        echo "
 ";
        // line 12
        if (((!(null === $this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "id", array(0 => (isset($context["object"]) ? $context["object"] : $this->getContext($context, "object"))), "method"))) || (!$this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "valid", array())))) {
            // line 13
            echo "    ";
            echo $this->env->getExtension('language_switcher_extension')->languageSwitcher();
            echo "

    <form id=\"categoryForm\" class=\"form-horizontal\"
          action=\"";
            // line 16
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "generateUrl", array(0 => (isset($context["url"]) ? $context["url"] : $this->getContext($context, "url")), 1 => array("id" => $this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "id", array(0 => (isset($context["object"]) ? $context["object"] : $this->getContext($context, "object"))), "method"), "uniqid" => $this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "uniqid", array()), "subclass" => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "get", array(0 => "subclass"), "method"))), "method"), "html", null, true);
            echo "\" ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
            echo "
          method=\"POST\" ";
            // line 17
            if ((!$this->getAttribute((isset($context["admin_pool"]) ? $context["admin_pool"] : $this->getContext($context, "admin_pool")), "getOption", array(0 => "html5_validate"), "method"))) {
                echo "novalidate=\"novalidate\"";
            }
            echo ">
        <input id=\"objectId\" type=\"hidden\" value=\"";
            // line 18
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "id", array()), "html", null, true);
            echo "\" />
        <input id=\"uniqid\" type=\"hidden\" value=\"";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "uniqid", array()), "html", null, true);
            echo "\" />

";
            // line 21
            if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "errors", array())) > 0)) {
                // line 22
                echo "        <div class=\"sonata-ba-form-error\">
";
                // line 23
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors');
                echo "
            </div>
";
            }
            // line 26
            echo "
            ";
            // line 27
            $this->displayBlock('sonata_pre_fieldsets', $context, $blocks);
            // line 40
            echo "
                <div class=\"tab-content\">
                    ";
            // line 42
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "formgroups", array()));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["name"] => $context["form_group"]) {
                // line 43
                echo "                        <div class=\"tab-pane ";
                if ($this->getAttribute($context["loop"], "first", array())) {
                    echo " active";
                }
                echo "\" id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "uniqid", array()), "html", null, true);
                echo "_";
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
                echo "\">
                            <fieldset>
                                <div class=\"sonata-ba-collapsed-fields\">
                                    ";
                // line 46
                if (($this->getAttribute($context["form_group"], "description", array()) != false)) {
                    // line 47
                    echo "                                        <p>";
                    echo $this->getAttribute($context["form_group"], "description", array());
                    echo "</p>
                                    ";
                }
                // line 49
                echo "
                                    ";
                // line 50
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["form_group"], "fields", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["field_name"]) {
                    // line 51
                    echo "                                        ";
                    if ($this->getAttribute($this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "formfielddescriptions", array(), "any", false, true), $context["field_name"], array(), "array", true, true)) {
                        // line 52
                        echo "                                            ";
                        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), $context["field_name"], array(), "array"), 'row');
                        echo "
                                        ";
                    }
                    // line 54
                    echo "                                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field_name'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 55
                echo "                                </div>
                            </fieldset>
                        </div>
                    ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['name'], $context['form_group'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 59
            echo "                </div>

            ";
            // line 61
            $this->displayBlock('sonata_post_fieldsets', $context, $blocks);
            // line 64
            echo "        ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
            echo "
         ";
            // line 66
            echo "        ";
            echo twig_include($this->env, $context, (isset($context["formTplName"]) ? $context["formTplName"] : $this->getContext($context, "formTplName")));
            echo "
";
            // line 67
            $this->env->loadTemplate("CoreCategoryBundle:Admin:formactions.html.twig")->display($context);
            // line 68
            echo "</form>
";
        } else {
            // line 70
            echo "<h5>Вы можете добавить новую категорию по кнопке справо.</h5>
";
        }
    }

    // line 27
    public function block_sonata_pre_fieldsets($context, array $blocks = array())
    {
        // line 28
        echo "                <div class=\"tabbable\">
                    <ul class=\"nav nav-tabs\">
                        ";
        // line 30
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "formgroups", array()));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["name"] => $context["form_group"]) {
            // line 31
            echo "                            <li class=\"";
            if ($this->getAttribute($context["loop"], "first", array())) {
                echo "active";
            }
            echo "\">
                                <a href=\"#";
            // line 32
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "uniqid", array()), "html", null, true);
            echo "_";
            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
            echo "\" data-toggle=\"tab\">
                                    <i class=\"icon-exclamation-sign has-errors hide\"></i>
                                    ";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "trans", array(0 => $context["name"], 1 => array(), 2 => $this->getAttribute($context["form_group"], "translation_domain", array())), "method"), "html", null, true);
            echo "
                                </a>
                            </li>
                        ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['name'], $context['form_group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 38
        echo "                    </ul>
            ";
    }

    // line 61
    public function block_sonata_post_fieldsets($context, array $blocks = array())
    {
        // line 62
        echo "                </div>
            ";
    }

    public function getTemplateName()
    {
        return "CoreCategoryBundle:Admin:form.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  288 => 62,  285 => 61,  280 => 38,  262 => 34,  255 => 32,  248 => 31,  231 => 30,  227 => 28,  224 => 27,  218 => 70,  214 => 68,  212 => 67,  207 => 66,  202 => 64,  200 => 61,  196 => 59,  179 => 55,  173 => 54,  167 => 52,  164 => 51,  160 => 50,  157 => 49,  151 => 47,  149 => 46,  136 => 43,  119 => 42,  115 => 40,  113 => 27,  110 => 26,  104 => 23,  101 => 22,  99 => 21,  94 => 19,  90 => 18,  84 => 17,  78 => 16,  71 => 13,  69 => 12,  66 => 11,  53 => 7,  48 => 6,  43 => 5,  40 => 4,  36 => 3,  34 => 2,  31 => 1,  24 => 73,  22 => 1,);
    }
}
