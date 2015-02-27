<?php

/* ApplicationSonataAdminBundle:Admin\ExtraBlocks\Comments:comment.html.twig */
class __TwigTemplate_37a1fa5e03b81f9464078f16abf31af89e0512e8dcf78b4c2a7fce5532470fb4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'comments_block_comment' => array($this, 'block_comments_block_comment'),
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
        $this->displayBlock('comments_block_comment', $context, $blocks);
    }

    public function block_comments_block_comment($context, array $blocks = array())
    {
        // line 10
        echo "    ";
        ob_start();
        // line 11
        echo "
        <div class=\"comment\" id=\"comment-";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["comment"]) ? $context["comment"] : null), "id", array()), "html", null, true);
        echo "-i\" ";
        if (array_key_exists("hide_comment", $context)) {
            echo "style=\"display:none\"";
        }
        echo ">

            <div class=\"comment-header\">";
        // line 16
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["comment"]) ? $context["comment"] : null), "createdAt", array()), "d.m.Y H:i:s", (isset($context["default_timezone"]) ? $context["default_timezone"] : null)), "html", null, true);
        // line 18
        echo "<span class=\"icon icon-remove pull-right comment-remove\" data-id=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["comment"]) ? $context["comment"] : null), "id", array()), "html", null, true);
        echo "\"></span>

                <div>
                    <a href='";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_sonata_user_user_edit", array("id" => $this->getAttribute($this->getAttribute((isset($context["comment"]) ? $context["comment"] : null), "user", array()), "id", array()))), "html", null, true);
        echo "' target='_blank'>";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["comment"]) ? $context["comment"] : null), "user", array()), "username", array()), "html", null, true);
        echo "</a>
                </div>

            </div>

            <div class=\"comment-body\">";
        // line 28
        echo nl2br(twig_escape_filter($this->env, $this->getAttribute((isset($context["comment"]) ? $context["comment"] : null), "comment", array()), "html", null, true));
        // line 30
        echo "</div>

        </div>

    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "ApplicationSonataAdminBundle:Admin\\ExtraBlocks\\Comments:comment.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  68 => 30,  66 => 28,  56 => 21,  49 => 18,  47 => 16,  38 => 12,  35 => 11,  32 => 10,  26 => 9,  23 => 8,  20 => 1,);
    }
}
