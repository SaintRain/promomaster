<?php

/* CoreTroubleTicketBundle:Admin/TroubleTicket:edit.html.twig */
class __TwigTemplate_8bce4efdb95ef4189e563c24d8b176ed389d7126fe73c21d06a1cca71c8cbebb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("ApplicationSonataAdminBundle:CRUD:base_edit.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

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
        if (( !(null === $this->getAttribute((isset($context["admin"]) ? $context["admin"] : null), "id", array(0 => (isset($context["object"]) ? $context["object"] : null)), "method")) &&  !(null === $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array())))) {
            // line 5
            echo "        <div class=\"row-fluid\">
            <div class=\"clearfix\"></div>
            <div class=\"span10\">
                <h3>";
            // line 8
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "title", array()), "html", null, true);
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
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "flashbag", array()), "get", array(0 => (isset($context["session_var"]) ? $context["session_var"] : null)), "method"));
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
            if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "vars", array()), "errors", array())) > 0)) {
                // line 19
                echo "                        <div class=\"sonata-ba-form-error\">
                            ";
                // line 20
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
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
            if ((isset($context["watched"]) ? $context["watched"] : null)) {
                echo "active ";
            }
            echo "btn btn-small watcher\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_troubleticket_troubleticket_watcher", array("id" => $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()))), "html", null, true);
            echo "\"><i class=\"icon-star\"></i></a>
                                    <a title=\"Копировать\" href=\"";
            // line 35
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_troubleticket_troubleticket_copy", array("id" => $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()))), "html", null, true);
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
            $context["author"] = (($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "authorName", array())) ? ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "authorName", array())) : ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "authorEmail", array())));
            // line 47
            echo "                                    ";
            if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "user", array())) {
                // line 48
                echo "                                        <a id=\"cite-person\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_sonata_user_user_edit", array("id" => $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "user", array()), "id", array()))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, (isset($context["author"]) ? $context["author"] : null), "html", null, true);
                echo "</a>
                                        ";
            } else {
                // line 50
                echo "                                        <span id=\"cite-person\">";
                echo twig_escape_filter($this->env, (isset($context["author"]) ? $context["author"] : null), "html", null, true);
                echo "</span>
                                    ";
            }
            // line 52
            echo "                                    <span>";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "createdDateTime", array()), "d.m.Y H:i:s", (isset($context["default_timezone"]) ? $context["default_timezone"] : null)), "html", null, true);
            echo "</span>
                                </td>
                            </tr>
                            <tr>
                                <td><b>Контактый email:</b></td>
                                <td>";
            // line 57
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "authorEmail", array()), "html", null, true);
            echo "</td>
                            </tr>
                            <tr>
                                <td><b>Заказ:</b></td>
                                <td>
                                    ";
            // line 62
            if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "order", array())) {
                // line 63
                echo "                                        <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_order_order_edit", array("id" => $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "order", array()), "id", array()))), "html", null, true);
                echo "\">#";
                echo twig_escape_filter($this->env, $this->env->getExtension('common_extension')->idFormatFilter($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "order", array()), "id", array())), "html", null, true);
                echo "</a>,
                                    ";
            }
            // line 65
            echo "                                    ";
            echo twig_escape_filter($this->env, (isset($context["author"]) ? $context["author"] : null), "html", null, true);
            echo "
                                    ";
            // line 66
            if ((isset($context["orders"]) ? $context["orders"] : null)) {
                // line 67
                echo "                                        (<a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_order_order_list", array("filter[contragent__user__email][value]" => (isset($context["contragentsId"]) ? $context["contragentsId"] : null))), "html", null, true);
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
            if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "product", array())) {
                // line 75
                echo "
                                <tr>
                                    <td><b>Продукт:</b></td>
                                    <td>
                                        <a href=\"";
                // line 79
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_core_product_commonproduct_edit", array("id" => $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "product", array()), "id", array()))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "product", array()), "captionRu", array()), "html", null, true);
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
            if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "status", array())) {
                // line 89
                echo "                                        ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "status", array()), "captionRu", array()), "html", null, true);
                echo "
                                        ";
            } else {
                // line 91
                echo "                                            ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["oldObject"]) ? $context["oldObject"] : null), "status", array()), "captionRu", array()), "html", null, true);
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
            if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "priority", array())) {
                // line 100
                echo "                                        ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "priority", array()), "captionRu", array()), "html", null, true);
                echo "
                                        ";
            } else {
                // line 102
                echo "                                            ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["oldObject"]) ? $context["oldObject"] : null), "priority", array()), "captionRu", array()), "html", null, true);
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
            if (($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "manager", array()) || $this->getAttribute((isset($context["oldObject"]) ? $context["oldObject"] : null), "manager", array()))) {
                // line 110
                echo "                                        <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_sonata_user_user_edit", array("id" => (($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "manager", array())) ? ($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "manager", array()), "id", array())) : ($this->getAttribute($this->getAttribute((isset($context["oldObject"]) ? $context["oldObject"] : null), "manager", array()), "id", array()))))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "manager", array())) ? ($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "manager", array()), "userName", array())) : ($this->getAttribute($this->getAttribute((isset($context["oldObject"]) ? $context["oldObject"] : null), "manager", array()), "userName", array()))), "html", null, true);
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
            if ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "category", array())) {
                // line 120
                echo "                                        ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "category", array()), "captionRu", array()), "html", null, true);
                echo "
                                        ";
            } else {
                // line 122
                echo "                                            ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["oldObject"]) ? $context["oldObject"] : null), "category", array()), "captionRu", array()), "html", null, true);
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
            echo twig_escape_filter($this->env, ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "readiness", array()) . "%"), "html", null, true);
            echo "\">
                                            <span>";
            // line 131
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "readiness", array()), "html", null, true);
            echo "&percnt;</span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><b>Обновлено:</b></td>
                                <td>";
            // line 138
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "updatedDateTime", array()), "d.m.Y H:i:s", (isset($context["default_timezone"]) ? $context["default_timezone"] : null)), "html", null, true);
            echo "</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class=\"grey-gradient span12 border-t like-first with-double-padding\">
                        <div class=\"pull-right\">
                            <a class=\"btn\" target=\"_blank\" href=\"";
            // line 144
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("trouble_ticket_edit", array("hash" => $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "hash", array()))), "html", null, true);
            echo "\">Просмотреть на сайте</a>
                        </div>
                        <div class=\"clear-fix\"></div>
                    </div>
                </div>
            </div>
            ";
            // line 150
            if (( !(null === $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "body", array())) || (twig_length_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "file", array())) > 0))) {
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
                if ( !(null === $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "body", array()))) {
                    // line 162
                    echo "                                <tr>
                                    <td><b>Описание:</b></td>
                                    <td id=\"cite-content\">";
                    // line 164
                    echo nl2br(twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "body", array()), "html", null, true));
                    echo "</td>
                                </tr>
                            ";
                }
                // line 167
                echo "                            ";
                if ((twig_length_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "file", array())) > 0)) {
                    // line 168
                    echo "                                <tr>
                                    <td><b>Файлы:</b></td>
                                    <td>
                                        <ul data-id=";
                    // line 171
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()), "html", null, true);
                    echo ">
                                            ";
                    // line 172
                    $context['_parent'] = (array) $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "file", array()));
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
            if (twig_length_filter($this->env, $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "logs", array()))) {
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
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "logs", array()));
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
                    } elseif ($this->getAttribute(                    // line 211
(isset($context["object"]) ? $context["object"] : null), "user", array())) {
                        // line 212
                        echo "                                                <a href=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("admin_sonata_user_user_edit", array("id" => $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "user", array()), "id", array()))), "html", null, true);
                        echo "\">
                                                    <span class=\"ticket-history-header-owner\">";
                        // line 213
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "user", array()), "email", array()), "html", null, true);
                        echo "</span>
                                                </a>
                                            ";
                    } else {
                        // line 216
                        echo "                                                <span class=\"ticket-history-header-owner\">";
                        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "authorName", array())) ? ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "authorName", array())) : ($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "authorEmail", array()))), "html", null, true);
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
                    if (($this->getAttribute($context["log"], "manager", array()) || $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "user", array()))) {
                        // line 223
                        echo "                                                ";
                        $context["curUser"] = (($this->getAttribute($context["log"], "manager", array())) ? ($this->getAttribute($this->getAttribute($context["log"], "manager", array()), "id", array())) : ($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "user", array()), "id", array())));
                        // line 224
                        echo "                                                ";
                        if (((isset($context["curUser"]) ? $context["curUser"] : null) == $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "id", array()))) {
                            // line 225
                            echo "                                                    <a title=\"Редактировать\" class=\"ticket-msg-edit btn btn-default\"  data-manager=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "id", array()), "html", null, true);
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
                                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "children", array()), $context["field"], array(), "array"), "vars", array()), "choices", array()));
                                    foreach ($context['_seq'] as $context["_key"] => $context["choice"]) {
                                        // line 249
                                        echo "                                                        ";
                                        $context["changesFirstKey"] = (((twig_length_filter($this->env, $context["changes"]) > 1)) ? (twig_first($this->env, twig_get_array_keys_filter($context["changes"]))) : (null));
                                        // line 250
                                        echo "                                                        ";
                                        $context["changesLastKey"] = twig_last($this->env, twig_get_array_keys_filter($context["changes"]));
                                        // line 251
                                        echo "                                                        ";
                                        if ((($this->getAttribute($context["choice"], "value", array()) == twig_first($this->env, $context["changes"])) || ((isset($context["changesFirstKey"]) ? $context["changesFirstKey"] : null) == $this->getAttribute($context["choice"], "value", array())))) {
                                            // line 252
                                            echo "                                                            ";
                                            $context["valFrom"] = ("изменился с " . $this->getAttribute($context["choice"], "label", array()));
                                            // line 253
                                            echo "                                                        ";
                                        }
                                        // line 254
                                        echo "                                                        ";
                                        if ((($this->getAttribute($context["choice"], "value", array()) == twig_last($this->env, $context["changes"])) || ((isset($context["changesLastKey"]) ? $context["changesLastKey"] : null) == $this->getAttribute($context["choice"], "value", array())))) {
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
                                    if ((isset($context["valFrom"]) ? $context["valFrom"] : null)) {
                                        echo " ";
                                        echo twig_escape_filter($this->env, (isset($context["valFrom"]) ? $context["valFrom"] : null));
                                        echo " ";
                                    }
                                    echo " ";
                                    if ((isset($context["valTo"]) ? $context["valTo"] : null)) {
                                        echo " ";
                                        echo twig_escape_filter($this->env, (isset($context["valTo"]) ? $context["valTo"] : null));
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
                                    if ($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "file", array()), "get", array(0 => $context["key"]), "method")) {
                                        // line 265
                                        echo "                                                            <li>";
                                        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans(("parameter." . $this->getAttribute($context["changes"], "operation", array()))), "html", null, true);
                                        echo " файл <a href=\"";
                                        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->env->getExtension('filter_extension')->getFileWebPathFilter($this->getAttribute($this->getAttribute((isset($context["object"]) ? $context["object"] : null), "file", array()), "get", array(0 => $context["key"]), "method"))), "html", null, true);
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
        if ( !(null === $this->getAttribute((isset($context["object"]) ? $context["object"] : null), "id", array()))) {
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
            echo twig_escape_filter($this->env, (isset($context["deleteToken"]) ? $context["deleteToken"] : null), "html", null, true);
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
        return array (  813 => 311,  808 => 309,  804 => 308,  800 => 307,  796 => 306,  792 => 305,  788 => 304,  785 => 303,  783 => 302,  778 => 301,  775 => 300,  769 => 298,  764 => 297,  761 => 296,  757 => 294,  754 => 293,  751 => 292,  747 => 291,  744 => 290,  737 => 285,  720 => 281,  716 => 279,  710 => 276,  707 => 275,  704 => 274,  700 => 272,  694 => 271,  691 => 270,  685 => 269,  673 => 267,  663 => 265,  660 => 264,  655 => 263,  652 => 262,  638 => 260,  620 => 258,  614 => 257,  611 => 256,  608 => 255,  605 => 254,  602 => 253,  599 => 252,  596 => 251,  593 => 250,  590 => 249,  585 => 248,  582 => 247,  579 => 246,  576 => 245,  573 => 244,  569 => 243,  566 => 242,  564 => 241,  552 => 235,  546 => 231,  543 => 230,  540 => 229,  522 => 225,  519 => 224,  516 => 223,  514 => 222,  506 => 218,  500 => 216,  494 => 213,  489 => 212,  487 => 211,  482 => 209,  477 => 208,  475 => 207,  464 => 202,  447 => 201,  433 => 189,  431 => 188,  428 => 187,  421 => 182,  415 => 178,  406 => 175,  400 => 174,  397 => 173,  393 => 172,  389 => 171,  384 => 168,  381 => 167,  375 => 164,  371 => 162,  369 => 161,  357 => 151,  355 => 150,  346 => 144,  337 => 138,  327 => 131,  323 => 130,  315 => 124,  309 => 122,  303 => 120,  301 => 119,  294 => 114,  290 => 112,  282 => 110,  280 => 109,  273 => 104,  267 => 102,  261 => 100,  259 => 99,  251 => 93,  245 => 91,  239 => 89,  237 => 88,  231 => 84,  221 => 79,  215 => 75,  213 => 74,  208 => 71,  204 => 69,  198 => 67,  196 => 66,  191 => 65,  183 => 63,  181 => 62,  173 => 57,  164 => 52,  158 => 50,  150 => 48,  147 => 47,  145 => 46,  131 => 35,  123 => 34,  110 => 23,  104 => 20,  101 => 19,  98 => 18,  92 => 17,  83 => 14,  78 => 13,  73 => 12,  70 => 11,  66 => 10,  61 => 8,  56 => 5,  53 => 4,  50 => 3,  45 => 292,  43 => 3,  40 => 2,  11 => 1,);
    }
}
