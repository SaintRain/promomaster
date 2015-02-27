<?php

/* ApplicationSonataAdminBundle:Admin\ExtraBlocks:extra_bottom_block_1.html.twig */
class __TwigTemplate_f384963ac658e2bc9db084c103b0ce489855e3ed20497e41fc86d8b9c8193c23 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'extra_bottom_block_1' => array($this, 'block_extra_bottom_block_1'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "
";
        // line 8
        echo "
";
        // line 9
        $this->displayBlock('extra_bottom_block_1', $context, $blocks);
    }

    public function block_extra_bottom_block_1($context, array $blocks = array())
    {
        // line 10
        echo "    ";
        ob_start();
        // line 11
        echo "
        <div class=\"extra-footer-block-1-container ";
        // line 12
        echo "\">
            <div class=\"extra-block extra-footer-block extra-footer-block-1\">

                <ul class=\"nav nav-tabs\">

                    ";
        // line 17
        if ((($this->getAttribute((isset($context["optionsExtraBlocks"]) ? $context["optionsExtraBlocks"] : null), "tabs", array(), "array", true, true) && twig_in_filter("audit", $this->getAttribute((isset($context["optionsExtraBlocks"]) ? $context["optionsExtraBlocks"] : $this->getContext($context, "optionsExtraBlocks")), "tabs", array(), "array"))) && $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "id", array()))) {
            // line 18
            echo "
                        <li class=\"\">
                            <a id=\"audit_block_btn\" href=\"#audit_block\" data-toggle=\"tab\">
                                <smal>";
            // line 21
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("audit.tabs.name", array(), $this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "translationDomain", array())), "html", null, true);
            echo "</smal>
                            </a>
                        </li>

                    ";
        }
        // line 26
        echo "
                </ul>

                <div class=\"tab-content\">

                    ";
        // line 31
        if ((($this->getAttribute((isset($context["optionsExtraBlocks"]) ? $context["optionsExtraBlocks"] : null), "tabs", array(), "array", true, true) && twig_in_filter("audit", $this->getAttribute((isset($context["optionsExtraBlocks"]) ? $context["optionsExtraBlocks"] : $this->getContext($context, "optionsExtraBlocks")), "tabs", array(), "array"))) && $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "id", array()))) {
            // line 32
            echo "
                        <div class=\"tab-pane\" id=\"audit_block\">
                            <div id=\"audit-block-container\">
                                <div class=\"well\" id=\"audit-block\">
                                    <img class=\"ajax-loader-big\" src=\"";
            // line 36
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/applicationsonataadmin/img/ajax-loader-big.gif"), "html", null, true);
            echo "\" title=\"Загрузка\" />
                                </div>
                            </div>
                        </div>

                    ";
        }
        // line 42
        echo "
                </div>

            </div>
        </div>

    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 49
        echo "    <script type=\"text/javascript\">
        \$(function () {
            //\$('.extra-left-block-2 ul.nav li:first a').trigger('click');
            var data = {
                id:";
        // line 53
        if ($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "id", array())) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "id", array()), "html", null, true);
        } else {
            echo "''";
        }
        echo ",
                namespace: '";
        // line 54
        if ( !$this->env->getExtension('common_extension')->get_parent_classFunction((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")))) {
            echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->env->getExtension('common_extension')->get_classFunction((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object"))), "js"), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->env->getExtension('common_extension')->get_parent_classFunction((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object"))), "js"), "html", null, true);
        }
        echo "',
                translationDomain: '";
        // line 55
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "translationDomain", array()), "html", null, true);
        echo "'
            };
            \$('#audit_block_btn').on('click', function () {
                \$.ajax({
                    url: 'https://' + document.domain + '";
        // line 59
        echo $this->env->getExtension('routing')->getPath("core_statistics_get_audit_information");
        echo "',
                    data: data,
                    success: function (response) {
                            \$('#audit_block').html(response);
                        },
                    error: function (response) {
                            alert('Произошла ошибка!');
                            console.log(response);
                        }
                });
            });
        });
    </script>
";
    }

    public function getTemplateName()
    {
        return "ApplicationSonataAdminBundle:Admin\\ExtraBlocks:extra_bottom_block_1.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  122 => 59,  115 => 55,  107 => 54,  99 => 53,  93 => 49,  84 => 42,  75 => 36,  69 => 32,  67 => 31,  60 => 26,  52 => 21,  47 => 18,  45 => 17,  38 => 12,  35 => 11,  32 => 10,  26 => 9,  23 => 8,  20 => 1,);
    }
}
