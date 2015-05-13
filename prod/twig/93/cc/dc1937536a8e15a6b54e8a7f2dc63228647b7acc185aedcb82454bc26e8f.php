<?php

/* ApplicationSonataAdminBundle:Admin/ExtraBlocks/Comments:email_message_to_preorder.html.twig */
class __TwigTemplate_93ccdc1937536a8e15a6b54e8a7f2dc63228647b7acc185aedcb82454bc26e8f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'comments_block_email_message' => array($this, 'block_comments_block_email_message'),
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
        $this->displayBlock('comments_block_email_message', $context, $blocks);
    }

    public function block_comments_block_email_message($context, array $blocks = array())
    {
        // line 10
        echo "    ";
        ob_start();
        // line 11
        echo "
        <h3>Уважаемый(ая), ";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "username", array()), "html", null, true);
        echo "!</h3>
        <p>На интернет-портале <a href=\"http://";
        // line 13
        echo twig_escape_filter($this->env, (isset($context["domain"]) ? $context["domain"] : null), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, (isset($context["domain"]) ? $context["domain"] : null), "html", null, true);
        echo "</a> был оставлен комментарий пользователем <a href='http://";
        echo twig_escape_filter($this->env, (isset($context["domain"]) ? $context["domain"] : null), "html", null, true);
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_sonata_user_user_edit", array("id" => $this->getAttribute($this->getAttribute((isset($context["comment"]) ? $context["comment"] : null), "user", array()), "id", array()))), "html", null, true);
        echo "' target='_blank'>";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["comment"]) ? $context["comment"] : null), "user", array()), "username", array()), "html", null, true);
        echo "</a> к передзаказу <a href=\"http://";
        echo twig_escape_filter($this->env, (isset($context["domain"]) ? $context["domain"] : null), "html", null, true);
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_order_subscribers_toproductbyorder_edit", array("id" => $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()))), "html", null, true);
        echo "\">№";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()), "html", null, true);
        echo "</a>.</p>

        <br>
        <p>
            Дата создания комментария: ";
        // line 17
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["comment"]) ? $context["comment"] : null), "createdAt", array()), "d.m.Y H:i:s", (isset($context["default_timezone"]) ? $context["default_timezone"] : null)), "html", null, true);
        echo " по МСК.
        </p>
        <p>
            Комментарий содержит следующий текст:
            <br>
            <div style=\"border-left:solid 5px gray; padding: 10px 20px;margin-left: 10px;\">";
        // line 22
        echo nl2br(twig_escape_filter($this->env, $this->getAttribute((isset($context["comment"]) ? $context["comment"] : null), "comment", array()), "html", null, true));
        echo "</div>
        </p>
        <p>
            Просмотреть или написать комментарий Вы можете по следующей ссылке:
            <br>
            <a href=\"http://";
        // line 27
        echo twig_escape_filter($this->env, (isset($context["domain"]) ? $context["domain"] : null), "html", null, true);
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_order_subscribers_toproductbyorder_edit", array("id" => $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()))), "html", null, true);
        echo "#comment-";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["comment"]) ? $context["comment"] : null), "id", array()), "html", null, true);
        echo "\">http://";
        echo twig_escape_filter($this->env, (isset($context["domain"]) ? $context["domain"] : null), "html", null, true);
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_order_subscribers_toproductbyorder_edit", array("id" => $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()))), "html", null, true);
        echo "#comment-";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["comment"]) ? $context["comment"] : null), "id", array()), "html", null, true);
        echo "</a>
        </p>

        <br>
        <p>Просим вас не отвечать на это уведомление оно выслано автоматически.</p>
        <p>
            С уважением и наилучшими пожеланиями,
            <br>
            команда OliKids
            <br>
            <a href=\"http://";
        // line 37
        echo twig_escape_filter($this->env, (isset($context["domain"]) ? $context["domain"] : null), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, (isset($context["domain"]) ? $context["domain"] : null), "html", null, true);
        echo "</a>
        </p>

    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "ApplicationSonataAdminBundle:Admin/ExtraBlocks/Comments:email_message_to_preorder.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  98 => 37,  77 => 27,  69 => 22,  61 => 17,  42 => 13,  38 => 12,  35 => 11,  32 => 10,  26 => 9,  23 => 8,  20 => 1,);
    }
}
