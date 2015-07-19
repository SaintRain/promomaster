<?php

/* CoreConfigBundle:Admin/Form/list_fields:data.html.twig */
class __TwigTemplate_54a55822b0f7a0d2cdc895fec57f06a6e09fa79e0d7ccf53afc1de3c041b9b2d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("SonataAdminBundle:CRUD:base_list_field.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'field' => array($this, 'block_field'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "SonataAdminBundle:CRUD:base_list_field.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_field($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "data", array())) {
            // line 5
            echo "        ";
            if (($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "type", array()) == "string")) {
                echo "            
            ";
                // line 6
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "data", array()), "html", null, true);
                echo "
        ";
            } else {
                // line 8
                echo "            ";
                if (($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "type", array()) == "text")) {
                    echo "            
                <div style=\"width:100%;  height:100px;overflow: scroll\">";
                    // line 9
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "data", array()), "html", null, true);
                    echo "</div>                
            ";
                } else {
                    // line 11
                    echo "                ";
                    if (($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "type", array()) == "array")) {
                        // line 12
                        echo "                    ";
                        $context["mas"] = twig_split_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "data", array()), "
");
                        // line 13
                        echo "                    ";
                        $context["ind"] = 0;
                        // line 14
                        echo "                    ";
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable((isset($context["mas"]) ? $context["mas"] : null));
                        foreach ($context['_seq'] as $context["_key"] => $context["m"]) {
                            // line 15
                            echo "                        ";
                            if (((isset($context["ind"]) ? $context["ind"] : null) == 1)) {
                                // line 16
                                echo "                            ";
                                $context["value"] = $context["m"];
                                // line 17
                                echo "                            ";
                                $context["ind"] = 0;
                                // line 18
                                echo "
                                <div data-original-title=\"";
                                // line 19
                                echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                                echo "\" data-toggle=\"popover\" class=\"btn btn-small with-popover\" data-placement=\"left\" data-toggle=\"popover\" data-content=\"";
                                echo twig_escape_filter($this->env, (isset($context["value"]) ? $context["value"] : null), "html", null, true);
                                echo "\">";
                                echo twig_escape_filter($this->env, (isset($context["key"]) ? $context["key"] : null), "html", null, true);
                                echo "</div>&nbsp;


                        ";
                            } else {
                                // line 23
                                echo "                            ";
                                $context["key"] = $context["m"];
                                // line 24
                                echo "                            ";
                                $context["ind"] = ((isset($context["ind"]) ? $context["ind"] : null) + 1);
                                // line 25
                                echo "                        ";
                            }
                            // line 26
                            echo "                    ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['m'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 27
                        echo "                ";
                    }
                    // line 28
                    echo "            ";
                }
                // line 29
                echo "

        ";
            }
            // line 32
            echo "    ";
        }
        // line 33
        echo "
";
    }

    public function getTemplateName()
    {
        return "CoreConfigBundle:Admin/Form/list_fields:data.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  129 => 33,  126 => 32,  121 => 29,  118 => 28,  115 => 27,  109 => 26,  106 => 25,  103 => 24,  100 => 23,  89 => 19,  86 => 18,  83 => 17,  80 => 16,  77 => 15,  72 => 14,  69 => 13,  65 => 12,  62 => 11,  57 => 9,  52 => 8,  47 => 6,  42 => 5,  39 => 4,  36 => 3,  11 => 1,);
    }
}
