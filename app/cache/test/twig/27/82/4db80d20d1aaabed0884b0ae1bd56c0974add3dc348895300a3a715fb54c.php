<?php

/* CoreTroubleTicketBundle:Admin/TroubleTicket:edit.html.twig */
class __TwigTemplate_27824db80d20d1aaabed0884b0ae1bd56c0974add3dc348895300a3a715fb54c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("ApplicationSonataAdminBundle:CRUD:base_edit.html.twig");

        $this->blocks = array(
            'right_side' => array($this, 'block_right_side'),
            'preview' => array($this, 'block_preview'),
            'form' => array($this, 'block_form'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "ApplicationSonataAdminBundle:CRUD:base_edit.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_right_side($context, array $blocks = array())
    {
        // line 3
        $this->displayBlock('preview', $context, $blocks);
        // line 292
        echo "    ";
        $this->displayBlock('form', $context, $blocks);
    }

    // line 3
    public function block_preview($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        if (((!(null === $this->getAttribute((isset($context["admin"]) ? $context["admin"] : $this->getContext($context, "admin")), "id", array(0 => (isset($context["object"]) ? $context["object"] : $this->getContext($context, "object"))), "method"))) && (!(null === $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "id", array()))))) {
            // line 5
            echo "        <div class=\"row-fluid\">
            <div class=\"clearfix\"></div>
            <div class=\"span10\">
                <h3>";
            // line 8
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "title", array()), "html", null, true);
            echo "</h3>
                <div class=\"clearfix\">
                    ";
            // line 10
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(array(0 => "success", 1 => "error", 2 => "info", 3 => "warning"));
            foreach ($context['_seq'] as $context["_key"] => $context["notice_level"]) {
                // line 11
                echo "                        ";
                $context["session_var"] = ("sonata_flash_" . $context["notice_level"]);
                // line 12
                echo "                        ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "flashbag", array()), "get", array(0 => (isset($context["session_var"]) ? $context["session_var"] : $this->getContext($context, "session_var"))), "method"));
                foreach ($context['_seq'] as $context["_key"] => $context["flash"]) {
                    // line 13
                    echo "                            <div class=\"alert ";
                    echo twig_escape_filter($this->env, ("alert-" . $context["notice_level"]), "html", null, true);
                    echo "\">
                                ";
                    // line 14
                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($context["flash"], array(), "SonataAdminBundle"), "html", null, true);
                    echo "
                            </div>
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flash'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 17
                echo "                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['notice_level'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 18
            echo "                    ";
            if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "errors", array())) > 0)) {
                // line 19
                echo "                        <div class=\"sonata-ba-form-error\">
                            ";
                // line 20
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors');
                echo "
                        </div>
                    ";
            }
            // line 23
            echo "                </div>
            </div>
            <div class=\"span6\">
                <div class=\"straight-border span12\">
                    <div class=\"grey-gradient span12\">
                        <div class=\"with-padding\">
                            <h5 class=\"pull-left widget-color\">Основные cвойства</h5>
                            <h5 class=\"pull-right\">
                                <div class=\"btn-group\">
                                    <a title=\"Редактировать\" id=\"edit-ticket\" class=\"btn btn-small display-form\" href=\"javascript:void(0);\"><i class=\"icon-pencil\"></i></a>
                                    <a title=\"Цитировать\" id=\"cite-desc\" class=\"btn btn-small display-form\" href=\"javascript:void(0);\"><i class=\"icon-bullhorn\"></i></a>
                                    <a title=\"Следить\" class=\"";
            // line 34
            if ((isset($context["watched"]) ? $context["watched"] : $this->getContext($context, "watched"))) {
                echo "active ";
            }
            echo "btn btn-small watcher\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_troubleticket_troubleticket_watcher", array("id" => $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "id", array()))), "html", null, true);
            echo "\"><i class=\"icon-star\"></i></a>
                                    <a title=\"Копировать\" href=\"";
            // line 35
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_troubleticket_troubleticket_copy", array("id" => $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "id", array()))), "html", null, true);
            echo "\" class=\"btn btn-small\"><i class=\"icon-file\"></i></a>
                                </div>
                            </h5>
                            <div class=\"clear-fix\"></div>
                        </div>
                    </div>
                    <table class=\"table-striped table no-marg\">
                        <tbody>
                            <tr>
                                <td><b>Добавил(а):</b></td>
                                  <td>
                                    ";
            // line 46
            $context["author"] = (($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "authorName", array())) ? ($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "authorName", array())) : ($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "authorEmail", array())));
            // line 47
            echo "                                    ";
            if ($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "user", array())) {
                // line 48
                echo "                                        <a id=\"cite-person\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_sonata_user_user_edit", array("id" => $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "user", array()), "id", array()))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, (isset($context["author"]) ? $context["author"] : $this->getContext($context, "author")), "html", null, true);
                echo "</a>
                                        ";
            } else {
                // line 50
                echo "                                        <span id=\"cite-person\">";
                echo twig_escape_filter($this->env, (isset($context["author"]) ? $context["author"] : $this->getContext($context, "author")), "html", null, true);
                echo "</span>
                                    ";
            }
            // line 52
            echo "                                    <span>";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "createdDateTime", array()), "d.m.Y H:i:s", (isset($context["default_timezone"]) ? $context["default_timezone"] : $this->getContext($context, "default_timezone"))), "html", null, true);
            echo "</span>
                                </td>
                            </tr>
                            <tr>
                                <td><b>Контактый email:</b></td>
                                <td>";
            // line 57
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "authorEmail", array()), "html", null, true);
            echo "</td>
                            </tr>
                            <tr>
                                <td><b>Заказ:</b></td>
                                <td>
                                    ";
            // line 62
            if ($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "order", array())) {
                // line 63
                echo "                                        <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_order_order_edit", array("id" => $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "order", array()), "id", array()))), "html", null, true);
                echo "\">#";
                echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "order", array()), "id", array())), "html", null, true);
                echo "</a>,
                                    ";
            }
            // line 65
            echo "                                    ";
            echo twig_escape_filter($this->env, (isset($context["author"]) ? $context["author"] : $this->getContext($context, "author")), "html", null, true);
            echo "
                                    ";
            // line 66
            if ((isset($context["orders"]) ? $context["orders"] : $this->getContext($context, "orders"))) {
                // line 67
                echo "                                        (<a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_order_order_list", array("filter[contragent__user__email][value]" => (isset($context["contragentsId"]) ? $context["contragentsId"] : $this->getContext($context, "contragentsId")))), "html", null, true);
                echo "\">все заказы пользователя</a>)
                                        ";
            } else {
                // line 69
                echo "                                            (<a href=\"javascript:void(0);\">У пользователя нет ни одного заказа</a>)
                                    ";
            }
            // line 71
            echo "                                </td>
                            </tr>

                            ";
            // line 74
            if ($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "product", array())) {
                // line 75
                echo "
                                <tr>
                                    <td><b>Продукт:</b></td>
                                    <td>
                                        <a href=\"";
                // line 79
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_product_commonproduct_edit", array("id" => $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "product", array()), "id", array()))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "product", array()), "captionRu", array()), "html", null, true);
                echo "</a>,
                                    </td>
                                </tr>

                            ";
            }
            // line 84
            echo "
                            <tr>
                                <td><b>Статус:</b></td>
                                <td>
                                    ";
            // line 88
            if ($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "status", array())) {
                // line 89
                echo "                                        ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "status", array()), "captionRu", array()), "html", null, true);
                echo "
                                        ";
            } else {
                // line 91
                echo "                                            ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["oldObject"]) ? $context["oldObject"] : $this->getContext($context, "oldObject")), "status", array()), "captionRu", array()), "html", null, true);
                echo "
                                    ";
            }
            // line 93
            echo "                                </td>
                            </tr>
                            <tr>
                                <td><b>Приоритет:</b></td>

                                <td>
                                    ";
            // line 99
            if ($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "priority", array())) {
                // line 100
                echo "                                        ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "priority", array()), "captionRu", array()), "html", null, true);
                echo "
                                        ";
            } else {
                // line 102
                echo "                                            ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["oldObject"]) ? $context["oldObject"] : $this->getContext($context, "oldObject")), "priority", array()), "captionRu", array()), "html", null, true);
                echo "
                                    ";
            }
            // line 104
            echo "                                </td>
                            </tr>
                            <tr>
                                <td><b>Назначена:</b></td>
                                <td>
                                    ";
            // line 109
            if (($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "manager", array()) || $this->getAttribute((isset($context["oldObject"]) ? $context["oldObject"] : $this->getContext($context, "oldObject")), "manager", array()))) {
                // line 110
                echo "                                        <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_sonata_user_user_edit", array("id" => (($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "manager", array())) ? ($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "manager", array()), "id", array())) : ($this->getAttribute($this->getAttribute((isset($context["oldObject"]) ? $context["oldObject"] : $this->getContext($context, "oldObject")), "manager", array()), "id", array()))))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "manager", array())) ? ($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "manager", array()), "userName", array())) : ($this->getAttribute($this->getAttribute((isset($context["oldObject"]) ? $context["oldObject"] : $this->getContext($context, "oldObject")), "manager", array()), "userName", array()))), "html", null, true);
                echo "</a>
                                        ";
            } else {
                // line 112
                echo "                                            <span class=\"label label-important\">Нет</span>
                                    ";
            }
            // line 114
            echo "                                </td>
                            </tr>
                            <tr>
                                <td><b>Категория:</b></td>
                                <td>
                                    ";
            // line 119
            if ($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "category", array())) {
                // line 120
                echo "                                        ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "category", array()), "captionRu", array()), "html", null, true);
                echo "
                                        ";
            } else {
                // line 122
                echo "                                            ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["oldObject"]) ? $context["oldObject"] : $this->getContext($context, "oldObject")), "category", array()), "captionRu", array()), "html", null, true);
                echo "
                                    ";
            }
            // line 124
            echo "                                </td>
                            </tr>
                            <tr>
                                <td><b>Готовность:</b></td>
                                <td>
                                    <div class=\"progress progress-info no-marg\">
                                        <div class=\"bar\" style=\"width: ";
            // line 130
            echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "readiness", array()) . "%"), "html", null, true);
            echo "\">
                                            <span>";
            // line 131
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "readiness", array()), "html", null, true);
            echo "&percnt;</span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><b>Обновлено:</b></td>
                                <td>";
            // line 138
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "updatedDateTime", array()), "d.m.Y H:i:s", (isset($context["default_timezone"]) ? $context["default_timezone"] : $this->getContext($context, "default_timezone"))), "html", null, true);
            echo "</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class=\"grey-gradient span12 border-t like-first with-double-padding\">
                        <div class=\"pull-right\">
                            <a class=\"btn\" target=\"_blank\" href=\"";
            // line 144
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("trouble_ticket_edit", array("hash" => $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "hash", array()))), "html", null, true);
            echo "\">Просмотреть на сайте</a>
                        </div>
                        <div class=\"clear-fix\"></div>
                    </div>
                </div>
            </div>
            ";
            // line 150
            if (((!(null === $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "body", array()))) || (twig_length_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "file", array())) > 0))) {
                // line 151
                echo "            <div class=\"span5\">
                <div class=\"straight-border\">
                    <div class=\"grey-gradient span12\">
                        <div class=\"with-padding\">
                            <h5 class=\"pull-left\">Дополнительные cвойства</h5>
                            <div class=\"clear-fix\"></div>
                        </div>
                    </div>
                    <table class=\"table-striped table\">
                        <tbody>
                            ";
                // line 161
                if ((!(null === $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "body", array())))) {
                    // line 162
                    echo "                                <tr>
                                    <td><b>Описание:</b></td>
                                    <td id=\"cite-content\">";
                    // line 164
                    echo nl2br(twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "body", array()), "html", null, true));
                    echo "</td>
                                </tr>
                            ";
                }
                // line 167
                echo "                            ";
                if ((twig_length_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "file", array())) > 0)) {
                    // line 168
                    echo "                                <tr>
                                    <td><b>Файлы:</b></td>
                                    <td>
                                        <ul data-id=";
                    // line 171
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "id", array()), "html", null, true);
                    echo ">
                                            ";
                    // line 172
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "file", array()));
                    foreach ($context['_seq'] as $context["_key"] => $context["file"]) {
                        // line 173
                        echo "                                                <li class=\"file-donwload\">
                                                    <a href=\"";
                        // line 174
                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($context["file"])), "html", null, true);
                        echo "\"><i class=\"icon-download-alt\"></i>";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["file"], "name", array()), "html", null, true);
                        echo "</a>
                                                    <a class=\"trouble-remove-file\" data-id=\"";
                        // line 175
                        echo twig_escape_filter($this->env, $this->getAttribute($context["file"], "id", array()), "html", null, true);
                        echo "\" href=\"javascript:void(0);\"><i class=\"icon-remove\"></i></a>
                                                </li>
                                            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['file'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 178
                    echo "                                        </ul>
                                    </td>
                                </tr>
                            ";
                }
                // line 182
                echo "                        </tbody>
                    </table>
                </div>
            </div>
            ";
            }
            // line 187
            echo "        </div>
        ";
            // line 188
            if (twig_length_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "logs", array()))) {
                // line 189
                echo "        <div class=\"row-fluid\">
            <div class=\"clear-fix\"></div>
            <div class=\"span6\">
                <div class=\"straight-border widget alone\">
                    <div class=\"grey-gradient span12 like-first border-b\">
                        <div class=\"with-padding\">
                            <h5 class=\"pull-left\">История</h5>
                            <div class=\"clear-fix\"></div>
                        </div>
                    </div>
                    <div class=\"clearfix\"></div>
                    <ul class=\"recent\">
                        ";
                // line 201
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "logs", array()));
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
                foreach ($context['_seq'] as $context["_key"] => $context["log"]) {
                    // line 202
                    echo "                        <li class=\"log-num-";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["log"], "id", array()), "html", null, true);
                    echo "\" id=\"log-pos-";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["log"], "id", array()), "html", null, true);
                    echo "\">
                            <div class=\"ticket-history inner\">
                                <div class=\"recent-meta\">
                                    <div class=\"pull-left\">
                                        <span>Обновил(а)</span>
                                        ";
                    // line 207
                    if ($this->getAttribute($context["log"], "manager", array())) {
                        // line 208
                        echo "                                            <a href=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_sonata_user_user_edit", array("id" => $this->getAttribute($this->getAttribute($context["log"], "manager", array()), "id", array()))), "html", null, true);
                        echo "\">
                                                <span class=\"ticket-history-header-owner\">";
                        // line 209
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["log"], "manager", array()), "email", array()), "html", null, true);
                        echo "</span>
                                            </a>
                                            ";
                    } elseif ($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "user", array())) {
                        // line 212
                        echo "                                                <a href=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_sonata_user_user_edit", array("id" => $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "user", array()), "id", array()))), "html", null, true);
                        echo "\">
                                                    <span class=\"ticket-history-header-owner\">";
                        // line 213
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "user", array()), "email", array()), "html", null, true);
                        echo "</span>
                                                </a>
                                            ";
                    } else {
                        // line 216
                        echo "                                                <span class=\"ticket-history-header-owner\">";
                        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "authorName", array())) ? ($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "authorName", array())) : ($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "authorEmail", array()))), "html", null, true);
                        echo "</span>
                                        ";
                    }
                    // line 218
                    echo "                                        <span>";
                    echo twig_escape_filter($this->env, $this->env->getExtension('time_ago_extension')->timeAgoInWordsFilter($this->getAttribute($context["log"], "date", array())), "html", null, true);
                    echo "</span>
                                    </div>
                                    <div class=\"pull-right\">
                                        <div class=\"btn-group\">
                                            ";
                    // line 222
                    if (($this->getAttribute($context["log"], "manager", array()) || $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "user", array()))) {
                        // line 223
                        echo "                                                ";
                        $context["curUser"] = (($this->getAttribute($context["log"], "manager", array())) ? ($this->getAttribute($this->getAttribute($context["log"], "manager", array()), "id", array())) : ($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "user", array()), "id", array())));
                        // line 224
                        echo "                                                ";
                        if (((isset($context["curUser"]) ? $context["curUser"] : $this->getContext($context, "curUser")) == $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "id", array()))) {
                            // line 225
                            echo "                                                    <a title=\"Редактировать\" class=\"ticket-msg-edit btn btn-default\"  data-manager=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "id", array()), "html", null, true);
                            echo "\" ";
                            if ($this->getAttribute($context["log"], "message", array())) {
                                echo " data-msg-num=\"";
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["log"], "message", array()), "id", array()), "html", null, true);
                                echo "\"";
                            }
                            echo " data-log-num=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["log"], "id", array()), "html", null, true);
                            echo "\" class=\"pull-right\" href=\"";
                            echo twig_escape_filter($this->env, (($this->getAttribute($context["log"], "message", array())) ? ($this->env->getExtension('routing')->getPath("admin_core_troubleticket_message_edit", array("id" => $this->getAttribute($this->getAttribute($context["log"], "message", array()), "id", array())))) : ($this->env->getExtension('routing')->getPath("admin_core_troubleticket_message_create"))), "html", null, true);
                            echo "\">
                                                        <i class=\"icon-pencil\"></i>
                                                    </a>
                                                ";
                        }
                        // line 229
                        echo "                                            ";
                    }
                    // line 230
                    echo "                                            ";
                    if ($this->getAttribute($context["log"], "message", array())) {
                        // line 231
                        echo "                                                <a title=\"Цитировать\" class=\"ticket-cite btn btn-default\" href=\"#edit-msg\">
                                                    <i class=\"icon-bullhorn\"></i>
                                                </a>
                                            ";
                    }
                    // line 235
                    echo "                                                <a title=\"Посмотреть ответ\" href=\"#log-pos-";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["log"], "id", array()), "html", null, true);
                    echo "\" class=\"scrollify btn btn-default\">&num;";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
                    echo "</a>
                                        </div>
                                    </div>
                                    <div class=\"clearfix\"></div>
                                </div>
                                <div>
                                    ";
                    // line 241
                    if (twig_length_filter($this->env, $this->getAttribute($context["log"], "changes", array()))) {
                        // line 242
                        echo "                                    <ul>
                                        ";
                        // line 243
                        $context['_parent'] = (array) $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["log"], "changes", array()));
                        foreach ($context['_seq'] as $context["field"] => $context["changes"]) {
                            // line 244
                            echo "                                            ";
                            if (($context["field"] != "file")) {
                                // line 245
                                echo "                                                ";
                                $context["valFrom"] = null;
                                // line 246
                                echo "                                                ";
                                $context["valTo"] = null;
                                // line 247
                                echo "                                                ";
                                if ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "children", array(), "any", false, true), $context["field"], array(), "array", false, true), "vars", array(), "any", false, true), "choices", array(), "any", true, true)) {
                                    // line 248
                                    echo "                                                    ";
                                    $context['_parent'] = (array) $context;
                                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "children", array()), $context["field"], array(), "array"), "vars", array()), "choices", array()));
                                    foreach ($context['_seq'] as $context["_key"] => $context["choice"]) {
                                        // line 249
                                        echo "                                                        ";
                                        $context["changesFirstKey"] = (((twig_length_filter($this->env, $context["changes"]) > 1)) ? (twig_first($this->env, twig_get_array_keys_filter($context["changes"]))) : (null));
                                        // line 250
                                        echo "                                                        ";
                                        $context["changesLastKey"] = twig_last($this->env, twig_get_array_keys_filter($context["changes"]));
                                        // line 251
                                        echo "                                                        ";
                                        if ((($this->getAttribute($context["choice"], "value", array()) == twig_first($this->env, $context["changes"])) || ((isset($context["changesFirstKey"]) ? $context["changesFirstKey"] : $this->getContext($context, "changesFirstKey")) == $this->getAttribute($context["choice"], "value", array())))) {
                                            // line 252
                                            echo "                                                            ";
                                            $context["valFrom"] = ("изменился с " . $this->getAttribute($context["choice"], "label", array()));
                                            // line 253
                                            echo "                                                        ";
                                        }
                                        // line 254
                                        echo "                                                        ";
                                        if ((($this->getAttribute($context["choice"], "value", array()) == twig_last($this->env, $context["changes"])) || ((isset($context["changesLastKey"]) ? $context["changesLastKey"] : $this->getContext($context, "changesLastKey")) == $this->getAttribute($context["choice"], "value", array())))) {
                                            // line 255
                                            echo "                                                            ";
                                            $context["valTo"] = (" на " . $this->getAttribute($context["choice"], "label", array()));
                                            // line 256
                                            echo "                                                        ";
                                        }
                                        // line 257
                                        echo "                                                    ";
                                    }
                                    $_parent = $context['_parent'];
                                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['choice'], $context['_parent'], $context['loop']);
                                    $context = array_intersect_key($context, $_parent) + $_parent;
                                    // line 258
                                    echo "                                                    <li>Параметр <span class=\"italic\">&laquo;";
                                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans(("parameter." . $context["field"])), "html", null, true);
                                    echo "&raquo;</span> ";
                                    if ((isset($context["valFrom"]) ? $context["valFrom"] : $this->getContext($context, "valFrom"))) {
                                        echo " ";
                                        echo twig_escape_filter($this->env, (isset($context["valFrom"]) ? $context["valFrom"] : $this->getContext($context, "valFrom")));
                                        echo " ";
                                    }
                                    echo " ";
                                    if ((isset($context["valTo"]) ? $context["valTo"] : $this->getContext($context, "valTo"))) {
                                        echo " ";
                                        echo twig_escape_filter($this->env, (isset($context["valTo"]) ? $context["valTo"] : $this->getContext($context, "valTo")));
                                        echo "  ";
                                    }
                                    echo "</li>
                                                    ";
                                } else {
                                    // line 260
                                    echo "                                                        <li>Параметр <span class=\"italic\">&laquo;";
                                    echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans(("parameter." . $context["field"])), "html", null, true);
                                    echo "&raquo;</span> изменился ";
                                    if (twig_first($this->env, $context["changes"])) {
                                        echo "с ";
                                        echo twig_escape_filter($this->env, twig_first($this->env, $context["changes"]));
                                        echo " ";
                                    }
                                    echo "на ";
                                    echo twig_escape_filter($this->env, twig_last($this->env, $context["changes"]));
                                    echo "</li>
                                                ";
                                }
                                // line 262
                                echo "                                                   ";
                            } else {
                                // line 263
                                echo "                                                        ";
                                $context['_parent'] = (array) $context;
                                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["changes"], "data", array()));
                                foreach ($context['_seq'] as $context["key"] => $context["file"]) {
                                    // line 264
                                    echo "                                                            ";
                                    if ($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "file", array()), "get", array(0 => $context["key"]), "method")) {
                                        // line 265
                                        echo "                                                            <li>";
                                        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans(("parameter." . $this->getAttribute($context["changes"], "operation", array()))), "html", null, true);
                                        echo " файл <a href=\"";
                                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "file", array()), "get", array(0 => $context["key"]), "method"))), "html", null, true);
                                        echo "\"><i class=\"icon-download-alt\"></i>";
                                        echo twig_escape_filter($this->env, $context["file"], "html", null, true);
                                        echo "</a></li>
                                                                ";
                                    } else {
                                        // line 267
                                        echo "                                                                <li>";
                                        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans(("parameter." . $this->getAttribute($context["changes"], "operation", array()))), "html", null, true);
                                        echo " файл <span ";
                                        if (($this->getAttribute($context["changes"], "operation", array()) != "add")) {
                                            echo "class=\"file-removed\"";
                                        }
                                        echo ">";
                                        echo twig_escape_filter($this->env, $context["file"], "html", null, true);
                                        echo "</span></li>
                                                            ";
                                    }
                                    // line 269
                                    echo "                                                        ";
                                }
                                $_parent = $context['_parent'];
                                unset($context['_seq'], $context['_iterated'], $context['key'], $context['file'], $context['_parent'], $context['loop']);
                                $context = array_intersect_key($context, $_parent) + $_parent;
                                // line 270
                                echo "                                            ";
                            }
                            // line 271
                            echo "                                        ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['field'], $context['changes'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 272
                        echo "                                    </ul>
                                    ";
                    }
                    // line 274
                    echo "                                    ";
                    if ($this->getAttribute($context["log"], "message", array())) {
                        // line 275
                        echo "                                        <article class=\"ticket-msg-num\">
                                            ";
                        // line 276
                        echo nl2br(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["log"], "message", array()), "body", array()), "html", null, true));
                        echo "
                                        </article>
                                        ";
                    } else {
                        // line 279
                        echo "                                        <i class=\"ticket-msg-num empty\"></i>
                                    ";
                    }
                    // line 281
                    echo "                                </div>
                            </div>
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
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['log'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 285
                echo "                    </ul>
                </div>
            </div>
        </div>
        ";
            }
            // line 290
            echo "    ";
        }
        // line 291
        echo "    ";
    }

    // line 292
    public function block_form($context, array $blocks = array())
    {
        // line 293
        echo "        ";
        $this->env->loadTemplate("CoreTroubleTicketBundle:Admin:Form/form.html.twig")->display($context);
        // line 294
        echo "    ";
    }

    // line 296
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 297
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
    <link rel=\"stylesheet\" href=\"";
        // line 298
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/coretroubleticket/css/troubleticket.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
";
    }

    // line 300
    public function block_javascripts($context, array $blocks = array())
    {
        // line 301
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    ";
        // line 302
        if ((!(null === $this->getAttribute((isset($context["object"]) ? $context["object"] : $this->getContext($context, "object")), "id", array())))) {
            // line 303
            echo "    <script>
        adminRoutes['admin_core_troubleticket_message_edit'] = \"";
            // line 304
            echo $this->env->getExtension('routing')->getPath("admin_core_troubleticket_message_edit", array("id" => "PLACEHOLDER"));
            echo "\";
        adminRoutes['admin_core_troubleticket_log_delete'] = \"";
            // line 305
            echo $this->env->getExtension('routing')->getPath("admin_core_troubleticket_log_delete", array("id" => "PLACEHOLDER"));
            echo "\";
        adminRoutes['admin_core_troubleticket_message_delete'] = \"";
            // line 306
            echo $this->env->getExtension('routing')->getPath("admin_core_troubleticket_message_delete", array("id" => "PLACEHOLDER"));
            echo "\";
        adminRoutes['admin_faq_articles_articles_by_category'] = \"";
            // line 307
            echo $this->env->getExtension('routing')->getPath("admin_core_troubleticket_troubleticket_articlesByCategory");
            echo "\";
        adminRoutes['admin_faq_articles_show_ajax'] = \"";
            // line 308
            echo $this->env->getExtension('routing')->getPath("admin_core_troubleticket_troubleticket_article");
            echo "\";
        adminRoutes['deleteToken'] = '";
            // line 309
            echo twig_escape_filter($this->env, (isset($context["deleteToken"]) ? $context["deleteToken"] : $this->getContext($context, "deleteToken")), "html", null, true);
            echo "';
    </script>
    <script src=\"";
            // line 311
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/coretroubleticket/js/troubleticket.js"), "html", null, true);
            echo "\"></script>
    ";
        }
    }

    public function getTemplateName()
    {
        return "CoreTroubleTicketBundle:Admin/TroubleTicket:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  804 => 311,  799 => 309,  795 => 308,  791 => 307,  787 => 306,  783 => 305,  779 => 304,  776 => 303,  774 => 302,  769 => 301,  766 => 300,  760 => 298,  755 => 297,  752 => 296,  748 => 294,  745 => 293,  742 => 292,  738 => 291,  735 => 290,  728 => 285,  711 => 281,  707 => 279,  701 => 276,  698 => 275,  695 => 274,  691 => 272,  685 => 271,  682 => 270,  676 => 269,  664 => 267,  654 => 265,  651 => 264,  646 => 263,  643 => 262,  629 => 260,  611 => 258,  605 => 257,  602 => 256,  599 => 255,  596 => 254,  593 => 253,  590 => 252,  587 => 251,  584 => 250,  581 => 249,  576 => 248,  573 => 247,  570 => 246,  567 => 245,  564 => 244,  560 => 243,  557 => 242,  555 => 241,  543 => 235,  537 => 231,  534 => 230,  531 => 229,  513 => 225,  510 => 224,  507 => 223,  505 => 222,  497 => 218,  491 => 216,  485 => 213,  480 => 212,  474 => 209,  469 => 208,  467 => 207,  456 => 202,  439 => 201,  425 => 189,  423 => 188,  420 => 187,  413 => 182,  407 => 178,  398 => 175,  392 => 174,  389 => 173,  385 => 172,  381 => 171,  376 => 168,  373 => 167,  367 => 164,  363 => 162,  361 => 161,  349 => 151,  347 => 150,  338 => 144,  329 => 138,  319 => 131,  315 => 130,  307 => 124,  301 => 122,  295 => 120,  293 => 119,  286 => 114,  282 => 112,  274 => 110,  272 => 109,  265 => 104,  259 => 102,  253 => 100,  251 => 99,  243 => 93,  237 => 91,  231 => 89,  229 => 88,  223 => 84,  213 => 79,  207 => 75,  205 => 74,  200 => 71,  196 => 69,  190 => 67,  188 => 66,  183 => 65,  175 => 63,  173 => 62,  165 => 57,  156 => 52,  150 => 50,  142 => 48,  139 => 47,  137 => 46,  123 => 35,  115 => 34,  102 => 23,  96 => 20,  93 => 19,  90 => 18,  84 => 17,  75 => 14,  70 => 13,  65 => 12,  62 => 11,  58 => 10,  53 => 8,  48 => 5,  45 => 4,  42 => 3,  37 => 292,  35 => 3,  32 => 2,);
    }
}
