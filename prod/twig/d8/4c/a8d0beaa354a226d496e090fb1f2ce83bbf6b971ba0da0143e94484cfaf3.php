<?php

/* CoreProductBundle:Admin/Form/modifications_widget/td_types:image.html.twig */
class __TwigTemplate_d84ca8d0beaa354a226d496e090fb1f2ce83bbf6b971ba0da0143e94484cfaf3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'image_type' => array($this, 'block_image_type'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('image_type', $context, $blocks);
    }

    public function block_image_type($context, array $blocks = array())
    {
        // line 2
        echo "
";
        // line 3
        if ($this->getAttribute((isset($context["column"]) ? $context["column"] : null), "preview", array(), "any", true, true)) {
            // line 4
            echo "    ";
            $context["fileUrl"] = $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute((isset($context["d"]) ? $context["d"] : null), (isset($context["d_key"]) ? $context["d_key"] : null)), "preview", $this->getAttribute((isset($context["column"]) ? $context["column"] : null), "preview", array())));
        } else {
            // line 6
            echo "    ";
            $context["fileUrl"] = $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute((isset($context["d"]) ? $context["d"] : null), (isset($context["d_key"]) ? $context["d_key"] : null)), "preview"));
        }
        // line 8
        echo "
";
        // line 9
        if (((isset($context["fileUrl"]) ? $context["fileUrl"] : null) && ((isset($context["fileUrl"]) ? $context["fileUrl"] : null) != "/"))) {
            // line 10
            echo "         ";
            if (($this->getAttribute((isset($context["column"]) ? $context["column"] : null), "identifier", array()) && ($this->getAttribute((isset($context["d"]) ? $context["d"] : null), "id", array()) != (isset($context["subject_id"]) ? $context["subject_id"] : null)))) {
                // line 11
                echo "<a target=\"_blank\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath($this->getAttribute((isset($context["options"]) ? $context["options"] : null), "edit_route", array()), array("id" => $this->getAttribute((isset($context["d"]) ? $context["d"] : null), "id", array()))), "html", null, true);
                echo "\"><img src=\"";
                echo twig_escape_filter($this->env, (isset($context["fileUrl"]) ? $context["fileUrl"] : null), "html", null, true);
                echo "\"/></a>
        ";
            } else {
                // line 13
                echo "    <img src=\"";
                echo twig_escape_filter($this->env, (isset($context["fileUrl"]) ? $context["fileUrl"] : null), "html", null, true);
                echo "\"/>
        ";
            }
        }
        // line 15
        echo "        
";
    }

    public function getTemplateName()
    {
        return "CoreProductBundle:Admin/Form/modifications_widget/td_types:image.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  62 => 15,  55 => 13,  47 => 11,  44 => 10,  42 => 9,  39 => 8,  35 => 6,  31 => 4,  29 => 3,  26 => 2,  20 => 1,);
    }
}