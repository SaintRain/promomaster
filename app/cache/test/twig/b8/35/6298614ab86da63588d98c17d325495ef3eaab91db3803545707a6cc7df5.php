<?php

/* CoreUnionBundle:Admin/Form/td_types:image.html.twig */
class __TwigTemplate_b8356298614ab86da63588d98c17d325495ef3eaab91db3803545707a6cc7df5 extends Twig_Template
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
            $context["fileUrl"] = $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute((isset($context["d"]) ? $context["d"] : $this->getContext($context, "d")), (isset($context["d_key"]) ? $context["d_key"] : $this->getContext($context, "d_key"))), "preview", $this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "preview", array())));
        } else {
            // line 6
            echo "    ";
            $context["fileUrl"] = $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute((isset($context["d"]) ? $context["d"] : $this->getContext($context, "d")), (isset($context["d_key"]) ? $context["d_key"] : $this->getContext($context, "d_key"))), "preview"));
        }
        // line 8
        echo "
";
        // line 9
        if (((isset($context["fileUrl"]) ? $context["fileUrl"] : $this->getContext($context, "fileUrl")) && ((isset($context["fileUrl"]) ? $context["fileUrl"] : $this->getContext($context, "fileUrl")) != "/"))) {
            // line 10
            echo "         ";
            if (($this->getAttribute((isset($context["column"]) ? $context["column"] : $this->getContext($context, "column")), "identifier", array()) && ($this->getAttribute((isset($context["d"]) ? $context["d"] : $this->getContext($context, "d")), "id", array()) != (isset($context["subject_id"]) ? $context["subject_id"] : $this->getContext($context, "subject_id"))))) {
                // line 11
                echo "<a target=\"_blank\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath($this->getAttribute((isset($context["options"]) ? $context["options"] : $this->getContext($context, "options")), "edit_route", array()), array("id" => $this->getAttribute((isset($context["d"]) ? $context["d"] : $this->getContext($context, "d")), "id", array()))), "html", null, true);
                echo "\"><img src=\"";
                echo twig_escape_filter($this->env, (isset($context["fileUrl"]) ? $context["fileUrl"] : $this->getContext($context, "fileUrl")), "html", null, true);
                echo "\"/></a>
        ";
            } else {
                // line 13
                echo "    <img src=\"";
                echo twig_escape_filter($this->env, (isset($context["fileUrl"]) ? $context["fileUrl"] : $this->getContext($context, "fileUrl")), "html", null, true);
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
        return "CoreUnionBundle:Admin/Form/td_types:image.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  62 => 15,  55 => 13,  47 => 11,  44 => 10,  42 => 9,  39 => 8,  35 => 6,  31 => 4,  29 => 3,  26 => 2,  20 => 1,);
    }
}
