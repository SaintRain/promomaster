<?php

/* CoreCommonBundle:Pages:index_dummy.html.twig */
class __TwigTemplate_26502b978ced61d63c80680f7298aa14e3c6e62d5c90b7733cbc53f6af62bec4 extends Twig_Template
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
        echo "
";
        // line 8
        echo "
<!doctype html>
<html lang=\"ru\">
<head>
\t<title>PromoMaster.net &mdash; интернет-магазин детских товаров<</title>
\t<meta charset=\"utf-8\">
\t<link href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("dummy/css/style.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
\t<script type=\"text/javascript\" src=\"//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js\"></script>
\t<script type=\"text/javascript\" src=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("dummy/js/jquery.placeholder.min.js"), "html", null, true);
        echo "\"></script>
\t<!--[if lt IE 9]><script src=\"http://html5shiv.googlecode.com/svn/trunk/html5.js\"></script><![endif]-->
\t<script type=\"text/javascript\" src=\"//vk.com/js/api/openapi.js?82\"></script>
\t<script type=\"text/javascript\">VK.init({apiId: 3503016, onlyWidgets: true});</script>

\t<meta property=\"og:image\" content=\"http://www.PromoMaster.net/dummy/images/promo_pic.jpg\"/>
\t<meta property=\"og:title\" content=\"OliKids &mdash; интернет-магазин детских товаров. Скоро открытие!\"/>
\t<meta property=\"og:description\" content=\"Детские игрушки, товары для творчества, одежда и обувь для детей, все для кормления, мебель в детскую, коляски\"/>
\t<meta property=\"og:type\" content=\"website\"/>
\t<meta property=\"og:url\" content=\"http://www.PromoMaster.net/\"/>
</head>
<body>

<header id=\"header\">
\t<h1 class=\"header_logo\">PromoMaster.net &mdash; интернет-магазин детских товаров</h1>
\t<div class=\"socials\">
\t\t<div class=\"social\">
\t\t\t<div id=\"fb-root\"></div>
\t\t\t<script>(function(d, s, id) {var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) {return;} js = d.createElement(s); js.id = id; js.src = \"//connect.facebook.net/ru_RU/all.js#xfbml=1\"; fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));</script>
\t\t\t<div class=\"fb-like\" data-href=\"http://www.PromoMaster.net/\" data-send=\"false\" data-layout=\"box_count\" data-width=\"150\" data-show-faces=\"true\" data-font=\"arial\"></div>
\t\t</div>
\t\t<div class=\"social\">
\t\t\t<div id=\"vk_like\"></div>
\t\t\t<script type=\"text/javascript\">VK.Widgets.Like(\"vk_like\", {type: \"vertical\", height: 24});</script>
\t\t</div>
\t\t<div class=\"social\">
\t\t\t<div class=\"g-plusone\" data-size=\"tall\" data-href=\"http://www.PromoMaster.net/\"></div>
\t\t\t<script type=\"text/javascript\">(function() {var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true; po.src = 'https://apis.google.com/js/plusone.js'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);})();</script>
\t\t</div>
\t\t<div class=\"social socials_twitter\">
\t\t\t<a href=\"https://twitter.com/share\" class=\"twitter-share-button\" data-url=\"http://www.PromoMaster.net/\" data-via=\"PromoMaster.net\" data-lang=\"ru\" data-related=\"anywhereTheJavascriptAPI\" data-count=\"vertical\">Твитнуть</a>
\t\t\t<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=\"https://platform.twitter.com/widgets.js\";fjs.parentNode.insertBefore(js,fjs);}}(document,\"script\",\"twitter-wjs\");</script>
\t\t</div>
\t</div>
</header>

<section id=\"promo\">
\t<h2>Интернет-магазин детских товаров. Скоро открытие!</h2>
\t<ul class=\"promo_cats\">
\t\t<li class=\"first\">Детские игрушки</li>
\t\t<li>Товары для творчества</li>
\t\t<li>Одежда и обувь для детей</li>
\t\t<li>Все для кормления</li>
\t\t<li>Мебель в детскую</li>
\t\t<li>Коляски</li>
\t</ul>
</section>

<section id=\"subscribe\"></section>

<footer id=\"footer\">&copy; ";
        // line 66
        echo " ";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "Y", (isset($context["default_timezone"]) ? $context["default_timezone"] : null)), "html", null, true);
        echo " Olikids</footer>

</body>
</html>";
    }

    public function getTemplateName()
    {
        return "CoreCommonBundle:Pages:index_dummy.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  88 => 66,  35 => 16,  30 => 14,  22 => 8,  19 => 1,);
    }
}
