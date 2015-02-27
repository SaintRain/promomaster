<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appTestUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appTestUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/log')) {
            if (0 === strpos($pathinfo, '/login')) {
                // ru__RG__fos_user_security_login
                if ($pathinfo === '/login.html') {
                    $requiredSchemes = array (  'http' => 0,);
                    if (!isset($requiredSchemes[$this->context->getScheme()])) {
                        return $this->redirect($pathinfo, 'ru__RG__fos_user_security_login', key($requiredSchemes));
                    }

                    return array (  '_controller' => 'Application\\Sonata\\UserBundle\\Controller\\SecurityController::loginAction',  '_locale' => 'ru',  '_route' => 'ru__RG__fos_user_security_login',);
                }

                // ru__RG__fos_user_security_check
                if ($pathinfo === '/login_check.html') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_ru__RG__fos_user_security_check;
                    }

                    $requiredSchemes = array (  'http' => 0,);
                    if (!isset($requiredSchemes[$this->context->getScheme()])) {
                        return $this->redirect($pathinfo, 'ru__RG__fos_user_security_check', key($requiredSchemes));
                    }

                    return array (  '_controller' => 'Application\\Sonata\\UserBundle\\Controller\\SecurityController::checkAction',  '_locale' => 'ru',  '_route' => 'ru__RG__fos_user_security_check',);
                }
                not_ru__RG__fos_user_security_check:

            }

            // ru__RG__fos_user_security_logout
            if ($pathinfo === '/logout.html') {
                $requiredSchemes = array (  'http' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'ru__RG__fos_user_security_logout', key($requiredSchemes));
                }

                return array (  '_controller' => 'Application\\Sonata\\UserBundle\\Controller\\SecurityController::logoutAction',  '_locale' => 'ru',  '_route' => 'ru__RG__fos_user_security_logout',);
            }

            // ru__RG__fos_user_security_login_for_order
            if (0 === strpos($pathinfo, '/login-order') && preg_match('#^/login\\-order/(?P<orderId>\\d+)/(?P<token>[^/\\.]++)\\.html$#s', $pathinfo, $matches)) {
                $requiredSchemes = array (  'http' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'ru__RG__fos_user_security_login_for_order', key($requiredSchemes));
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__fos_user_security_login_for_order')), array (  '_controller' => 'Application\\Sonata\\UserBundle\\Controller\\SecurityController::loginForOrderAction',  '_locale' => 'ru',));
            }

        }

        // ru__RG__application_sonata_user_coupon_access
        if (0 === strpos($pathinfo, '/coupon/access') && preg_match('#^/coupon/access/(?P<uid>[^/]++)/(?P<hash>[^/\\.]++)\\.html$#s', $pathinfo, $matches)) {
            $requiredSchemes = array (  'http' => 0,);
            if (!isset($requiredSchemes[$this->context->getScheme()])) {
                return $this->redirect($pathinfo, 'ru__RG__application_sonata_user_coupon_access', key($requiredSchemes));
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__application_sonata_user_coupon_access')), array (  '_controller' => 'Application\\Sonata\\UserBundle\\Controller\\SecurityController::couponAccessAuthenticateAction',  '_locale' => 'ru',));
        }

        if (0 === strpos($pathinfo, '/profile')) {
            // ru__RG__sonata_user_profile_show
            if ($pathinfo === '/profile.html') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_ru__RG__sonata_user_profile_show;
                }

                $requiredSchemes = array (  'http' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'ru__RG__sonata_user_profile_show', key($requiredSchemes));
                }

                return array (  '_controller' => 'Application\\Sonata\\UserBundle\\Controller\\ProfileController::editProfileAction',  '_locale' => 'ru',  '_route' => 'ru__RG__sonata_user_profile_show',);
            }
            not_ru__RG__sonata_user_profile_show:

            if (0 === strpos($pathinfo, '/profile/products')) {
                if (0 === strpos($pathinfo, '/profile/products/favorites')) {
                    // ru__RG__application_sonata_user_profile_products_favorites
                    if (preg_match('#^/profile/products/favorites/(?P<page>\\d+)\\.(?P<_format>html)$#s', $pathinfo, $matches)) {
                        $requiredSchemes = array (  'http' => 0,);
                        if (!isset($requiredSchemes[$this->context->getScheme()])) {
                            return $this->redirect($pathinfo, 'ru__RG__application_sonata_user_profile_products_favorites', key($requiredSchemes));
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__application_sonata_user_profile_products_favorites')), array (  '_controller' => 'Application\\Sonata\\UserBundle\\Controller\\ProfileController::productsFavoriteAction',  'page' => '1',  '_locale' => 'ru',));
                    }

                    // ru__RG__application_sonata_user_profile_products_favorites_first_page
                    if (preg_match('#^/profile/products/favorites\\.(?P<_format>html)$#s', $pathinfo, $matches)) {
                        $requiredSchemes = array (  'http' => 0,);
                        if (!isset($requiredSchemes[$this->context->getScheme()])) {
                            return $this->redirect($pathinfo, 'ru__RG__application_sonata_user_profile_products_favorites_first_page', key($requiredSchemes));
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__application_sonata_user_profile_products_favorites_first_page')), array (  '_controller' => 'Application\\Sonata\\UserBundle\\Controller\\ProfileController::productsFavoriteAction',  '_locale' => 'ru',));
                    }

                }

                if (0 === strpos($pathinfo, '/profile/products/history')) {
                    // ru__RG__application_sonata_user_profile_products_history
                    if (preg_match('#^/profile/products/history/(?P<page>\\d+)\\.(?P<_format>html)$#s', $pathinfo, $matches)) {
                        $requiredSchemes = array (  'http' => 0,);
                        if (!isset($requiredSchemes[$this->context->getScheme()])) {
                            return $this->redirect($pathinfo, 'ru__RG__application_sonata_user_profile_products_history', key($requiredSchemes));
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__application_sonata_user_profile_products_history')), array (  '_controller' => 'Application\\Sonata\\UserBundle\\Controller\\ProfileController::productsHistoryAction',  'page' => '1',  '_locale' => 'ru',));
                    }

                    // ru__RG__application_sonata_user_profile_products_history_first_page
                    if (preg_match('#^/profile/products/history\\.(?P<_format>html)$#s', $pathinfo, $matches)) {
                        $requiredSchemes = array (  'http' => 0,);
                        if (!isset($requiredSchemes[$this->context->getScheme()])) {
                            return $this->redirect($pathinfo, 'ru__RG__application_sonata_user_profile_products_history_first_page', key($requiredSchemes));
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__application_sonata_user_profile_products_history_first_page')), array (  '_controller' => 'Application\\Sonata\\UserBundle\\Controller\\ProfileController::productsHistoryAction',  'page' => '1',  '_locale' => 'ru',));
                    }

                    // ru__RG__application_sonata_user_profile_products_history_clear
                    if (0 === strpos($pathinfo, '/profile/products/history/clear') && preg_match('#^/profile/products/history/clear\\.(?P<_format>json)$#s', $pathinfo, $matches)) {
                        $requiredSchemes = array (  'http' => 0,);
                        if (!isset($requiredSchemes[$this->context->getScheme()])) {
                            return $this->redirect($pathinfo, 'ru__RG__application_sonata_user_profile_products_history_clear', key($requiredSchemes));
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__application_sonata_user_profile_products_history_clear')), array (  '_controller' => 'Application\\Sonata\\UserBundle\\Controller\\AjaxProfileController::productsHistoryClearAction',  '_locale' => 'ru',));
                    }

                }

            }

            if (0 === strpos($pathinfo, '/profile/order')) {
                if (0 === strpos($pathinfo, '/profile/orders/history')) {
                    // ru__RG__application_sonata_user_profile_orders_history_list
                    if (preg_match('#^/profile/orders/history/(?P<page>\\d+)\\.html$#s', $pathinfo, $matches)) {
                        $requiredSchemes = array (  'http' => 0,);
                        if (!isset($requiredSchemes[$this->context->getScheme()])) {
                            return $this->redirect($pathinfo, 'ru__RG__application_sonata_user_profile_orders_history_list', key($requiredSchemes));
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__application_sonata_user_profile_orders_history_list')), array (  '_controller' => 'Application\\Sonata\\UserBundle\\Controller\\ProfileController::ordersHistoryListAction',  'page' => '1',  '_locale' => 'ru',));
                    }

                    // ru__RG__application_sonata_user_profile_orders_history_list_first_page
                    if ($pathinfo === '/profile/orders/history.html') {
                        $requiredSchemes = array (  'http' => 0,);
                        if (!isset($requiredSchemes[$this->context->getScheme()])) {
                            return $this->redirect($pathinfo, 'ru__RG__application_sonata_user_profile_orders_history_list_first_page', key($requiredSchemes));
                        }

                        return array (  '_controller' => 'Application\\Sonata\\UserBundle\\Controller\\ProfileController::ordersHistoryListAction',  'page' => '1',  '_locale' => 'ru',  '_route' => 'ru__RG__application_sonata_user_profile_orders_history_list_first_page',);
                    }

                }

                // ru__RG__application_sonata_user_profile_order
                if (preg_match('#^/profile/order/(?P<id>\\d+)\\.html$#s', $pathinfo, $matches)) {
                    $requiredSchemes = array (  'http' => 0,);
                    if (!isset($requiredSchemes[$this->context->getScheme()])) {
                        return $this->redirect($pathinfo, 'ru__RG__application_sonata_user_profile_order', key($requiredSchemes));
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__application_sonata_user_profile_order')), array (  '_controller' => 'Application\\Sonata\\UserBundle\\Controller\\ProfileController::orderMoreAction',  '_locale' => 'ru',));
                }

                // ru__RG__application_sonata_user_profile_order_redirect_to_pay_post
                if (preg_match('#^/profile/order/(?P<id>[^/]++)/pay/(?P<paymentSystem>[^/\\.]++)\\.html$#s', $pathinfo, $matches)) {
                    $requiredSchemes = array (  'http' => 0,);
                    if (!isset($requiredSchemes[$this->context->getScheme()])) {
                        return $this->redirect($pathinfo, 'ru__RG__application_sonata_user_profile_order_redirect_to_pay_post', key($requiredSchemes));
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__application_sonata_user_profile_order_redirect_to_pay_post')), array (  '_controller' => 'Application\\Sonata\\UserBundle\\Controller\\ProfileController::toPayForOrderPOSTAction',  '_locale' => 'ru',));
                }

                // ru__RG__application_sonata_user_profile_order_print
                if (preg_match('#^/profile/order/(?P<id>\\d+)/(?P<needStamps>[^/]++)/print/(?P<type>warranty|waybill|self)\\.html$#s', $pathinfo, $matches)) {
                    $requiredSchemes = array (  'http' => 0,);
                    if (!isset($requiredSchemes[$this->context->getScheme()])) {
                        return $this->redirect($pathinfo, 'ru__RG__application_sonata_user_profile_order_print', key($requiredSchemes));
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__application_sonata_user_profile_order_print')), array (  '_controller' => 'Application\\Sonata\\UserBundle\\Controller\\ProfileController::orderPrintAction',  '_locale' => 'ru',));
                }

            }

            // ru__RG__application_sonata_user_change_contragent
            if ($pathinfo === '/profile/change/contragent.html') {
                $requiredSchemes = array (  'http' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'ru__RG__application_sonata_user_change_contragent', key($requiredSchemes));
                }

                return array (  '_controller' => 'Application\\Sonata\\UserBundle\\Controller\\ProfileController::changeContragentAction',  '_locale' => 'ru',  '_route' => 'ru__RG__application_sonata_user_change_contragent',);
            }

        }

        if (0 === strpos($pathinfo, '/ajax/profile')) {
            // ru__RG__application_sonata_user_get_user_contragents
            if ($pathinfo === '/ajax/profile/get/contragents.json') {
                $requiredSchemes = array (  'http' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'ru__RG__application_sonata_user_get_user_contragents', key($requiredSchemes));
                }

                return array (  '_controller' => 'Application\\Sonata\\UserBundle\\Controller\\AjaxProfileController::getUserContragentsAction',  '_locale' => 'ru',  '_route' => 'ru__RG__application_sonata_user_get_user_contragents',);
            }

            // ru__RG__application_sonata_user_ajax_change_contragent
            if ($pathinfo === '/ajax/profile/change/contragent.json') {
                $requiredSchemes = array (  'http' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'ru__RG__application_sonata_user_ajax_change_contragent', key($requiredSchemes));
                }

                return array (  '_controller' => 'Application\\Sonata\\UserBundle\\Controller\\AjaxProfileController::changeContragentAction',  '_locale' => 'ru',  '_route' => 'ru__RG__application_sonata_user_ajax_change_contragent',);
            }

        }

        if (0 === strpos($pathinfo, '/re')) {
            if (0 === strpos($pathinfo, '/register')) {
                // ru__RG__fos_user_registration_register
                if ($pathinfo === '/register.html') {
                    $requiredSchemes = array (  'http' => 0,);
                    if (!isset($requiredSchemes[$this->context->getScheme()])) {
                        return $this->redirect($pathinfo, 'ru__RG__fos_user_registration_register', key($requiredSchemes));
                    }

                    return array (  '_controller' => 'Application\\Sonata\\UserBundle\\Controller\\RegistrationController::registerAction',  '_locale' => 'ru',  '_route' => 'ru__RG__fos_user_registration_register',);
                }

                if (0 === strpos($pathinfo, '/register/c')) {
                    // ru__RG__fos_user_registration_check_email
                    if ($pathinfo === '/register/check-email.html') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_ru__RG__fos_user_registration_check_email;
                        }

                        $requiredSchemes = array (  'http' => 0,);
                        if (!isset($requiredSchemes[$this->context->getScheme()])) {
                            return $this->redirect($pathinfo, 'ru__RG__fos_user_registration_check_email', key($requiredSchemes));
                        }

                        return array (  '_controller' => 'Application\\Sonata\\UserBundle\\Controller\\RegistrationController::checkEmailAction',  '_locale' => 'ru',  '_route' => 'ru__RG__fos_user_registration_check_email',);
                    }
                    not_ru__RG__fos_user_registration_check_email:

                    if (0 === strpos($pathinfo, '/register/confirm')) {
                        // ru__RG__fos_user_registration_confirm
                        if (preg_match('#^/register/confirm/(?P<token>[^/\\.]++)\\.html$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_ru__RG__fos_user_registration_confirm;
                            }

                            $requiredSchemes = array (  'http' => 0,);
                            if (!isset($requiredSchemes[$this->context->getScheme()])) {
                                return $this->redirect($pathinfo, 'ru__RG__fos_user_registration_confirm', key($requiredSchemes));
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__fos_user_registration_confirm')), array (  '_controller' => 'Application\\Sonata\\UserBundle\\Controller\\RegistrationController::confirmAction',  '_locale' => 'ru',));
                        }
                        not_ru__RG__fos_user_registration_confirm:

                        // ru__RG__fos_user_registration_confirmed
                        if ($pathinfo === '/register/confirmed.html') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_ru__RG__fos_user_registration_confirmed;
                            }

                            $requiredSchemes = array (  'http' => 0,);
                            if (!isset($requiredSchemes[$this->context->getScheme()])) {
                                return $this->redirect($pathinfo, 'ru__RG__fos_user_registration_confirmed', key($requiredSchemes));
                            }

                            return array (  '_controller' => 'Application\\Sonata\\UserBundle\\Controller\\RegistrationController::confirmedAction',  '_locale' => 'ru',  '_route' => 'ru__RG__fos_user_registration_confirmed',);
                        }
                        not_ru__RG__fos_user_registration_confirmed:

                    }

                }

                // ru__RG__application_sonata_user_auth_social
                if ($pathinfo === '/register/auth.html') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_ru__RG__application_sonata_user_auth_social;
                    }

                    $requiredSchemes = array (  'http' => 0,);
                    if (!isset($requiredSchemes[$this->context->getScheme()])) {
                        return $this->redirect($pathinfo, 'ru__RG__application_sonata_user_auth_social', key($requiredSchemes));
                    }

                    return array (  '_controller' => 'Application\\Sonata\\UserBundle\\Controller\\RegistrationController::socialAuthAction',  '_locale' => 'ru',  '_route' => 'ru__RG__application_sonata_user_auth_social',);
                }
                not_ru__RG__application_sonata_user_auth_social:

            }

            if (0 === strpos($pathinfo, '/resetting')) {
                // ru__RG__fos_user_resetting_request
                if ($pathinfo === '/resetting/request.html') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_ru__RG__fos_user_resetting_request;
                    }

                    $requiredSchemes = array (  'http' => 0,);
                    if (!isset($requiredSchemes[$this->context->getScheme()])) {
                        return $this->redirect($pathinfo, 'ru__RG__fos_user_resetting_request', key($requiredSchemes));
                    }

                    return array (  '_controller' => 'Application\\Sonata\\UserBundle\\Controller\\ResettingController::requestAction',  '_locale' => 'ru',  '_route' => 'ru__RG__fos_user_resetting_request',);
                }
                not_ru__RG__fos_user_resetting_request:

                // ru__RG__fos_user_resetting_send_email
                if ($pathinfo === '/resetting/send-email.html') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_ru__RG__fos_user_resetting_send_email;
                    }

                    $requiredSchemes = array (  'http' => 0,);
                    if (!isset($requiredSchemes[$this->context->getScheme()])) {
                        return $this->redirect($pathinfo, 'ru__RG__fos_user_resetting_send_email', key($requiredSchemes));
                    }

                    return array (  '_controller' => 'Application\\Sonata\\UserBundle\\Controller\\ResettingController::sendEmailAction',  '_locale' => 'ru',  '_route' => 'ru__RG__fos_user_resetting_send_email',);
                }
                not_ru__RG__fos_user_resetting_send_email:

                // ru__RG__fos_user_resetting_send_email_ajax
                if ($pathinfo === '/resetting/ajax/send-email.html') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_ru__RG__fos_user_resetting_send_email_ajax;
                    }

                    $requiredSchemes = array (  'http' => 0,);
                    if (!isset($requiredSchemes[$this->context->getScheme()])) {
                        return $this->redirect($pathinfo, 'ru__RG__fos_user_resetting_send_email_ajax', key($requiredSchemes));
                    }

                    return array (  '_controller' => 'Application\\Sonata\\UserBundle\\Controller\\ResettingController::sendEmailAjaxAction',  '_locale' => 'ru',  '_route' => 'ru__RG__fos_user_resetting_send_email_ajax',);
                }
                not_ru__RG__fos_user_resetting_send_email_ajax:

                // ru__RG__fos_user_resetting_check_email
                if ($pathinfo === '/resetting/check-email.html') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_ru__RG__fos_user_resetting_check_email;
                    }

                    $requiredSchemes = array (  'http' => 0,);
                    if (!isset($requiredSchemes[$this->context->getScheme()])) {
                        return $this->redirect($pathinfo, 'ru__RG__fos_user_resetting_check_email', key($requiredSchemes));
                    }

                    return array (  '_controller' => 'Application\\Sonata\\UserBundle\\Controller\\ResettingController::checkEmailAction',  '_locale' => 'ru',  '_route' => 'ru__RG__fos_user_resetting_check_email',);
                }
                not_ru__RG__fos_user_resetting_check_email:

                // ru__RG__fos_user_resetting_reset
                if (0 === strpos($pathinfo, '/resetting/reset') && preg_match('#^/resetting/reset/(?P<token>[^/\\.]++)\\.html$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_ru__RG__fos_user_resetting_reset;
                    }

                    $requiredSchemes = array (  'http' => 0,);
                    if (!isset($requiredSchemes[$this->context->getScheme()])) {
                        return $this->redirect($pathinfo, 'ru__RG__fos_user_resetting_reset', key($requiredSchemes));
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__fos_user_resetting_reset')), array (  '_controller' => 'Application\\Sonata\\UserBundle\\Controller\\ResettingController::resetAction',  '_locale' => 'ru',));
                }
                not_ru__RG__fos_user_resetting_reset:

            }

        }

        // ru__RG__fos_user_change_password
        if ($pathinfo === '/change-password/change-password.html') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_ru__RG__fos_user_change_password;
            }

            $requiredSchemes = array (  'http' => 0,);
            if (!isset($requiredSchemes[$this->context->getScheme()])) {
                return $this->redirect($pathinfo, 'ru__RG__fos_user_change_password', key($requiredSchemes));
            }

            return array (  '_controller' => 'Sonata\\UserBundle\\Controller\\ChangePasswordController::changePasswordAction',  '_locale' => 'ru',  '_route' => 'ru__RG__fos_user_change_password',);
        }
        not_ru__RG__fos_user_change_password:

        if (0 === strpos($pathinfo, '/admin')) {
            // ru__RG__sonata_admin_redirect
            if (rtrim($pathinfo, '/') === '/admin') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'ru__RG__sonata_admin_redirect');
                }

                return array (  '_controller' => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\RedirectController::redirectAction',  'route' => 'sonata_admin_dashboard',  'permanent' => 'true',  '_locale' => 'ru',  '_route' => 'ru__RG__sonata_admin_redirect',);
            }

            // ru__RG__sonata_admin_dashboard
            if ($pathinfo === '/admin/dashboard') {
                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CoreController::dashboardAction',  '_locale' => 'ru',  '_route' => 'ru__RG__sonata_admin_dashboard',);
            }

            if (0 === strpos($pathinfo, '/admin/core')) {
                // ru__RG__sonata_admin_retrieve_form_element
                if ($pathinfo === '/admin/core/get-form-field-element') {
                    return array (  '_controller' => 'sonata.admin.controller.admin:retrieveFormFieldElementAction',  '_locale' => 'ru',  '_route' => 'ru__RG__sonata_admin_retrieve_form_element',);
                }

                // ru__RG__sonata_admin_append_form_element
                if ($pathinfo === '/admin/core/append-form-field-element') {
                    return array (  '_controller' => 'sonata.admin.controller.admin:appendFormFieldElementAction',  '_locale' => 'ru',  '_route' => 'ru__RG__sonata_admin_append_form_element',);
                }

                // ru__RG__sonata_admin_short_object_information
                if (0 === strpos($pathinfo, '/admin/core/get-short-object-description') && preg_match('#^/admin/core/get\\-short\\-object\\-description(?:\\.(?P<_format>html|json))?$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__sonata_admin_short_object_information')), array (  '_controller' => 'sonata.admin.controller.admin:getShortObjectDescriptionAction',  '_format' => 'html',  '_locale' => 'ru',));
                }

            }

            // ru__RG__sonata_admin_search
            if ($pathinfo === '/admin/search') {
                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CoreController::searchAction',  '_locale' => 'ru',  '_route' => 'ru__RG__sonata_admin_search',);
            }

        }

        // ru__RG__application_sonata_user_change_email
        if (0 === strpos($pathinfo, '/change-email') && preg_match('#^/change\\-email\\-(?P<hash>[^/\\.]++)\\.html$#s', $pathinfo, $matches)) {
            $requiredSchemes = array (  'http' => 0,);
            if (!isset($requiredSchemes[$this->context->getScheme()])) {
                return $this->redirect($pathinfo, 'ru__RG__application_sonata_user_change_email', key($requiredSchemes));
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__application_sonata_user_change_email')), array (  '_controller' => 'Application\\Sonata\\UserBundle\\Controller\\SecurityController::changeEmailAction',  '_locale' => 'ru',));
        }

        // ru__RG__application_sonata_user_contragent_balance_history_update
        if (0 === strpos($pathinfo, '/admin/ajax/update') && preg_match('#^/admin/ajax/update/(?P<customerId>\\d+)/(?P<sellerId>\\d+)/balance_history\\.html$#s', $pathinfo, $matches)) {
            $requiredSchemes = array (  'http' => 0,);
            if (!isset($requiredSchemes[$this->context->getScheme()])) {
                return $this->redirect($pathinfo, 'ru__RG__application_sonata_user_contragent_balance_history_update', key($requiredSchemes));
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__application_sonata_user_contragent_balance_history_update')), array (  '_controller' => 'Application\\Sonata\\UserBundle\\Controller\\Admin\\AjaxContragentAdminController::balanceHistoryUpdateAction',  '_locale' => 'ru',));
        }

        if (0 === strpos($pathinfo, '/contragent')) {
            // ru__RG__application_sonata_user_contragent_index
            if ($pathinfo === '/contragent/index.html') {
                $requiredSchemes = array (  'http' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'ru__RG__application_sonata_user_contragent_index', key($requiredSchemes));
                }

                return array (  '_controller' => 'Application\\Sonata\\UserBundle\\Controller\\ContragentController::contactAction',  '_locale' => 'ru',  '_route' => 'ru__RG__application_sonata_user_contragent_index',);
            }

            // ru__RG__application_sonata_user_contragent_edit
            if (0 === strpos($pathinfo, '/contragent/edit') && preg_match('#^/contragent/edit\\-(?P<isIndi>0|1)\\-(?P<contragentId>\\d+)\\.html$#s', $pathinfo, $matches)) {
                $requiredSchemes = array (  'http' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'ru__RG__application_sonata_user_contragent_edit', key($requiredSchemes));
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__application_sonata_user_contragent_edit')), array (  '_controller' => 'Application\\Sonata\\UserBundle\\Controller\\ContragentController::editAction',  '_locale' => 'ru',));
            }

            // ru__RG__application_sonata_user_contragent_create
            if ($pathinfo === '/contragent/create.html') {
                $requiredSchemes = array (  'http' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'ru__RG__application_sonata_user_contragent_create', key($requiredSchemes));
                }

                return array (  '_controller' => 'Application\\Sonata\\UserBundle\\Controller\\ContragentController::createAction',  '_locale' => 'ru',  '_route' => 'ru__RG__application_sonata_user_contragent_create',);
            }

        }

        // ru__RG__application_sonata_user_contragent_delete
        if ($pathinfo === '/ajax/contragent/delete.json') {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_ru__RG__application_sonata_user_contragent_delete;
            }

            $requiredSchemes = array (  'http' => 0,);
            if (!isset($requiredSchemes[$this->context->getScheme()])) {
                return $this->redirect($pathinfo, 'ru__RG__application_sonata_user_contragent_delete', key($requiredSchemes));
            }

            return array (  '_controller' => 'Application\\Sonata\\UserBundle\\Controller\\ContragentController::deleteAction',  '_locale' => 'ru',  '_route' => 'ru__RG__application_sonata_user_contragent_delete',);
        }
        not_ru__RG__application_sonata_user_contragent_delete:

        if (0 === strpos($pathinfo, '/contact')) {
            // ru__RG__application_sonata_user_contact_edit
            if (0 === strpos($pathinfo, '/contact/edit') && preg_match('#^/contact/edit\\-(?P<contactId>\\d+)\\.html$#s', $pathinfo, $matches)) {
                $requiredSchemes = array (  'http' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'ru__RG__application_sonata_user_contact_edit', key($requiredSchemes));
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__application_sonata_user_contact_edit')), array (  '_controller' => 'Application\\Sonata\\UserBundle\\Controller\\ContactController::editAction',  '_locale' => 'ru',));
            }

            // ru__RG__application_sonata_user_contact_create
            if (0 === strpos($pathinfo, '/contact/create') && preg_match('#^/contact/create\\-(?P<contragentId>\\d+)\\.html$#s', $pathinfo, $matches)) {
                $requiredSchemes = array (  'http' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'ru__RG__application_sonata_user_contact_create', key($requiredSchemes));
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__application_sonata_user_contact_create')), array (  '_controller' => 'Application\\Sonata\\UserBundle\\Controller\\ContactController::createAction',  '_locale' => 'ru',));
            }

        }

        // ru__RG__application_sonata_user_contact_delete
        if ($pathinfo === '/ajax/contact/delete.json') {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_ru__RG__application_sonata_user_contact_delete;
            }

            return array (  '_controller' => 'Application\\Sonata\\UserBundle\\Controller\\ContactController::deleteAction',  '_locale' => 'ru',  '_route' => 'ru__RG__application_sonata_user_contact_delete',);
        }
        not_ru__RG__application_sonata_user_contact_delete:

        if (0 === strpos($pathinfo, '/order')) {
            if (0 === strpos($pathinfo, '/order/comment')) {
                // ru__RG__application_sonata_admin_comment_leave
                if ($pathinfo === '/order/comment/leave') {
                    return array (  '_controller' => 'Application\\Sonata\\AdminBundle\\Controller\\AjaxExtraBlocksAdminController::leaveCommentAction',  '_locale' => 'ru',  '_route' => 'ru__RG__application_sonata_admin_comment_leave',);
                }

                // ru__RG__application_sonata_admin_comment_remove
                if ($pathinfo === '/order/comment/remove') {
                    return array (  '_controller' => 'Application\\Sonata\\AdminBundle\\Controller\\AjaxExtraBlocksAdminController::removeCommentAction',  '_locale' => 'ru',  '_route' => 'ru__RG__application_sonata_admin_comment_remove',);
                }

            }

            if (0 === strpos($pathinfo, '/order/tickets')) {
                // ru__RG__application_sonata_admin_tickets_attach
                if ($pathinfo === '/order/tickets/attach') {
                    return array (  '_controller' => 'Application\\Sonata\\AdminBundle\\Controller\\AjaxExtraBlocksAdminController::attachTicketsAction',  '_locale' => 'ru',  '_route' => 'ru__RG__application_sonata_admin_tickets_attach',);
                }

                // ru__RG__application_sonata_admin_tickets_detach
                if ($pathinfo === '/order/tickets/remove') {
                    return array (  '_controller' => 'Application\\Sonata\\AdminBundle\\Controller\\AjaxExtraBlocksAdminController::detachTicketsAction',  '_locale' => 'ru',  '_route' => 'ru__RG__application_sonata_admin_tickets_detach',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/admin')) {
            // ru__RG__application_sonata_admin_phpinfo
            if ($pathinfo === '/admin/phpinfo') {
                return array (  '_controller' => 'Application\\Sonata\\AdminBundle\\Controller\\CustomPagesAdminController::printPhpInfoAction',  '_locale' => 'ru',  '_route' => 'ru__RG__application_sonata_admin_phpinfo',);
            }

            // ru__RG__application_sonata_admin_log
            if ($pathinfo === '/admin/log') {
                return array (  '_controller' => 'Application\\Sonata\\AdminBundle\\Controller\\CustomPagesAdminController::printLogAction',  '_locale' => 'ru',  '_route' => 'ru__RG__application_sonata_admin_log',);
            }

        }

        // ru__RG__sonata_admin_set_object_field_value
        if ($pathinfo === '/core/set-object-field-value') {
            return array (  '_controller' => 'sonata.admin.controller.admin:setObjectFieldValueAction',  '_locale' => 'ru',  '_route' => 'ru__RG__sonata_admin_set_object_field_value',);
        }

        if (0 === strpos($pathinfo, '/admin')) {
            if (0 === strpos($pathinfo, '/admin/sonata/user')) {
                if (0 === strpos($pathinfo, '/admin/sonata/user/commoncontragent')) {
                    // ru__RG__admin_sonata_user_commoncontragent_list
                    if ($pathinfo === '/admin/sonata/user/commoncontragent/list') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'application_user_contragent_admin',  '_sonata_name' => 'admin_sonata_user_commoncontragent_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_sonata_user_commoncontragent_list',);
                    }

                    // ru__RG__admin_sonata_user_commoncontragent_create
                    if ($pathinfo === '/admin/sonata/user/commoncontragent/create') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'application_user_contragent_admin',  '_sonata_name' => 'admin_sonata_user_commoncontragent_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_sonata_user_commoncontragent_create',);
                    }

                    // ru__RG__admin_sonata_user_commoncontragent_batch
                    if ($pathinfo === '/admin/sonata/user/commoncontragent/batch') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'application_user_contragent_admin',  '_sonata_name' => 'admin_sonata_user_commoncontragent_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_sonata_user_commoncontragent_batch',);
                    }

                    // ru__RG__admin_sonata_user_commoncontragent_edit
                    if (preg_match('#^/admin/sonata/user/commoncontragent/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_sonata_user_commoncontragent_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'application_user_contragent_admin',  '_sonata_name' => 'admin_sonata_user_commoncontragent_edit',  '_locale' => 'ru',));
                    }

                    // ru__RG__admin_sonata_user_commoncontragent_delete
                    if (preg_match('#^/admin/sonata/user/commoncontragent/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_sonata_user_commoncontragent_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'application_user_contragent_admin',  '_sonata_name' => 'admin_sonata_user_commoncontragent_delete',  '_locale' => 'ru',));
                    }

                    // ru__RG__admin_sonata_user_commoncontragent_show
                    if (preg_match('#^/admin/sonata/user/commoncontragent/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_sonata_user_commoncontragent_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'application_user_contragent_admin',  '_sonata_name' => 'admin_sonata_user_commoncontragent_show',  '_locale' => 'ru',));
                    }

                    // ru__RG__admin_sonata_user_commoncontragent_export
                    if ($pathinfo === '/admin/sonata/user/commoncontragent/export') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'application_user_contragent_admin',  '_sonata_name' => 'admin_sonata_user_commoncontragent_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_sonata_user_commoncontragent_export',);
                    }

                    // ru__RG__admin_sonata_user_commoncontragent_history
                    if (preg_match('#^/admin/sonata/user/commoncontragent/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_sonata_user_commoncontragent_history')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyAction',  '_sonata_admin' => 'application_user_contragent_admin',  '_sonata_name' => 'admin_sonata_user_commoncontragent_history',  '_locale' => 'ru',));
                    }

                    // ru__RG__admin_sonata_user_commoncontragent_history_view_revision
                    if (preg_match('#^/admin/sonata/user/commoncontragent/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_sonata_user_commoncontragent_history_view_revision')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyViewRevisionAction',  '_sonata_admin' => 'application_user_contragent_admin',  '_sonata_name' => 'admin_sonata_user_commoncontragent_history_view_revision',  '_locale' => 'ru',));
                    }

                }

                if (0 === strpos($pathinfo, '/admin/sonata/user/indicontact')) {
                    // ru__RG__admin_sonata_user_indicontact_list
                    if ($pathinfo === '/admin/sonata/user/indicontact/list') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'application_user_indi_contact_admin',  '_sonata_name' => 'admin_sonata_user_indicontact_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_sonata_user_indicontact_list',);
                    }

                    // ru__RG__admin_sonata_user_indicontact_create
                    if ($pathinfo === '/admin/sonata/user/indicontact/create') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'application_user_indi_contact_admin',  '_sonata_name' => 'admin_sonata_user_indicontact_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_sonata_user_indicontact_create',);
                    }

                    // ru__RG__admin_sonata_user_indicontact_batch
                    if ($pathinfo === '/admin/sonata/user/indicontact/batch') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'application_user_indi_contact_admin',  '_sonata_name' => 'admin_sonata_user_indicontact_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_sonata_user_indicontact_batch',);
                    }

                    // ru__RG__admin_sonata_user_indicontact_edit
                    if (preg_match('#^/admin/sonata/user/indicontact/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_sonata_user_indicontact_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'application_user_indi_contact_admin',  '_sonata_name' => 'admin_sonata_user_indicontact_edit',  '_locale' => 'ru',));
                    }

                    // ru__RG__admin_sonata_user_indicontact_delete
                    if (preg_match('#^/admin/sonata/user/indicontact/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_sonata_user_indicontact_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'application_user_indi_contact_admin',  '_sonata_name' => 'admin_sonata_user_indicontact_delete',  '_locale' => 'ru',));
                    }

                    // ru__RG__admin_sonata_user_indicontact_show
                    if (preg_match('#^/admin/sonata/user/indicontact/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_sonata_user_indicontact_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'application_user_indi_contact_admin',  '_sonata_name' => 'admin_sonata_user_indicontact_show',  '_locale' => 'ru',));
                    }

                    // ru__RG__admin_sonata_user_indicontact_export
                    if ($pathinfo === '/admin/sonata/user/indicontact/export') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'application_user_indi_contact_admin',  '_sonata_name' => 'admin_sonata_user_indicontact_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_sonata_user_indicontact_export',);
                    }

                }

                if (0 === strpos($pathinfo, '/admin/sonata/user/legalcontact')) {
                    // ru__RG__admin_sonata_user_legalcontact_list
                    if ($pathinfo === '/admin/sonata/user/legalcontact/list') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'application_user_legal_contact_admin',  '_sonata_name' => 'admin_sonata_user_legalcontact_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_sonata_user_legalcontact_list',);
                    }

                    // ru__RG__admin_sonata_user_legalcontact_create
                    if ($pathinfo === '/admin/sonata/user/legalcontact/create') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'application_user_legal_contact_admin',  '_sonata_name' => 'admin_sonata_user_legalcontact_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_sonata_user_legalcontact_create',);
                    }

                    // ru__RG__admin_sonata_user_legalcontact_batch
                    if ($pathinfo === '/admin/sonata/user/legalcontact/batch') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'application_user_legal_contact_admin',  '_sonata_name' => 'admin_sonata_user_legalcontact_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_sonata_user_legalcontact_batch',);
                    }

                    // ru__RG__admin_sonata_user_legalcontact_edit
                    if (preg_match('#^/admin/sonata/user/legalcontact/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_sonata_user_legalcontact_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'application_user_legal_contact_admin',  '_sonata_name' => 'admin_sonata_user_legalcontact_edit',  '_locale' => 'ru',));
                    }

                    // ru__RG__admin_sonata_user_legalcontact_delete
                    if (preg_match('#^/admin/sonata/user/legalcontact/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_sonata_user_legalcontact_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'application_user_legal_contact_admin',  '_sonata_name' => 'admin_sonata_user_legalcontact_delete',  '_locale' => 'ru',));
                    }

                    // ru__RG__admin_sonata_user_legalcontact_show
                    if (preg_match('#^/admin/sonata/user/legalcontact/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_sonata_user_legalcontact_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'application_user_legal_contact_admin',  '_sonata_name' => 'admin_sonata_user_legalcontact_show',  '_locale' => 'ru',));
                    }

                    // ru__RG__admin_sonata_user_legalcontact_export
                    if ($pathinfo === '/admin/sonata/user/legalcontact/export') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'application_user_legal_contact_admin',  '_sonata_name' => 'admin_sonata_user_legalcontact_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_sonata_user_legalcontact_export',);
                    }

                }

                if (0 === strpos($pathinfo, '/admin/sonata/user/user')) {
                    // ru__RG__admin_sonata_user_user_list
                    if ($pathinfo === '/admin/sonata/user/user/list') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.user.admin.user',  '_sonata_name' => 'admin_sonata_user_user_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_sonata_user_user_list',);
                    }

                    // ru__RG__admin_sonata_user_user_create
                    if ($pathinfo === '/admin/sonata/user/user/create') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.user.admin.user',  '_sonata_name' => 'admin_sonata_user_user_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_sonata_user_user_create',);
                    }

                    // ru__RG__admin_sonata_user_user_batch
                    if ($pathinfo === '/admin/sonata/user/user/batch') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.user.admin.user',  '_sonata_name' => 'admin_sonata_user_user_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_sonata_user_user_batch',);
                    }

                    // ru__RG__admin_sonata_user_user_edit
                    if (preg_match('#^/admin/sonata/user/user/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_sonata_user_user_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.user.admin.user',  '_sonata_name' => 'admin_sonata_user_user_edit',  '_locale' => 'ru',));
                    }

                    // ru__RG__admin_sonata_user_user_delete
                    if (preg_match('#^/admin/sonata/user/user/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_sonata_user_user_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.user.admin.user',  '_sonata_name' => 'admin_sonata_user_user_delete',  '_locale' => 'ru',));
                    }

                    // ru__RG__admin_sonata_user_user_show
                    if (preg_match('#^/admin/sonata/user/user/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_sonata_user_user_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.user.admin.user',  '_sonata_name' => 'admin_sonata_user_user_show',  '_locale' => 'ru',));
                    }

                    // ru__RG__admin_sonata_user_user_export
                    if ($pathinfo === '/admin/sonata/user/user/export') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.user.admin.user',  '_sonata_name' => 'admin_sonata_user_user_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_sonata_user_user_export',);
                    }

                    // ru__RG__admin_sonata_user_user_history
                    if (preg_match('#^/admin/sonata/user/user/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_sonata_user_user_history')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyAction',  '_sonata_admin' => 'sonata.user.admin.user',  '_sonata_name' => 'admin_sonata_user_user_history',  '_locale' => 'ru',));
                    }

                    // ru__RG__admin_sonata_user_user_history_view_revision
                    if (preg_match('#^/admin/sonata/user/user/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_sonata_user_user_history_view_revision')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyViewRevisionAction',  '_sonata_admin' => 'sonata.user.admin.user',  '_sonata_name' => 'admin_sonata_user_user_history_view_revision',  '_locale' => 'ru',));
                    }

                }

                if (0 === strpos($pathinfo, '/admin/sonata/user/group')) {
                    // ru__RG__admin_sonata_user_group_list
                    if ($pathinfo === '/admin/sonata/user/group/list') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.user.admin.group',  '_sonata_name' => 'admin_sonata_user_group_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_sonata_user_group_list',);
                    }

                    // ru__RG__admin_sonata_user_group_create
                    if ($pathinfo === '/admin/sonata/user/group/create') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.user.admin.group',  '_sonata_name' => 'admin_sonata_user_group_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_sonata_user_group_create',);
                    }

                    // ru__RG__admin_sonata_user_group_batch
                    if ($pathinfo === '/admin/sonata/user/group/batch') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.user.admin.group',  '_sonata_name' => 'admin_sonata_user_group_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_sonata_user_group_batch',);
                    }

                    // ru__RG__admin_sonata_user_group_edit
                    if (preg_match('#^/admin/sonata/user/group/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_sonata_user_group_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.user.admin.group',  '_sonata_name' => 'admin_sonata_user_group_edit',  '_locale' => 'ru',));
                    }

                    // ru__RG__admin_sonata_user_group_delete
                    if (preg_match('#^/admin/sonata/user/group/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_sonata_user_group_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.user.admin.group',  '_sonata_name' => 'admin_sonata_user_group_delete',  '_locale' => 'ru',));
                    }

                    // ru__RG__admin_sonata_user_group_show
                    if (preg_match('#^/admin/sonata/user/group/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_sonata_user_group_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.user.admin.group',  '_sonata_name' => 'admin_sonata_user_group_show',  '_locale' => 'ru',));
                    }

                    // ru__RG__admin_sonata_user_group_export
                    if ($pathinfo === '/admin/sonata/user/group/export') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.user.admin.group',  '_sonata_name' => 'admin_sonata_user_group_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_sonata_user_group_export',);
                    }

                    // ru__RG__admin_sonata_user_group_history
                    if (preg_match('#^/admin/sonata/user/group/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_sonata_user_group_history')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyAction',  '_sonata_admin' => 'sonata.user.admin.group',  '_sonata_name' => 'admin_sonata_user_group_history',  '_locale' => 'ru',));
                    }

                    // ru__RG__admin_sonata_user_group_history_view_revision
                    if (preg_match('#^/admin/sonata/user/group/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_sonata_user_group_history_view_revision')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyViewRevisionAction',  '_sonata_admin' => 'sonata.user.admin.group',  '_sonata_name' => 'admin_sonata_user_group_history_view_revision',  '_locale' => 'ru',));
                    }

                }

            }

            if (0 === strpos($pathinfo, '/admin/core')) {
                if (0 === strpos($pathinfo, '/admin/core/product/commonproduct')) {
                    // ru__RG__admin_core_product_commonproduct_list
                    if ($pathinfo === '/admin/core/product/commonproduct/list') {
                        return array (  '_controller' => 'Core\\ProductBundle\\Controller\\Admin\\AdminProductController::listAction',  '_sonata_admin' => 'core_shop_product_admin',  '_sonata_name' => 'admin_core_product_commonproduct_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_product_commonproduct_list',);
                    }

                    // ru__RG__admin_core_product_commonproduct_create
                    if ($pathinfo === '/admin/core/product/commonproduct/create') {
                        return array (  '_controller' => 'Core\\ProductBundle\\Controller\\Admin\\AdminProductController::createAction',  '_sonata_admin' => 'core_shop_product_admin',  '_sonata_name' => 'admin_core_product_commonproduct_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_product_commonproduct_create',);
                    }

                    // ru__RG__admin_core_product_commonproduct_batch
                    if ($pathinfo === '/admin/core/product/commonproduct/batch') {
                        return array (  '_controller' => 'Core\\ProductBundle\\Controller\\Admin\\AdminProductController::batchAction',  '_sonata_admin' => 'core_shop_product_admin',  '_sonata_name' => 'admin_core_product_commonproduct_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_product_commonproduct_batch',);
                    }

                    // ru__RG__admin_core_product_commonproduct_edit
                    if (preg_match('#^/admin/core/product/commonproduct/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_product_commonproduct_edit')), array (  '_controller' => 'Core\\ProductBundle\\Controller\\Admin\\AdminProductController::editAction',  '_sonata_admin' => 'core_shop_product_admin',  '_sonata_name' => 'admin_core_product_commonproduct_edit',  '_locale' => 'ru',));
                    }

                    // ru__RG__admin_core_product_commonproduct_delete
                    if (preg_match('#^/admin/core/product/commonproduct/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_product_commonproduct_delete')), array (  '_controller' => 'Core\\ProductBundle\\Controller\\Admin\\AdminProductController::deleteAction',  '_sonata_admin' => 'core_shop_product_admin',  '_sonata_name' => 'admin_core_product_commonproduct_delete',  '_locale' => 'ru',));
                    }

                    // ru__RG__admin_core_product_commonproduct_show
                    if (preg_match('#^/admin/core/product/commonproduct/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_product_commonproduct_show')), array (  '_controller' => 'Core\\ProductBundle\\Controller\\Admin\\AdminProductController::showAction',  '_sonata_admin' => 'core_shop_product_admin',  '_sonata_name' => 'admin_core_product_commonproduct_show',  '_locale' => 'ru',));
                    }

                    // ru__RG__admin_core_product_commonproduct_export
                    if ($pathinfo === '/admin/core/product/commonproduct/export') {
                        return array (  '_controller' => 'Core\\ProductBundle\\Controller\\Admin\\AdminProductController::exportAction',  '_sonata_admin' => 'core_shop_product_admin',  '_sonata_name' => 'admin_core_product_commonproduct_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_product_commonproduct_export',);
                    }

                    // ru__RG__admin_core_product_commonproduct_history
                    if (preg_match('#^/admin/core/product/commonproduct/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_product_commonproduct_history')), array (  '_controller' => 'Core\\ProductBundle\\Controller\\Admin\\AdminProductController::historyAction',  '_sonata_admin' => 'core_shop_product_admin',  '_sonata_name' => 'admin_core_product_commonproduct_history',  '_locale' => 'ru',));
                    }

                    // ru__RG__admin_core_product_commonproduct_history_view_revision
                    if (preg_match('#^/admin/core/product/commonproduct/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_product_commonproduct_history_view_revision')), array (  '_controller' => 'Core\\ProductBundle\\Controller\\Admin\\AdminProductController::historyViewRevisionAction',  '_sonata_admin' => 'core_shop_product_admin',  '_sonata_name' => 'admin_core_product_commonproduct_history_view_revision',  '_locale' => 'ru',));
                    }

                }

                if (0 === strpos($pathinfo, '/admin/core/category')) {
                    if (0 === strpos($pathinfo, '/admin/core/category/productcategory')) {
                        // ru__RG__admin_core_category_productcategory_list
                        if ($pathinfo === '/admin/core/category/productcategory/list') {
                            return array (  '_controller' => 'Core\\CategoryBundle\\Controller\\Admin\\CommonAdminCategoryController::listAction',  '_sonata_admin' => 'core_shop_category_admin_product',  '_sonata_name' => 'admin_core_category_productcategory_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_category_productcategory_list',);
                        }

                        // ru__RG__admin_core_category_productcategory_create
                        if ($pathinfo === '/admin/core/category/productcategory/create') {
                            return array (  '_controller' => 'Core\\CategoryBundle\\Controller\\Admin\\CommonAdminCategoryController::createAction',  '_sonata_admin' => 'core_shop_category_admin_product',  '_sonata_name' => 'admin_core_category_productcategory_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_category_productcategory_create',);
                        }

                        // ru__RG__admin_core_category_productcategory_batch
                        if ($pathinfo === '/admin/core/category/productcategory/batch') {
                            return array (  '_controller' => 'Core\\CategoryBundle\\Controller\\Admin\\CommonAdminCategoryController::batchAction',  '_sonata_admin' => 'core_shop_category_admin_product',  '_sonata_name' => 'admin_core_category_productcategory_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_category_productcategory_batch',);
                        }

                        // ru__RG__admin_core_category_productcategory_edit
                        if (preg_match('#^/admin/core/category/productcategory/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_category_productcategory_edit')), array (  '_controller' => 'Core\\CategoryBundle\\Controller\\Admin\\CommonAdminCategoryController::editAction',  '_sonata_admin' => 'core_shop_category_admin_product',  '_sonata_name' => 'admin_core_category_productcategory_edit',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_category_productcategory_delete
                        if (preg_match('#^/admin/core/category/productcategory/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_category_productcategory_delete')), array (  '_controller' => 'Core\\CategoryBundle\\Controller\\Admin\\CommonAdminCategoryController::deleteAction',  '_sonata_admin' => 'core_shop_category_admin_product',  '_sonata_name' => 'admin_core_category_productcategory_delete',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_category_productcategory_show
                        if (preg_match('#^/admin/core/category/productcategory/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_category_productcategory_show')), array (  '_controller' => 'Core\\CategoryBundle\\Controller\\Admin\\CommonAdminCategoryController::showAction',  '_sonata_admin' => 'core_shop_category_admin_product',  '_sonata_name' => 'admin_core_category_productcategory_show',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_category_productcategory_export
                        if ($pathinfo === '/admin/core/category/productcategory/export') {
                            return array (  '_controller' => 'Core\\CategoryBundle\\Controller\\Admin\\CommonAdminCategoryController::exportAction',  '_sonata_admin' => 'core_shop_category_admin_product',  '_sonata_name' => 'admin_core_category_productcategory_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_category_productcategory_export',);
                        }

                        // ru__RG__admin_core_category_productcategory_history
                        if (preg_match('#^/admin/core/category/productcategory/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_category_productcategory_history')), array (  '_controller' => 'Core\\CategoryBundle\\Controller\\Admin\\CommonAdminCategoryController::historyAction',  '_sonata_admin' => 'core_shop_category_admin_product',  '_sonata_name' => 'admin_core_category_productcategory_history',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_category_productcategory_history_view_revision
                        if (preg_match('#^/admin/core/category/productcategory/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_category_productcategory_history_view_revision')), array (  '_controller' => 'Core\\CategoryBundle\\Controller\\Admin\\CommonAdminCategoryController::historyViewRevisionAction',  '_sonata_admin' => 'core_shop_category_admin_product',  '_sonata_name' => 'admin_core_category_productcategory_history_view_revision',  '_locale' => 'ru',));
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/core/category/troubleticketcategory')) {
                        // ru__RG__admin_core_category_troubleticketcategory_list
                        if ($pathinfo === '/admin/core/category/troubleticketcategory/list') {
                            return array (  '_controller' => 'Core\\CategoryBundle\\Controller\\Admin\\CommonAdminCategoryController::listAction',  '_sonata_admin' => 'core_shop_category_admin_trouble_ticket',  '_sonata_name' => 'admin_core_category_troubleticketcategory_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_category_troubleticketcategory_list',);
                        }

                        // ru__RG__admin_core_category_troubleticketcategory_create
                        if ($pathinfo === '/admin/core/category/troubleticketcategory/create') {
                            return array (  '_controller' => 'Core\\CategoryBundle\\Controller\\Admin\\CommonAdminCategoryController::createAction',  '_sonata_admin' => 'core_shop_category_admin_trouble_ticket',  '_sonata_name' => 'admin_core_category_troubleticketcategory_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_category_troubleticketcategory_create',);
                        }

                        // ru__RG__admin_core_category_troubleticketcategory_batch
                        if ($pathinfo === '/admin/core/category/troubleticketcategory/batch') {
                            return array (  '_controller' => 'Core\\CategoryBundle\\Controller\\Admin\\CommonAdminCategoryController::batchAction',  '_sonata_admin' => 'core_shop_category_admin_trouble_ticket',  '_sonata_name' => 'admin_core_category_troubleticketcategory_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_category_troubleticketcategory_batch',);
                        }

                        // ru__RG__admin_core_category_troubleticketcategory_edit
                        if (preg_match('#^/admin/core/category/troubleticketcategory/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_category_troubleticketcategory_edit')), array (  '_controller' => 'Core\\CategoryBundle\\Controller\\Admin\\CommonAdminCategoryController::editAction',  '_sonata_admin' => 'core_shop_category_admin_trouble_ticket',  '_sonata_name' => 'admin_core_category_troubleticketcategory_edit',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_category_troubleticketcategory_delete
                        if (preg_match('#^/admin/core/category/troubleticketcategory/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_category_troubleticketcategory_delete')), array (  '_controller' => 'Core\\CategoryBundle\\Controller\\Admin\\CommonAdminCategoryController::deleteAction',  '_sonata_admin' => 'core_shop_category_admin_trouble_ticket',  '_sonata_name' => 'admin_core_category_troubleticketcategory_delete',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_category_troubleticketcategory_show
                        if (preg_match('#^/admin/core/category/troubleticketcategory/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_category_troubleticketcategory_show')), array (  '_controller' => 'Core\\CategoryBundle\\Controller\\Admin\\CommonAdminCategoryController::showAction',  '_sonata_admin' => 'core_shop_category_admin_trouble_ticket',  '_sonata_name' => 'admin_core_category_troubleticketcategory_show',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_category_troubleticketcategory_export
                        if ($pathinfo === '/admin/core/category/troubleticketcategory/export') {
                            return array (  '_controller' => 'Core\\CategoryBundle\\Controller\\Admin\\CommonAdminCategoryController::exportAction',  '_sonata_admin' => 'core_shop_category_admin_trouble_ticket',  '_sonata_name' => 'admin_core_category_troubleticketcategory_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_category_troubleticketcategory_export',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/core/category/faqcategory')) {
                        // ru__RG__admin_core_category_faqcategory_list
                        if ($pathinfo === '/admin/core/category/faqcategory/list') {
                            return array (  '_controller' => 'Core\\CategoryBundle\\Controller\\Admin\\CommonAdminCategoryController::listAction',  '_sonata_admin' => 'core_shop_category_admin_faq',  '_sonata_name' => 'admin_core_category_faqcategory_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_category_faqcategory_list',);
                        }

                        // ru__RG__admin_core_category_faqcategory_create
                        if ($pathinfo === '/admin/core/category/faqcategory/create') {
                            return array (  '_controller' => 'Core\\CategoryBundle\\Controller\\Admin\\CommonAdminCategoryController::createAction',  '_sonata_admin' => 'core_shop_category_admin_faq',  '_sonata_name' => 'admin_core_category_faqcategory_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_category_faqcategory_create',);
                        }

                        // ru__RG__admin_core_category_faqcategory_batch
                        if ($pathinfo === '/admin/core/category/faqcategory/batch') {
                            return array (  '_controller' => 'Core\\CategoryBundle\\Controller\\Admin\\CommonAdminCategoryController::batchAction',  '_sonata_admin' => 'core_shop_category_admin_faq',  '_sonata_name' => 'admin_core_category_faqcategory_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_category_faqcategory_batch',);
                        }

                        // ru__RG__admin_core_category_faqcategory_edit
                        if (preg_match('#^/admin/core/category/faqcategory/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_category_faqcategory_edit')), array (  '_controller' => 'Core\\CategoryBundle\\Controller\\Admin\\CommonAdminCategoryController::editAction',  '_sonata_admin' => 'core_shop_category_admin_faq',  '_sonata_name' => 'admin_core_category_faqcategory_edit',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_category_faqcategory_delete
                        if (preg_match('#^/admin/core/category/faqcategory/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_category_faqcategory_delete')), array (  '_controller' => 'Core\\CategoryBundle\\Controller\\Admin\\CommonAdminCategoryController::deleteAction',  '_sonata_admin' => 'core_shop_category_admin_faq',  '_sonata_name' => 'admin_core_category_faqcategory_delete',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_category_faqcategory_show
                        if (preg_match('#^/admin/core/category/faqcategory/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_category_faqcategory_show')), array (  '_controller' => 'Core\\CategoryBundle\\Controller\\Admin\\CommonAdminCategoryController::showAction',  '_sonata_admin' => 'core_shop_category_admin_faq',  '_sonata_name' => 'admin_core_category_faqcategory_show',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_category_faqcategory_export
                        if ($pathinfo === '/admin/core/category/faqcategory/export') {
                            return array (  '_controller' => 'Core\\CategoryBundle\\Controller\\Admin\\CommonAdminCategoryController::exportAction',  '_sonata_admin' => 'core_shop_category_admin_faq',  '_sonata_name' => 'admin_core_category_faqcategory_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_category_faqcategory_export',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/core/category/productvirtualcategory')) {
                        // ru__RG__admin_core_category_productvirtualcategory_list
                        if ($pathinfo === '/admin/core/category/productvirtualcategory/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'core_category_virtual_product_admin',  '_sonata_name' => 'admin_core_category_productvirtualcategory_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_category_productvirtualcategory_list',);
                        }

                        // ru__RG__admin_core_category_productvirtualcategory_create
                        if ($pathinfo === '/admin/core/category/productvirtualcategory/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'core_category_virtual_product_admin',  '_sonata_name' => 'admin_core_category_productvirtualcategory_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_category_productvirtualcategory_create',);
                        }

                        // ru__RG__admin_core_category_productvirtualcategory_batch
                        if ($pathinfo === '/admin/core/category/productvirtualcategory/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'core_category_virtual_product_admin',  '_sonata_name' => 'admin_core_category_productvirtualcategory_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_category_productvirtualcategory_batch',);
                        }

                        // ru__RG__admin_core_category_productvirtualcategory_edit
                        if (preg_match('#^/admin/core/category/productvirtualcategory/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_category_productvirtualcategory_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'core_category_virtual_product_admin',  '_sonata_name' => 'admin_core_category_productvirtualcategory_edit',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_category_productvirtualcategory_delete
                        if (preg_match('#^/admin/core/category/productvirtualcategory/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_category_productvirtualcategory_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'core_category_virtual_product_admin',  '_sonata_name' => 'admin_core_category_productvirtualcategory_delete',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_category_productvirtualcategory_show
                        if (preg_match('#^/admin/core/category/productvirtualcategory/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_category_productvirtualcategory_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'core_category_virtual_product_admin',  '_sonata_name' => 'admin_core_category_productvirtualcategory_show',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_category_productvirtualcategory_export
                        if ($pathinfo === '/admin/core/category/productvirtualcategory/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'core_category_virtual_product_admin',  '_sonata_name' => 'admin_core_category_productvirtualcategory_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_category_productvirtualcategory_export',);
                        }

                        // ru__RG__admin_core_category_productvirtualcategory_history
                        if (preg_match('#^/admin/core/category/productvirtualcategory/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_category_productvirtualcategory_history')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyAction',  '_sonata_admin' => 'core_category_virtual_product_admin',  '_sonata_name' => 'admin_core_category_productvirtualcategory_history',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_category_productvirtualcategory_history_view_revision
                        if (preg_match('#^/admin/core/category/productvirtualcategory/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_category_productvirtualcategory_history_view_revision')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyViewRevisionAction',  '_sonata_admin' => 'core_category_virtual_product_admin',  '_sonata_name' => 'admin_core_category_productvirtualcategory_history_view_revision',  '_locale' => 'ru',));
                        }

                    }

                }

                if (0 === strpos($pathinfo, '/admin/core/property')) {
                    if (0 === strpos($pathinfo, '/admin/core/property/property')) {
                        // ru__RG__admin_core_property_property_list
                        if ($pathinfo === '/admin/core/property/property/list') {
                            return array (  '_controller' => 'Core\\PropertyBundle\\Controller\\Admin\\PropertyAdminController::listAction',  '_sonata_admin' => 'core_shop_property_admin',  '_sonata_name' => 'admin_core_property_property_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_property_property_list',);
                        }

                        // ru__RG__admin_core_property_property_create
                        if ($pathinfo === '/admin/core/property/property/create') {
                            return array (  '_controller' => 'Core\\PropertyBundle\\Controller\\Admin\\PropertyAdminController::createAction',  '_sonata_admin' => 'core_shop_property_admin',  '_sonata_name' => 'admin_core_property_property_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_property_property_create',);
                        }

                        // ru__RG__admin_core_property_property_batch
                        if ($pathinfo === '/admin/core/property/property/batch') {
                            return array (  '_controller' => 'Core\\PropertyBundle\\Controller\\Admin\\PropertyAdminController::batchAction',  '_sonata_admin' => 'core_shop_property_admin',  '_sonata_name' => 'admin_core_property_property_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_property_property_batch',);
                        }

                        // ru__RG__admin_core_property_property_edit
                        if (preg_match('#^/admin/core/property/property/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_property_property_edit')), array (  '_controller' => 'Core\\PropertyBundle\\Controller\\Admin\\PropertyAdminController::editAction',  '_sonata_admin' => 'core_shop_property_admin',  '_sonata_name' => 'admin_core_property_property_edit',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_property_property_delete
                        if (preg_match('#^/admin/core/property/property/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_property_property_delete')), array (  '_controller' => 'Core\\PropertyBundle\\Controller\\Admin\\PropertyAdminController::deleteAction',  '_sonata_admin' => 'core_shop_property_admin',  '_sonata_name' => 'admin_core_property_property_delete',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_property_property_show
                        if (preg_match('#^/admin/core/property/property/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_property_property_show')), array (  '_controller' => 'Core\\PropertyBundle\\Controller\\Admin\\PropertyAdminController::showAction',  '_sonata_admin' => 'core_shop_property_admin',  '_sonata_name' => 'admin_core_property_property_show',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_property_property_export
                        if ($pathinfo === '/admin/core/property/property/export') {
                            return array (  '_controller' => 'Core\\PropertyBundle\\Controller\\Admin\\PropertyAdminController::exportAction',  '_sonata_admin' => 'core_shop_property_admin',  '_sonata_name' => 'admin_core_property_property_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_property_property_export',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/core/property/dataproperty')) {
                        // ru__RG__admin_core_property_dataproperty_list
                        if ($pathinfo === '/admin/core/property/dataproperty/list') {
                            return array (  '_controller' => 'Core\\PropertyBundle\\Controller\\Admin\\PropertyAdminController::listAction',  '_sonata_admin' => 'core_shop_property_data_admin',  '_sonata_name' => 'admin_core_property_dataproperty_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_property_dataproperty_list',);
                        }

                        // ru__RG__admin_core_property_dataproperty_create
                        if ($pathinfo === '/admin/core/property/dataproperty/create') {
                            return array (  '_controller' => 'Core\\PropertyBundle\\Controller\\Admin\\PropertyAdminController::createAction',  '_sonata_admin' => 'core_shop_property_data_admin',  '_sonata_name' => 'admin_core_property_dataproperty_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_property_dataproperty_create',);
                        }

                        // ru__RG__admin_core_property_dataproperty_batch
                        if ($pathinfo === '/admin/core/property/dataproperty/batch') {
                            return array (  '_controller' => 'Core\\PropertyBundle\\Controller\\Admin\\PropertyAdminController::batchAction',  '_sonata_admin' => 'core_shop_property_data_admin',  '_sonata_name' => 'admin_core_property_dataproperty_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_property_dataproperty_batch',);
                        }

                        // ru__RG__admin_core_property_dataproperty_edit
                        if (preg_match('#^/admin/core/property/dataproperty/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_property_dataproperty_edit')), array (  '_controller' => 'Core\\PropertyBundle\\Controller\\Admin\\PropertyAdminController::editAction',  '_sonata_admin' => 'core_shop_property_data_admin',  '_sonata_name' => 'admin_core_property_dataproperty_edit',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_property_dataproperty_delete
                        if (preg_match('#^/admin/core/property/dataproperty/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_property_dataproperty_delete')), array (  '_controller' => 'Core\\PropertyBundle\\Controller\\Admin\\PropertyAdminController::deleteAction',  '_sonata_admin' => 'core_shop_property_data_admin',  '_sonata_name' => 'admin_core_property_dataproperty_delete',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_property_dataproperty_show
                        if (preg_match('#^/admin/core/property/dataproperty/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_property_dataproperty_show')), array (  '_controller' => 'Core\\PropertyBundle\\Controller\\Admin\\PropertyAdminController::showAction',  '_sonata_admin' => 'core_shop_property_data_admin',  '_sonata_name' => 'admin_core_property_dataproperty_show',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_property_dataproperty_export
                        if ($pathinfo === '/admin/core/property/dataproperty/export') {
                            return array (  '_controller' => 'Core\\PropertyBundle\\Controller\\Admin\\PropertyAdminController::exportAction',  '_sonata_admin' => 'core_shop_property_data_admin',  '_sonata_name' => 'admin_core_property_dataproperty_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_property_dataproperty_export',);
                        }

                        // ru__RG__admin_core_property_dataproperty_history
                        if (preg_match('#^/admin/core/property/dataproperty/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_property_dataproperty_history')), array (  '_controller' => 'Core\\PropertyBundle\\Controller\\Admin\\PropertyAdminController::historyAction',  '_sonata_admin' => 'core_shop_property_data_admin',  '_sonata_name' => 'admin_core_property_dataproperty_history',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_property_dataproperty_history_view_revision
                        if (preg_match('#^/admin/core/property/dataproperty/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_property_dataproperty_history_view_revision')), array (  '_controller' => 'Core\\PropertyBundle\\Controller\\Admin\\PropertyAdminController::historyViewRevisionAction',  '_sonata_admin' => 'core_shop_property_data_admin',  '_sonata_name' => 'admin_core_property_dataproperty_history_view_revision',  '_locale' => 'ru',));
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/core/property/productdataproperty')) {
                        // ru__RG__admin_core_property_productdataproperty_list
                        if ($pathinfo === '/admin/core/property/productdataproperty/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'core_shop_property_data_product_admin',  '_sonata_name' => 'admin_core_property_productdataproperty_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_property_productdataproperty_list',);
                        }

                        // ru__RG__admin_core_property_productdataproperty_create
                        if ($pathinfo === '/admin/core/property/productdataproperty/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'core_shop_property_data_product_admin',  '_sonata_name' => 'admin_core_property_productdataproperty_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_property_productdataproperty_create',);
                        }

                        // ru__RG__admin_core_property_productdataproperty_batch
                        if ($pathinfo === '/admin/core/property/productdataproperty/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'core_shop_property_data_product_admin',  '_sonata_name' => 'admin_core_property_productdataproperty_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_property_productdataproperty_batch',);
                        }

                        // ru__RG__admin_core_property_productdataproperty_edit
                        if (preg_match('#^/admin/core/property/productdataproperty/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_property_productdataproperty_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'core_shop_property_data_product_admin',  '_sonata_name' => 'admin_core_property_productdataproperty_edit',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_property_productdataproperty_delete
                        if (preg_match('#^/admin/core/property/productdataproperty/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_property_productdataproperty_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'core_shop_property_data_product_admin',  '_sonata_name' => 'admin_core_property_productdataproperty_delete',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_property_productdataproperty_show
                        if (preg_match('#^/admin/core/property/productdataproperty/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_property_productdataproperty_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'core_shop_property_data_product_admin',  '_sonata_name' => 'admin_core_property_productdataproperty_show',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_property_productdataproperty_export
                        if ($pathinfo === '/admin/core/property/productdataproperty/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'core_shop_property_data_product_admin',  '_sonata_name' => 'admin_core_property_productdataproperty_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_property_productdataproperty_export',);
                        }

                        // ru__RG__admin_core_property_productdataproperty_history
                        if (preg_match('#^/admin/core/property/productdataproperty/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_property_productdataproperty_history')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyAction',  '_sonata_admin' => 'core_shop_property_data_product_admin',  '_sonata_name' => 'admin_core_property_productdataproperty_history',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_property_productdataproperty_history_view_revision
                        if (preg_match('#^/admin/core/property/productdataproperty/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_property_productdataproperty_history_view_revision')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyViewRevisionAction',  '_sonata_admin' => 'core_shop_property_data_product_admin',  '_sonata_name' => 'admin_core_property_productdataproperty_history_view_revision',  '_locale' => 'ru',));
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/core/property/settingscategoryproperty')) {
                        // ru__RG__admin_core_property_settingscategoryproperty_list
                        if ($pathinfo === '/admin/core/property/settingscategoryproperty/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'core_shop_property_settings_category_admin',  '_sonata_name' => 'admin_core_property_settingscategoryproperty_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_property_settingscategoryproperty_list',);
                        }

                        // ru__RG__admin_core_property_settingscategoryproperty_create
                        if ($pathinfo === '/admin/core/property/settingscategoryproperty/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'core_shop_property_settings_category_admin',  '_sonata_name' => 'admin_core_property_settingscategoryproperty_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_property_settingscategoryproperty_create',);
                        }

                        // ru__RG__admin_core_property_settingscategoryproperty_batch
                        if ($pathinfo === '/admin/core/property/settingscategoryproperty/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'core_shop_property_settings_category_admin',  '_sonata_name' => 'admin_core_property_settingscategoryproperty_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_property_settingscategoryproperty_batch',);
                        }

                        // ru__RG__admin_core_property_settingscategoryproperty_edit
                        if (preg_match('#^/admin/core/property/settingscategoryproperty/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_property_settingscategoryproperty_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'core_shop_property_settings_category_admin',  '_sonata_name' => 'admin_core_property_settingscategoryproperty_edit',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_property_settingscategoryproperty_delete
                        if (preg_match('#^/admin/core/property/settingscategoryproperty/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_property_settingscategoryproperty_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'core_shop_property_settings_category_admin',  '_sonata_name' => 'admin_core_property_settingscategoryproperty_delete',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_property_settingscategoryproperty_show
                        if (preg_match('#^/admin/core/property/settingscategoryproperty/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_property_settingscategoryproperty_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'core_shop_property_settings_category_admin',  '_sonata_name' => 'admin_core_property_settingscategoryproperty_show',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_property_settingscategoryproperty_export
                        if ($pathinfo === '/admin/core/property/settingscategoryproperty/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'core_shop_property_settings_category_admin',  '_sonata_name' => 'admin_core_property_settingscategoryproperty_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_property_settingscategoryproperty_export',);
                        }

                    }

                }

                if (0 === strpos($pathinfo, '/admin/core/directory')) {
                    if (0 === strpos($pathinfo, '/admin/core/directory/country')) {
                        // ru__RG__admin_core_directory_country_list
                        if ($pathinfo === '/admin/core/directory/country/list') {
                            return array (  '_controller' => 'Core\\DirectoryBundle\\Controller\\Admin\\CountryAdminController::listAction',  '_sonata_admin' => 'core_country_admin',  '_sonata_name' => 'admin_core_directory_country_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_directory_country_list',);
                        }

                        // ru__RG__admin_core_directory_country_batch
                        if ($pathinfo === '/admin/core/directory/country/batch') {
                            return array (  '_controller' => 'Core\\DirectoryBundle\\Controller\\Admin\\CountryAdminController::batchAction',  '_sonata_admin' => 'core_country_admin',  '_sonata_name' => 'admin_core_directory_country_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_directory_country_batch',);
                        }

                        // ru__RG__admin_core_directory_country_edit
                        if (preg_match('#^/admin/core/directory/country/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_directory_country_edit')), array (  '_controller' => 'Core\\DirectoryBundle\\Controller\\Admin\\CountryAdminController::editAction',  '_sonata_admin' => 'core_country_admin',  '_sonata_name' => 'admin_core_directory_country_edit',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_directory_country_delete
                        if (preg_match('#^/admin/core/directory/country/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_directory_country_delete')), array (  '_controller' => 'Core\\DirectoryBundle\\Controller\\Admin\\CountryAdminController::deleteAction',  '_sonata_admin' => 'core_country_admin',  '_sonata_name' => 'admin_core_directory_country_delete',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_directory_country_show
                        if (preg_match('#^/admin/core/directory/country/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_directory_country_show')), array (  '_controller' => 'Core\\DirectoryBundle\\Controller\\Admin\\CountryAdminController::showAction',  '_sonata_admin' => 'core_country_admin',  '_sonata_name' => 'admin_core_directory_country_show',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_directory_country_export
                        if ($pathinfo === '/admin/core/directory/country/export') {
                            return array (  '_controller' => 'Core\\DirectoryBundle\\Controller\\Admin\\CountryAdminController::exportAction',  '_sonata_admin' => 'core_country_admin',  '_sonata_name' => 'admin_core_directory_country_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_directory_country_export',);
                        }

                        // ru__RG__admin_core_directory_country_history
                        if (preg_match('#^/admin/core/directory/country/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_directory_country_history')), array (  '_controller' => 'Core\\DirectoryBundle\\Controller\\Admin\\CountryAdminController::historyAction',  '_sonata_admin' => 'core_country_admin',  '_sonata_name' => 'admin_core_directory_country_history',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_directory_country_history_view_revision
                        if (preg_match('#^/admin/core/directory/country/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_directory_country_history_view_revision')), array (  '_controller' => 'Core\\DirectoryBundle\\Controller\\Admin\\CountryAdminController::historyViewRevisionAction',  '_sonata_admin' => 'core_country_admin',  '_sonata_name' => 'admin_core_directory_country_history_view_revision',  '_locale' => 'ru',));
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/core/directory/region')) {
                        // ru__RG__admin_core_directory_region_list
                        if ($pathinfo === '/admin/core/directory/region/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'core_region_admin',  '_sonata_name' => 'admin_core_directory_region_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_directory_region_list',);
                        }

                        // ru__RG__admin_core_directory_region_create
                        if ($pathinfo === '/admin/core/directory/region/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'core_region_admin',  '_sonata_name' => 'admin_core_directory_region_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_directory_region_create',);
                        }

                        // ru__RG__admin_core_directory_region_batch
                        if ($pathinfo === '/admin/core/directory/region/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'core_region_admin',  '_sonata_name' => 'admin_core_directory_region_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_directory_region_batch',);
                        }

                        // ru__RG__admin_core_directory_region_edit
                        if (preg_match('#^/admin/core/directory/region/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_directory_region_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'core_region_admin',  '_sonata_name' => 'admin_core_directory_region_edit',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_directory_region_delete
                        if (preg_match('#^/admin/core/directory/region/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_directory_region_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'core_region_admin',  '_sonata_name' => 'admin_core_directory_region_delete',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_directory_region_show
                        if (preg_match('#^/admin/core/directory/region/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_directory_region_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'core_region_admin',  '_sonata_name' => 'admin_core_directory_region_show',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_directory_region_export
                        if ($pathinfo === '/admin/core/directory/region/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'core_region_admin',  '_sonata_name' => 'admin_core_directory_region_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_directory_region_export',);
                        }

                        // ru__RG__admin_core_directory_region_history
                        if (preg_match('#^/admin/core/directory/region/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_directory_region_history')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyAction',  '_sonata_admin' => 'core_region_admin',  '_sonata_name' => 'admin_core_directory_region_history',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_directory_region_history_view_revision
                        if (preg_match('#^/admin/core/directory/region/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_directory_region_history_view_revision')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyViewRevisionAction',  '_sonata_admin' => 'core_region_admin',  '_sonata_name' => 'admin_core_directory_region_history_view_revision',  '_locale' => 'ru',));
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/core/directory/city')) {
                        // ru__RG__admin_core_directory_city_list
                        if ($pathinfo === '/admin/core/directory/city/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'core_city_admin',  '_sonata_name' => 'admin_core_directory_city_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_directory_city_list',);
                        }

                        // ru__RG__admin_core_directory_city_create
                        if ($pathinfo === '/admin/core/directory/city/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'core_city_admin',  '_sonata_name' => 'admin_core_directory_city_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_directory_city_create',);
                        }

                        // ru__RG__admin_core_directory_city_batch
                        if ($pathinfo === '/admin/core/directory/city/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'core_city_admin',  '_sonata_name' => 'admin_core_directory_city_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_directory_city_batch',);
                        }

                        // ru__RG__admin_core_directory_city_edit
                        if (preg_match('#^/admin/core/directory/city/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_directory_city_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'core_city_admin',  '_sonata_name' => 'admin_core_directory_city_edit',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_directory_city_delete
                        if (preg_match('#^/admin/core/directory/city/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_directory_city_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'core_city_admin',  '_sonata_name' => 'admin_core_directory_city_delete',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_directory_city_show
                        if (preg_match('#^/admin/core/directory/city/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_directory_city_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'core_city_admin',  '_sonata_name' => 'admin_core_directory_city_show',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_directory_city_export
                        if ($pathinfo === '/admin/core/directory/city/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'core_city_admin',  '_sonata_name' => 'admin_core_directory_city_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_directory_city_export',);
                        }

                        // ru__RG__admin_core_directory_city_history
                        if (preg_match('#^/admin/core/directory/city/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_directory_city_history')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyAction',  '_sonata_admin' => 'core_city_admin',  '_sonata_name' => 'admin_core_directory_city_history',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_directory_city_history_view_revision
                        if (preg_match('#^/admin/core/directory/city/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_directory_city_history_view_revision')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyViewRevisionAction',  '_sonata_admin' => 'core_city_admin',  '_sonata_name' => 'admin_core_directory_city_history_view_revision',  '_locale' => 'ru',));
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/core/directory/geocity')) {
                        // ru__RG__admin_core_directory_geocity_list
                        if ($pathinfo === '/admin/core/directory/geocity/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'core_geo_city_admin',  '_sonata_name' => 'admin_core_directory_geocity_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_directory_geocity_list',);
                        }

                        // ru__RG__admin_core_directory_geocity_create
                        if ($pathinfo === '/admin/core/directory/geocity/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'core_geo_city_admin',  '_sonata_name' => 'admin_core_directory_geocity_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_directory_geocity_create',);
                        }

                        // ru__RG__admin_core_directory_geocity_batch
                        if ($pathinfo === '/admin/core/directory/geocity/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'core_geo_city_admin',  '_sonata_name' => 'admin_core_directory_geocity_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_directory_geocity_batch',);
                        }

                        // ru__RG__admin_core_directory_geocity_edit
                        if (preg_match('#^/admin/core/directory/geocity/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_directory_geocity_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'core_geo_city_admin',  '_sonata_name' => 'admin_core_directory_geocity_edit',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_directory_geocity_delete
                        if (preg_match('#^/admin/core/directory/geocity/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_directory_geocity_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'core_geo_city_admin',  '_sonata_name' => 'admin_core_directory_geocity_delete',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_directory_geocity_show
                        if (preg_match('#^/admin/core/directory/geocity/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_directory_geocity_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'core_geo_city_admin',  '_sonata_name' => 'admin_core_directory_geocity_show',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_directory_geocity_export
                        if ($pathinfo === '/admin/core/directory/geocity/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'core_geo_city_admin',  '_sonata_name' => 'admin_core_directory_geocity_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_directory_geocity_export',);
                        }

                        // ru__RG__admin_core_directory_geocity_history
                        if (preg_match('#^/admin/core/directory/geocity/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_directory_geocity_history')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyAction',  '_sonata_admin' => 'core_geo_city_admin',  '_sonata_name' => 'admin_core_directory_geocity_history',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_directory_geocity_history_view_revision
                        if (preg_match('#^/admin/core/directory/geocity/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_directory_geocity_history_view_revision')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyViewRevisionAction',  '_sonata_admin' => 'core_geo_city_admin',  '_sonata_name' => 'admin_core_directory_geocity_history_view_revision',  '_locale' => 'ru',));
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/core/directory/remotevideo')) {
                        // ru__RG__admin_core_directory_remotevideo_list
                        if ($pathinfo === '/admin/core/directory/remotevideo/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'core_video_admin',  '_sonata_name' => 'admin_core_directory_remotevideo_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_directory_remotevideo_list',);
                        }

                        // ru__RG__admin_core_directory_remotevideo_create
                        if ($pathinfo === '/admin/core/directory/remotevideo/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'core_video_admin',  '_sonata_name' => 'admin_core_directory_remotevideo_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_directory_remotevideo_create',);
                        }

                        // ru__RG__admin_core_directory_remotevideo_batch
                        if ($pathinfo === '/admin/core/directory/remotevideo/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'core_video_admin',  '_sonata_name' => 'admin_core_directory_remotevideo_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_directory_remotevideo_batch',);
                        }

                        // ru__RG__admin_core_directory_remotevideo_edit
                        if (preg_match('#^/admin/core/directory/remotevideo/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_directory_remotevideo_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'core_video_admin',  '_sonata_name' => 'admin_core_directory_remotevideo_edit',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_directory_remotevideo_delete
                        if (preg_match('#^/admin/core/directory/remotevideo/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_directory_remotevideo_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'core_video_admin',  '_sonata_name' => 'admin_core_directory_remotevideo_delete',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_directory_remotevideo_show
                        if (preg_match('#^/admin/core/directory/remotevideo/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_directory_remotevideo_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'core_video_admin',  '_sonata_name' => 'admin_core_directory_remotevideo_show',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_directory_remotevideo_export
                        if ($pathinfo === '/admin/core/directory/remotevideo/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'core_video_admin',  '_sonata_name' => 'admin_core_directory_remotevideo_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_directory_remotevideo_export',);
                        }

                        // ru__RG__admin_core_directory_remotevideo_history
                        if (preg_match('#^/admin/core/directory/remotevideo/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_directory_remotevideo_history')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyAction',  '_sonata_admin' => 'core_video_admin',  '_sonata_name' => 'admin_core_directory_remotevideo_history',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_directory_remotevideo_history_view_revision
                        if (preg_match('#^/admin/core/directory/remotevideo/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_directory_remotevideo_history_view_revision')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyViewRevisionAction',  '_sonata_admin' => 'core_video_admin',  '_sonata_name' => 'admin_core_directory_remotevideo_history_view_revision',  '_locale' => 'ru',));
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/core/directory/videohosting')) {
                        // ru__RG__admin_core_directory_videohosting_list
                        if ($pathinfo === '/admin/core/directory/videohosting/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'core_video_hosting_admin',  '_sonata_name' => 'admin_core_directory_videohosting_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_directory_videohosting_list',);
                        }

                        // ru__RG__admin_core_directory_videohosting_create
                        if ($pathinfo === '/admin/core/directory/videohosting/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'core_video_hosting_admin',  '_sonata_name' => 'admin_core_directory_videohosting_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_directory_videohosting_create',);
                        }

                        // ru__RG__admin_core_directory_videohosting_batch
                        if ($pathinfo === '/admin/core/directory/videohosting/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'core_video_hosting_admin',  '_sonata_name' => 'admin_core_directory_videohosting_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_directory_videohosting_batch',);
                        }

                        // ru__RG__admin_core_directory_videohosting_edit
                        if (preg_match('#^/admin/core/directory/videohosting/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_directory_videohosting_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'core_video_hosting_admin',  '_sonata_name' => 'admin_core_directory_videohosting_edit',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_directory_videohosting_delete
                        if (preg_match('#^/admin/core/directory/videohosting/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_directory_videohosting_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'core_video_hosting_admin',  '_sonata_name' => 'admin_core_directory_videohosting_delete',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_directory_videohosting_show
                        if (preg_match('#^/admin/core/directory/videohosting/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_directory_videohosting_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'core_video_hosting_admin',  '_sonata_name' => 'admin_core_directory_videohosting_show',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_directory_videohosting_export
                        if ($pathinfo === '/admin/core/directory/videohosting/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'core_video_hosting_admin',  '_sonata_name' => 'admin_core_directory_videohosting_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_directory_videohosting_export',);
                        }

                        // ru__RG__admin_core_directory_videohosting_history
                        if (preg_match('#^/admin/core/directory/videohosting/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_directory_videohosting_history')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyAction',  '_sonata_admin' => 'core_video_hosting_admin',  '_sonata_name' => 'admin_core_directory_videohosting_history',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_directory_videohosting_history_view_revision
                        if (preg_match('#^/admin/core/directory/videohosting/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_directory_videohosting_history_view_revision')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyViewRevisionAction',  '_sonata_admin' => 'core_video_hosting_admin',  '_sonata_name' => 'admin_core_directory_videohosting_history_view_revision',  '_locale' => 'ru',));
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/core/directory/currency')) {
                        // ru__RG__admin_core_directory_currency_list
                        if ($pathinfo === '/admin/core/directory/currency/list') {
                            return array (  '_controller' => 'Core\\DirectoryBundle\\Controller\\Admin\\CurrencyAdminController::listAction',  '_sonata_admin' => 'core_currency_admin',  '_sonata_name' => 'admin_core_directory_currency_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_directory_currency_list',);
                        }

                        // ru__RG__admin_core_directory_currency_batch
                        if ($pathinfo === '/admin/core/directory/currency/batch') {
                            return array (  '_controller' => 'Core\\DirectoryBundle\\Controller\\Admin\\CurrencyAdminController::batchAction',  '_sonata_admin' => 'core_currency_admin',  '_sonata_name' => 'admin_core_directory_currency_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_directory_currency_batch',);
                        }

                        // ru__RG__admin_core_directory_currency_edit
                        if (preg_match('#^/admin/core/directory/currency/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_directory_currency_edit')), array (  '_controller' => 'Core\\DirectoryBundle\\Controller\\Admin\\CurrencyAdminController::editAction',  '_sonata_admin' => 'core_currency_admin',  '_sonata_name' => 'admin_core_directory_currency_edit',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_directory_currency_delete
                        if (preg_match('#^/admin/core/directory/currency/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_directory_currency_delete')), array (  '_controller' => 'Core\\DirectoryBundle\\Controller\\Admin\\CurrencyAdminController::deleteAction',  '_sonata_admin' => 'core_currency_admin',  '_sonata_name' => 'admin_core_directory_currency_delete',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_directory_currency_show
                        if (preg_match('#^/admin/core/directory/currency/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_directory_currency_show')), array (  '_controller' => 'Core\\DirectoryBundle\\Controller\\Admin\\CurrencyAdminController::showAction',  '_sonata_admin' => 'core_currency_admin',  '_sonata_name' => 'admin_core_directory_currency_show',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_directory_currency_export
                        if ($pathinfo === '/admin/core/directory/currency/export') {
                            return array (  '_controller' => 'Core\\DirectoryBundle\\Controller\\Admin\\CurrencyAdminController::exportAction',  '_sonata_admin' => 'core_currency_admin',  '_sonata_name' => 'admin_core_directory_currency_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_directory_currency_export',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/core/directory/legalform')) {
                        // ru__RG__admin_core_directory_legalform_list
                        if ($pathinfo === '/admin/core/directory/legalform/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'core_legal_form_admin',  '_sonata_name' => 'admin_core_directory_legalform_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_directory_legalform_list',);
                        }

                        // ru__RG__admin_core_directory_legalform_create
                        if ($pathinfo === '/admin/core/directory/legalform/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'core_legal_form_admin',  '_sonata_name' => 'admin_core_directory_legalform_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_directory_legalform_create',);
                        }

                        // ru__RG__admin_core_directory_legalform_batch
                        if ($pathinfo === '/admin/core/directory/legalform/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'core_legal_form_admin',  '_sonata_name' => 'admin_core_directory_legalform_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_directory_legalform_batch',);
                        }

                        // ru__RG__admin_core_directory_legalform_edit
                        if (preg_match('#^/admin/core/directory/legalform/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_directory_legalform_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'core_legal_form_admin',  '_sonata_name' => 'admin_core_directory_legalform_edit',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_directory_legalform_delete
                        if (preg_match('#^/admin/core/directory/legalform/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_directory_legalform_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'core_legal_form_admin',  '_sonata_name' => 'admin_core_directory_legalform_delete',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_directory_legalform_show
                        if (preg_match('#^/admin/core/directory/legalform/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_directory_legalform_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'core_legal_form_admin',  '_sonata_name' => 'admin_core_directory_legalform_show',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_directory_legalform_export
                        if ($pathinfo === '/admin/core/directory/legalform/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'core_legal_form_admin',  '_sonata_name' => 'admin_core_directory_legalform_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_directory_legalform_export',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/core/directory/producttags')) {
                        // ru__RG__admin_core_directory_producttags_list
                        if ($pathinfo === '/admin/core/directory/producttags/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'core_directory_product_tags_admin',  '_sonata_name' => 'admin_core_directory_producttags_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_directory_producttags_list',);
                        }

                        // ru__RG__admin_core_directory_producttags_create
                        if ($pathinfo === '/admin/core/directory/producttags/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'core_directory_product_tags_admin',  '_sonata_name' => 'admin_core_directory_producttags_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_directory_producttags_create',);
                        }

                        // ru__RG__admin_core_directory_producttags_batch
                        if ($pathinfo === '/admin/core/directory/producttags/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'core_directory_product_tags_admin',  '_sonata_name' => 'admin_core_directory_producttags_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_directory_producttags_batch',);
                        }

                        // ru__RG__admin_core_directory_producttags_edit
                        if (preg_match('#^/admin/core/directory/producttags/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_directory_producttags_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'core_directory_product_tags_admin',  '_sonata_name' => 'admin_core_directory_producttags_edit',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_directory_producttags_delete
                        if (preg_match('#^/admin/core/directory/producttags/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_directory_producttags_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'core_directory_product_tags_admin',  '_sonata_name' => 'admin_core_directory_producttags_delete',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_directory_producttags_show
                        if (preg_match('#^/admin/core/directory/producttags/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_directory_producttags_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'core_directory_product_tags_admin',  '_sonata_name' => 'admin_core_directory_producttags_show',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_directory_producttags_export
                        if ($pathinfo === '/admin/core/directory/producttags/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'core_directory_product_tags_admin',  '_sonata_name' => 'admin_core_directory_producttags_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_directory_producttags_export',);
                        }

                        // ru__RG__admin_core_directory_producttags_history
                        if (preg_match('#^/admin/core/directory/producttags/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_directory_producttags_history')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyAction',  '_sonata_admin' => 'core_directory_product_tags_admin',  '_sonata_name' => 'admin_core_directory_producttags_history',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_directory_producttags_history_view_revision
                        if (preg_match('#^/admin/core/directory/producttags/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_directory_producttags_history_view_revision')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyViewRevisionAction',  '_sonata_admin' => 'core_directory_product_tags_admin',  '_sonata_name' => 'admin_core_directory_producttags_history_view_revision',  '_locale' => 'ru',));
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/core/directory/unitofmeasure')) {
                        // ru__RG__admin_core_directory_unitofmeasure_list
                        if ($pathinfo === '/admin/core/directory/unitofmeasure/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'core_directory_unit_of_measure_admin',  '_sonata_name' => 'admin_core_directory_unitofmeasure_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_directory_unitofmeasure_list',);
                        }

                        // ru__RG__admin_core_directory_unitofmeasure_create
                        if ($pathinfo === '/admin/core/directory/unitofmeasure/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'core_directory_unit_of_measure_admin',  '_sonata_name' => 'admin_core_directory_unitofmeasure_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_directory_unitofmeasure_create',);
                        }

                        // ru__RG__admin_core_directory_unitofmeasure_batch
                        if ($pathinfo === '/admin/core/directory/unitofmeasure/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'core_directory_unit_of_measure_admin',  '_sonata_name' => 'admin_core_directory_unitofmeasure_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_directory_unitofmeasure_batch',);
                        }

                        // ru__RG__admin_core_directory_unitofmeasure_edit
                        if (preg_match('#^/admin/core/directory/unitofmeasure/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_directory_unitofmeasure_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'core_directory_unit_of_measure_admin',  '_sonata_name' => 'admin_core_directory_unitofmeasure_edit',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_directory_unitofmeasure_delete
                        if (preg_match('#^/admin/core/directory/unitofmeasure/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_directory_unitofmeasure_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'core_directory_unit_of_measure_admin',  '_sonata_name' => 'admin_core_directory_unitofmeasure_delete',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_directory_unitofmeasure_show
                        if (preg_match('#^/admin/core/directory/unitofmeasure/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_directory_unitofmeasure_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'core_directory_unit_of_measure_admin',  '_sonata_name' => 'admin_core_directory_unitofmeasure_show',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_directory_unitofmeasure_export
                        if ($pathinfo === '/admin/core/directory/unitofmeasure/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'core_directory_unit_of_measure_admin',  '_sonata_name' => 'admin_core_directory_unitofmeasure_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_directory_unitofmeasure_export',);
                        }

                        // ru__RG__admin_core_directory_unitofmeasure_history
                        if (preg_match('#^/admin/core/directory/unitofmeasure/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_directory_unitofmeasure_history')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyAction',  '_sonata_admin' => 'core_directory_unit_of_measure_admin',  '_sonata_name' => 'admin_core_directory_unitofmeasure_history',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_directory_unitofmeasure_history_view_revision
                        if (preg_match('#^/admin/core/directory/unitofmeasure/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_directory_unitofmeasure_history_view_revision')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyViewRevisionAction',  '_sonata_admin' => 'core_directory_unit_of_measure_admin',  '_sonata_name' => 'admin_core_directory_unitofmeasure_history_view_revision',  '_locale' => 'ru',));
                        }

                        if (0 === strpos($pathinfo, '/admin/core/directory/unitofmeasuregroup')) {
                            // ru__RG__admin_core_directory_unitofmeasuregroup_list
                            if ($pathinfo === '/admin/core/directory/unitofmeasuregroup/list') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'core_directory_unit_of_measure_group_admin',  '_sonata_name' => 'admin_core_directory_unitofmeasuregroup_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_directory_unitofmeasuregroup_list',);
                            }

                            // ru__RG__admin_core_directory_unitofmeasuregroup_create
                            if ($pathinfo === '/admin/core/directory/unitofmeasuregroup/create') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'core_directory_unit_of_measure_group_admin',  '_sonata_name' => 'admin_core_directory_unitofmeasuregroup_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_directory_unitofmeasuregroup_create',);
                            }

                            // ru__RG__admin_core_directory_unitofmeasuregroup_batch
                            if ($pathinfo === '/admin/core/directory/unitofmeasuregroup/batch') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'core_directory_unit_of_measure_group_admin',  '_sonata_name' => 'admin_core_directory_unitofmeasuregroup_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_directory_unitofmeasuregroup_batch',);
                            }

                            // ru__RG__admin_core_directory_unitofmeasuregroup_edit
                            if (preg_match('#^/admin/core/directory/unitofmeasuregroup/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_directory_unitofmeasuregroup_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'core_directory_unit_of_measure_group_admin',  '_sonata_name' => 'admin_core_directory_unitofmeasuregroup_edit',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_directory_unitofmeasuregroup_delete
                            if (preg_match('#^/admin/core/directory/unitofmeasuregroup/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_directory_unitofmeasuregroup_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'core_directory_unit_of_measure_group_admin',  '_sonata_name' => 'admin_core_directory_unitofmeasuregroup_delete',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_directory_unitofmeasuregroup_show
                            if (preg_match('#^/admin/core/directory/unitofmeasuregroup/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_directory_unitofmeasuregroup_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'core_directory_unit_of_measure_group_admin',  '_sonata_name' => 'admin_core_directory_unitofmeasuregroup_show',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_directory_unitofmeasuregroup_export
                            if ($pathinfo === '/admin/core/directory/unitofmeasuregroup/export') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'core_directory_unit_of_measure_group_admin',  '_sonata_name' => 'admin_core_directory_unitofmeasuregroup_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_directory_unitofmeasuregroup_export',);
                            }

                            // ru__RG__admin_core_directory_unitofmeasuregroup_history
                            if (preg_match('#^/admin/core/directory/unitofmeasuregroup/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_directory_unitofmeasuregroup_history')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyAction',  '_sonata_admin' => 'core_directory_unit_of_measure_group_admin',  '_sonata_name' => 'admin_core_directory_unitofmeasuregroup_history',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_directory_unitofmeasuregroup_history_view_revision
                            if (preg_match('#^/admin/core/directory/unitofmeasuregroup/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_directory_unitofmeasuregroup_history_view_revision')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyViewRevisionAction',  '_sonata_admin' => 'core_directory_unit_of_measure_group_admin',  '_sonata_name' => 'admin_core_directory_unitofmeasuregroup_history_view_revision',  '_locale' => 'ru',));
                            }

                        }

                    }

                }

                if (0 === strpos($pathinfo, '/admin/core/troubleticket')) {
                    if (0 === strpos($pathinfo, '/admin/core/troubleticket/troubleticket')) {
                        // ru__RG__admin_core_troubleticket_troubleticket_list
                        if ($pathinfo === '/admin/core/troubleticket/troubleticket/list') {
                            return array (  '_controller' => 'Core\\TroubleTicketBundle\\Controller\\Admin\\TroubleTicketAdminController::listAction',  '_sonata_admin' => 'core_admin_trouble_ticket',  '_sonata_name' => 'admin_core_troubleticket_troubleticket_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_troubleticket_troubleticket_list',);
                        }

                        // ru__RG__admin_core_troubleticket_troubleticket_create
                        if ($pathinfo === '/admin/core/troubleticket/troubleticket/create') {
                            return array (  '_controller' => 'Core\\TroubleTicketBundle\\Controller\\Admin\\TroubleTicketAdminController::createAction',  '_sonata_admin' => 'core_admin_trouble_ticket',  '_sonata_name' => 'admin_core_troubleticket_troubleticket_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_troubleticket_troubleticket_create',);
                        }

                        // ru__RG__admin_core_troubleticket_troubleticket_batch
                        if ($pathinfo === '/admin/core/troubleticket/troubleticket/batch') {
                            return array (  '_controller' => 'Core\\TroubleTicketBundle\\Controller\\Admin\\TroubleTicketAdminController::batchAction',  '_sonata_admin' => 'core_admin_trouble_ticket',  '_sonata_name' => 'admin_core_troubleticket_troubleticket_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_troubleticket_troubleticket_batch',);
                        }

                        // ru__RG__admin_core_troubleticket_troubleticket_edit
                        if (preg_match('#^/admin/core/troubleticket/troubleticket/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_troubleticket_troubleticket_edit')), array (  '_controller' => 'Core\\TroubleTicketBundle\\Controller\\Admin\\TroubleTicketAdminController::editAction',  '_sonata_admin' => 'core_admin_trouble_ticket',  '_sonata_name' => 'admin_core_troubleticket_troubleticket_edit',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_troubleticket_troubleticket_delete
                        if (preg_match('#^/admin/core/troubleticket/troubleticket/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_troubleticket_troubleticket_delete')), array (  '_controller' => 'Core\\TroubleTicketBundle\\Controller\\Admin\\TroubleTicketAdminController::deleteAction',  '_sonata_admin' => 'core_admin_trouble_ticket',  '_sonata_name' => 'admin_core_troubleticket_troubleticket_delete',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_troubleticket_troubleticket_show
                        if (preg_match('#^/admin/core/troubleticket/troubleticket/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_troubleticket_troubleticket_show')), array (  '_controller' => 'Core\\TroubleTicketBundle\\Controller\\Admin\\TroubleTicketAdminController::showAction',  '_sonata_admin' => 'core_admin_trouble_ticket',  '_sonata_name' => 'admin_core_troubleticket_troubleticket_show',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_troubleticket_troubleticket_export
                        if ($pathinfo === '/admin/core/troubleticket/troubleticket/export') {
                            return array (  '_controller' => 'Core\\TroubleTicketBundle\\Controller\\Admin\\TroubleTicketAdminController::exportAction',  '_sonata_admin' => 'core_admin_trouble_ticket',  '_sonata_name' => 'admin_core_troubleticket_troubleticket_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_troubleticket_troubleticket_export',);
                        }

                        // ru__RG__admin_core_troubleticket_troubleticket_history
                        if (preg_match('#^/admin/core/troubleticket/troubleticket/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_troubleticket_troubleticket_history')), array (  '_controller' => 'Core\\TroubleTicketBundle\\Controller\\Admin\\TroubleTicketAdminController::historyAction',  '_sonata_admin' => 'core_admin_trouble_ticket',  '_sonata_name' => 'admin_core_troubleticket_troubleticket_history',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_troubleticket_troubleticket_history_view_revision
                        if (preg_match('#^/admin/core/troubleticket/troubleticket/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_troubleticket_troubleticket_history_view_revision')), array (  '_controller' => 'Core\\TroubleTicketBundle\\Controller\\Admin\\TroubleTicketAdminController::historyViewRevisionAction',  '_sonata_admin' => 'core_admin_trouble_ticket',  '_sonata_name' => 'admin_core_troubleticket_troubleticket_history_view_revision',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_troubleticket_troubleticket_copy
                        if (preg_match('#^/admin/core/troubleticket/troubleticket/(?P<id>[^/]++)/copy$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_troubleticket_troubleticket_copy')), array (  '_controller' => 'Core\\TroubleTicketBundle\\Controller\\Admin\\TroubleTicketAdminController::copyAction',  '_sonata_admin' => 'core_admin_trouble_ticket',  '_sonata_name' => 'admin_core_troubleticket_troubleticket_copy',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_troubleticket_troubleticket_watcher
                        if (preg_match('#^/admin/core/troubleticket/troubleticket/(?P<id>[^/]++)/watcher$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_troubleticket_troubleticket_watcher')), array (  '_controller' => 'Core\\TroubleTicketBundle\\Controller\\Admin\\TroubleTicketAdminController::watcherAction',  '_sonata_admin' => 'core_admin_trouble_ticket',  '_sonata_name' => 'admin_core_troubleticket_troubleticket_watcher',  '_locale' => 'ru',));
                        }

                        if (0 === strpos($pathinfo, '/admin/core/troubleticket/troubleticket/a')) {
                            if (0 === strpos($pathinfo, '/admin/core/troubleticket/troubleticket/article')) {
                                // ru__RG__admin_core_troubleticket_troubleticket_articlesByCategory
                                if ($pathinfo === '/admin/core/troubleticket/troubleticket/articles-for-category') {
                                    return array (  '_controller' => 'Core\\TroubleTicketBundle\\Controller\\Admin\\TroubleTicketAdminController::articlesByCategoryAction',  '_sonata_admin' => 'core_admin_trouble_ticket',  '_sonata_name' => 'admin_core_troubleticket_troubleticket_articlesByCategory',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_troubleticket_troubleticket_articlesByCategory',);
                                }

                                // ru__RG__admin_core_troubleticket_troubleticket_article
                                if ($pathinfo === '/admin/core/troubleticket/troubleticket/article') {
                                    return array (  '_controller' => 'Core\\TroubleTicketBundle\\Controller\\Admin\\TroubleTicketAdminController::articleAction',  '_sonata_admin' => 'core_admin_trouble_ticket',  '_sonata_name' => 'admin_core_troubleticket_troubleticket_article',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_troubleticket_troubleticket_article',);
                                }

                            }

                            // ru__RG__admin_core_troubleticket_troubleticket_categories
                            if ($pathinfo === '/admin/core/troubleticket/troubleticket/all-categories') {
                                return array (  '_controller' => 'Core\\TroubleTicketBundle\\Controller\\Admin\\TroubleTicketAdminController::categoriesAction',  '_sonata_admin' => 'core_admin_trouble_ticket',  '_sonata_name' => 'admin_core_troubleticket_troubleticket_categories',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_troubleticket_troubleticket_categories',);
                            }

                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/core/troubleticket/status')) {
                        // ru__RG__admin_core_troubleticket_status_list
                        if ($pathinfo === '/admin/core/troubleticket/status/list') {
                            return array (  '_controller' => 'Core\\TroubleTicketBundle\\Controller\\Admin\\StatusAdminController::listAction',  '_sonata_admin' => 'core_admin_trouble_ticket_status',  '_sonata_name' => 'admin_core_troubleticket_status_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_troubleticket_status_list',);
                        }

                        // ru__RG__admin_core_troubleticket_status_create
                        if ($pathinfo === '/admin/core/troubleticket/status/create') {
                            return array (  '_controller' => 'Core\\TroubleTicketBundle\\Controller\\Admin\\StatusAdminController::createAction',  '_sonata_admin' => 'core_admin_trouble_ticket_status',  '_sonata_name' => 'admin_core_troubleticket_status_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_troubleticket_status_create',);
                        }

                        // ru__RG__admin_core_troubleticket_status_batch
                        if ($pathinfo === '/admin/core/troubleticket/status/batch') {
                            return array (  '_controller' => 'Core\\TroubleTicketBundle\\Controller\\Admin\\StatusAdminController::batchAction',  '_sonata_admin' => 'core_admin_trouble_ticket_status',  '_sonata_name' => 'admin_core_troubleticket_status_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_troubleticket_status_batch',);
                        }

                        // ru__RG__admin_core_troubleticket_status_edit
                        if (preg_match('#^/admin/core/troubleticket/status/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_troubleticket_status_edit')), array (  '_controller' => 'Core\\TroubleTicketBundle\\Controller\\Admin\\StatusAdminController::editAction',  '_sonata_admin' => 'core_admin_trouble_ticket_status',  '_sonata_name' => 'admin_core_troubleticket_status_edit',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_troubleticket_status_delete
                        if (preg_match('#^/admin/core/troubleticket/status/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_troubleticket_status_delete')), array (  '_controller' => 'Core\\TroubleTicketBundle\\Controller\\Admin\\StatusAdminController::deleteAction',  '_sonata_admin' => 'core_admin_trouble_ticket_status',  '_sonata_name' => 'admin_core_troubleticket_status_delete',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_troubleticket_status_show
                        if (preg_match('#^/admin/core/troubleticket/status/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_troubleticket_status_show')), array (  '_controller' => 'Core\\TroubleTicketBundle\\Controller\\Admin\\StatusAdminController::showAction',  '_sonata_admin' => 'core_admin_trouble_ticket_status',  '_sonata_name' => 'admin_core_troubleticket_status_show',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_troubleticket_status_export
                        if ($pathinfo === '/admin/core/troubleticket/status/export') {
                            return array (  '_controller' => 'Core\\TroubleTicketBundle\\Controller\\Admin\\StatusAdminController::exportAction',  '_sonata_admin' => 'core_admin_trouble_ticket_status',  '_sonata_name' => 'admin_core_troubleticket_status_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_troubleticket_status_export',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/core/troubleticket/priority')) {
                        // ru__RG__admin_core_troubleticket_priority_list
                        if ($pathinfo === '/admin/core/troubleticket/priority/list') {
                            return array (  '_controller' => 'Core\\TroubleTicketBundle\\Controller\\Admin\\PriorityAdminController::listAction',  '_sonata_admin' => 'core_admin_trouble_ticket_priority',  '_sonata_name' => 'admin_core_troubleticket_priority_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_troubleticket_priority_list',);
                        }

                        // ru__RG__admin_core_troubleticket_priority_create
                        if ($pathinfo === '/admin/core/troubleticket/priority/create') {
                            return array (  '_controller' => 'Core\\TroubleTicketBundle\\Controller\\Admin\\PriorityAdminController::createAction',  '_sonata_admin' => 'core_admin_trouble_ticket_priority',  '_sonata_name' => 'admin_core_troubleticket_priority_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_troubleticket_priority_create',);
                        }

                        // ru__RG__admin_core_troubleticket_priority_batch
                        if ($pathinfo === '/admin/core/troubleticket/priority/batch') {
                            return array (  '_controller' => 'Core\\TroubleTicketBundle\\Controller\\Admin\\PriorityAdminController::batchAction',  '_sonata_admin' => 'core_admin_trouble_ticket_priority',  '_sonata_name' => 'admin_core_troubleticket_priority_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_troubleticket_priority_batch',);
                        }

                        // ru__RG__admin_core_troubleticket_priority_edit
                        if (preg_match('#^/admin/core/troubleticket/priority/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_troubleticket_priority_edit')), array (  '_controller' => 'Core\\TroubleTicketBundle\\Controller\\Admin\\PriorityAdminController::editAction',  '_sonata_admin' => 'core_admin_trouble_ticket_priority',  '_sonata_name' => 'admin_core_troubleticket_priority_edit',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_troubleticket_priority_delete
                        if (preg_match('#^/admin/core/troubleticket/priority/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_troubleticket_priority_delete')), array (  '_controller' => 'Core\\TroubleTicketBundle\\Controller\\Admin\\PriorityAdminController::deleteAction',  '_sonata_admin' => 'core_admin_trouble_ticket_priority',  '_sonata_name' => 'admin_core_troubleticket_priority_delete',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_troubleticket_priority_show
                        if (preg_match('#^/admin/core/troubleticket/priority/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_troubleticket_priority_show')), array (  '_controller' => 'Core\\TroubleTicketBundle\\Controller\\Admin\\PriorityAdminController::showAction',  '_sonata_admin' => 'core_admin_trouble_ticket_priority',  '_sonata_name' => 'admin_core_troubleticket_priority_show',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_troubleticket_priority_export
                        if ($pathinfo === '/admin/core/troubleticket/priority/export') {
                            return array (  '_controller' => 'Core\\TroubleTicketBundle\\Controller\\Admin\\PriorityAdminController::exportAction',  '_sonata_admin' => 'core_admin_trouble_ticket_priority',  '_sonata_name' => 'admin_core_troubleticket_priority_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_troubleticket_priority_export',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/core/troubleticket/message')) {
                        // ru__RG__admin_core_troubleticket_message_list
                        if ($pathinfo === '/admin/core/troubleticket/message/list') {
                            return array (  '_controller' => 'Core\\TroubleTicketBundle\\Controller\\Admin\\MessageAdminController::listAction',  '_sonata_admin' => 'core_admin_trouble_ticket_message',  '_sonata_name' => 'admin_core_troubleticket_message_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_troubleticket_message_list',);
                        }

                        // ru__RG__admin_core_troubleticket_message_create
                        if ($pathinfo === '/admin/core/troubleticket/message/create') {
                            return array (  '_controller' => 'Core\\TroubleTicketBundle\\Controller\\Admin\\MessageAdminController::createAction',  '_sonata_admin' => 'core_admin_trouble_ticket_message',  '_sonata_name' => 'admin_core_troubleticket_message_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_troubleticket_message_create',);
                        }

                        // ru__RG__admin_core_troubleticket_message_batch
                        if ($pathinfo === '/admin/core/troubleticket/message/batch') {
                            return array (  '_controller' => 'Core\\TroubleTicketBundle\\Controller\\Admin\\MessageAdminController::batchAction',  '_sonata_admin' => 'core_admin_trouble_ticket_message',  '_sonata_name' => 'admin_core_troubleticket_message_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_troubleticket_message_batch',);
                        }

                        // ru__RG__admin_core_troubleticket_message_edit
                        if (preg_match('#^/admin/core/troubleticket/message/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_troubleticket_message_edit')), array (  '_controller' => 'Core\\TroubleTicketBundle\\Controller\\Admin\\MessageAdminController::editAction',  '_sonata_admin' => 'core_admin_trouble_ticket_message',  '_sonata_name' => 'admin_core_troubleticket_message_edit',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_troubleticket_message_delete
                        if (preg_match('#^/admin/core/troubleticket/message/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_troubleticket_message_delete')), array (  '_controller' => 'Core\\TroubleTicketBundle\\Controller\\Admin\\MessageAdminController::deleteAction',  '_sonata_admin' => 'core_admin_trouble_ticket_message',  '_sonata_name' => 'admin_core_troubleticket_message_delete',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_troubleticket_message_show
                        if (preg_match('#^/admin/core/troubleticket/message/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_troubleticket_message_show')), array (  '_controller' => 'Core\\TroubleTicketBundle\\Controller\\Admin\\MessageAdminController::showAction',  '_sonata_admin' => 'core_admin_trouble_ticket_message',  '_sonata_name' => 'admin_core_troubleticket_message_show',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_troubleticket_message_export
                        if ($pathinfo === '/admin/core/troubleticket/message/export') {
                            return array (  '_controller' => 'Core\\TroubleTicketBundle\\Controller\\Admin\\MessageAdminController::exportAction',  '_sonata_admin' => 'core_admin_trouble_ticket_message',  '_sonata_name' => 'admin_core_troubleticket_message_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_troubleticket_message_export',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/core/troubleticket/log')) {
                        // ru__RG__admin_core_troubleticket_log_list
                        if ($pathinfo === '/admin/core/troubleticket/log/list') {
                            return array (  '_controller' => 'Core\\TroubleTicketBundle\\Controller\\Admin\\LogAdminController::listAction',  '_sonata_admin' => 'core_admin_trouble_ticket_log',  '_sonata_name' => 'admin_core_troubleticket_log_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_troubleticket_log_list',);
                        }

                        // ru__RG__admin_core_troubleticket_log_create
                        if ($pathinfo === '/admin/core/troubleticket/log/create') {
                            return array (  '_controller' => 'Core\\TroubleTicketBundle\\Controller\\Admin\\LogAdminController::createAction',  '_sonata_admin' => 'core_admin_trouble_ticket_log',  '_sonata_name' => 'admin_core_troubleticket_log_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_troubleticket_log_create',);
                        }

                        // ru__RG__admin_core_troubleticket_log_batch
                        if ($pathinfo === '/admin/core/troubleticket/log/batch') {
                            return array (  '_controller' => 'Core\\TroubleTicketBundle\\Controller\\Admin\\LogAdminController::batchAction',  '_sonata_admin' => 'core_admin_trouble_ticket_log',  '_sonata_name' => 'admin_core_troubleticket_log_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_troubleticket_log_batch',);
                        }

                        // ru__RG__admin_core_troubleticket_log_edit
                        if (preg_match('#^/admin/core/troubleticket/log/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_troubleticket_log_edit')), array (  '_controller' => 'Core\\TroubleTicketBundle\\Controller\\Admin\\LogAdminController::editAction',  '_sonata_admin' => 'core_admin_trouble_ticket_log',  '_sonata_name' => 'admin_core_troubleticket_log_edit',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_troubleticket_log_delete
                        if (preg_match('#^/admin/core/troubleticket/log/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_troubleticket_log_delete')), array (  '_controller' => 'Core\\TroubleTicketBundle\\Controller\\Admin\\LogAdminController::deleteAction',  '_sonata_admin' => 'core_admin_trouble_ticket_log',  '_sonata_name' => 'admin_core_troubleticket_log_delete',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_troubleticket_log_show
                        if (preg_match('#^/admin/core/troubleticket/log/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_troubleticket_log_show')), array (  '_controller' => 'Core\\TroubleTicketBundle\\Controller\\Admin\\LogAdminController::showAction',  '_sonata_admin' => 'core_admin_trouble_ticket_log',  '_sonata_name' => 'admin_core_troubleticket_log_show',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_troubleticket_log_export
                        if ($pathinfo === '/admin/core/troubleticket/log/export') {
                            return array (  '_controller' => 'Core\\TroubleTicketBundle\\Controller\\Admin\\LogAdminController::exportAction',  '_sonata_admin' => 'core_admin_trouble_ticket_log',  '_sonata_name' => 'admin_core_troubleticket_log_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_troubleticket_log_export',);
                        }

                    }

                }

                if (0 === strpos($pathinfo, '/admin/core/union/product')) {
                    if (0 === strpos($pathinfo, '/admin/core/union/productcompositionsunion')) {
                        // ru__RG__admin_core_union_productcompositionsunion_list
                        if ($pathinfo === '/admin/core/union/productcompositionsunion/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'core_union_product_composition',  '_sonata_name' => 'admin_core_union_productcompositionsunion_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_union_productcompositionsunion_list',);
                        }

                        // ru__RG__admin_core_union_productcompositionsunion_create
                        if ($pathinfo === '/admin/core/union/productcompositionsunion/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'core_union_product_composition',  '_sonata_name' => 'admin_core_union_productcompositionsunion_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_union_productcompositionsunion_create',);
                        }

                        // ru__RG__admin_core_union_productcompositionsunion_batch
                        if ($pathinfo === '/admin/core/union/productcompositionsunion/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'core_union_product_composition',  '_sonata_name' => 'admin_core_union_productcompositionsunion_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_union_productcompositionsunion_batch',);
                        }

                        // ru__RG__admin_core_union_productcompositionsunion_edit
                        if (preg_match('#^/admin/core/union/productcompositionsunion/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_union_productcompositionsunion_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'core_union_product_composition',  '_sonata_name' => 'admin_core_union_productcompositionsunion_edit',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_union_productcompositionsunion_delete
                        if (preg_match('#^/admin/core/union/productcompositionsunion/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_union_productcompositionsunion_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'core_union_product_composition',  '_sonata_name' => 'admin_core_union_productcompositionsunion_delete',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_union_productcompositionsunion_show
                        if (preg_match('#^/admin/core/union/productcompositionsunion/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_union_productcompositionsunion_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'core_union_product_composition',  '_sonata_name' => 'admin_core_union_productcompositionsunion_show',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_union_productcompositionsunion_export
                        if ($pathinfo === '/admin/core/union/productcompositionsunion/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'core_union_product_composition',  '_sonata_name' => 'admin_core_union_productcompositionsunion_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_union_productcompositionsunion_export',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/core/union/productquantityalternativeunion')) {
                        // ru__RG__admin_core_union_productquantityalternativeunion_list
                        if ($pathinfo === '/admin/core/union/productquantityalternativeunion/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'core_union_product_quantity_alternative',  '_sonata_name' => 'admin_core_union_productquantityalternativeunion_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_union_productquantityalternativeunion_list',);
                        }

                        // ru__RG__admin_core_union_productquantityalternativeunion_create
                        if ($pathinfo === '/admin/core/union/productquantityalternativeunion/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'core_union_product_quantity_alternative',  '_sonata_name' => 'admin_core_union_productquantityalternativeunion_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_union_productquantityalternativeunion_create',);
                        }

                        // ru__RG__admin_core_union_productquantityalternativeunion_batch
                        if ($pathinfo === '/admin/core/union/productquantityalternativeunion/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'core_union_product_quantity_alternative',  '_sonata_name' => 'admin_core_union_productquantityalternativeunion_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_union_productquantityalternativeunion_batch',);
                        }

                        // ru__RG__admin_core_union_productquantityalternativeunion_edit
                        if (preg_match('#^/admin/core/union/productquantityalternativeunion/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_union_productquantityalternativeunion_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'core_union_product_quantity_alternative',  '_sonata_name' => 'admin_core_union_productquantityalternativeunion_edit',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_union_productquantityalternativeunion_delete
                        if (preg_match('#^/admin/core/union/productquantityalternativeunion/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_union_productquantityalternativeunion_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'core_union_product_quantity_alternative',  '_sonata_name' => 'admin_core_union_productquantityalternativeunion_delete',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_union_productquantityalternativeunion_show
                        if (preg_match('#^/admin/core/union/productquantityalternativeunion/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_union_productquantityalternativeunion_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'core_union_product_quantity_alternative',  '_sonata_name' => 'admin_core_union_productquantityalternativeunion_show',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_union_productquantityalternativeunion_export
                        if ($pathinfo === '/admin/core/union/productquantityalternativeunion/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'core_union_product_quantity_alternative',  '_sonata_name' => 'admin_core_union_productquantityalternativeunion_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_union_productquantityalternativeunion_export',);
                        }

                        // ru__RG__admin_core_union_productquantityalternativeunion_history
                        if (preg_match('#^/admin/core/union/productquantityalternativeunion/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_union_productquantityalternativeunion_history')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyAction',  '_sonata_admin' => 'core_union_product_quantity_alternative',  '_sonata_name' => 'admin_core_union_productquantityalternativeunion_history',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_union_productquantityalternativeunion_history_view_revision
                        if (preg_match('#^/admin/core/union/productquantityalternativeunion/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_union_productquantityalternativeunion_history_view_revision')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyViewRevisionAction',  '_sonata_admin' => 'core_union_product_quantity_alternative',  '_sonata_name' => 'admin_core_union_productquantityalternativeunion_history_view_revision',  '_locale' => 'ru',));
                        }

                    }

                }

                if (0 === strpos($pathinfo, '/admin/core/faq/article')) {
                    // ru__RG__admin_core_faq_article_list
                    if ($pathinfo === '/admin/core/faq/article/list') {
                        return array (  '_controller' => 'Core\\FaqBundle\\Controller\\Admin\\FaqAdminController::listAction',  '_sonata_admin' => 'sonata.admin.faq.article',  '_sonata_name' => 'admin_core_faq_article_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_faq_article_list',);
                    }

                    // ru__RG__admin_core_faq_article_create
                    if ($pathinfo === '/admin/core/faq/article/create') {
                        return array (  '_controller' => 'Core\\FaqBundle\\Controller\\Admin\\FaqAdminController::createAction',  '_sonata_admin' => 'sonata.admin.faq.article',  '_sonata_name' => 'admin_core_faq_article_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_faq_article_create',);
                    }

                    // ru__RG__admin_core_faq_article_batch
                    if ($pathinfo === '/admin/core/faq/article/batch') {
                        return array (  '_controller' => 'Core\\FaqBundle\\Controller\\Admin\\FaqAdminController::batchAction',  '_sonata_admin' => 'sonata.admin.faq.article',  '_sonata_name' => 'admin_core_faq_article_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_faq_article_batch',);
                    }

                    // ru__RG__admin_core_faq_article_edit
                    if (preg_match('#^/admin/core/faq/article/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_faq_article_edit')), array (  '_controller' => 'Core\\FaqBundle\\Controller\\Admin\\FaqAdminController::editAction',  '_sonata_admin' => 'sonata.admin.faq.article',  '_sonata_name' => 'admin_core_faq_article_edit',  '_locale' => 'ru',));
                    }

                    // ru__RG__admin_core_faq_article_delete
                    if (preg_match('#^/admin/core/faq/article/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_faq_article_delete')), array (  '_controller' => 'Core\\FaqBundle\\Controller\\Admin\\FaqAdminController::deleteAction',  '_sonata_admin' => 'sonata.admin.faq.article',  '_sonata_name' => 'admin_core_faq_article_delete',  '_locale' => 'ru',));
                    }

                    // ru__RG__admin_core_faq_article_show
                    if (preg_match('#^/admin/core/faq/article/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_faq_article_show')), array (  '_controller' => 'Core\\FaqBundle\\Controller\\Admin\\FaqAdminController::showAction',  '_sonata_admin' => 'sonata.admin.faq.article',  '_sonata_name' => 'admin_core_faq_article_show',  '_locale' => 'ru',));
                    }

                    // ru__RG__admin_core_faq_article_export
                    if ($pathinfo === '/admin/core/faq/article/export') {
                        return array (  '_controller' => 'Core\\FaqBundle\\Controller\\Admin\\FaqAdminController::exportAction',  '_sonata_admin' => 'sonata.admin.faq.article',  '_sonata_name' => 'admin_core_faq_article_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_faq_article_export',);
                    }

                    if (0 === strpos($pathinfo, '/admin/core/faq/article/ajax-article')) {
                        // ru__RG__admin_core_faq_article_article
                        if ($pathinfo === '/admin/core/faq/article/ajax-article') {
                            return array (  '_controller' => 'Core\\FaqBundle\\Controller\\Admin\\FaqAdminController::articleAction',  '_sonata_admin' => 'sonata.admin.faq.article',  '_sonata_name' => 'admin_core_faq_article_article',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_faq_article_article',);
                        }

                        // ru__RG__admin_core_faq_article_ajaxCreate
                        if ($pathinfo === '/admin/core/faq/article/ajax-article-create') {
                            return array (  '_controller' => 'Core\\FaqBundle\\Controller\\Admin\\FaqAdminController::ajaxCreateAction',  '_sonata_admin' => 'sonata.admin.faq.article',  '_sonata_name' => 'admin_core_faq_article_ajaxCreate',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_faq_article_ajaxCreate',);
                        }

                    }

                }

                if (0 === strpos($pathinfo, '/admin/core/order')) {
                    if (0 === strpos($pathinfo, '/admin/core/order/order')) {
                        // ru__RG__admin_core_order_order_list
                        if ($pathinfo === '/admin/core/order/order/list') {
                            return array (  '_controller' => 'Core\\OrderBundle\\Controller\\Admin\\OrderAdminController::listAction',  '_sonata_admin' => 'core_order_admin',  '_sonata_name' => 'admin_core_order_order_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_order_order_list',);
                        }

                        // ru__RG__admin_core_order_order_create
                        if ($pathinfo === '/admin/core/order/order/create') {
                            return array (  '_controller' => 'Core\\OrderBundle\\Controller\\Admin\\OrderAdminController::createAction',  '_sonata_admin' => 'core_order_admin',  '_sonata_name' => 'admin_core_order_order_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_order_order_create',);
                        }

                        // ru__RG__admin_core_order_order_batch
                        if ($pathinfo === '/admin/core/order/order/batch') {
                            return array (  '_controller' => 'Core\\OrderBundle\\Controller\\Admin\\OrderAdminController::batchAction',  '_sonata_admin' => 'core_order_admin',  '_sonata_name' => 'admin_core_order_order_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_order_order_batch',);
                        }

                        // ru__RG__admin_core_order_order_edit
                        if (preg_match('#^/admin/core/order/order/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_order_order_edit')), array (  '_controller' => 'Core\\OrderBundle\\Controller\\Admin\\OrderAdminController::editAction',  '_sonata_admin' => 'core_order_admin',  '_sonata_name' => 'admin_core_order_order_edit',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_order_order_show
                        if (preg_match('#^/admin/core/order/order/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_order_order_show')), array (  '_controller' => 'Core\\OrderBundle\\Controller\\Admin\\OrderAdminController::showAction',  '_sonata_admin' => 'core_order_admin',  '_sonata_name' => 'admin_core_order_order_show',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_order_order_export
                        if ($pathinfo === '/admin/core/order/order/export') {
                            return array (  '_controller' => 'Core\\OrderBundle\\Controller\\Admin\\OrderAdminController::exportAction',  '_sonata_admin' => 'core_order_admin',  '_sonata_name' => 'admin_core_order_order_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_order_order_export',);
                        }

                        // ru__RG__admin_core_order_order_history
                        if (preg_match('#^/admin/core/order/order/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_order_order_history')), array (  '_controller' => 'Core\\OrderBundle\\Controller\\Admin\\OrderAdminController::historyAction',  '_sonata_admin' => 'core_order_admin',  '_sonata_name' => 'admin_core_order_order_history',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_order_order_history_view_revision
                        if (preg_match('#^/admin/core/order/order/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_order_order_history_view_revision')), array (  '_controller' => 'Core\\OrderBundle\\Controller\\Admin\\OrderAdminController::historyViewRevisionAction',  '_sonata_admin' => 'core_order_admin',  '_sonata_name' => 'admin_core_order_order_history_view_revision',  '_locale' => 'ru',));
                        }

                        if (0 === strpos($pathinfo, '/admin/core/order/order/invoiceForPayment')) {
                            // ru__RG__admin_core_order_order_invoiceForPayment
                            if (preg_match('#^/admin/core/order/order/invoiceForPayment/(?P<order_id>\\d+)$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_order_order_invoiceForPayment')), array (  '_controller' => 'Core\\OrderBundle\\Controller\\AdminAjaxOrderController::generateInvoiceForPaymentAction',  '_sonata_admin' => 'core_order_admin',  '_sonata_name' => 'admin_core_order_order_invoiceForPayment',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_order_order_invoiceForPaymentSend
                            if (0 === strpos($pathinfo, '/admin/core/order/order/invoiceForPaymentSend') && preg_match('#^/admin/core/order/order/invoiceForPaymentSend/(?P<order_id>\\d+)$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_order_order_invoiceForPaymentSend')), array (  '_controller' => 'Core\\OrderBundle\\Controller\\AdminAjaxOrderController::invoiceForPaymentSendAction',  '_sonata_admin' => 'core_order_admin',  '_sonata_name' => 'admin_core_order_order_invoiceForPaymentSend',  '_locale' => 'ru',));
                            }

                        }

                        // ru__RG__admin_core_order_order_guarantees
                        if (0 === strpos($pathinfo, '/admin/core/order/order/guarantees') && preg_match('#^/admin/core/order/order/guarantees/(?P<order_id>\\d+)/(?P<needStamps>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_order_order_guarantees')), array (  '_controller' => 'Core\\OrderBundle\\Controller\\AdminAjaxOrderController::generateGuaranteesAction',  '_sonata_admin' => 'core_order_admin',  '_sonata_name' => 'admin_core_order_order_guarantees',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_order_order_deliveryAgreement
                        if (0 === strpos($pathinfo, '/admin/core/order/order/deliveryAgreement') && preg_match('#^/admin/core/order/order/deliveryAgreement/(?P<order_id>\\d+)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_order_order_deliveryAgreement')), array (  '_controller' => 'Core\\OrderBundle\\Controller\\AdminAjaxOrderController::generateDeliveryAgreementAction',  '_sonata_admin' => 'core_order_admin',  '_sonata_name' => 'admin_core_order_order_deliveryAgreement',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_order_order_invoice
                        if (0 === strpos($pathinfo, '/admin/core/order/order/invoice') && preg_match('#^/admin/core/order/order/invoice/(?P<order_id>\\d+)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_order_order_invoice')), array (  '_controller' => 'Core\\OrderBundle\\Controller\\AdminAjaxOrderController::generateInvoiceAction',  '_sonata_admin' => 'core_order_admin',  '_sonata_name' => 'admin_core_order_order_invoice',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_order_order_receiptOfSberbank
                        if (0 === strpos($pathinfo, '/admin/core/order/order/receiptOfSberbank') && preg_match('#^/admin/core/order/order/receiptOfSberbank/(?P<order_id>\\d+)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_order_order_receiptOfSberbank')), array (  '_controller' => 'Core\\OrderBundle\\Controller\\AdminAjaxOrderController::generateReceiptOfSberbankAction',  '_sonata_admin' => 'core_order_admin',  '_sonata_name' => 'admin_core_order_order_receiptOfSberbank',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_order_order_waybillAtTheDate
                        if (0 === strpos($pathinfo, '/admin/core/order/order/waybillAtTheDate') && preg_match('#^/admin/core/order/order/waybillAtTheDate/(?P<order_id>\\d+)/(?P<date>\\d\\d\\.\\d\\d\\.\\d\\d\\d\\d)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_order_order_waybillAtTheDate')), array (  '_controller' => 'Core\\OrderBundle\\Controller\\AdminAjaxOrderController::generateWaybillAtTheDateAction',  '_sonata_admin' => 'core_order_admin',  '_sonata_name' => 'admin_core_order_order_waybillAtTheDate',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_order_order_addressLabel
                        if (0 === strpos($pathinfo, '/admin/core/order/order/addressLabel') && preg_match('#^/admin/core/order/order/addressLabel/(?P<order_id>\\d+)/(?P<quantity>\\d+)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_order_order_addressLabel')), array (  '_controller' => 'Core\\OrderBundle\\Controller\\AdminAjaxOrderController::generateAddressLabelAction',  '_sonata_admin' => 'core_order_admin',  '_sonata_name' => 'admin_core_order_order_addressLabel',  '_locale' => 'ru',));
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/core/order/waybills')) {
                        // ru__RG__admin_core_order_waybills_list
                        if ($pathinfo === '/admin/core/order/waybills/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'core_order_waybills_admin',  '_sonata_name' => 'admin_core_order_waybills_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_order_waybills_list',);
                        }

                        // ru__RG__admin_core_order_waybills_create
                        if ($pathinfo === '/admin/core/order/waybills/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'core_order_waybills_admin',  '_sonata_name' => 'admin_core_order_waybills_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_order_waybills_create',);
                        }

                        // ru__RG__admin_core_order_waybills_batch
                        if ($pathinfo === '/admin/core/order/waybills/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'core_order_waybills_admin',  '_sonata_name' => 'admin_core_order_waybills_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_order_waybills_batch',);
                        }

                        // ru__RG__admin_core_order_waybills_edit
                        if (preg_match('#^/admin/core/order/waybills/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_order_waybills_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'core_order_waybills_admin',  '_sonata_name' => 'admin_core_order_waybills_edit',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_order_waybills_delete
                        if (preg_match('#^/admin/core/order/waybills/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_order_waybills_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'core_order_waybills_admin',  '_sonata_name' => 'admin_core_order_waybills_delete',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_order_waybills_show
                        if (preg_match('#^/admin/core/order/waybills/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_order_waybills_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'core_order_waybills_admin',  '_sonata_name' => 'admin_core_order_waybills_show',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_order_waybills_export
                        if ($pathinfo === '/admin/core/order/waybills/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'core_order_waybills_admin',  '_sonata_name' => 'admin_core_order_waybills_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_order_waybills_export',);
                        }

                        // ru__RG__admin_core_order_waybills_history
                        if (preg_match('#^/admin/core/order/waybills/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_order_waybills_history')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyAction',  '_sonata_admin' => 'core_order_waybills_admin',  '_sonata_name' => 'admin_core_order_waybills_history',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_order_waybills_history_view_revision
                        if (preg_match('#^/admin/core/order/waybills/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_order_waybills_history_view_revision')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyViewRevisionAction',  '_sonata_admin' => 'core_order_waybills_admin',  '_sonata_name' => 'admin_core_order_waybills_history_view_revision',  '_locale' => 'ru',));
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/core/order/sizesofbox')) {
                        // ru__RG__admin_core_order_sizesofbox_list
                        if ($pathinfo === '/admin/core/order/sizesofbox/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'core_order_sizes_of_box_admin',  '_sonata_name' => 'admin_core_order_sizesofbox_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_order_sizesofbox_list',);
                        }

                        // ru__RG__admin_core_order_sizesofbox_create
                        if ($pathinfo === '/admin/core/order/sizesofbox/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'core_order_sizes_of_box_admin',  '_sonata_name' => 'admin_core_order_sizesofbox_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_order_sizesofbox_create',);
                        }

                        // ru__RG__admin_core_order_sizesofbox_batch
                        if ($pathinfo === '/admin/core/order/sizesofbox/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'core_order_sizes_of_box_admin',  '_sonata_name' => 'admin_core_order_sizesofbox_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_order_sizesofbox_batch',);
                        }

                        // ru__RG__admin_core_order_sizesofbox_edit
                        if (preg_match('#^/admin/core/order/sizesofbox/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_order_sizesofbox_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'core_order_sizes_of_box_admin',  '_sonata_name' => 'admin_core_order_sizesofbox_edit',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_order_sizesofbox_delete
                        if (preg_match('#^/admin/core/order/sizesofbox/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_order_sizesofbox_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'core_order_sizes_of_box_admin',  '_sonata_name' => 'admin_core_order_sizesofbox_delete',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_order_sizesofbox_show
                        if (preg_match('#^/admin/core/order/sizesofbox/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_order_sizesofbox_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'core_order_sizes_of_box_admin',  '_sonata_name' => 'admin_core_order_sizesofbox_show',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_order_sizesofbox_export
                        if ($pathinfo === '/admin/core/order/sizesofbox/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'core_order_sizes_of_box_admin',  '_sonata_name' => 'admin_core_order_sizesofbox_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_order_sizesofbox_export',);
                        }

                        // ru__RG__admin_core_order_sizesofbox_history
                        if (preg_match('#^/admin/core/order/sizesofbox/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_order_sizesofbox_history')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyAction',  '_sonata_admin' => 'core_order_sizes_of_box_admin',  '_sonata_name' => 'admin_core_order_sizesofbox_history',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_order_sizesofbox_history_view_revision
                        if (preg_match('#^/admin/core/order/sizesofbox/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_order_sizesofbox_history_view_revision')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyViewRevisionAction',  '_sonata_admin' => 'core_order_sizes_of_box_admin',  '_sonata_name' => 'admin_core_order_sizesofbox_history_view_revision',  '_locale' => 'ru',));
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/core/order/composition')) {
                        // ru__RG__admin_core_order_composition_list
                        if ($pathinfo === '/admin/core/order/composition/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'core_order_composition_admin',  '_sonata_name' => 'admin_core_order_composition_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_order_composition_list',);
                        }

                        // ru__RG__admin_core_order_composition_create
                        if ($pathinfo === '/admin/core/order/composition/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'core_order_composition_admin',  '_sonata_name' => 'admin_core_order_composition_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_order_composition_create',);
                        }

                        // ru__RG__admin_core_order_composition_batch
                        if ($pathinfo === '/admin/core/order/composition/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'core_order_composition_admin',  '_sonata_name' => 'admin_core_order_composition_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_order_composition_batch',);
                        }

                        // ru__RG__admin_core_order_composition_edit
                        if (preg_match('#^/admin/core/order/composition/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_order_composition_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'core_order_composition_admin',  '_sonata_name' => 'admin_core_order_composition_edit',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_order_composition_delete
                        if (preg_match('#^/admin/core/order/composition/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_order_composition_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'core_order_composition_admin',  '_sonata_name' => 'admin_core_order_composition_delete',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_order_composition_show
                        if (preg_match('#^/admin/core/order/composition/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_order_composition_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'core_order_composition_admin',  '_sonata_name' => 'admin_core_order_composition_show',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_order_composition_export
                        if ($pathinfo === '/admin/core/order/composition/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'core_order_composition_admin',  '_sonata_name' => 'admin_core_order_composition_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_order_composition_export',);
                        }

                        // ru__RG__admin_core_order_composition_history
                        if (preg_match('#^/admin/core/order/composition/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_order_composition_history')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyAction',  '_sonata_admin' => 'core_order_composition_admin',  '_sonata_name' => 'admin_core_order_composition_history',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_order_composition_history_view_revision
                        if (preg_match('#^/admin/core/order/composition/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_order_composition_history_view_revision')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyViewRevisionAction',  '_sonata_admin' => 'core_order_composition_admin',  '_sonata_name' => 'admin_core_order_composition_history_view_revision',  '_locale' => 'ru',));
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/core/order/extrastatus')) {
                        // ru__RG__admin_core_order_extrastatus_list
                        if ($pathinfo === '/admin/core/order/extrastatus/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'core_order_extra_status_admin',  '_sonata_name' => 'admin_core_order_extrastatus_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_order_extrastatus_list',);
                        }

                        // ru__RG__admin_core_order_extrastatus_create
                        if ($pathinfo === '/admin/core/order/extrastatus/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'core_order_extra_status_admin',  '_sonata_name' => 'admin_core_order_extrastatus_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_order_extrastatus_create',);
                        }

                        // ru__RG__admin_core_order_extrastatus_batch
                        if ($pathinfo === '/admin/core/order/extrastatus/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'core_order_extra_status_admin',  '_sonata_name' => 'admin_core_order_extrastatus_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_order_extrastatus_batch',);
                        }

                        // ru__RG__admin_core_order_extrastatus_edit
                        if (preg_match('#^/admin/core/order/extrastatus/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_order_extrastatus_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'core_order_extra_status_admin',  '_sonata_name' => 'admin_core_order_extrastatus_edit',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_order_extrastatus_delete
                        if (preg_match('#^/admin/core/order/extrastatus/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_order_extrastatus_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'core_order_extra_status_admin',  '_sonata_name' => 'admin_core_order_extrastatus_delete',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_order_extrastatus_show
                        if (preg_match('#^/admin/core/order/extrastatus/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_order_extrastatus_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'core_order_extra_status_admin',  '_sonata_name' => 'admin_core_order_extrastatus_show',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_order_extrastatus_export
                        if ($pathinfo === '/admin/core/order/extrastatus/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'core_order_extra_status_admin',  '_sonata_name' => 'admin_core_order_extrastatus_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_order_extrastatus_export',);
                        }

                        // ru__RG__admin_core_order_extrastatus_history
                        if (preg_match('#^/admin/core/order/extrastatus/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_order_extrastatus_history')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyAction',  '_sonata_admin' => 'core_order_extra_status_admin',  '_sonata_name' => 'admin_core_order_extrastatus_history',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_order_extrastatus_history_view_revision
                        if (preg_match('#^/admin/core/order/extrastatus/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_order_extrastatus_history_view_revision')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyViewRevisionAction',  '_sonata_admin' => 'core_order_extra_status_admin',  '_sonata_name' => 'admin_core_order_extrastatus_history_view_revision',  '_locale' => 'ru',));
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/core/order/canceledreason')) {
                        // ru__RG__admin_core_order_canceledreason_list
                        if ($pathinfo === '/admin/core/order/canceledreason/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'core_order_canceled_reason_admin',  '_sonata_name' => 'admin_core_order_canceledreason_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_order_canceledreason_list',);
                        }

                        // ru__RG__admin_core_order_canceledreason_create
                        if ($pathinfo === '/admin/core/order/canceledreason/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'core_order_canceled_reason_admin',  '_sonata_name' => 'admin_core_order_canceledreason_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_order_canceledreason_create',);
                        }

                        // ru__RG__admin_core_order_canceledreason_batch
                        if ($pathinfo === '/admin/core/order/canceledreason/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'core_order_canceled_reason_admin',  '_sonata_name' => 'admin_core_order_canceledreason_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_order_canceledreason_batch',);
                        }

                        // ru__RG__admin_core_order_canceledreason_edit
                        if (preg_match('#^/admin/core/order/canceledreason/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_order_canceledreason_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'core_order_canceled_reason_admin',  '_sonata_name' => 'admin_core_order_canceledreason_edit',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_order_canceledreason_delete
                        if (preg_match('#^/admin/core/order/canceledreason/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_order_canceledreason_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'core_order_canceled_reason_admin',  '_sonata_name' => 'admin_core_order_canceledreason_delete',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_order_canceledreason_show
                        if (preg_match('#^/admin/core/order/canceledreason/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_order_canceledreason_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'core_order_canceled_reason_admin',  '_sonata_name' => 'admin_core_order_canceledreason_show',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_order_canceledreason_export
                        if ($pathinfo === '/admin/core/order/canceledreason/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'core_order_canceled_reason_admin',  '_sonata_name' => 'admin_core_order_canceledreason_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_order_canceledreason_export',);
                        }

                        // ru__RG__admin_core_order_canceledreason_history
                        if (preg_match('#^/admin/core/order/canceledreason/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_order_canceledreason_history')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyAction',  '_sonata_admin' => 'core_order_canceled_reason_admin',  '_sonata_name' => 'admin_core_order_canceledreason_history',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_order_canceledreason_history_view_revision
                        if (preg_match('#^/admin/core/order/canceledreason/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_order_canceledreason_history_view_revision')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyViewRevisionAction',  '_sonata_admin' => 'core_order_canceled_reason_admin',  '_sonata_name' => 'admin_core_order_canceledreason_history_view_revision',  '_locale' => 'ru',));
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/core/order/preorder-preorder')) {
                        if (0 === strpos($pathinfo, '/admin/core/order/preorder-preorderstatus')) {
                            // ru__RG__admin_core_order_preorder_preorderstatus_list
                            if ($pathinfo === '/admin/core/order/preorder-preorderstatus/list') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'core_pre_order_status_admin',  '_sonata_name' => 'admin_core_order_preorder_preorderstatus_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_order_preorder_preorderstatus_list',);
                            }

                            // ru__RG__admin_core_order_preorder_preorderstatus_create
                            if ($pathinfo === '/admin/core/order/preorder-preorderstatus/create') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'core_pre_order_status_admin',  '_sonata_name' => 'admin_core_order_preorder_preorderstatus_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_order_preorder_preorderstatus_create',);
                            }

                            // ru__RG__admin_core_order_preorder_preorderstatus_batch
                            if ($pathinfo === '/admin/core/order/preorder-preorderstatus/batch') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'core_pre_order_status_admin',  '_sonata_name' => 'admin_core_order_preorder_preorderstatus_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_order_preorder_preorderstatus_batch',);
                            }

                            // ru__RG__admin_core_order_preorder_preorderstatus_edit
                            if (preg_match('#^/admin/core/order/preorder\\-preorderstatus/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_order_preorder_preorderstatus_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'core_pre_order_status_admin',  '_sonata_name' => 'admin_core_order_preorder_preorderstatus_edit',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_order_preorder_preorderstatus_delete
                            if (preg_match('#^/admin/core/order/preorder\\-preorderstatus/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_order_preorder_preorderstatus_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'core_pre_order_status_admin',  '_sonata_name' => 'admin_core_order_preorder_preorderstatus_delete',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_order_preorder_preorderstatus_show
                            if (preg_match('#^/admin/core/order/preorder\\-preorderstatus/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_order_preorder_preorderstatus_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'core_pre_order_status_admin',  '_sonata_name' => 'admin_core_order_preorder_preorderstatus_show',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_order_preorder_preorderstatus_export
                            if ($pathinfo === '/admin/core/order/preorder-preorderstatus/export') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'core_pre_order_status_admin',  '_sonata_name' => 'admin_core_order_preorder_preorderstatus_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_order_preorder_preorderstatus_export',);
                            }

                        }

                        if (0 === strpos($pathinfo, '/admin/core/order/preorder-preordercomposition')) {
                            // ru__RG__admin_core_order_preorder_preordercomposition_list
                            if ($pathinfo === '/admin/core/order/preorder-preordercomposition/list') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'core_pre_order_compositions_admin',  '_sonata_name' => 'admin_core_order_preorder_preordercomposition_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_order_preorder_preordercomposition_list',);
                            }

                            // ru__RG__admin_core_order_preorder_preordercomposition_create
                            if ($pathinfo === '/admin/core/order/preorder-preordercomposition/create') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'core_pre_order_compositions_admin',  '_sonata_name' => 'admin_core_order_preorder_preordercomposition_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_order_preorder_preordercomposition_create',);
                            }

                            // ru__RG__admin_core_order_preorder_preordercomposition_batch
                            if ($pathinfo === '/admin/core/order/preorder-preordercomposition/batch') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'core_pre_order_compositions_admin',  '_sonata_name' => 'admin_core_order_preorder_preordercomposition_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_order_preorder_preordercomposition_batch',);
                            }

                            // ru__RG__admin_core_order_preorder_preordercomposition_edit
                            if (preg_match('#^/admin/core/order/preorder\\-preordercomposition/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_order_preorder_preordercomposition_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'core_pre_order_compositions_admin',  '_sonata_name' => 'admin_core_order_preorder_preordercomposition_edit',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_order_preorder_preordercomposition_delete
                            if (preg_match('#^/admin/core/order/preorder\\-preordercomposition/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_order_preorder_preordercomposition_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'core_pre_order_compositions_admin',  '_sonata_name' => 'admin_core_order_preorder_preordercomposition_delete',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_order_preorder_preordercomposition_show
                            if (preg_match('#^/admin/core/order/preorder\\-preordercomposition/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_order_preorder_preordercomposition_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'core_pre_order_compositions_admin',  '_sonata_name' => 'admin_core_order_preorder_preordercomposition_show',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_order_preorder_preordercomposition_export
                            if ($pathinfo === '/admin/core/order/preorder-preordercomposition/export') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'core_pre_order_compositions_admin',  '_sonata_name' => 'admin_core_order_preorder_preordercomposition_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_order_preorder_preordercomposition_export',);
                            }

                        }

                        // ru__RG__admin_core_order_preorder_preorder_list
                        if ($pathinfo === '/admin/core/order/preorder-preorder/list') {
                            return array (  '_controller' => 'Core\\OrderBundle\\Controller\\Admin\\PreOrderAdminController::listAction',  '_sonata_admin' => 'core_pre_order_admin',  '_sonata_name' => 'admin_core_order_preorder_preorder_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_order_preorder_preorder_list',);
                        }

                        // ru__RG__admin_core_order_preorder_preorder_create
                        if ($pathinfo === '/admin/core/order/preorder-preorder/create') {
                            return array (  '_controller' => 'Core\\OrderBundle\\Controller\\Admin\\PreOrderAdminController::createAction',  '_sonata_admin' => 'core_pre_order_admin',  '_sonata_name' => 'admin_core_order_preorder_preorder_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_order_preorder_preorder_create',);
                        }

                        // ru__RG__admin_core_order_preorder_preorder_batch
                        if ($pathinfo === '/admin/core/order/preorder-preorder/batch') {
                            return array (  '_controller' => 'Core\\OrderBundle\\Controller\\Admin\\PreOrderAdminController::batchAction',  '_sonata_admin' => 'core_pre_order_admin',  '_sonata_name' => 'admin_core_order_preorder_preorder_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_order_preorder_preorder_batch',);
                        }

                        // ru__RG__admin_core_order_preorder_preorder_edit
                        if (preg_match('#^/admin/core/order/preorder\\-preorder/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_order_preorder_preorder_edit')), array (  '_controller' => 'Core\\OrderBundle\\Controller\\Admin\\PreOrderAdminController::editAction',  '_sonata_admin' => 'core_pre_order_admin',  '_sonata_name' => 'admin_core_order_preorder_preorder_edit',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_order_preorder_preorder_delete
                        if (preg_match('#^/admin/core/order/preorder\\-preorder/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_order_preorder_preorder_delete')), array (  '_controller' => 'Core\\OrderBundle\\Controller\\Admin\\PreOrderAdminController::deleteAction',  '_sonata_admin' => 'core_pre_order_admin',  '_sonata_name' => 'admin_core_order_preorder_preorder_delete',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_order_preorder_preorder_show
                        if (preg_match('#^/admin/core/order/preorder\\-preorder/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_order_preorder_preorder_show')), array (  '_controller' => 'Core\\OrderBundle\\Controller\\Admin\\PreOrderAdminController::showAction',  '_sonata_admin' => 'core_pre_order_admin',  '_sonata_name' => 'admin_core_order_preorder_preorder_show',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_order_preorder_preorder_export
                        if ($pathinfo === '/admin/core/order/preorder-preorder/export') {
                            return array (  '_controller' => 'Core\\OrderBundle\\Controller\\Admin\\PreOrderAdminController::exportAction',  '_sonata_admin' => 'core_pre_order_admin',  '_sonata_name' => 'admin_core_order_preorder_preorder_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_order_preorder_preorder_export',);
                        }

                        // ru__RG__admin_core_order_preorder_preorder_history
                        if (preg_match('#^/admin/core/order/preorder\\-preorder/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_order_preorder_preorder_history')), array (  '_controller' => 'Core\\OrderBundle\\Controller\\Admin\\PreOrderAdminController::historyAction',  '_sonata_admin' => 'core_pre_order_admin',  '_sonata_name' => 'admin_core_order_preorder_preorder_history',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_order_preorder_preorder_history_view_revision
                        if (preg_match('#^/admin/core/order/preorder\\-preorder/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_order_preorder_preorder_history_view_revision')), array (  '_controller' => 'Core\\OrderBundle\\Controller\\Admin\\PreOrderAdminController::historyViewRevisionAction',  '_sonata_admin' => 'core_pre_order_admin',  '_sonata_name' => 'admin_core_order_preorder_preorder_history_view_revision',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_order_preorder_preorder_createOder
                        if ($pathinfo === '/admin/core/order/preorder-preorder/createOder') {
                            return array (  '_controller' => 'Core\\OrderBundle\\Controller\\Admin\\PreOrderAdminController::createOderAction',  '_sonata_admin' => 'core_pre_order_admin',  '_sonata_name' => 'admin_core_order_preorder_preorder_createOder',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_order_preorder_preorder_createOder',);
                        }

                        // ru__RG__admin_core_order_preorder_preorder_previewCancelMsg
                        if ($pathinfo === '/admin/core/order/preorder-preorder/preview-cancel-msg') {
                            return array (  '_controller' => 'Core\\OrderBundle\\Controller\\Admin\\PreOrderAdminController::previewCancelMsgAction',  '_sonata_admin' => 'core_pre_order_admin',  '_sonata_name' => 'admin_core_order_preorder_preorder_previewCancelMsg',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_order_preorder_preorder_previewCancelMsg',);
                        }

                        // ru__RG__admin_core_order_preorder_preorder_contact
                        if ($pathinfo === '/admin/core/order/preorder-preorder/contact') {
                            return array (  '_controller' => 'Core\\OrderBundle\\Controller\\Admin\\PreOrderAdminController::contactAction',  '_sonata_admin' => 'core_pre_order_admin',  '_sonata_name' => 'admin_core_order_preorder_preorder_contact',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_order_preorder_preorder_contact',);
                        }

                    }

                }

                if (0 === strpos($pathinfo, '/admin/core/discounts')) {
                    if (0 === strpos($pathinfo, '/admin/core/discounts/manufacturer')) {
                        if (0 === strpos($pathinfo, '/admin/core/discounts/manufacturerdiscount')) {
                            // ru__RG__admin_core_discounts_manufacturerdiscount_list
                            if ($pathinfo === '/admin/core/discounts/manufacturerdiscount/list') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'core_discounts_manufacturer_admin',  '_sonata_name' => 'admin_core_discounts_manufacturerdiscount_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_discounts_manufacturerdiscount_list',);
                            }

                            // ru__RG__admin_core_discounts_manufacturerdiscount_create
                            if ($pathinfo === '/admin/core/discounts/manufacturerdiscount/create') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'core_discounts_manufacturer_admin',  '_sonata_name' => 'admin_core_discounts_manufacturerdiscount_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_discounts_manufacturerdiscount_create',);
                            }

                            // ru__RG__admin_core_discounts_manufacturerdiscount_batch
                            if ($pathinfo === '/admin/core/discounts/manufacturerdiscount/batch') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'core_discounts_manufacturer_admin',  '_sonata_name' => 'admin_core_discounts_manufacturerdiscount_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_discounts_manufacturerdiscount_batch',);
                            }

                            // ru__RG__admin_core_discounts_manufacturerdiscount_edit
                            if (preg_match('#^/admin/core/discounts/manufacturerdiscount/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_discounts_manufacturerdiscount_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'core_discounts_manufacturer_admin',  '_sonata_name' => 'admin_core_discounts_manufacturerdiscount_edit',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_discounts_manufacturerdiscount_delete
                            if (preg_match('#^/admin/core/discounts/manufacturerdiscount/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_discounts_manufacturerdiscount_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'core_discounts_manufacturer_admin',  '_sonata_name' => 'admin_core_discounts_manufacturerdiscount_delete',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_discounts_manufacturerdiscount_show
                            if (preg_match('#^/admin/core/discounts/manufacturerdiscount/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_discounts_manufacturerdiscount_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'core_discounts_manufacturer_admin',  '_sonata_name' => 'admin_core_discounts_manufacturerdiscount_show',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_discounts_manufacturerdiscount_export
                            if ($pathinfo === '/admin/core/discounts/manufacturerdiscount/export') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'core_discounts_manufacturer_admin',  '_sonata_name' => 'admin_core_discounts_manufacturerdiscount_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_discounts_manufacturerdiscount_export',);
                            }

                            // ru__RG__admin_core_discounts_manufacturerdiscount_history
                            if (preg_match('#^/admin/core/discounts/manufacturerdiscount/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_discounts_manufacturerdiscount_history')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyAction',  '_sonata_admin' => 'core_discounts_manufacturer_admin',  '_sonata_name' => 'admin_core_discounts_manufacturerdiscount_history',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_discounts_manufacturerdiscount_history_view_revision
                            if (preg_match('#^/admin/core/discounts/manufacturerdiscount/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_discounts_manufacturerdiscount_history_view_revision')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyViewRevisionAction',  '_sonata_admin' => 'core_discounts_manufacturer_admin',  '_sonata_name' => 'admin_core_discounts_manufacturerdiscount_history_view_revision',  '_locale' => 'ru',));
                            }

                        }

                        if (0 === strpos($pathinfo, '/admin/core/discounts/manufacturerstepvalues')) {
                            // ru__RG__admin_core_discounts_manufacturerstepvalues_list
                            if ($pathinfo === '/admin/core/discounts/manufacturerstepvalues/list') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'core_discounts_manufacturer_step_values_admin',  '_sonata_name' => 'admin_core_discounts_manufacturerstepvalues_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_discounts_manufacturerstepvalues_list',);
                            }

                            // ru__RG__admin_core_discounts_manufacturerstepvalues_create
                            if ($pathinfo === '/admin/core/discounts/manufacturerstepvalues/create') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'core_discounts_manufacturer_step_values_admin',  '_sonata_name' => 'admin_core_discounts_manufacturerstepvalues_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_discounts_manufacturerstepvalues_create',);
                            }

                            // ru__RG__admin_core_discounts_manufacturerstepvalues_batch
                            if ($pathinfo === '/admin/core/discounts/manufacturerstepvalues/batch') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'core_discounts_manufacturer_step_values_admin',  '_sonata_name' => 'admin_core_discounts_manufacturerstepvalues_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_discounts_manufacturerstepvalues_batch',);
                            }

                            // ru__RG__admin_core_discounts_manufacturerstepvalues_edit
                            if (preg_match('#^/admin/core/discounts/manufacturerstepvalues/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_discounts_manufacturerstepvalues_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'core_discounts_manufacturer_step_values_admin',  '_sonata_name' => 'admin_core_discounts_manufacturerstepvalues_edit',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_discounts_manufacturerstepvalues_delete
                            if (preg_match('#^/admin/core/discounts/manufacturerstepvalues/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_discounts_manufacturerstepvalues_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'core_discounts_manufacturer_step_values_admin',  '_sonata_name' => 'admin_core_discounts_manufacturerstepvalues_delete',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_discounts_manufacturerstepvalues_show
                            if (preg_match('#^/admin/core/discounts/manufacturerstepvalues/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_discounts_manufacturerstepvalues_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'core_discounts_manufacturer_step_values_admin',  '_sonata_name' => 'admin_core_discounts_manufacturerstepvalues_show',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_discounts_manufacturerstepvalues_export
                            if ($pathinfo === '/admin/core/discounts/manufacturerstepvalues/export') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'core_discounts_manufacturer_step_values_admin',  '_sonata_name' => 'admin_core_discounts_manufacturerstepvalues_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_discounts_manufacturerstepvalues_export',);
                            }

                            // ru__RG__admin_core_discounts_manufacturerstepvalues_history
                            if (preg_match('#^/admin/core/discounts/manufacturerstepvalues/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_discounts_manufacturerstepvalues_history')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyAction',  '_sonata_admin' => 'core_discounts_manufacturer_step_values_admin',  '_sonata_name' => 'admin_core_discounts_manufacturerstepvalues_history',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_discounts_manufacturerstepvalues_history_view_revision
                            if (preg_match('#^/admin/core/discounts/manufacturerstepvalues/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_discounts_manufacturerstepvalues_history_view_revision')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyViewRevisionAction',  '_sonata_admin' => 'core_discounts_manufacturer_step_values_admin',  '_sonata_name' => 'admin_core_discounts_manufacturerstepvalues_history_view_revision',  '_locale' => 'ru',));
                            }

                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/core/discounts/contragentmanufacturer')) {
                        if (0 === strpos($pathinfo, '/admin/core/discounts/contragentmanufacturerdiscount')) {
                            // ru__RG__admin_core_discounts_contragentmanufacturerdiscount_list
                            if ($pathinfo === '/admin/core/discounts/contragentmanufacturerdiscount/list') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'core_discounts_contragent_manufacturer_admin',  '_sonata_name' => 'admin_core_discounts_contragentmanufacturerdiscount_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_discounts_contragentmanufacturerdiscount_list',);
                            }

                            // ru__RG__admin_core_discounts_contragentmanufacturerdiscount_create
                            if ($pathinfo === '/admin/core/discounts/contragentmanufacturerdiscount/create') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'core_discounts_contragent_manufacturer_admin',  '_sonata_name' => 'admin_core_discounts_contragentmanufacturerdiscount_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_discounts_contragentmanufacturerdiscount_create',);
                            }

                            // ru__RG__admin_core_discounts_contragentmanufacturerdiscount_batch
                            if ($pathinfo === '/admin/core/discounts/contragentmanufacturerdiscount/batch') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'core_discounts_contragent_manufacturer_admin',  '_sonata_name' => 'admin_core_discounts_contragentmanufacturerdiscount_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_discounts_contragentmanufacturerdiscount_batch',);
                            }

                            // ru__RG__admin_core_discounts_contragentmanufacturerdiscount_edit
                            if (preg_match('#^/admin/core/discounts/contragentmanufacturerdiscount/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_discounts_contragentmanufacturerdiscount_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'core_discounts_contragent_manufacturer_admin',  '_sonata_name' => 'admin_core_discounts_contragentmanufacturerdiscount_edit',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_discounts_contragentmanufacturerdiscount_delete
                            if (preg_match('#^/admin/core/discounts/contragentmanufacturerdiscount/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_discounts_contragentmanufacturerdiscount_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'core_discounts_contragent_manufacturer_admin',  '_sonata_name' => 'admin_core_discounts_contragentmanufacturerdiscount_delete',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_discounts_contragentmanufacturerdiscount_show
                            if (preg_match('#^/admin/core/discounts/contragentmanufacturerdiscount/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_discounts_contragentmanufacturerdiscount_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'core_discounts_contragent_manufacturer_admin',  '_sonata_name' => 'admin_core_discounts_contragentmanufacturerdiscount_show',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_discounts_contragentmanufacturerdiscount_export
                            if ($pathinfo === '/admin/core/discounts/contragentmanufacturerdiscount/export') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'core_discounts_contragent_manufacturer_admin',  '_sonata_name' => 'admin_core_discounts_contragentmanufacturerdiscount_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_discounts_contragentmanufacturerdiscount_export',);
                            }

                            // ru__RG__admin_core_discounts_contragentmanufacturerdiscount_history
                            if (preg_match('#^/admin/core/discounts/contragentmanufacturerdiscount/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_discounts_contragentmanufacturerdiscount_history')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyAction',  '_sonata_admin' => 'core_discounts_contragent_manufacturer_admin',  '_sonata_name' => 'admin_core_discounts_contragentmanufacturerdiscount_history',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_discounts_contragentmanufacturerdiscount_history_view_revision
                            if (preg_match('#^/admin/core/discounts/contragentmanufacturerdiscount/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_discounts_contragentmanufacturerdiscount_history_view_revision')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyViewRevisionAction',  '_sonata_admin' => 'core_discounts_contragent_manufacturer_admin',  '_sonata_name' => 'admin_core_discounts_contragentmanufacturerdiscount_history_view_revision',  '_locale' => 'ru',));
                            }

                        }

                        if (0 === strpos($pathinfo, '/admin/core/discounts/contragentmanufacturerstepvalues')) {
                            // ru__RG__admin_core_discounts_contragentmanufacturerstepvalues_list
                            if ($pathinfo === '/admin/core/discounts/contragentmanufacturerstepvalues/list') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'core_discounts_contragent_manufacturer_step_values_admin',  '_sonata_name' => 'admin_core_discounts_contragentmanufacturerstepvalues_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_discounts_contragentmanufacturerstepvalues_list',);
                            }

                            // ru__RG__admin_core_discounts_contragentmanufacturerstepvalues_create
                            if ($pathinfo === '/admin/core/discounts/contragentmanufacturerstepvalues/create') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'core_discounts_contragent_manufacturer_step_values_admin',  '_sonata_name' => 'admin_core_discounts_contragentmanufacturerstepvalues_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_discounts_contragentmanufacturerstepvalues_create',);
                            }

                            // ru__RG__admin_core_discounts_contragentmanufacturerstepvalues_batch
                            if ($pathinfo === '/admin/core/discounts/contragentmanufacturerstepvalues/batch') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'core_discounts_contragent_manufacturer_step_values_admin',  '_sonata_name' => 'admin_core_discounts_contragentmanufacturerstepvalues_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_discounts_contragentmanufacturerstepvalues_batch',);
                            }

                            // ru__RG__admin_core_discounts_contragentmanufacturerstepvalues_edit
                            if (preg_match('#^/admin/core/discounts/contragentmanufacturerstepvalues/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_discounts_contragentmanufacturerstepvalues_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'core_discounts_contragent_manufacturer_step_values_admin',  '_sonata_name' => 'admin_core_discounts_contragentmanufacturerstepvalues_edit',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_discounts_contragentmanufacturerstepvalues_delete
                            if (preg_match('#^/admin/core/discounts/contragentmanufacturerstepvalues/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_discounts_contragentmanufacturerstepvalues_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'core_discounts_contragent_manufacturer_step_values_admin',  '_sonata_name' => 'admin_core_discounts_contragentmanufacturerstepvalues_delete',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_discounts_contragentmanufacturerstepvalues_show
                            if (preg_match('#^/admin/core/discounts/contragentmanufacturerstepvalues/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_discounts_contragentmanufacturerstepvalues_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'core_discounts_contragent_manufacturer_step_values_admin',  '_sonata_name' => 'admin_core_discounts_contragentmanufacturerstepvalues_show',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_discounts_contragentmanufacturerstepvalues_export
                            if ($pathinfo === '/admin/core/discounts/contragentmanufacturerstepvalues/export') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'core_discounts_contragent_manufacturer_step_values_admin',  '_sonata_name' => 'admin_core_discounts_contragentmanufacturerstepvalues_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_discounts_contragentmanufacturerstepvalues_export',);
                            }

                            // ru__RG__admin_core_discounts_contragentmanufacturerstepvalues_history
                            if (preg_match('#^/admin/core/discounts/contragentmanufacturerstepvalues/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_discounts_contragentmanufacturerstepvalues_history')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyAction',  '_sonata_admin' => 'core_discounts_contragent_manufacturer_step_values_admin',  '_sonata_name' => 'admin_core_discounts_contragentmanufacturerstepvalues_history',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_discounts_contragentmanufacturerstepvalues_history_view_revision
                            if (preg_match('#^/admin/core/discounts/contragentmanufacturerstepvalues/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_discounts_contragentmanufacturerstepvalues_history_view_revision')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyViewRevisionAction',  '_sonata_admin' => 'core_discounts_contragent_manufacturer_step_values_admin',  '_sonata_name' => 'admin_core_discounts_contragentmanufacturerstepvalues_history_view_revision',  '_locale' => 'ru',));
                            }

                        }

                    }

                }

                if (0 === strpos($pathinfo, '/admin/core/logistics')) {
                    if (0 === strpos($pathinfo, '/admin/core/logistics/bank')) {
                        // ru__RG__admin_core_logistics_bank_list
                        if ($pathinfo === '/admin/core/logistics/bank/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'core_logistics_bank_admin',  '_sonata_name' => 'admin_core_logistics_bank_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_bank_list',);
                        }

                        // ru__RG__admin_core_logistics_bank_create
                        if ($pathinfo === '/admin/core/logistics/bank/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'core_logistics_bank_admin',  '_sonata_name' => 'admin_core_logistics_bank_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_bank_create',);
                        }

                        // ru__RG__admin_core_logistics_bank_batch
                        if ($pathinfo === '/admin/core/logistics/bank/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'core_logistics_bank_admin',  '_sonata_name' => 'admin_core_logistics_bank_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_bank_batch',);
                        }

                        // ru__RG__admin_core_logistics_bank_edit
                        if (preg_match('#^/admin/core/logistics/bank/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_bank_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'core_logistics_bank_admin',  '_sonata_name' => 'admin_core_logistics_bank_edit',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_logistics_bank_delete
                        if (preg_match('#^/admin/core/logistics/bank/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_bank_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'core_logistics_bank_admin',  '_sonata_name' => 'admin_core_logistics_bank_delete',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_logistics_bank_show
                        if (preg_match('#^/admin/core/logistics/bank/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_bank_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'core_logistics_bank_admin',  '_sonata_name' => 'admin_core_logistics_bank_show',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_logistics_bank_export
                        if ($pathinfo === '/admin/core/logistics/bank/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'core_logistics_bank_admin',  '_sonata_name' => 'admin_core_logistics_bank_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_bank_export',);
                        }

                        // ru__RG__admin_core_logistics_bank_history
                        if (preg_match('#^/admin/core/logistics/bank/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_bank_history')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyAction',  '_sonata_admin' => 'core_logistics_bank_admin',  '_sonata_name' => 'admin_core_logistics_bank_history',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_logistics_bank_history_view_revision
                        if (preg_match('#^/admin/core/logistics/bank/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_bank_history_view_revision')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyViewRevisionAction',  '_sonata_admin' => 'core_logistics_bank_admin',  '_sonata_name' => 'admin_core_logistics_bank_history_view_revision',  '_locale' => 'ru',));
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/core/logistics/seller')) {
                        // ru__RG__admin_core_logistics_seller_list
                        if ($pathinfo === '/admin/core/logistics/seller/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'core_logistics_seller_admin',  '_sonata_name' => 'admin_core_logistics_seller_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_seller_list',);
                        }

                        // ru__RG__admin_core_logistics_seller_create
                        if ($pathinfo === '/admin/core/logistics/seller/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'core_logistics_seller_admin',  '_sonata_name' => 'admin_core_logistics_seller_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_seller_create',);
                        }

                        // ru__RG__admin_core_logistics_seller_batch
                        if ($pathinfo === '/admin/core/logistics/seller/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'core_logistics_seller_admin',  '_sonata_name' => 'admin_core_logistics_seller_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_seller_batch',);
                        }

                        // ru__RG__admin_core_logistics_seller_edit
                        if (preg_match('#^/admin/core/logistics/seller/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_seller_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'core_logistics_seller_admin',  '_sonata_name' => 'admin_core_logistics_seller_edit',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_logistics_seller_delete
                        if (preg_match('#^/admin/core/logistics/seller/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_seller_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'core_logistics_seller_admin',  '_sonata_name' => 'admin_core_logistics_seller_delete',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_logistics_seller_show
                        if (preg_match('#^/admin/core/logistics/seller/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_seller_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'core_logistics_seller_admin',  '_sonata_name' => 'admin_core_logistics_seller_show',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_logistics_seller_export
                        if ($pathinfo === '/admin/core/logistics/seller/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'core_logistics_seller_admin',  '_sonata_name' => 'admin_core_logistics_seller_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_seller_export',);
                        }

                        // ru__RG__admin_core_logistics_seller_history
                        if (preg_match('#^/admin/core/logistics/seller/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_seller_history')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyAction',  '_sonata_admin' => 'core_logistics_seller_admin',  '_sonata_name' => 'admin_core_logistics_seller_history',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_logistics_seller_history_view_revision
                        if (preg_match('#^/admin/core/logistics/seller/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_seller_history_view_revision')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyViewRevisionAction',  '_sonata_admin' => 'core_logistics_seller_admin',  '_sonata_name' => 'admin_core_logistics_seller_history_view_revision',  '_locale' => 'ru',));
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/core/logistics/regioncity')) {
                        // ru__RG__admin_core_logistics_regioncity_list
                        if ($pathinfo === '/admin/core/logistics/regioncity/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'core_logistics_region_city_admin',  '_sonata_name' => 'admin_core_logistics_regioncity_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_regioncity_list',);
                        }

                        // ru__RG__admin_core_logistics_regioncity_create
                        if ($pathinfo === '/admin/core/logistics/regioncity/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'core_logistics_region_city_admin',  '_sonata_name' => 'admin_core_logistics_regioncity_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_regioncity_create',);
                        }

                        // ru__RG__admin_core_logistics_regioncity_batch
                        if ($pathinfo === '/admin/core/logistics/regioncity/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'core_logistics_region_city_admin',  '_sonata_name' => 'admin_core_logistics_regioncity_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_regioncity_batch',);
                        }

                        // ru__RG__admin_core_logistics_regioncity_edit
                        if (preg_match('#^/admin/core/logistics/regioncity/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_regioncity_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'core_logistics_region_city_admin',  '_sonata_name' => 'admin_core_logistics_regioncity_edit',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_logistics_regioncity_delete
                        if (preg_match('#^/admin/core/logistics/regioncity/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_regioncity_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'core_logistics_region_city_admin',  '_sonata_name' => 'admin_core_logistics_regioncity_delete',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_logistics_regioncity_show
                        if (preg_match('#^/admin/core/logistics/regioncity/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_regioncity_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'core_logistics_region_city_admin',  '_sonata_name' => 'admin_core_logistics_regioncity_show',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_logistics_regioncity_export
                        if ($pathinfo === '/admin/core/logistics/regioncity/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'core_logistics_region_city_admin',  '_sonata_name' => 'admin_core_logistics_regioncity_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_regioncity_export',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/core/logistics/suppl')) {
                        if (0 === strpos($pathinfo, '/admin/core/logistics/supplier')) {
                            // ru__RG__admin_core_logistics_supplier_list
                            if ($pathinfo === '/admin/core/logistics/supplier/list') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'core_logistics_supplier_admin',  '_sonata_name' => 'admin_core_logistics_supplier_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_supplier_list',);
                            }

                            // ru__RG__admin_core_logistics_supplier_create
                            if ($pathinfo === '/admin/core/logistics/supplier/create') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'core_logistics_supplier_admin',  '_sonata_name' => 'admin_core_logistics_supplier_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_supplier_create',);
                            }

                            // ru__RG__admin_core_logistics_supplier_batch
                            if ($pathinfo === '/admin/core/logistics/supplier/batch') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'core_logistics_supplier_admin',  '_sonata_name' => 'admin_core_logistics_supplier_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_supplier_batch',);
                            }

                            // ru__RG__admin_core_logistics_supplier_edit
                            if (preg_match('#^/admin/core/logistics/supplier/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_supplier_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'core_logistics_supplier_admin',  '_sonata_name' => 'admin_core_logistics_supplier_edit',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_logistics_supplier_delete
                            if (preg_match('#^/admin/core/logistics/supplier/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_supplier_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'core_logistics_supplier_admin',  '_sonata_name' => 'admin_core_logistics_supplier_delete',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_logistics_supplier_show
                            if (preg_match('#^/admin/core/logistics/supplier/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_supplier_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'core_logistics_supplier_admin',  '_sonata_name' => 'admin_core_logistics_supplier_show',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_logistics_supplier_export
                            if ($pathinfo === '/admin/core/logistics/supplier/export') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'core_logistics_supplier_admin',  '_sonata_name' => 'admin_core_logistics_supplier_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_supplier_export',);
                            }

                            // ru__RG__admin_core_logistics_supplier_history
                            if (preg_match('#^/admin/core/logistics/supplier/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_supplier_history')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyAction',  '_sonata_admin' => 'core_logistics_supplier_admin',  '_sonata_name' => 'admin_core_logistics_supplier_history',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_logistics_supplier_history_view_revision
                            if (preg_match('#^/admin/core/logistics/supplier/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_supplier_history_view_revision')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyViewRevisionAction',  '_sonata_admin' => 'core_logistics_supplier_admin',  '_sonata_name' => 'admin_core_logistics_supplier_history_view_revision',  '_locale' => 'ru',));
                            }

                        }

                        if (0 === strpos($pathinfo, '/admin/core/logistics/supply')) {
                            // ru__RG__admin_core_logistics_supply_list
                            if ($pathinfo === '/admin/core/logistics/supply/list') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'core_logistics_supply_admin',  '_sonata_name' => 'admin_core_logistics_supply_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_supply_list',);
                            }

                            // ru__RG__admin_core_logistics_supply_create
                            if ($pathinfo === '/admin/core/logistics/supply/create') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'core_logistics_supply_admin',  '_sonata_name' => 'admin_core_logistics_supply_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_supply_create',);
                            }

                            // ru__RG__admin_core_logistics_supply_batch
                            if ($pathinfo === '/admin/core/logistics/supply/batch') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'core_logistics_supply_admin',  '_sonata_name' => 'admin_core_logistics_supply_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_supply_batch',);
                            }

                            // ru__RG__admin_core_logistics_supply_edit
                            if (preg_match('#^/admin/core/logistics/supply/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_supply_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'core_logistics_supply_admin',  '_sonata_name' => 'admin_core_logistics_supply_edit',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_logistics_supply_delete
                            if (preg_match('#^/admin/core/logistics/supply/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_supply_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'core_logistics_supply_admin',  '_sonata_name' => 'admin_core_logistics_supply_delete',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_logistics_supply_show
                            if (preg_match('#^/admin/core/logistics/supply/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_supply_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'core_logistics_supply_admin',  '_sonata_name' => 'admin_core_logistics_supply_show',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_logistics_supply_export
                            if ($pathinfo === '/admin/core/logistics/supply/export') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'core_logistics_supply_admin',  '_sonata_name' => 'admin_core_logistics_supply_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_supply_export',);
                            }

                            // ru__RG__admin_core_logistics_supply_history
                            if (preg_match('#^/admin/core/logistics/supply/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_supply_history')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyAction',  '_sonata_admin' => 'core_logistics_supply_admin',  '_sonata_name' => 'admin_core_logistics_supply_history',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_logistics_supply_history_view_revision
                            if (preg_match('#^/admin/core/logistics/supply/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_supply_history_view_revision')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyViewRevisionAction',  '_sonata_admin' => 'core_logistics_supply_admin',  '_sonata_name' => 'admin_core_logistics_supply_history_view_revision',  '_locale' => 'ru',));
                            }

                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/core/logistics/productinsupply')) {
                        // ru__RG__admin_core_logistics_productinsupply_list
                        if ($pathinfo === '/admin/core/logistics/productinsupply/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'core_logistics_product_in_supply_admin',  '_sonata_name' => 'admin_core_logistics_productinsupply_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_productinsupply_list',);
                        }

                        // ru__RG__admin_core_logistics_productinsupply_create
                        if ($pathinfo === '/admin/core/logistics/productinsupply/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'core_logistics_product_in_supply_admin',  '_sonata_name' => 'admin_core_logistics_productinsupply_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_productinsupply_create',);
                        }

                        // ru__RG__admin_core_logistics_productinsupply_batch
                        if ($pathinfo === '/admin/core/logistics/productinsupply/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'core_logistics_product_in_supply_admin',  '_sonata_name' => 'admin_core_logistics_productinsupply_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_productinsupply_batch',);
                        }

                        // ru__RG__admin_core_logistics_productinsupply_edit
                        if (preg_match('#^/admin/core/logistics/productinsupply/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_productinsupply_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'core_logistics_product_in_supply_admin',  '_sonata_name' => 'admin_core_logistics_productinsupply_edit',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_logistics_productinsupply_delete
                        if (preg_match('#^/admin/core/logistics/productinsupply/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_productinsupply_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'core_logistics_product_in_supply_admin',  '_sonata_name' => 'admin_core_logistics_productinsupply_delete',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_logistics_productinsupply_show
                        if (preg_match('#^/admin/core/logistics/productinsupply/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_productinsupply_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'core_logistics_product_in_supply_admin',  '_sonata_name' => 'admin_core_logistics_productinsupply_show',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_logistics_productinsupply_export
                        if ($pathinfo === '/admin/core/logistics/productinsupply/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'core_logistics_product_in_supply_admin',  '_sonata_name' => 'admin_core_logistics_productinsupply_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_productinsupply_export',);
                        }

                        // ru__RG__admin_core_logistics_productinsupply_history
                        if (preg_match('#^/admin/core/logistics/productinsupply/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_productinsupply_history')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyAction',  '_sonata_admin' => 'core_logistics_product_in_supply_admin',  '_sonata_name' => 'admin_core_logistics_productinsupply_history',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_logistics_productinsupply_history_view_revision
                        if (preg_match('#^/admin/core/logistics/productinsupply/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_productinsupply_history_view_revision')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyViewRevisionAction',  '_sonata_admin' => 'core_logistics_product_in_supply_admin',  '_sonata_name' => 'admin_core_logistics_productinsupply_history_view_revision',  '_locale' => 'ru',));
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/core/logistics/unitinstock')) {
                        // ru__RG__admin_core_logistics_unitinstock_list
                        if ($pathinfo === '/admin/core/logistics/unitinstock/list') {
                            return array (  '_controller' => 'Core\\LogisticsBundle\\Controller\\Admin\\UnitInStockAdminController::listAction',  '_sonata_admin' => 'core_logistics_unit_in_stock_admin',  '_sonata_name' => 'admin_core_logistics_unitinstock_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_unitinstock_list',);
                        }

                        // ru__RG__admin_core_logistics_unitinstock_batch
                        if ($pathinfo === '/admin/core/logistics/unitinstock/batch') {
                            return array (  '_controller' => 'Core\\LogisticsBundle\\Controller\\Admin\\UnitInStockAdminController::batchAction',  '_sonata_admin' => 'core_logistics_unit_in_stock_admin',  '_sonata_name' => 'admin_core_logistics_unitinstock_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_unitinstock_batch',);
                        }

                        // ru__RG__admin_core_logistics_unitinstock_edit
                        if (preg_match('#^/admin/core/logistics/unitinstock/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_unitinstock_edit')), array (  '_controller' => 'Core\\LogisticsBundle\\Controller\\Admin\\UnitInStockAdminController::editAction',  '_sonata_admin' => 'core_logistics_unit_in_stock_admin',  '_sonata_name' => 'admin_core_logistics_unitinstock_edit',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_logistics_unitinstock_show
                        if (preg_match('#^/admin/core/logistics/unitinstock/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_unitinstock_show')), array (  '_controller' => 'Core\\LogisticsBundle\\Controller\\Admin\\UnitInStockAdminController::showAction',  '_sonata_admin' => 'core_logistics_unit_in_stock_admin',  '_sonata_name' => 'admin_core_logistics_unitinstock_show',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_logistics_unitinstock_export
                        if ($pathinfo === '/admin/core/logistics/unitinstock/export') {
                            return array (  '_controller' => 'Core\\LogisticsBundle\\Controller\\Admin\\UnitInStockAdminController::exportAction',  '_sonata_admin' => 'core_logistics_unit_in_stock_admin',  '_sonata_name' => 'admin_core_logistics_unitinstock_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_unitinstock_export',);
                        }

                        // ru__RG__admin_core_logistics_unitinstock_history
                        if (preg_match('#^/admin/core/logistics/unitinstock/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_unitinstock_history')), array (  '_controller' => 'Core\\LogisticsBundle\\Controller\\Admin\\UnitInStockAdminController::historyAction',  '_sonata_admin' => 'core_logistics_unit_in_stock_admin',  '_sonata_name' => 'admin_core_logistics_unitinstock_history',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_logistics_unitinstock_history_view_revision
                        if (preg_match('#^/admin/core/logistics/unitinstock/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_unitinstock_history_view_revision')), array (  '_controller' => 'Core\\LogisticsBundle\\Controller\\Admin\\UnitInStockAdminController::historyViewRevisionAction',  '_sonata_admin' => 'core_logistics_unit_in_stock_admin',  '_sonata_name' => 'admin_core_logistics_unitinstock_history_view_revision',  '_locale' => 'ru',));
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/core/logistics/transit')) {
                        // ru__RG__admin_core_logistics_transit_list
                        if ($pathinfo === '/admin/core/logistics/transit/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'core_logistics_transit_admin',  '_sonata_name' => 'admin_core_logistics_transit_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_transit_list',);
                        }

                        // ru__RG__admin_core_logistics_transit_create
                        if ($pathinfo === '/admin/core/logistics/transit/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'core_logistics_transit_admin',  '_sonata_name' => 'admin_core_logistics_transit_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_transit_create',);
                        }

                        // ru__RG__admin_core_logistics_transit_batch
                        if ($pathinfo === '/admin/core/logistics/transit/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'core_logistics_transit_admin',  '_sonata_name' => 'admin_core_logistics_transit_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_transit_batch',);
                        }

                        // ru__RG__admin_core_logistics_transit_edit
                        if (preg_match('#^/admin/core/logistics/transit/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_transit_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'core_logistics_transit_admin',  '_sonata_name' => 'admin_core_logistics_transit_edit',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_logistics_transit_delete
                        if (preg_match('#^/admin/core/logistics/transit/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_transit_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'core_logistics_transit_admin',  '_sonata_name' => 'admin_core_logistics_transit_delete',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_logistics_transit_show
                        if (preg_match('#^/admin/core/logistics/transit/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_transit_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'core_logistics_transit_admin',  '_sonata_name' => 'admin_core_logistics_transit_show',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_logistics_transit_export
                        if ($pathinfo === '/admin/core/logistics/transit/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'core_logistics_transit_admin',  '_sonata_name' => 'admin_core_logistics_transit_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_transit_export',);
                        }

                        // ru__RG__admin_core_logistics_transit_history
                        if (preg_match('#^/admin/core/logistics/transit/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_transit_history')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyAction',  '_sonata_admin' => 'core_logistics_transit_admin',  '_sonata_name' => 'admin_core_logistics_transit_history',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_logistics_transit_history_view_revision
                        if (preg_match('#^/admin/core/logistics/transit/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_transit_history_view_revision')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyViewRevisionAction',  '_sonata_admin' => 'core_logistics_transit_admin',  '_sonata_name' => 'admin_core_logistics_transit_history_view_revision',  '_locale' => 'ru',));
                        }

                        if (0 === strpos($pathinfo, '/admin/core/logistics/transitstatus')) {
                            // ru__RG__admin_core_logistics_transitstatus_list
                            if ($pathinfo === '/admin/core/logistics/transitstatus/list') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'core_logistics_transit_status_admin',  '_sonata_name' => 'admin_core_logistics_transitstatus_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_transitstatus_list',);
                            }

                            // ru__RG__admin_core_logistics_transitstatus_create
                            if ($pathinfo === '/admin/core/logistics/transitstatus/create') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'core_logistics_transit_status_admin',  '_sonata_name' => 'admin_core_logistics_transitstatus_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_transitstatus_create',);
                            }

                            // ru__RG__admin_core_logistics_transitstatus_batch
                            if ($pathinfo === '/admin/core/logistics/transitstatus/batch') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'core_logistics_transit_status_admin',  '_sonata_name' => 'admin_core_logistics_transitstatus_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_transitstatus_batch',);
                            }

                            // ru__RG__admin_core_logistics_transitstatus_edit
                            if (preg_match('#^/admin/core/logistics/transitstatus/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_transitstatus_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'core_logistics_transit_status_admin',  '_sonata_name' => 'admin_core_logistics_transitstatus_edit',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_logistics_transitstatus_delete
                            if (preg_match('#^/admin/core/logistics/transitstatus/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_transitstatus_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'core_logistics_transit_status_admin',  '_sonata_name' => 'admin_core_logistics_transitstatus_delete',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_logistics_transitstatus_show
                            if (preg_match('#^/admin/core/logistics/transitstatus/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_transitstatus_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'core_logistics_transit_status_admin',  '_sonata_name' => 'admin_core_logistics_transitstatus_show',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_logistics_transitstatus_export
                            if ($pathinfo === '/admin/core/logistics/transitstatus/export') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'core_logistics_transit_status_admin',  '_sonata_name' => 'admin_core_logistics_transitstatus_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_transitstatus_export',);
                            }

                            // ru__RG__admin_core_logistics_transitstatus_history
                            if (preg_match('#^/admin/core/logistics/transitstatus/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_transitstatus_history')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyAction',  '_sonata_admin' => 'core_logistics_transit_status_admin',  '_sonata_name' => 'admin_core_logistics_transitstatus_history',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_logistics_transitstatus_history_view_revision
                            if (preg_match('#^/admin/core/logistics/transitstatus/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_transitstatus_history_view_revision')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyViewRevisionAction',  '_sonata_admin' => 'core_logistics_transit_status_admin',  '_sonata_name' => 'admin_core_logistics_transitstatus_history_view_revision',  '_locale' => 'ru',));
                            }

                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/core/logistics/s')) {
                        if (0 === strpos($pathinfo, '/admin/core/logistics/supplystatus')) {
                            // ru__RG__admin_core_logistics_supplystatus_list
                            if ($pathinfo === '/admin/core/logistics/supplystatus/list') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'core_logistics_supply_status_admin',  '_sonata_name' => 'admin_core_logistics_supplystatus_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_supplystatus_list',);
                            }

                            // ru__RG__admin_core_logistics_supplystatus_create
                            if ($pathinfo === '/admin/core/logistics/supplystatus/create') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'core_logistics_supply_status_admin',  '_sonata_name' => 'admin_core_logistics_supplystatus_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_supplystatus_create',);
                            }

                            // ru__RG__admin_core_logistics_supplystatus_batch
                            if ($pathinfo === '/admin/core/logistics/supplystatus/batch') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'core_logistics_supply_status_admin',  '_sonata_name' => 'admin_core_logistics_supplystatus_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_supplystatus_batch',);
                            }

                            // ru__RG__admin_core_logistics_supplystatus_edit
                            if (preg_match('#^/admin/core/logistics/supplystatus/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_supplystatus_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'core_logistics_supply_status_admin',  '_sonata_name' => 'admin_core_logistics_supplystatus_edit',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_logistics_supplystatus_delete
                            if (preg_match('#^/admin/core/logistics/supplystatus/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_supplystatus_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'core_logistics_supply_status_admin',  '_sonata_name' => 'admin_core_logistics_supplystatus_delete',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_logistics_supplystatus_show
                            if (preg_match('#^/admin/core/logistics/supplystatus/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_supplystatus_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'core_logistics_supply_status_admin',  '_sonata_name' => 'admin_core_logistics_supplystatus_show',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_logistics_supplystatus_export
                            if ($pathinfo === '/admin/core/logistics/supplystatus/export') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'core_logistics_supply_status_admin',  '_sonata_name' => 'admin_core_logistics_supplystatus_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_supplystatus_export',);
                            }

                            // ru__RG__admin_core_logistics_supplystatus_history
                            if (preg_match('#^/admin/core/logistics/supplystatus/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_supplystatus_history')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyAction',  '_sonata_admin' => 'core_logistics_supply_status_admin',  '_sonata_name' => 'admin_core_logistics_supplystatus_history',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_logistics_supplystatus_history_view_revision
                            if (preg_match('#^/admin/core/logistics/supplystatus/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_supplystatus_history_view_revision')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyViewRevisionAction',  '_sonata_admin' => 'core_logistics_supply_status_admin',  '_sonata_name' => 'admin_core_logistics_supplystatus_history_view_revision',  '_locale' => 'ru',));
                            }

                        }

                        if (0 === strpos($pathinfo, '/admin/core/logistics/stock')) {
                            // ru__RG__admin_core_logistics_stock_list
                            if ($pathinfo === '/admin/core/logistics/stock/list') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'core_logistics_stock_admin',  '_sonata_name' => 'admin_core_logistics_stock_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_stock_list',);
                            }

                            // ru__RG__admin_core_logistics_stock_create
                            if ($pathinfo === '/admin/core/logistics/stock/create') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'core_logistics_stock_admin',  '_sonata_name' => 'admin_core_logistics_stock_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_stock_create',);
                            }

                            // ru__RG__admin_core_logistics_stock_batch
                            if ($pathinfo === '/admin/core/logistics/stock/batch') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'core_logistics_stock_admin',  '_sonata_name' => 'admin_core_logistics_stock_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_stock_batch',);
                            }

                            // ru__RG__admin_core_logistics_stock_edit
                            if (preg_match('#^/admin/core/logistics/stock/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_stock_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'core_logistics_stock_admin',  '_sonata_name' => 'admin_core_logistics_stock_edit',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_logistics_stock_delete
                            if (preg_match('#^/admin/core/logistics/stock/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_stock_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'core_logistics_stock_admin',  '_sonata_name' => 'admin_core_logistics_stock_delete',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_logistics_stock_show
                            if (preg_match('#^/admin/core/logistics/stock/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_stock_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'core_logistics_stock_admin',  '_sonata_name' => 'admin_core_logistics_stock_show',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_logistics_stock_export
                            if ($pathinfo === '/admin/core/logistics/stock/export') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'core_logistics_stock_admin',  '_sonata_name' => 'admin_core_logistics_stock_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_stock_export',);
                            }

                            // ru__RG__admin_core_logistics_stock_history
                            if (preg_match('#^/admin/core/logistics/stock/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_stock_history')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyAction',  '_sonata_admin' => 'core_logistics_stock_admin',  '_sonata_name' => 'admin_core_logistics_stock_history',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_logistics_stock_history_view_revision
                            if (preg_match('#^/admin/core/logistics/stock/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_stock_history_view_revision')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyViewRevisionAction',  '_sonata_admin' => 'core_logistics_stock_admin',  '_sonata_name' => 'admin_core_logistics_stock_history_view_revision',  '_locale' => 'ru',));
                            }

                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/core/logistics/productintransit')) {
                        // ru__RG__admin_core_logistics_productintransit_list
                        if ($pathinfo === '/admin/core/logistics/productintransit/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'core_logistics_unit_in_transit_admin',  '_sonata_name' => 'admin_core_logistics_productintransit_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_productintransit_list',);
                        }

                        // ru__RG__admin_core_logistics_productintransit_create
                        if ($pathinfo === '/admin/core/logistics/productintransit/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'core_logistics_unit_in_transit_admin',  '_sonata_name' => 'admin_core_logistics_productintransit_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_productintransit_create',);
                        }

                        // ru__RG__admin_core_logistics_productintransit_batch
                        if ($pathinfo === '/admin/core/logistics/productintransit/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'core_logistics_unit_in_transit_admin',  '_sonata_name' => 'admin_core_logistics_productintransit_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_productintransit_batch',);
                        }

                        // ru__RG__admin_core_logistics_productintransit_edit
                        if (preg_match('#^/admin/core/logistics/productintransit/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_productintransit_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'core_logistics_unit_in_transit_admin',  '_sonata_name' => 'admin_core_logistics_productintransit_edit',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_logistics_productintransit_delete
                        if (preg_match('#^/admin/core/logistics/productintransit/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_productintransit_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'core_logistics_unit_in_transit_admin',  '_sonata_name' => 'admin_core_logistics_productintransit_delete',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_logistics_productintransit_show
                        if (preg_match('#^/admin/core/logistics/productintransit/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_productintransit_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'core_logistics_unit_in_transit_admin',  '_sonata_name' => 'admin_core_logistics_productintransit_show',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_logistics_productintransit_export
                        if ($pathinfo === '/admin/core/logistics/productintransit/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'core_logistics_unit_in_transit_admin',  '_sonata_name' => 'admin_core_logistics_productintransit_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_productintransit_export',);
                        }

                        // ru__RG__admin_core_logistics_productintransit_history
                        if (preg_match('#^/admin/core/logistics/productintransit/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_productintransit_history')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyAction',  '_sonata_admin' => 'core_logistics_unit_in_transit_admin',  '_sonata_name' => 'admin_core_logistics_productintransit_history',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_logistics_productintransit_history_view_revision
                        if (preg_match('#^/admin/core/logistics/productintransit/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_productintransit_history_view_revision')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyViewRevisionAction',  '_sonata_admin' => 'core_logistics_unit_in_transit_admin',  '_sonata_name' => 'admin_core_logistics_productintransit_history_view_revision',  '_locale' => 'ru',));
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/core/logistics/unit')) {
                        if (0 === strpos($pathinfo, '/admin/core/logistics/unitserials')) {
                            // ru__RG__admin_core_logistics_unitserials_list
                            if ($pathinfo === '/admin/core/logistics/unitserials/list') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'core_logistics_unit_serial_admin',  '_sonata_name' => 'admin_core_logistics_unitserials_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_unitserials_list',);
                            }

                            // ru__RG__admin_core_logistics_unitserials_create
                            if ($pathinfo === '/admin/core/logistics/unitserials/create') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'core_logistics_unit_serial_admin',  '_sonata_name' => 'admin_core_logistics_unitserials_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_unitserials_create',);
                            }

                            // ru__RG__admin_core_logistics_unitserials_batch
                            if ($pathinfo === '/admin/core/logistics/unitserials/batch') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'core_logistics_unit_serial_admin',  '_sonata_name' => 'admin_core_logistics_unitserials_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_unitserials_batch',);
                            }

                            // ru__RG__admin_core_logistics_unitserials_edit
                            if (preg_match('#^/admin/core/logistics/unitserials/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_unitserials_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'core_logistics_unit_serial_admin',  '_sonata_name' => 'admin_core_logistics_unitserials_edit',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_logistics_unitserials_delete
                            if (preg_match('#^/admin/core/logistics/unitserials/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_unitserials_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'core_logistics_unit_serial_admin',  '_sonata_name' => 'admin_core_logistics_unitserials_delete',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_logistics_unitserials_show
                            if (preg_match('#^/admin/core/logistics/unitserials/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_unitserials_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'core_logistics_unit_serial_admin',  '_sonata_name' => 'admin_core_logistics_unitserials_show',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_logistics_unitserials_export
                            if ($pathinfo === '/admin/core/logistics/unitserials/export') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'core_logistics_unit_serial_admin',  '_sonata_name' => 'admin_core_logistics_unitserials_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_unitserials_export',);
                            }

                            // ru__RG__admin_core_logistics_unitserials_history
                            if (preg_match('#^/admin/core/logistics/unitserials/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_unitserials_history')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyAction',  '_sonata_admin' => 'core_logistics_unit_serial_admin',  '_sonata_name' => 'admin_core_logistics_unitserials_history',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_logistics_unitserials_history_view_revision
                            if (preg_match('#^/admin/core/logistics/unitserials/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_unitserials_history_view_revision')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyViewRevisionAction',  '_sonata_admin' => 'core_logistics_unit_serial_admin',  '_sonata_name' => 'admin_core_logistics_unitserials_history_view_revision',  '_locale' => 'ru',));
                            }

                        }

                        if (0 === strpos($pathinfo, '/admin/core/logistics/unitinstockdefectreason')) {
                            // ru__RG__admin_core_logistics_unitinstockdefectreason_list
                            if ($pathinfo === '/admin/core/logistics/unitinstockdefectreason/list') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'core_logistics_unit_in_stock_defect_transit_admin',  '_sonata_name' => 'admin_core_logistics_unitinstockdefectreason_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_unitinstockdefectreason_list',);
                            }

                            // ru__RG__admin_core_logistics_unitinstockdefectreason_create
                            if ($pathinfo === '/admin/core/logistics/unitinstockdefectreason/create') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'core_logistics_unit_in_stock_defect_transit_admin',  '_sonata_name' => 'admin_core_logistics_unitinstockdefectreason_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_unitinstockdefectreason_create',);
                            }

                            // ru__RG__admin_core_logistics_unitinstockdefectreason_batch
                            if ($pathinfo === '/admin/core/logistics/unitinstockdefectreason/batch') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'core_logistics_unit_in_stock_defect_transit_admin',  '_sonata_name' => 'admin_core_logistics_unitinstockdefectreason_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_unitinstockdefectreason_batch',);
                            }

                            // ru__RG__admin_core_logistics_unitinstockdefectreason_edit
                            if (preg_match('#^/admin/core/logistics/unitinstockdefectreason/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_unitinstockdefectreason_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'core_logistics_unit_in_stock_defect_transit_admin',  '_sonata_name' => 'admin_core_logistics_unitinstockdefectreason_edit',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_logistics_unitinstockdefectreason_delete
                            if (preg_match('#^/admin/core/logistics/unitinstockdefectreason/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_unitinstockdefectreason_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'core_logistics_unit_in_stock_defect_transit_admin',  '_sonata_name' => 'admin_core_logistics_unitinstockdefectreason_delete',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_logistics_unitinstockdefectreason_show
                            if (preg_match('#^/admin/core/logistics/unitinstockdefectreason/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_unitinstockdefectreason_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'core_logistics_unit_in_stock_defect_transit_admin',  '_sonata_name' => 'admin_core_logistics_unitinstockdefectreason_show',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_logistics_unitinstockdefectreason_export
                            if ($pathinfo === '/admin/core/logistics/unitinstockdefectreason/export') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'core_logistics_unit_in_stock_defect_transit_admin',  '_sonata_name' => 'admin_core_logistics_unitinstockdefectreason_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_unitinstockdefectreason_export',);
                            }

                            // ru__RG__admin_core_logistics_unitinstockdefectreason_history
                            if (preg_match('#^/admin/core/logistics/unitinstockdefectreason/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_unitinstockdefectreason_history')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyAction',  '_sonata_admin' => 'core_logistics_unit_in_stock_defect_transit_admin',  '_sonata_name' => 'admin_core_logistics_unitinstockdefectreason_history',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_logistics_unitinstockdefectreason_history_view_revision
                            if (preg_match('#^/admin/core/logistics/unitinstockdefectreason/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_unitinstockdefectreason_history_view_revision')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyViewRevisionAction',  '_sonata_admin' => 'core_logistics_unit_in_stock_defect_transit_admin',  '_sonata_name' => 'admin_core_logistics_unitinstockdefectreason_history_view_revision',  '_locale' => 'ru',));
                            }

                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/core/logistics/additionalcosts')) {
                        if (0 === strpos($pathinfo, '/admin/core/logistics/additionalcoststypeofsupply')) {
                            // ru__RG__admin_core_logistics_additionalcoststypeofsupply_list
                            if ($pathinfo === '/admin/core/logistics/additionalcoststypeofsupply/list') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'core_logistics_additional_costs_of_supply_type_admin',  '_sonata_name' => 'admin_core_logistics_additionalcoststypeofsupply_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_additionalcoststypeofsupply_list',);
                            }

                            // ru__RG__admin_core_logistics_additionalcoststypeofsupply_create
                            if ($pathinfo === '/admin/core/logistics/additionalcoststypeofsupply/create') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'core_logistics_additional_costs_of_supply_type_admin',  '_sonata_name' => 'admin_core_logistics_additionalcoststypeofsupply_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_additionalcoststypeofsupply_create',);
                            }

                            // ru__RG__admin_core_logistics_additionalcoststypeofsupply_batch
                            if ($pathinfo === '/admin/core/logistics/additionalcoststypeofsupply/batch') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'core_logistics_additional_costs_of_supply_type_admin',  '_sonata_name' => 'admin_core_logistics_additionalcoststypeofsupply_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_additionalcoststypeofsupply_batch',);
                            }

                            // ru__RG__admin_core_logistics_additionalcoststypeofsupply_edit
                            if (preg_match('#^/admin/core/logistics/additionalcoststypeofsupply/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_additionalcoststypeofsupply_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'core_logistics_additional_costs_of_supply_type_admin',  '_sonata_name' => 'admin_core_logistics_additionalcoststypeofsupply_edit',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_logistics_additionalcoststypeofsupply_delete
                            if (preg_match('#^/admin/core/logistics/additionalcoststypeofsupply/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_additionalcoststypeofsupply_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'core_logistics_additional_costs_of_supply_type_admin',  '_sonata_name' => 'admin_core_logistics_additionalcoststypeofsupply_delete',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_logistics_additionalcoststypeofsupply_show
                            if (preg_match('#^/admin/core/logistics/additionalcoststypeofsupply/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_additionalcoststypeofsupply_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'core_logistics_additional_costs_of_supply_type_admin',  '_sonata_name' => 'admin_core_logistics_additionalcoststypeofsupply_show',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_logistics_additionalcoststypeofsupply_export
                            if ($pathinfo === '/admin/core/logistics/additionalcoststypeofsupply/export') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'core_logistics_additional_costs_of_supply_type_admin',  '_sonata_name' => 'admin_core_logistics_additionalcoststypeofsupply_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_additionalcoststypeofsupply_export',);
                            }

                        }

                        if (0 === strpos($pathinfo, '/admin/core/logistics/additionalcostsofsupply')) {
                            // ru__RG__admin_core_logistics_additionalcostsofsupply_list
                            if ($pathinfo === '/admin/core/logistics/additionalcostsofsupply/list') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'core_logistics_additional_costs_of_supply_admin',  '_sonata_name' => 'admin_core_logistics_additionalcostsofsupply_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_additionalcostsofsupply_list',);
                            }

                            // ru__RG__admin_core_logistics_additionalcostsofsupply_create
                            if ($pathinfo === '/admin/core/logistics/additionalcostsofsupply/create') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'core_logistics_additional_costs_of_supply_admin',  '_sonata_name' => 'admin_core_logistics_additionalcostsofsupply_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_additionalcostsofsupply_create',);
                            }

                            // ru__RG__admin_core_logistics_additionalcostsofsupply_batch
                            if ($pathinfo === '/admin/core/logistics/additionalcostsofsupply/batch') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'core_logistics_additional_costs_of_supply_admin',  '_sonata_name' => 'admin_core_logistics_additionalcostsofsupply_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_additionalcostsofsupply_batch',);
                            }

                            // ru__RG__admin_core_logistics_additionalcostsofsupply_edit
                            if (preg_match('#^/admin/core/logistics/additionalcostsofsupply/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_additionalcostsofsupply_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'core_logistics_additional_costs_of_supply_admin',  '_sonata_name' => 'admin_core_logistics_additionalcostsofsupply_edit',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_logistics_additionalcostsofsupply_delete
                            if (preg_match('#^/admin/core/logistics/additionalcostsofsupply/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_additionalcostsofsupply_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'core_logistics_additional_costs_of_supply_admin',  '_sonata_name' => 'admin_core_logistics_additionalcostsofsupply_delete',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_logistics_additionalcostsofsupply_show
                            if (preg_match('#^/admin/core/logistics/additionalcostsofsupply/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_additionalcostsofsupply_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'core_logistics_additional_costs_of_supply_admin',  '_sonata_name' => 'admin_core_logistics_additionalcostsofsupply_show',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_logistics_additionalcostsofsupply_export
                            if ($pathinfo === '/admin/core/logistics/additionalcostsofsupply/export') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'core_logistics_additional_costs_of_supply_admin',  '_sonata_name' => 'admin_core_logistics_additionalcostsofsupply_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_additionalcostsofsupply_export',);
                            }

                            // ru__RG__admin_core_logistics_additionalcostsofsupply_history
                            if (preg_match('#^/admin/core/logistics/additionalcostsofsupply/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_additionalcostsofsupply_history')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyAction',  '_sonata_admin' => 'core_logistics_additional_costs_of_supply_admin',  '_sonata_name' => 'admin_core_logistics_additionalcostsofsupply_history',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_logistics_additionalcostsofsupply_history_view_revision
                            if (preg_match('#^/admin/core/logistics/additionalcostsofsupply/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_additionalcostsofsupply_history_view_revision')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyViewRevisionAction',  '_sonata_admin' => 'core_logistics_additional_costs_of_supply_admin',  '_sonata_name' => 'admin_core_logistics_additionalcostsofsupply_history_view_revision',  '_locale' => 'ru',));
                            }

                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/core/logistics/supplierpriceanalysis')) {
                        // ru__RG__admin_core_logistics_supplierpriceanalysis_list
                        if ($pathinfo === '/admin/core/logistics/supplierpriceanalysis/list') {
                            return array (  '_controller' => 'Core\\LogisticsBundle\\Controller\\Admin\\SupplierPriceAnalysisAdminController::listAction',  '_sonata_admin' => 'core_manufacturer_price_analysis_admin',  '_sonata_name' => 'admin_core_logistics_supplierpriceanalysis_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_supplierpriceanalysis_list',);
                        }

                        // ru__RG__admin_core_logistics_supplierpriceanalysis_create
                        if ($pathinfo === '/admin/core/logistics/supplierpriceanalysis/create') {
                            return array (  '_controller' => 'Core\\LogisticsBundle\\Controller\\Admin\\SupplierPriceAnalysisAdminController::createAction',  '_sonata_admin' => 'core_manufacturer_price_analysis_admin',  '_sonata_name' => 'admin_core_logistics_supplierpriceanalysis_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_supplierpriceanalysis_create',);
                        }

                        // ru__RG__admin_core_logistics_supplierpriceanalysis_batch
                        if ($pathinfo === '/admin/core/logistics/supplierpriceanalysis/batch') {
                            return array (  '_controller' => 'Core\\LogisticsBundle\\Controller\\Admin\\SupplierPriceAnalysisAdminController::batchAction',  '_sonata_admin' => 'core_manufacturer_price_analysis_admin',  '_sonata_name' => 'admin_core_logistics_supplierpriceanalysis_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_supplierpriceanalysis_batch',);
                        }

                        // ru__RG__admin_core_logistics_supplierpriceanalysis_edit
                        if (preg_match('#^/admin/core/logistics/supplierpriceanalysis/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_supplierpriceanalysis_edit')), array (  '_controller' => 'Core\\LogisticsBundle\\Controller\\Admin\\SupplierPriceAnalysisAdminController::editAction',  '_sonata_admin' => 'core_manufacturer_price_analysis_admin',  '_sonata_name' => 'admin_core_logistics_supplierpriceanalysis_edit',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_logistics_supplierpriceanalysis_delete
                        if (preg_match('#^/admin/core/logistics/supplierpriceanalysis/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_supplierpriceanalysis_delete')), array (  '_controller' => 'Core\\LogisticsBundle\\Controller\\Admin\\SupplierPriceAnalysisAdminController::deleteAction',  '_sonata_admin' => 'core_manufacturer_price_analysis_admin',  '_sonata_name' => 'admin_core_logistics_supplierpriceanalysis_delete',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_logistics_supplierpriceanalysis_show
                        if (preg_match('#^/admin/core/logistics/supplierpriceanalysis/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_supplierpriceanalysis_show')), array (  '_controller' => 'Core\\LogisticsBundle\\Controller\\Admin\\SupplierPriceAnalysisAdminController::showAction',  '_sonata_admin' => 'core_manufacturer_price_analysis_admin',  '_sonata_name' => 'admin_core_logistics_supplierpriceanalysis_show',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_logistics_supplierpriceanalysis_export
                        if ($pathinfo === '/admin/core/logistics/supplierpriceanalysis/export') {
                            return array (  '_controller' => 'Core\\LogisticsBundle\\Controller\\Admin\\SupplierPriceAnalysisAdminController::exportAction',  '_sonata_admin' => 'core_manufacturer_price_analysis_admin',  '_sonata_name' => 'admin_core_logistics_supplierpriceanalysis_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_supplierpriceanalysis_export',);
                        }

                        // ru__RG__admin_core_logistics_supplierpriceanalysis_setBasePriceForProductsFromPrice
                        if ($pathinfo === '/admin/core/logistics/supplierpriceanalysis/setBasePriceForProductsFromPrice') {
                            return array (  '_controller' => 'Core\\LogisticsBundle\\Controller\\AjaxSupplierPriceAnalysisAdminController::setBasePriceForProductsFromPriceAction',  '_sonata_admin' => 'core_manufacturer_price_analysis_admin',  '_sonata_name' => 'admin_core_logistics_supplierpriceanalysis_setBasePriceForProductsFromPrice',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_supplierpriceanalysis_setBasePriceForProductsFromPrice',);
                        }

                        // ru__RG__admin_core_logistics_supplierpriceanalysis_disableProduct
                        if ($pathinfo === '/admin/core/logistics/supplierpriceanalysis/disableProduct') {
                            return array (  '_controller' => 'Core\\LogisticsBundle\\Controller\\AjaxSupplierPriceAnalysisAdminController::disableProductAction',  '_sonata_admin' => 'core_manufacturer_price_analysis_admin',  '_sonata_name' => 'admin_core_logistics_supplierpriceanalysis_disableProduct',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_supplierpriceanalysis_disableProduct',);
                        }

                        // ru__RG__admin_core_logistics_supplierpriceanalysis_enableProduct
                        if ($pathinfo === '/admin/core/logistics/supplierpriceanalysis/enableProduct') {
                            return array (  '_controller' => 'Core\\LogisticsBundle\\Controller\\AjaxSupplierPriceAnalysisAdminController::enableProductAction',  '_sonata_admin' => 'core_manufacturer_price_analysis_admin',  '_sonata_name' => 'admin_core_logistics_supplierpriceanalysis_enableProduct',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_supplierpriceanalysis_enableProduct',);
                        }

                        // ru__RG__admin_core_logistics_supplierpriceanalysis_setMrcPriceForProductsFromPrice
                        if ($pathinfo === '/admin/core/logistics/supplierpriceanalysis/setMrcPriceForProductsFromPrice') {
                            return array (  '_controller' => 'Core\\LogisticsBundle\\Controller\\AjaxSupplierPriceAnalysisAdminController::setMrcPriceForProductsFromPriceAction',  '_sonata_admin' => 'core_manufacturer_price_analysis_admin',  '_sonata_name' => 'admin_core_logistics_supplierpriceanalysis_setMrcPriceForProductsFromPrice',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_supplierpriceanalysis_setMrcPriceForProductsFromPrice',);
                        }

                        // ru__RG__admin_core_logistics_supplierpriceanalysis_getUpdateQuantityProgress
                        if ($pathinfo === '/admin/core/logistics/supplierpriceanalysis/getUpdateQuantityProgress') {
                            return array (  '_controller' => 'Core\\LogisticsBundle\\Controller\\AjaxSupplierPriceAnalysisAdminController::getUpdateQuantityProgressAction',  '_sonata_admin' => 'core_manufacturer_price_analysis_admin',  '_sonata_name' => 'admin_core_logistics_supplierpriceanalysis_getUpdateQuantityProgress',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_supplierpriceanalysis_getUpdateQuantityProgress',);
                        }

                        if (0 === strpos($pathinfo, '/admin/core/logistics/supplierpriceanalysissettings')) {
                            // ru__RG__admin_core_logistics_supplierpriceanalysissettings_list
                            if ($pathinfo === '/admin/core/logistics/supplierpriceanalysissettings/list') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'core_manufacturer_price_analysis_settings_admin',  '_sonata_name' => 'admin_core_logistics_supplierpriceanalysissettings_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_supplierpriceanalysissettings_list',);
                            }

                            // ru__RG__admin_core_logistics_supplierpriceanalysissettings_create
                            if ($pathinfo === '/admin/core/logistics/supplierpriceanalysissettings/create') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'core_manufacturer_price_analysis_settings_admin',  '_sonata_name' => 'admin_core_logistics_supplierpriceanalysissettings_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_supplierpriceanalysissettings_create',);
                            }

                            // ru__RG__admin_core_logistics_supplierpriceanalysissettings_batch
                            if ($pathinfo === '/admin/core/logistics/supplierpriceanalysissettings/batch') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'core_manufacturer_price_analysis_settings_admin',  '_sonata_name' => 'admin_core_logistics_supplierpriceanalysissettings_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_supplierpriceanalysissettings_batch',);
                            }

                            // ru__RG__admin_core_logistics_supplierpriceanalysissettings_edit
                            if (preg_match('#^/admin/core/logistics/supplierpriceanalysissettings/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_supplierpriceanalysissettings_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'core_manufacturer_price_analysis_settings_admin',  '_sonata_name' => 'admin_core_logistics_supplierpriceanalysissettings_edit',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_logistics_supplierpriceanalysissettings_delete
                            if (preg_match('#^/admin/core/logistics/supplierpriceanalysissettings/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_supplierpriceanalysissettings_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'core_manufacturer_price_analysis_settings_admin',  '_sonata_name' => 'admin_core_logistics_supplierpriceanalysissettings_delete',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_logistics_supplierpriceanalysissettings_show
                            if (preg_match('#^/admin/core/logistics/supplierpriceanalysissettings/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_logistics_supplierpriceanalysissettings_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'core_manufacturer_price_analysis_settings_admin',  '_sonata_name' => 'admin_core_logistics_supplierpriceanalysissettings_show',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_logistics_supplierpriceanalysissettings_export
                            if ($pathinfo === '/admin/core/logistics/supplierpriceanalysissettings/export') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'core_manufacturer_price_analysis_settings_admin',  '_sonata_name' => 'admin_core_logistics_supplierpriceanalysissettings_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_logistics_supplierpriceanalysissettings_export',);
                            }

                        }

                    }

                }

                if (0 === strpos($pathinfo, '/admin/core/delivery')) {
                    if (0 === strpos($pathinfo, '/admin/core/delivery/company')) {
                        // ru__RG__admin_core_delivery_company_list
                        if ($pathinfo === '/admin/core/delivery/company/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'core_delivery_company_admin',  '_sonata_name' => 'admin_core_delivery_company_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_delivery_company_list',);
                        }

                        // ru__RG__admin_core_delivery_company_create
                        if ($pathinfo === '/admin/core/delivery/company/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'core_delivery_company_admin',  '_sonata_name' => 'admin_core_delivery_company_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_delivery_company_create',);
                        }

                        // ru__RG__admin_core_delivery_company_batch
                        if ($pathinfo === '/admin/core/delivery/company/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'core_delivery_company_admin',  '_sonata_name' => 'admin_core_delivery_company_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_delivery_company_batch',);
                        }

                        // ru__RG__admin_core_delivery_company_edit
                        if (preg_match('#^/admin/core/delivery/company/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_delivery_company_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'core_delivery_company_admin',  '_sonata_name' => 'admin_core_delivery_company_edit',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_delivery_company_delete
                        if (preg_match('#^/admin/core/delivery/company/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_delivery_company_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'core_delivery_company_admin',  '_sonata_name' => 'admin_core_delivery_company_delete',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_delivery_company_show
                        if (preg_match('#^/admin/core/delivery/company/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_delivery_company_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'core_delivery_company_admin',  '_sonata_name' => 'admin_core_delivery_company_show',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_delivery_company_export
                        if ($pathinfo === '/admin/core/delivery/company/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'core_delivery_company_admin',  '_sonata_name' => 'admin_core_delivery_company_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_delivery_company_export',);
                        }

                        // ru__RG__admin_core_delivery_company_history
                        if (preg_match('#^/admin/core/delivery/company/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_delivery_company_history')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyAction',  '_sonata_admin' => 'core_delivery_company_admin',  '_sonata_name' => 'admin_core_delivery_company_history',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_delivery_company_history_view_revision
                        if (preg_match('#^/admin/core/delivery/company/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_delivery_company_history_view_revision')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyViewRevisionAction',  '_sonata_admin' => 'core_delivery_company_admin',  '_sonata_name' => 'admin_core_delivery_company_history_view_revision',  '_locale' => 'ru',));
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/core/delivery/service')) {
                        // ru__RG__admin_core_delivery_service_list
                        if ($pathinfo === '/admin/core/delivery/service/list') {
                            return array (  '_controller' => 'Core\\DeliveryBundle\\Controller\\Admin\\ServiceAdminController::listAction',  '_sonata_admin' => 'core_delivery_services_admin',  '_sonata_name' => 'admin_core_delivery_service_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_delivery_service_list',);
                        }

                        // ru__RG__admin_core_delivery_service_create
                        if ($pathinfo === '/admin/core/delivery/service/create') {
                            return array (  '_controller' => 'Core\\DeliveryBundle\\Controller\\Admin\\ServiceAdminController::createAction',  '_sonata_admin' => 'core_delivery_services_admin',  '_sonata_name' => 'admin_core_delivery_service_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_delivery_service_create',);
                        }

                        // ru__RG__admin_core_delivery_service_batch
                        if ($pathinfo === '/admin/core/delivery/service/batch') {
                            return array (  '_controller' => 'Core\\DeliveryBundle\\Controller\\Admin\\ServiceAdminController::batchAction',  '_sonata_admin' => 'core_delivery_services_admin',  '_sonata_name' => 'admin_core_delivery_service_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_delivery_service_batch',);
                        }

                        // ru__RG__admin_core_delivery_service_edit
                        if (preg_match('#^/admin/core/delivery/service/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_delivery_service_edit')), array (  '_controller' => 'Core\\DeliveryBundle\\Controller\\Admin\\ServiceAdminController::editAction',  '_sonata_admin' => 'core_delivery_services_admin',  '_sonata_name' => 'admin_core_delivery_service_edit',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_delivery_service_delete
                        if (preg_match('#^/admin/core/delivery/service/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_delivery_service_delete')), array (  '_controller' => 'Core\\DeliveryBundle\\Controller\\Admin\\ServiceAdminController::deleteAction',  '_sonata_admin' => 'core_delivery_services_admin',  '_sonata_name' => 'admin_core_delivery_service_delete',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_delivery_service_show
                        if (preg_match('#^/admin/core/delivery/service/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_delivery_service_show')), array (  '_controller' => 'Core\\DeliveryBundle\\Controller\\Admin\\ServiceAdminController::showAction',  '_sonata_admin' => 'core_delivery_services_admin',  '_sonata_name' => 'admin_core_delivery_service_show',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_delivery_service_export
                        if ($pathinfo === '/admin/core/delivery/service/export') {
                            return array (  '_controller' => 'Core\\DeliveryBundle\\Controller\\Admin\\ServiceAdminController::exportAction',  '_sonata_admin' => 'core_delivery_services_admin',  '_sonata_name' => 'admin_core_delivery_service_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_delivery_service_export',);
                        }

                        // ru__RG__admin_core_delivery_service_history
                        if (preg_match('#^/admin/core/delivery/service/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_delivery_service_history')), array (  '_controller' => 'Core\\DeliveryBundle\\Controller\\Admin\\ServiceAdminController::historyAction',  '_sonata_admin' => 'core_delivery_services_admin',  '_sonata_name' => 'admin_core_delivery_service_history',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_delivery_service_history_view_revision
                        if (preg_match('#^/admin/core/delivery/service/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_delivery_service_history_view_revision')), array (  '_controller' => 'Core\\DeliveryBundle\\Controller\\Admin\\ServiceAdminController::historyViewRevisionAction',  '_sonata_admin' => 'core_delivery_services_admin',  '_sonata_name' => 'admin_core_delivery_service_history_view_revision',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_delivery_service_intenalCodes
                        if ($pathinfo === '/admin/core/delivery/service/internal_codes') {
                            return array (  '_controller' => 'Core\\DeliveryBundle\\Controller\\Admin\\ServiceAdminController::intenalCodesAction',  '_sonata_admin' => 'core_delivery_services_admin',  '_sonata_name' => 'admin_core_delivery_service_intenalCodes',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_delivery_service_intenalCodes',);
                        }

                        // ru__RG__admin_core_delivery_service_deliveryPrice
                        if ($pathinfo === '/admin/core/delivery/service/delivery_price') {
                            return array (  '_controller' => 'Core\\DeliveryBundle\\Controller\\Admin\\ServiceAdminController::deliveryPriceAction',  '_sonata_admin' => 'core_delivery_services_admin',  '_sonata_name' => 'admin_core_delivery_service_deliveryPrice',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_delivery_service_deliveryPrice',);
                        }

                        // ru__RG__admin_core_delivery_service_printWaybill
                        if (preg_match('#^/admin/core/delivery/service/(?P<id>[^/]++)/print_waybill$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_delivery_service_printWaybill')), array (  '_controller' => 'Core\\DeliveryBundle\\Controller\\Admin\\ServiceAdminController::printWaybillAction',  '_sonata_admin' => 'core_delivery_services_admin',  '_sonata_name' => 'admin_core_delivery_service_printWaybill',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_delivery_service_cancel
                        if ($pathinfo === '/admin/core/delivery/service/cancel_order') {
                            return array (  '_controller' => 'Core\\DeliveryBundle\\Controller\\Admin\\ServiceAdminController::cancelAction',  '_sonata_admin' => 'core_delivery_services_admin',  '_sonata_name' => 'admin_core_delivery_service_cancel',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_delivery_service_cancel',);
                        }

                        // ru__RG__admin_core_delivery_service_waybill
                        if ($pathinfo === '/admin/core/delivery/service/waybill') {
                            return array (  '_controller' => 'Core\\DeliveryBundle\\Controller\\Admin\\ServiceAdminController::waybillAction',  '_sonata_admin' => 'core_delivery_services_admin',  '_sonata_name' => 'admin_core_delivery_service_waybill',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_delivery_service_waybill',);
                        }

                        // ru__RG__admin_core_delivery_service_deliveryCity
                        if ($pathinfo === '/admin/core/delivery/service/delivery_city') {
                            return array (  '_controller' => 'Core\\DeliveryBundle\\Controller\\Admin\\ServiceAdminController::deliveryCityAction',  '_sonata_admin' => 'core_delivery_services_admin',  '_sonata_name' => 'admin_core_delivery_service_deliveryCity',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_delivery_service_deliveryCity',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/core/delivery/address')) {
                        // ru__RG__admin_core_delivery_address_list
                        if ($pathinfo === '/admin/core/delivery/address/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'core_delivery_adress_admin',  '_sonata_name' => 'admin_core_delivery_address_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_delivery_address_list',);
                        }

                        // ru__RG__admin_core_delivery_address_create
                        if ($pathinfo === '/admin/core/delivery/address/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'core_delivery_adress_admin',  '_sonata_name' => 'admin_core_delivery_address_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_delivery_address_create',);
                        }

                        // ru__RG__admin_core_delivery_address_batch
                        if ($pathinfo === '/admin/core/delivery/address/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'core_delivery_adress_admin',  '_sonata_name' => 'admin_core_delivery_address_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_delivery_address_batch',);
                        }

                        // ru__RG__admin_core_delivery_address_edit
                        if (preg_match('#^/admin/core/delivery/address/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_delivery_address_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'core_delivery_adress_admin',  '_sonata_name' => 'admin_core_delivery_address_edit',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_delivery_address_delete
                        if (preg_match('#^/admin/core/delivery/address/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_delivery_address_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'core_delivery_adress_admin',  '_sonata_name' => 'admin_core_delivery_address_delete',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_delivery_address_show
                        if (preg_match('#^/admin/core/delivery/address/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_delivery_address_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'core_delivery_adress_admin',  '_sonata_name' => 'admin_core_delivery_address_show',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_delivery_address_export
                        if ($pathinfo === '/admin/core/delivery/address/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'core_delivery_adress_admin',  '_sonata_name' => 'admin_core_delivery_address_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_delivery_address_export',);
                        }

                        // ru__RG__admin_core_delivery_address_history
                        if (preg_match('#^/admin/core/delivery/address/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_delivery_address_history')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyAction',  '_sonata_admin' => 'core_delivery_adress_admin',  '_sonata_name' => 'admin_core_delivery_address_history',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_delivery_address_history_view_revision
                        if (preg_match('#^/admin/core/delivery/address/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_delivery_address_history_view_revision')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyViewRevisionAction',  '_sonata_admin' => 'core_delivery_adress_admin',  '_sonata_name' => 'admin_core_delivery_address_history_view_revision',  '_locale' => 'ru',));
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/core/delivery/servicetype')) {
                        // ru__RG__admin_core_delivery_servicetype_list
                        if ($pathinfo === '/admin/core/delivery/servicetype/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'core_delivery_services_type_admin',  '_sonata_name' => 'admin_core_delivery_servicetype_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_delivery_servicetype_list',);
                        }

                        // ru__RG__admin_core_delivery_servicetype_create
                        if ($pathinfo === '/admin/core/delivery/servicetype/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'core_delivery_services_type_admin',  '_sonata_name' => 'admin_core_delivery_servicetype_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_delivery_servicetype_create',);
                        }

                        // ru__RG__admin_core_delivery_servicetype_batch
                        if ($pathinfo === '/admin/core/delivery/servicetype/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'core_delivery_services_type_admin',  '_sonata_name' => 'admin_core_delivery_servicetype_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_delivery_servicetype_batch',);
                        }

                        // ru__RG__admin_core_delivery_servicetype_edit
                        if (preg_match('#^/admin/core/delivery/servicetype/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_delivery_servicetype_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'core_delivery_services_type_admin',  '_sonata_name' => 'admin_core_delivery_servicetype_edit',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_delivery_servicetype_delete
                        if (preg_match('#^/admin/core/delivery/servicetype/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_delivery_servicetype_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'core_delivery_services_type_admin',  '_sonata_name' => 'admin_core_delivery_servicetype_delete',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_delivery_servicetype_show
                        if (preg_match('#^/admin/core/delivery/servicetype/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_delivery_servicetype_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'core_delivery_services_type_admin',  '_sonata_name' => 'admin_core_delivery_servicetype_show',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_delivery_servicetype_export
                        if ($pathinfo === '/admin/core/delivery/servicetype/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'core_delivery_services_type_admin',  '_sonata_name' => 'admin_core_delivery_servicetype_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_delivery_servicetype_export',);
                        }

                        // ru__RG__admin_core_delivery_servicetype_history
                        if (preg_match('#^/admin/core/delivery/servicetype/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_delivery_servicetype_history')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyAction',  '_sonata_admin' => 'core_delivery_services_type_admin',  '_sonata_name' => 'admin_core_delivery_servicetype_history',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_delivery_servicetype_history_view_revision
                        if (preg_match('#^/admin/core/delivery/servicetype/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_delivery_servicetype_history_view_revision')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyViewRevisionAction',  '_sonata_admin' => 'core_delivery_services_type_admin',  '_sonata_name' => 'admin_core_delivery_servicetype_history_view_revision',  '_locale' => 'ru',));
                        }

                    }

                }

                if (0 === strpos($pathinfo, '/admin/core/config')) {
                    if (0 === strpos($pathinfo, '/admin/core/config/config')) {
                        // ru__RG__admin_core_config_config_list
                        if ($pathinfo === '/admin/core/config/config/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'core_config_admin',  '_sonata_name' => 'admin_core_config_config_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_config_config_list',);
                        }

                        // ru__RG__admin_core_config_config_create
                        if ($pathinfo === '/admin/core/config/config/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'core_config_admin',  '_sonata_name' => 'admin_core_config_config_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_config_config_create',);
                        }

                        // ru__RG__admin_core_config_config_batch
                        if ($pathinfo === '/admin/core/config/config/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'core_config_admin',  '_sonata_name' => 'admin_core_config_config_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_config_config_batch',);
                        }

                        // ru__RG__admin_core_config_config_edit
                        if (preg_match('#^/admin/core/config/config/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_config_config_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'core_config_admin',  '_sonata_name' => 'admin_core_config_config_edit',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_config_config_delete
                        if (preg_match('#^/admin/core/config/config/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_config_config_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'core_config_admin',  '_sonata_name' => 'admin_core_config_config_delete',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_config_config_show
                        if (preg_match('#^/admin/core/config/config/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_config_config_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'core_config_admin',  '_sonata_name' => 'admin_core_config_config_show',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_config_config_export
                        if ($pathinfo === '/admin/core/config/config/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'core_config_admin',  '_sonata_name' => 'admin_core_config_config_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_config_config_export',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/core/config/group')) {
                        // ru__RG__admin_core_config_group_list
                        if ($pathinfo === '/admin/core/config/group/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'core_config_group_admin',  '_sonata_name' => 'admin_core_config_group_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_config_group_list',);
                        }

                        // ru__RG__admin_core_config_group_create
                        if ($pathinfo === '/admin/core/config/group/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'core_config_group_admin',  '_sonata_name' => 'admin_core_config_group_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_config_group_create',);
                        }

                        // ru__RG__admin_core_config_group_batch
                        if ($pathinfo === '/admin/core/config/group/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'core_config_group_admin',  '_sonata_name' => 'admin_core_config_group_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_config_group_batch',);
                        }

                        // ru__RG__admin_core_config_group_edit
                        if (preg_match('#^/admin/core/config/group/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_config_group_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'core_config_group_admin',  '_sonata_name' => 'admin_core_config_group_edit',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_config_group_delete
                        if (preg_match('#^/admin/core/config/group/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_config_group_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'core_config_group_admin',  '_sonata_name' => 'admin_core_config_group_delete',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_config_group_show
                        if (preg_match('#^/admin/core/config/group/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_config_group_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'core_config_group_admin',  '_sonata_name' => 'admin_core_config_group_show',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_config_group_export
                        if ($pathinfo === '/admin/core/config/group/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'core_config_group_admin',  '_sonata_name' => 'admin_core_config_group_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_config_group_export',);
                        }

                    }

                }

                if (0 === strpos($pathinfo, '/admin/core/manufacturer')) {
                    if (0 === strpos($pathinfo, '/admin/core/manufacturer/manufacturer')) {
                        // ru__RG__admin_core_manufacturer_manufacturer_list
                        if ($pathinfo === '/admin/core/manufacturer/manufacturer/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'core_manufacturer_admin',  '_sonata_name' => 'admin_core_manufacturer_manufacturer_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_manufacturer_manufacturer_list',);
                        }

                        // ru__RG__admin_core_manufacturer_manufacturer_create
                        if ($pathinfo === '/admin/core/manufacturer/manufacturer/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'core_manufacturer_admin',  '_sonata_name' => 'admin_core_manufacturer_manufacturer_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_manufacturer_manufacturer_create',);
                        }

                        // ru__RG__admin_core_manufacturer_manufacturer_batch
                        if ($pathinfo === '/admin/core/manufacturer/manufacturer/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'core_manufacturer_admin',  '_sonata_name' => 'admin_core_manufacturer_manufacturer_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_manufacturer_manufacturer_batch',);
                        }

                        // ru__RG__admin_core_manufacturer_manufacturer_edit
                        if (preg_match('#^/admin/core/manufacturer/manufacturer/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_manufacturer_manufacturer_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'core_manufacturer_admin',  '_sonata_name' => 'admin_core_manufacturer_manufacturer_edit',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_manufacturer_manufacturer_delete
                        if (preg_match('#^/admin/core/manufacturer/manufacturer/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_manufacturer_manufacturer_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'core_manufacturer_admin',  '_sonata_name' => 'admin_core_manufacturer_manufacturer_delete',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_manufacturer_manufacturer_show
                        if (preg_match('#^/admin/core/manufacturer/manufacturer/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_manufacturer_manufacturer_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'core_manufacturer_admin',  '_sonata_name' => 'admin_core_manufacturer_manufacturer_show',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_manufacturer_manufacturer_export
                        if ($pathinfo === '/admin/core/manufacturer/manufacturer/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'core_manufacturer_admin',  '_sonata_name' => 'admin_core_manufacturer_manufacturer_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_manufacturer_manufacturer_export',);
                        }

                        // ru__RG__admin_core_manufacturer_manufacturer_history
                        if (preg_match('#^/admin/core/manufacturer/manufacturer/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_manufacturer_manufacturer_history')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyAction',  '_sonata_admin' => 'core_manufacturer_admin',  '_sonata_name' => 'admin_core_manufacturer_manufacturer_history',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_manufacturer_manufacturer_history_view_revision
                        if (preg_match('#^/admin/core/manufacturer/manufacturer/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_manufacturer_manufacturer_history_view_revision')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyViewRevisionAction',  '_sonata_admin' => 'core_manufacturer_admin',  '_sonata_name' => 'admin_core_manufacturer_manufacturer_history_view_revision',  '_locale' => 'ru',));
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/core/manufacturer/certificate')) {
                        // ru__RG__admin_core_manufacturer_certificate_list
                        if ($pathinfo === '/admin/core/manufacturer/certificate/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'core_manufacturer_certificate_admin',  '_sonata_name' => 'admin_core_manufacturer_certificate_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_manufacturer_certificate_list',);
                        }

                        // ru__RG__admin_core_manufacturer_certificate_create
                        if ($pathinfo === '/admin/core/manufacturer/certificate/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'core_manufacturer_certificate_admin',  '_sonata_name' => 'admin_core_manufacturer_certificate_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_manufacturer_certificate_create',);
                        }

                        // ru__RG__admin_core_manufacturer_certificate_batch
                        if ($pathinfo === '/admin/core/manufacturer/certificate/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'core_manufacturer_certificate_admin',  '_sonata_name' => 'admin_core_manufacturer_certificate_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_manufacturer_certificate_batch',);
                        }

                        // ru__RG__admin_core_manufacturer_certificate_edit
                        if (preg_match('#^/admin/core/manufacturer/certificate/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_manufacturer_certificate_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'core_manufacturer_certificate_admin',  '_sonata_name' => 'admin_core_manufacturer_certificate_edit',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_manufacturer_certificate_delete
                        if (preg_match('#^/admin/core/manufacturer/certificate/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_manufacturer_certificate_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'core_manufacturer_certificate_admin',  '_sonata_name' => 'admin_core_manufacturer_certificate_delete',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_manufacturer_certificate_show
                        if (preg_match('#^/admin/core/manufacturer/certificate/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_manufacturer_certificate_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'core_manufacturer_certificate_admin',  '_sonata_name' => 'admin_core_manufacturer_certificate_show',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_manufacturer_certificate_export
                        if ($pathinfo === '/admin/core/manufacturer/certificate/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'core_manufacturer_certificate_admin',  '_sonata_name' => 'admin_core_manufacturer_certificate_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_manufacturer_certificate_export',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/core/manufacturer/series')) {
                        // ru__RG__admin_core_manufacturer_series_list
                        if ($pathinfo === '/admin/core/manufacturer/series/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'core_manufacturer_series_admin',  '_sonata_name' => 'admin_core_manufacturer_series_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_manufacturer_series_list',);
                        }

                        // ru__RG__admin_core_manufacturer_series_create
                        if ($pathinfo === '/admin/core/manufacturer/series/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'core_manufacturer_series_admin',  '_sonata_name' => 'admin_core_manufacturer_series_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_manufacturer_series_create',);
                        }

                        // ru__RG__admin_core_manufacturer_series_batch
                        if ($pathinfo === '/admin/core/manufacturer/series/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'core_manufacturer_series_admin',  '_sonata_name' => 'admin_core_manufacturer_series_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_manufacturer_series_batch',);
                        }

                        // ru__RG__admin_core_manufacturer_series_edit
                        if (preg_match('#^/admin/core/manufacturer/series/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_manufacturer_series_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'core_manufacturer_series_admin',  '_sonata_name' => 'admin_core_manufacturer_series_edit',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_manufacturer_series_delete
                        if (preg_match('#^/admin/core/manufacturer/series/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_manufacturer_series_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'core_manufacturer_series_admin',  '_sonata_name' => 'admin_core_manufacturer_series_delete',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_manufacturer_series_show
                        if (preg_match('#^/admin/core/manufacturer/series/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_manufacturer_series_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'core_manufacturer_series_admin',  '_sonata_name' => 'admin_core_manufacturer_series_show',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_manufacturer_series_export
                        if ($pathinfo === '/admin/core/manufacturer/series/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'core_manufacturer_series_admin',  '_sonata_name' => 'admin_core_manufacturer_series_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_manufacturer_series_export',);
                        }

                        // ru__RG__admin_core_manufacturer_series_history
                        if (preg_match('#^/admin/core/manufacturer/series/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_manufacturer_series_history')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyAction',  '_sonata_admin' => 'core_manufacturer_series_admin',  '_sonata_name' => 'admin_core_manufacturer_series_history',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_manufacturer_series_history_view_revision
                        if (preg_match('#^/admin/core/manufacturer/series/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_manufacturer_series_history_view_revision')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyViewRevisionAction',  '_sonata_admin' => 'core_manufacturer_series_admin',  '_sonata_name' => 'admin_core_manufacturer_series_history_view_revision',  '_locale' => 'ru',));
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/core/manufacturer/brand')) {
                        // ru__RG__admin_core_manufacturer_brand_list
                        if ($pathinfo === '/admin/core/manufacturer/brand/list') {
                            return array (  '_controller' => 'Core\\ManufacturerBundle\\Controller\\Admin\\BrandAdminController::listAction',  '_sonata_admin' => 'core_manufacturer_brand_admin',  '_sonata_name' => 'admin_core_manufacturer_brand_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_manufacturer_brand_list',);
                        }

                        // ru__RG__admin_core_manufacturer_brand_create
                        if ($pathinfo === '/admin/core/manufacturer/brand/create') {
                            return array (  '_controller' => 'Core\\ManufacturerBundle\\Controller\\Admin\\BrandAdminController::createAction',  '_sonata_admin' => 'core_manufacturer_brand_admin',  '_sonata_name' => 'admin_core_manufacturer_brand_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_manufacturer_brand_create',);
                        }

                        // ru__RG__admin_core_manufacturer_brand_batch
                        if ($pathinfo === '/admin/core/manufacturer/brand/batch') {
                            return array (  '_controller' => 'Core\\ManufacturerBundle\\Controller\\Admin\\BrandAdminController::batchAction',  '_sonata_admin' => 'core_manufacturer_brand_admin',  '_sonata_name' => 'admin_core_manufacturer_brand_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_manufacturer_brand_batch',);
                        }

                        // ru__RG__admin_core_manufacturer_brand_edit
                        if (preg_match('#^/admin/core/manufacturer/brand/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_manufacturer_brand_edit')), array (  '_controller' => 'Core\\ManufacturerBundle\\Controller\\Admin\\BrandAdminController::editAction',  '_sonata_admin' => 'core_manufacturer_brand_admin',  '_sonata_name' => 'admin_core_manufacturer_brand_edit',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_manufacturer_brand_delete
                        if (preg_match('#^/admin/core/manufacturer/brand/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_manufacturer_brand_delete')), array (  '_controller' => 'Core\\ManufacturerBundle\\Controller\\Admin\\BrandAdminController::deleteAction',  '_sonata_admin' => 'core_manufacturer_brand_admin',  '_sonata_name' => 'admin_core_manufacturer_brand_delete',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_manufacturer_brand_show
                        if (preg_match('#^/admin/core/manufacturer/brand/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_manufacturer_brand_show')), array (  '_controller' => 'Core\\ManufacturerBundle\\Controller\\Admin\\BrandAdminController::showAction',  '_sonata_admin' => 'core_manufacturer_brand_admin',  '_sonata_name' => 'admin_core_manufacturer_brand_show',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_manufacturer_brand_export
                        if ($pathinfo === '/admin/core/manufacturer/brand/export') {
                            return array (  '_controller' => 'Core\\ManufacturerBundle\\Controller\\Admin\\BrandAdminController::exportAction',  '_sonata_admin' => 'core_manufacturer_brand_admin',  '_sonata_name' => 'admin_core_manufacturer_brand_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_manufacturer_brand_export',);
                        }

                        // ru__RG__admin_core_manufacturer_brand_history
                        if (preg_match('#^/admin/core/manufacturer/brand/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_manufacturer_brand_history')), array (  '_controller' => 'Core\\ManufacturerBundle\\Controller\\Admin\\BrandAdminController::historyAction',  '_sonata_admin' => 'core_manufacturer_brand_admin',  '_sonata_name' => 'admin_core_manufacturer_brand_history',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_manufacturer_brand_history_view_revision
                        if (preg_match('#^/admin/core/manufacturer/brand/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_manufacturer_brand_history_view_revision')), array (  '_controller' => 'Core\\ManufacturerBundle\\Controller\\Admin\\BrandAdminController::historyViewRevisionAction',  '_sonata_admin' => 'core_manufacturer_brand_admin',  '_sonata_name' => 'admin_core_manufacturer_brand_history_view_revision',  '_locale' => 'ru',));
                        }

                    }

                }

                if (0 === strpos($pathinfo, '/admin/core/file')) {
                    if (0 === strpos($pathinfo, '/admin/core/file/imagefile')) {
                        // ru__RG__admin_core_file_imagefile_list
                        if ($pathinfo === '/admin/core/file/imagefile/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'core_file_image_admin',  '_sonata_name' => 'admin_core_file_imagefile_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_file_imagefile_list',);
                        }

                        // ru__RG__admin_core_file_imagefile_create
                        if ($pathinfo === '/admin/core/file/imagefile/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'core_file_image_admin',  '_sonata_name' => 'admin_core_file_imagefile_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_file_imagefile_create',);
                        }

                        // ru__RG__admin_core_file_imagefile_batch
                        if ($pathinfo === '/admin/core/file/imagefile/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'core_file_image_admin',  '_sonata_name' => 'admin_core_file_imagefile_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_file_imagefile_batch',);
                        }

                        // ru__RG__admin_core_file_imagefile_edit
                        if (preg_match('#^/admin/core/file/imagefile/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_file_imagefile_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'core_file_image_admin',  '_sonata_name' => 'admin_core_file_imagefile_edit',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_file_imagefile_delete
                        if (preg_match('#^/admin/core/file/imagefile/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_file_imagefile_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'core_file_image_admin',  '_sonata_name' => 'admin_core_file_imagefile_delete',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_file_imagefile_show
                        if (preg_match('#^/admin/core/file/imagefile/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_file_imagefile_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'core_file_image_admin',  '_sonata_name' => 'admin_core_file_imagefile_show',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_file_imagefile_export
                        if ($pathinfo === '/admin/core/file/imagefile/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'core_file_image_admin',  '_sonata_name' => 'admin_core_file_imagefile_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_file_imagefile_export',);
                        }

                        // ru__RG__admin_core_file_imagefile_history
                        if (preg_match('#^/admin/core/file/imagefile/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_file_imagefile_history')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyAction',  '_sonata_admin' => 'core_file_image_admin',  '_sonata_name' => 'admin_core_file_imagefile_history',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_file_imagefile_history_view_revision
                        if (preg_match('#^/admin/core/file/imagefile/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_file_imagefile_history_view_revision')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyViewRevisionAction',  '_sonata_admin' => 'core_file_image_admin',  '_sonata_name' => 'admin_core_file_imagefile_history_view_revision',  '_locale' => 'ru',));
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/core/file/documentfile')) {
                        // ru__RG__admin_core_file_documentfile_list
                        if ($pathinfo === '/admin/core/file/documentfile/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'core_file_document_admin',  '_sonata_name' => 'admin_core_file_documentfile_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_file_documentfile_list',);
                        }

                        // ru__RG__admin_core_file_documentfile_create
                        if ($pathinfo === '/admin/core/file/documentfile/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'core_file_document_admin',  '_sonata_name' => 'admin_core_file_documentfile_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_file_documentfile_create',);
                        }

                        // ru__RG__admin_core_file_documentfile_batch
                        if ($pathinfo === '/admin/core/file/documentfile/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'core_file_document_admin',  '_sonata_name' => 'admin_core_file_documentfile_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_file_documentfile_batch',);
                        }

                        // ru__RG__admin_core_file_documentfile_edit
                        if (preg_match('#^/admin/core/file/documentfile/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_file_documentfile_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'core_file_document_admin',  '_sonata_name' => 'admin_core_file_documentfile_edit',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_file_documentfile_delete
                        if (preg_match('#^/admin/core/file/documentfile/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_file_documentfile_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'core_file_document_admin',  '_sonata_name' => 'admin_core_file_documentfile_delete',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_file_documentfile_show
                        if (preg_match('#^/admin/core/file/documentfile/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_file_documentfile_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'core_file_document_admin',  '_sonata_name' => 'admin_core_file_documentfile_show',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_file_documentfile_export
                        if ($pathinfo === '/admin/core/file/documentfile/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'core_file_document_admin',  '_sonata_name' => 'admin_core_file_documentfile_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_file_documentfile_export',);
                        }

                        // ru__RG__admin_core_file_documentfile_history
                        if (preg_match('#^/admin/core/file/documentfile/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_file_documentfile_history')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyAction',  '_sonata_admin' => 'core_file_document_admin',  '_sonata_name' => 'admin_core_file_documentfile_history',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_file_documentfile_history_view_revision
                        if (preg_match('#^/admin/core/file/documentfile/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_file_documentfile_history_view_revision')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyViewRevisionAction',  '_sonata_admin' => 'core_file_document_admin',  '_sonata_name' => 'admin_core_file_documentfile_history_view_revision',  '_locale' => 'ru',));
                        }

                    }

                }

                if (0 === strpos($pathinfo, '/admin/core/color/color')) {
                    // ru__RG__admin_core_color_color_list
                    if ($pathinfo === '/admin/core/color/color/list') {
                        return array (  '_controller' => 'Core\\ColorBundle\\Controller\\Admin\\ColorAdminController::listAction',  '_sonata_admin' => 'core_color_admin',  '_sonata_name' => 'admin_core_color_color_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_color_color_list',);
                    }

                    // ru__RG__admin_core_color_color_create
                    if ($pathinfo === '/admin/core/color/color/create') {
                        return array (  '_controller' => 'Core\\ColorBundle\\Controller\\Admin\\ColorAdminController::createAction',  '_sonata_admin' => 'core_color_admin',  '_sonata_name' => 'admin_core_color_color_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_color_color_create',);
                    }

                    // ru__RG__admin_core_color_color_batch
                    if ($pathinfo === '/admin/core/color/color/batch') {
                        return array (  '_controller' => 'Core\\ColorBundle\\Controller\\Admin\\ColorAdminController::batchAction',  '_sonata_admin' => 'core_color_admin',  '_sonata_name' => 'admin_core_color_color_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_color_color_batch',);
                    }

                    // ru__RG__admin_core_color_color_edit
                    if (preg_match('#^/admin/core/color/color/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_color_color_edit')), array (  '_controller' => 'Core\\ColorBundle\\Controller\\Admin\\ColorAdminController::editAction',  '_sonata_admin' => 'core_color_admin',  '_sonata_name' => 'admin_core_color_color_edit',  '_locale' => 'ru',));
                    }

                    // ru__RG__admin_core_color_color_delete
                    if (preg_match('#^/admin/core/color/color/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_color_color_delete')), array (  '_controller' => 'Core\\ColorBundle\\Controller\\Admin\\ColorAdminController::deleteAction',  '_sonata_admin' => 'core_color_admin',  '_sonata_name' => 'admin_core_color_color_delete',  '_locale' => 'ru',));
                    }

                    // ru__RG__admin_core_color_color_show
                    if (preg_match('#^/admin/core/color/color/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_color_color_show')), array (  '_controller' => 'Core\\ColorBundle\\Controller\\Admin\\ColorAdminController::showAction',  '_sonata_admin' => 'core_color_admin',  '_sonata_name' => 'admin_core_color_color_show',  '_locale' => 'ru',));
                    }

                    // ru__RG__admin_core_color_color_export
                    if ($pathinfo === '/admin/core/color/color/export') {
                        return array (  '_controller' => 'Core\\ColorBundle\\Controller\\Admin\\ColorAdminController::exportAction',  '_sonata_admin' => 'core_color_admin',  '_sonata_name' => 'admin_core_color_color_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_color_color_export',);
                    }

                    // ru__RG__admin_core_color_color_history
                    if (preg_match('#^/admin/core/color/color/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_color_color_history')), array (  '_controller' => 'Core\\ColorBundle\\Controller\\Admin\\ColorAdminController::historyAction',  '_sonata_admin' => 'core_color_admin',  '_sonata_name' => 'admin_core_color_color_history',  '_locale' => 'ru',));
                    }

                    // ru__RG__admin_core_color_color_history_view_revision
                    if (preg_match('#^/admin/core/color/color/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_color_color_history_view_revision')), array (  '_controller' => 'Core\\ColorBundle\\Controller\\Admin\\ColorAdminController::historyViewRevisionAction',  '_sonata_admin' => 'core_color_admin',  '_sonata_name' => 'admin_core_color_color_history_view_revision',  '_locale' => 'ru',));
                    }

                    if (0 === strpos($pathinfo, '/admin/core/color/colorpalette')) {
                        // ru__RG__admin_core_color_colorpalette_list
                        if ($pathinfo === '/admin/core/color/colorpalette/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'core_color_pallete_admin',  '_sonata_name' => 'admin_core_color_colorpalette_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_color_colorpalette_list',);
                        }

                        // ru__RG__admin_core_color_colorpalette_create
                        if ($pathinfo === '/admin/core/color/colorpalette/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'core_color_pallete_admin',  '_sonata_name' => 'admin_core_color_colorpalette_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_color_colorpalette_create',);
                        }

                        // ru__RG__admin_core_color_colorpalette_batch
                        if ($pathinfo === '/admin/core/color/colorpalette/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'core_color_pallete_admin',  '_sonata_name' => 'admin_core_color_colorpalette_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_color_colorpalette_batch',);
                        }

                        // ru__RG__admin_core_color_colorpalette_edit
                        if (preg_match('#^/admin/core/color/colorpalette/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_color_colorpalette_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'core_color_pallete_admin',  '_sonata_name' => 'admin_core_color_colorpalette_edit',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_color_colorpalette_delete
                        if (preg_match('#^/admin/core/color/colorpalette/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_color_colorpalette_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'core_color_pallete_admin',  '_sonata_name' => 'admin_core_color_colorpalette_delete',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_color_colorpalette_show
                        if (preg_match('#^/admin/core/color/colorpalette/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_color_colorpalette_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'core_color_pallete_admin',  '_sonata_name' => 'admin_core_color_colorpalette_show',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_color_colorpalette_export
                        if ($pathinfo === '/admin/core/color/colorpalette/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'core_color_pallete_admin',  '_sonata_name' => 'admin_core_color_colorpalette_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_color_colorpalette_export',);
                        }

                    }

                }

                if (0 === strpos($pathinfo, '/admin/core/statistics')) {
                    if (0 === strpos($pathinfo, '/admin/core/statistics/statistics')) {
                        // ru__RG__admin_core_statistics_statistics_list
                        if ($pathinfo === '/admin/core/statistics/statistics/list') {
                            return array (  '_controller' => 'Core\\StatisticsBundle\\Controller\\Admin\\StatisticsAdminController::listAction',  '_sonata_admin' => 'core_statistics_admin',  '_sonata_name' => 'admin_core_statistics_statistics_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_statistics_statistics_list',);
                        }

                        // ru__RG__admin_core_statistics_statistics_create
                        if ($pathinfo === '/admin/core/statistics/statistics/create') {
                            return array (  '_controller' => 'Core\\StatisticsBundle\\Controller\\Admin\\StatisticsAdminController::createAction',  '_sonata_admin' => 'core_statistics_admin',  '_sonata_name' => 'admin_core_statistics_statistics_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_statistics_statistics_create',);
                        }

                        // ru__RG__admin_core_statistics_statistics_batch
                        if ($pathinfo === '/admin/core/statistics/statistics/batch') {
                            return array (  '_controller' => 'Core\\StatisticsBundle\\Controller\\Admin\\StatisticsAdminController::batchAction',  '_sonata_admin' => 'core_statistics_admin',  '_sonata_name' => 'admin_core_statistics_statistics_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_statistics_statistics_batch',);
                        }

                        // ru__RG__admin_core_statistics_statistics_edit
                        if (preg_match('#^/admin/core/statistics/statistics/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_statistics_statistics_edit')), array (  '_controller' => 'Core\\StatisticsBundle\\Controller\\Admin\\StatisticsAdminController::editAction',  '_sonata_admin' => 'core_statistics_admin',  '_sonata_name' => 'admin_core_statistics_statistics_edit',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_statistics_statistics_delete
                        if (preg_match('#^/admin/core/statistics/statistics/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_statistics_statistics_delete')), array (  '_controller' => 'Core\\StatisticsBundle\\Controller\\Admin\\StatisticsAdminController::deleteAction',  '_sonata_admin' => 'core_statistics_admin',  '_sonata_name' => 'admin_core_statistics_statistics_delete',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_statistics_statistics_show
                        if (preg_match('#^/admin/core/statistics/statistics/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_statistics_statistics_show')), array (  '_controller' => 'Core\\StatisticsBundle\\Controller\\Admin\\StatisticsAdminController::showAction',  '_sonata_admin' => 'core_statistics_admin',  '_sonata_name' => 'admin_core_statistics_statistics_show',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_statistics_statistics_export
                        if ($pathinfo === '/admin/core/statistics/statistics/export') {
                            return array (  '_controller' => 'Core\\StatisticsBundle\\Controller\\Admin\\StatisticsAdminController::exportAction',  '_sonata_admin' => 'core_statistics_admin',  '_sonata_name' => 'admin_core_statistics_statistics_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_statistics_statistics_export',);
                        }

                        // ru__RG__admin_core_statistics_statistics_deficitProductStatistics
                        if ($pathinfo === '/admin/core/statistics/statistics/deficitProductStatistics') {
                            return array (  '_controller' => 'Core\\StatisticsBundle\\Controller\\Admin\\StatisticsAdminController::deficitProductStatisticsAction',  '_sonata_admin' => 'core_statistics_admin',  '_sonata_name' => 'admin_core_statistics_statistics_deficitProductStatistics',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_statistics_statistics_deficitProductStatistics',);
                        }

                        // ru__RG__admin_core_statistics_statistics_inventoryStatistics
                        if ($pathinfo === '/admin/core/statistics/statistics/inventoryStatistics') {
                            return array (  '_controller' => 'Core\\StatisticsBundle\\Controller\\Admin\\StatisticsAdminController::inventoryStatisticsAction',  '_sonata_admin' => 'core_statistics_admin',  '_sonata_name' => 'admin_core_statistics_statistics_inventoryStatistics',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_statistics_statistics_inventoryStatistics',);
                        }

                        // ru__RG__admin_core_statistics_statistics_virtualUnitsStatistics
                        if ($pathinfo === '/admin/core/statistics/statistics/virtualUnitsStatistics') {
                            return array (  '_controller' => 'Core\\StatisticsBundle\\Controller\\Admin\\StatisticsAdminController::virtualUnitsStatisticsAction',  '_sonata_admin' => 'core_statistics_admin',  '_sonata_name' => 'admin_core_statistics_statistics_virtualUnitsStatistics',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_statistics_statistics_virtualUnitsStatistics',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/core/statistics/notfinishedorder')) {
                        // ru__RG__admin_core_statistics_notfinishedorder_list
                        if ($pathinfo === '/admin/core/statistics/notfinishedorder/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'core_statistics_not_finished_order_admin',  '_sonata_name' => 'admin_core_statistics_notfinishedorder_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_statistics_notfinishedorder_list',);
                        }

                        // ru__RG__admin_core_statistics_notfinishedorder_batch
                        if ($pathinfo === '/admin/core/statistics/notfinishedorder/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'core_statistics_not_finished_order_admin',  '_sonata_name' => 'admin_core_statistics_notfinishedorder_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_statistics_notfinishedorder_batch',);
                        }

                        // ru__RG__admin_core_statistics_notfinishedorder_delete
                        if (preg_match('#^/admin/core/statistics/notfinishedorder/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_statistics_notfinishedorder_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'core_statistics_not_finished_order_admin',  '_sonata_name' => 'admin_core_statistics_notfinishedorder_delete',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_statistics_notfinishedorder_show
                        if (preg_match('#^/admin/core/statistics/notfinishedorder/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_statistics_notfinishedorder_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'core_statistics_not_finished_order_admin',  '_sonata_name' => 'admin_core_statistics_notfinishedorder_show',  '_locale' => 'ru',));
                        }

                        // ru__RG__admin_core_statistics_notfinishedorder_export
                        if ($pathinfo === '/admin/core/statistics/notfinishedorder/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'core_statistics_not_finished_order_admin',  '_sonata_name' => 'admin_core_statistics_notfinishedorder_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_statistics_notfinishedorder_export',);
                        }

                    }

                }

                if (0 === strpos($pathinfo, '/admin/core/payment/payment')) {
                    if (0 === strpos($pathinfo, '/admin/core/payment/paymentsystem-')) {
                        if (0 === strpos($pathinfo, '/admin/core/payment/paymentsystem-commonpaymentsystem')) {
                            // ru__RG__admin_core_payment_paymentsystem_commonpaymentsystem_list
                            if ($pathinfo === '/admin/core/payment/paymentsystem-commonpaymentsystem/list') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'core_payment_admin_payment_system_common',  '_sonata_name' => 'admin_core_payment_paymentsystem_commonpaymentsystem_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_payment_paymentsystem_commonpaymentsystem_list',);
                            }

                            // ru__RG__admin_core_payment_paymentsystem_commonpaymentsystem_batch
                            if ($pathinfo === '/admin/core/payment/paymentsystem-commonpaymentsystem/batch') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'core_payment_admin_payment_system_common',  '_sonata_name' => 'admin_core_payment_paymentsystem_commonpaymentsystem_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_payment_paymentsystem_commonpaymentsystem_batch',);
                            }

                            // ru__RG__admin_core_payment_paymentsystem_commonpaymentsystem_edit
                            if (preg_match('#^/admin/core/payment/paymentsystem\\-commonpaymentsystem/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_payment_paymentsystem_commonpaymentsystem_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'core_payment_admin_payment_system_common',  '_sonata_name' => 'admin_core_payment_paymentsystem_commonpaymentsystem_edit',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_payment_paymentsystem_commonpaymentsystem_show
                            if (preg_match('#^/admin/core/payment/paymentsystem\\-commonpaymentsystem/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_payment_paymentsystem_commonpaymentsystem_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'core_payment_admin_payment_system_common',  '_sonata_name' => 'admin_core_payment_paymentsystem_commonpaymentsystem_show',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_payment_paymentsystem_commonpaymentsystem_export
                            if ($pathinfo === '/admin/core/payment/paymentsystem-commonpaymentsystem/export') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'core_payment_admin_payment_system_common',  '_sonata_name' => 'admin_core_payment_paymentsystem_commonpaymentsystem_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_payment_paymentsystem_commonpaymentsystem_export',);
                            }

                            // ru__RG__admin_core_payment_paymentsystem_commonpaymentsystem_history
                            if (preg_match('#^/admin/core/payment/paymentsystem\\-commonpaymentsystem/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_payment_paymentsystem_commonpaymentsystem_history')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyAction',  '_sonata_admin' => 'core_payment_admin_payment_system_common',  '_sonata_name' => 'admin_core_payment_paymentsystem_commonpaymentsystem_history',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_payment_paymentsystem_commonpaymentsystem_history_view_revision
                            if (preg_match('#^/admin/core/payment/paymentsystem\\-commonpaymentsystem/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_payment_paymentsystem_commonpaymentsystem_history_view_revision')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyViewRevisionAction',  '_sonata_admin' => 'core_payment_admin_payment_system_common',  '_sonata_name' => 'admin_core_payment_paymentsystem_commonpaymentsystem_history_view_revision',  '_locale' => 'ru',));
                            }

                        }

                        if (0 === strpos($pathinfo, '/admin/core/payment/paymentsystem-robokassasubsystem')) {
                            // ru__RG__admin_core_payment_paymentsystem_robokassasubsystem_list
                            if ($pathinfo === '/admin/core/payment/paymentsystem-robokassasubsystem/list') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'core_payment_admin_robokassa_system',  '_sonata_name' => 'admin_core_payment_paymentsystem_robokassasubsystem_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_payment_paymentsystem_robokassasubsystem_list',);
                            }

                            // ru__RG__admin_core_payment_paymentsystem_robokassasubsystem_create
                            if ($pathinfo === '/admin/core/payment/paymentsystem-robokassasubsystem/create') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'core_payment_admin_robokassa_system',  '_sonata_name' => 'admin_core_payment_paymentsystem_robokassasubsystem_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_payment_paymentsystem_robokassasubsystem_create',);
                            }

                            // ru__RG__admin_core_payment_paymentsystem_robokassasubsystem_batch
                            if ($pathinfo === '/admin/core/payment/paymentsystem-robokassasubsystem/batch') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'core_payment_admin_robokassa_system',  '_sonata_name' => 'admin_core_payment_paymentsystem_robokassasubsystem_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_payment_paymentsystem_robokassasubsystem_batch',);
                            }

                            // ru__RG__admin_core_payment_paymentsystem_robokassasubsystem_edit
                            if (preg_match('#^/admin/core/payment/paymentsystem\\-robokassasubsystem/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_payment_paymentsystem_robokassasubsystem_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'core_payment_admin_robokassa_system',  '_sonata_name' => 'admin_core_payment_paymentsystem_robokassasubsystem_edit',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_payment_paymentsystem_robokassasubsystem_delete
                            if (preg_match('#^/admin/core/payment/paymentsystem\\-robokassasubsystem/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_payment_paymentsystem_robokassasubsystem_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'core_payment_admin_robokassa_system',  '_sonata_name' => 'admin_core_payment_paymentsystem_robokassasubsystem_delete',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_payment_paymentsystem_robokassasubsystem_show
                            if (preg_match('#^/admin/core/payment/paymentsystem\\-robokassasubsystem/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_payment_paymentsystem_robokassasubsystem_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'core_payment_admin_robokassa_system',  '_sonata_name' => 'admin_core_payment_paymentsystem_robokassasubsystem_show',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_payment_paymentsystem_robokassasubsystem_export
                            if ($pathinfo === '/admin/core/payment/paymentsystem-robokassasubsystem/export') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'core_payment_admin_robokassa_system',  '_sonata_name' => 'admin_core_payment_paymentsystem_robokassasubsystem_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_payment_paymentsystem_robokassasubsystem_export',);
                            }

                            // ru__RG__admin_core_payment_paymentsystem_robokassasubsystem_history
                            if (preg_match('#^/admin/core/payment/paymentsystem\\-robokassasubsystem/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_payment_paymentsystem_robokassasubsystem_history')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyAction',  '_sonata_admin' => 'core_payment_admin_robokassa_system',  '_sonata_name' => 'admin_core_payment_paymentsystem_robokassasubsystem_history',  '_locale' => 'ru',));
                            }

                            // ru__RG__admin_core_payment_paymentsystem_robokassasubsystem_history_view_revision
                            if (preg_match('#^/admin/core/payment/paymentsystem\\-robokassasubsystem/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_payment_paymentsystem_robokassasubsystem_history_view_revision')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::historyViewRevisionAction',  '_sonata_admin' => 'core_payment_admin_robokassa_system',  '_sonata_name' => 'admin_core_payment_paymentsystem_robokassasubsystem_history_view_revision',  '_locale' => 'ru',));
                            }

                        }

                    }

                    // ru__RG__admin_core_payment_payment_list
                    if ($pathinfo === '/admin/core/payment/payment/list') {
                        return array (  '_controller' => 'Core\\PaymentBundle\\Controller\\Admin\\PaymentAdminController::listAction',  '_sonata_admin' => 'core_payment_admin',  '_sonata_name' => 'admin_core_payment_payment_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_payment_payment_list',);
                    }

                    // ru__RG__admin_core_payment_payment_create
                    if ($pathinfo === '/admin/core/payment/payment/create') {
                        return array (  '_controller' => 'Core\\PaymentBundle\\Controller\\Admin\\PaymentAdminController::createAction',  '_sonata_admin' => 'core_payment_admin',  '_sonata_name' => 'admin_core_payment_payment_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_payment_payment_create',);
                    }

                    // ru__RG__admin_core_payment_payment_batch
                    if ($pathinfo === '/admin/core/payment/payment/batch') {
                        return array (  '_controller' => 'Core\\PaymentBundle\\Controller\\Admin\\PaymentAdminController::batchAction',  '_sonata_admin' => 'core_payment_admin',  '_sonata_name' => 'admin_core_payment_payment_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_payment_payment_batch',);
                    }

                    // ru__RG__admin_core_payment_payment_edit
                    if (preg_match('#^/admin/core/payment/payment/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_payment_payment_edit')), array (  '_controller' => 'Core\\PaymentBundle\\Controller\\Admin\\PaymentAdminController::editAction',  '_sonata_admin' => 'core_payment_admin',  '_sonata_name' => 'admin_core_payment_payment_edit',  '_locale' => 'ru',));
                    }

                    // ru__RG__admin_core_payment_payment_show
                    if (preg_match('#^/admin/core/payment/payment/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_payment_payment_show')), array (  '_controller' => 'Core\\PaymentBundle\\Controller\\Admin\\PaymentAdminController::showAction',  '_sonata_admin' => 'core_payment_admin',  '_sonata_name' => 'admin_core_payment_payment_show',  '_locale' => 'ru',));
                    }

                    // ru__RG__admin_core_payment_payment_export
                    if ($pathinfo === '/admin/core/payment/payment/export') {
                        return array (  '_controller' => 'Core\\PaymentBundle\\Controller\\Admin\\PaymentAdminController::exportAction',  '_sonata_admin' => 'core_payment_admin',  '_sonata_name' => 'admin_core_payment_payment_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_payment_payment_export',);
                    }

                    // ru__RG__admin_core_payment_payment_history
                    if (preg_match('#^/admin/core/payment/payment/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_payment_payment_history')), array (  '_controller' => 'Core\\PaymentBundle\\Controller\\Admin\\PaymentAdminController::historyAction',  '_sonata_admin' => 'core_payment_admin',  '_sonata_name' => 'admin_core_payment_payment_history',  '_locale' => 'ru',));
                    }

                    // ru__RG__admin_core_payment_payment_history_view_revision
                    if (preg_match('#^/admin/core/payment/payment/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_payment_payment_history_view_revision')), array (  '_controller' => 'Core\\PaymentBundle\\Controller\\Admin\\PaymentAdminController::historyViewRevisionAction',  '_sonata_admin' => 'core_payment_admin',  '_sonata_name' => 'admin_core_payment_payment_history_view_revision',  '_locale' => 'ru',));
                    }

                }

                if (0 === strpos($pathinfo, '/admin/core/review/review')) {
                    // ru__RG__admin_core_review_review_list
                    if ($pathinfo === '/admin/core/review/review/list') {
                        return array (  '_controller' => 'Core\\ReviewBundle\\Controller\\Admin\\ReviewAdminController::listAction',  '_sonata_admin' => 'core_review_admin_review',  '_sonata_name' => 'admin_core_review_review_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_review_review_list',);
                    }

                    // ru__RG__admin_core_review_review_create
                    if ($pathinfo === '/admin/core/review/review/create') {
                        return array (  '_controller' => 'Core\\ReviewBundle\\Controller\\Admin\\ReviewAdminController::createAction',  '_sonata_admin' => 'core_review_admin_review',  '_sonata_name' => 'admin_core_review_review_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_review_review_create',);
                    }

                    // ru__RG__admin_core_review_review_batch
                    if ($pathinfo === '/admin/core/review/review/batch') {
                        return array (  '_controller' => 'Core\\ReviewBundle\\Controller\\Admin\\ReviewAdminController::batchAction',  '_sonata_admin' => 'core_review_admin_review',  '_sonata_name' => 'admin_core_review_review_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_review_review_batch',);
                    }

                    // ru__RG__admin_core_review_review_edit
                    if (preg_match('#^/admin/core/review/review/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_review_review_edit')), array (  '_controller' => 'Core\\ReviewBundle\\Controller\\Admin\\ReviewAdminController::editAction',  '_sonata_admin' => 'core_review_admin_review',  '_sonata_name' => 'admin_core_review_review_edit',  '_locale' => 'ru',));
                    }

                    // ru__RG__admin_core_review_review_delete
                    if (preg_match('#^/admin/core/review/review/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_review_review_delete')), array (  '_controller' => 'Core\\ReviewBundle\\Controller\\Admin\\ReviewAdminController::deleteAction',  '_sonata_admin' => 'core_review_admin_review',  '_sonata_name' => 'admin_core_review_review_delete',  '_locale' => 'ru',));
                    }

                    // ru__RG__admin_core_review_review_show
                    if (preg_match('#^/admin/core/review/review/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_review_review_show')), array (  '_controller' => 'Core\\ReviewBundle\\Controller\\Admin\\ReviewAdminController::showAction',  '_sonata_admin' => 'core_review_admin_review',  '_sonata_name' => 'admin_core_review_review_show',  '_locale' => 'ru',));
                    }

                    // ru__RG__admin_core_review_review_export
                    if ($pathinfo === '/admin/core/review/review/export') {
                        return array (  '_controller' => 'Core\\ReviewBundle\\Controller\\Admin\\ReviewAdminController::exportAction',  '_sonata_admin' => 'core_review_admin_review',  '_sonata_name' => 'admin_core_review_review_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_review_review_export',);
                    }

                    // ru__RG__admin_core_review_review_history
                    if (preg_match('#^/admin/core/review/review/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_review_review_history')), array (  '_controller' => 'Core\\ReviewBundle\\Controller\\Admin\\ReviewAdminController::historyAction',  '_sonata_admin' => 'core_review_admin_review',  '_sonata_name' => 'admin_core_review_review_history',  '_locale' => 'ru',));
                    }

                    // ru__RG__admin_core_review_review_history_view_revision
                    if (preg_match('#^/admin/core/review/review/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_review_review_history_view_revision')), array (  '_controller' => 'Core\\ReviewBundle\\Controller\\Admin\\ReviewAdminController::historyViewRevisionAction',  '_sonata_admin' => 'core_review_admin_review',  '_sonata_name' => 'admin_core_review_review_history_view_revision',  '_locale' => 'ru',));
                    }

                }

                if (0 === strpos($pathinfo, '/admin/core/holiday/holiday')) {
                    // ru__RG__admin_core_holiday_holiday_list
                    if ($pathinfo === '/admin/core/holiday/holiday/list') {
                        return array (  '_controller' => 'Core\\HolidayBundle\\Controller\\Admin\\HolidayAdminController::listAction',  '_sonata_admin' => 'core_holiday_admin',  '_sonata_name' => 'admin_core_holiday_holiday_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_holiday_holiday_list',);
                    }

                    // ru__RG__admin_core_holiday_holiday_create
                    if ($pathinfo === '/admin/core/holiday/holiday/create') {
                        return array (  '_controller' => 'Core\\HolidayBundle\\Controller\\Admin\\HolidayAdminController::createAction',  '_sonata_admin' => 'core_holiday_admin',  '_sonata_name' => 'admin_core_holiday_holiday_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_holiday_holiday_create',);
                    }

                    // ru__RG__admin_core_holiday_holiday_batch
                    if ($pathinfo === '/admin/core/holiday/holiday/batch') {
                        return array (  '_controller' => 'Core\\HolidayBundle\\Controller\\Admin\\HolidayAdminController::batchAction',  '_sonata_admin' => 'core_holiday_admin',  '_sonata_name' => 'admin_core_holiday_holiday_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_holiday_holiday_batch',);
                    }

                    // ru__RG__admin_core_holiday_holiday_edit
                    if (preg_match('#^/admin/core/holiday/holiday/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_holiday_holiday_edit')), array (  '_controller' => 'Core\\HolidayBundle\\Controller\\Admin\\HolidayAdminController::editAction',  '_sonata_admin' => 'core_holiday_admin',  '_sonata_name' => 'admin_core_holiday_holiday_edit',  '_locale' => 'ru',));
                    }

                    // ru__RG__admin_core_holiday_holiday_delete
                    if (preg_match('#^/admin/core/holiday/holiday/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_holiday_holiday_delete')), array (  '_controller' => 'Core\\HolidayBundle\\Controller\\Admin\\HolidayAdminController::deleteAction',  '_sonata_admin' => 'core_holiday_admin',  '_sonata_name' => 'admin_core_holiday_holiday_delete',  '_locale' => 'ru',));
                    }

                    // ru__RG__admin_core_holiday_holiday_show
                    if (preg_match('#^/admin/core/holiday/holiday/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_holiday_holiday_show')), array (  '_controller' => 'Core\\HolidayBundle\\Controller\\Admin\\HolidayAdminController::showAction',  '_sonata_admin' => 'core_holiday_admin',  '_sonata_name' => 'admin_core_holiday_holiday_show',  '_locale' => 'ru',));
                    }

                    // ru__RG__admin_core_holiday_holiday_export
                    if ($pathinfo === '/admin/core/holiday/holiday/export') {
                        return array (  '_controller' => 'Core\\HolidayBundle\\Controller\\Admin\\HolidayAdminController::exportAction',  '_sonata_admin' => 'core_holiday_admin',  '_sonata_name' => 'admin_core_holiday_holiday_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_holiday_holiday_export',);
                    }

                    // ru__RG__admin_core_holiday_holiday_history
                    if (preg_match('#^/admin/core/holiday/holiday/(?P<id>[^/]++)/history$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_holiday_holiday_history')), array (  '_controller' => 'Core\\HolidayBundle\\Controller\\Admin\\HolidayAdminController::historyAction',  '_sonata_admin' => 'core_holiday_admin',  '_sonata_name' => 'admin_core_holiday_holiday_history',  '_locale' => 'ru',));
                    }

                    // ru__RG__admin_core_holiday_holiday_history_view_revision
                    if (preg_match('#^/admin/core/holiday/holiday/(?P<id>[^/]++)/history/(?P<revision>[^/]++)/view$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_holiday_holiday_history_view_revision')), array (  '_controller' => 'Core\\HolidayBundle\\Controller\\Admin\\HolidayAdminController::historyViewRevisionAction',  '_sonata_admin' => 'core_holiday_admin',  '_sonata_name' => 'admin_core_holiday_holiday_history_view_revision',  '_locale' => 'ru',));
                    }

                }

                if (0 === strpos($pathinfo, '/admin/core/officeworktime/schedule')) {
                    // ru__RG__admin_core_officeworktime_schedule_list
                    if ($pathinfo === '/admin/core/officeworktime/schedule/list') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'office_work_time_admin',  '_sonata_name' => 'admin_core_officeworktime_schedule_list',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_officeworktime_schedule_list',);
                    }

                    // ru__RG__admin_core_officeworktime_schedule_create
                    if ($pathinfo === '/admin/core/officeworktime/schedule/create') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'office_work_time_admin',  '_sonata_name' => 'admin_core_officeworktime_schedule_create',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_officeworktime_schedule_create',);
                    }

                    // ru__RG__admin_core_officeworktime_schedule_batch
                    if ($pathinfo === '/admin/core/officeworktime/schedule/batch') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'office_work_time_admin',  '_sonata_name' => 'admin_core_officeworktime_schedule_batch',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_officeworktime_schedule_batch',);
                    }

                    // ru__RG__admin_core_officeworktime_schedule_edit
                    if (preg_match('#^/admin/core/officeworktime/schedule/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_officeworktime_schedule_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'office_work_time_admin',  '_sonata_name' => 'admin_core_officeworktime_schedule_edit',  '_locale' => 'ru',));
                    }

                    // ru__RG__admin_core_officeworktime_schedule_delete
                    if (preg_match('#^/admin/core/officeworktime/schedule/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_officeworktime_schedule_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'office_work_time_admin',  '_sonata_name' => 'admin_core_officeworktime_schedule_delete',  '_locale' => 'ru',));
                    }

                    // ru__RG__admin_core_officeworktime_schedule_show
                    if (preg_match('#^/admin/core/officeworktime/schedule/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__admin_core_officeworktime_schedule_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'office_work_time_admin',  '_sonata_name' => 'admin_core_officeworktime_schedule_show',  '_locale' => 'ru',));
                    }

                    // ru__RG__admin_core_officeworktime_schedule_export
                    if ($pathinfo === '/admin/core/officeworktime/schedule/export') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'office_work_time_admin',  '_sonata_name' => 'admin_core_officeworktime_schedule_export',  '_locale' => 'ru',  '_route' => 'ru__RG__admin_core_officeworktime_schedule_export',);
                    }

                }

            }

        }

        if (0 === strpos($pathinfo, '/logout.html')) {
            // ru__RG__sonata_user_admin_security_logout
            if ($pathinfo === '/logout.html') {
                return array (  '_controller' => 'Sonata\\UserBundle\\Controller\\AdminSecurityController::logoutAction',  '_locale' => 'ru',  '_route' => 'ru__RG__sonata_user_admin_security_logout',);
            }

            // _logout
            if ($pathinfo === '/logout.html') {
                return array('_route' => '_logout');
            }

        }

        // ru__RG__core_common_test
        if ($pathinfo === '/test') {
            $requiredSchemes = array (  'http' => 0,);
            if (!isset($requiredSchemes[$this->context->getScheme()])) {
                return $this->redirect($pathinfo, 'ru__RG__core_common_test', key($requiredSchemes));
            }

            return array (  '_controller' => 'CoreCommonBundle:Test:index',  '_locale' => 'ru',  '_route' => 'ru__RG__core_common_test',);
        }

        // ru__RG__core_common_index
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'ru__RG__core_common_index');
            }

            $requiredSchemes = array (  'http' => 0,);
            if (!isset($requiredSchemes[$this->context->getScheme()])) {
                return $this->redirect($pathinfo, 'ru__RG__core_common_index', key($requiredSchemes));
            }

            return array (  '_controller' => 'Core\\CommonBundle\\Controller\\PagesController::indexAction',  '_locale' => 'ru',  '_route' => 'ru__RG__core_common_index',);
        }

        if (0 === strpos($pathinfo, '/a')) {
            // ru__RG__core_common_ajax_entity
            if ($pathinfo === '/admin/ajax/entity/get/data') {
                return array (  '_controller' => 'Core\\CommonBundle\\Controller\\AjaxEntityController::getDataAction',  '_locale' => 'ru',  '_route' => 'ru__RG__core_common_ajax_entity',);
            }

            // ru__RG__core_common_ajax_entity_frontend
            if ($pathinfo === '/ajax/search.json') {
                $requiredSchemes = array (  'http' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'ru__RG__core_common_ajax_entity_frontend', key($requiredSchemes));
                }

                return array (  '_controller' => 'Core\\CommonBundle\\Controller\\AjaxEntityController::getDataAction',  '_locale' => 'ru',  '_route' => 'ru__RG__core_common_ajax_entity_frontend',);
            }

        }

        if (0 === strpos($pathinfo, '/search')) {
            // ru__RG__core_common_search_first_page
            if ($pathinfo === '/search.html') {
                $requiredSchemes = array (  'http' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'ru__RG__core_common_search_first_page', key($requiredSchemes));
                }

                return array (  '_controller' => 'Core\\CommonBundle\\Controller\\PagesController::searchAction',  '_locale' => 'ru',  '_route' => 'ru__RG__core_common_search_first_page',);
            }

            // ru__RG__core_common_search
            if (0 === strpos($pathinfo, '/search/page') && preg_match('#^/search/page\\-(?P<page>\\d+)\\.html$#s', $pathinfo, $matches)) {
                $requiredSchemes = array (  'http' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'ru__RG__core_common_search', key($requiredSchemes));
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__core_common_search')), array (  '_controller' => 'Core\\CommonBundle\\Controller\\PagesController::searchAction',  '_locale' => 'ru',));
            }

        }

        // ru__RG__core_common_about
        if ($pathinfo === '/about.html') {
            $requiredSchemes = array (  'http' => 0,);
            if (!isset($requiredSchemes[$this->context->getScheme()])) {
                return $this->redirect($pathinfo, 'ru__RG__core_common_about', key($requiredSchemes));
            }

            return array (  '_controller' => 'Core\\CommonBundle\\Controller\\PagesController::aboutAction',  '_locale' => 'ru',  '_route' => 'ru__RG__core_common_about',);
        }

        // ru__RG__core_common_privacy_policies
        if ($pathinfo === '/privacy_policies.html') {
            $requiredSchemes = array (  'http' => 0,);
            if (!isset($requiredSchemes[$this->context->getScheme()])) {
                return $this->redirect($pathinfo, 'ru__RG__core_common_privacy_policies', key($requiredSchemes));
            }

            return array (  '_controller' => 'Core\\CommonBundle\\Controller\\PagesController::privacyPoliciesAction',  '_locale' => 'ru',  '_route' => 'ru__RG__core_common_privacy_policies',);
        }

        // ru__RG__auth_receiver
        if ($pathinfo === '/auth/receiver.html') {
            $requiredSchemes = array (  'http' => 0,);
            if (!isset($requiredSchemes[$this->context->getScheme()])) {
                return $this->redirect($pathinfo, 'ru__RG__auth_receiver', key($requiredSchemes));
            }

            return array (  '_controller' => 'Core\\CommonBundle\\Controller\\PagesController::receiverAction',  '_locale' => 'ru',  '_route' => 'ru__RG__auth_receiver',);
        }

        // ru__RG__trouble_ticket_contact
        if ($pathinfo === '/contacts.html') {
            $requiredSchemes = array (  'http' => 0,);
            if (!isset($requiredSchemes[$this->context->getScheme()])) {
                return $this->redirect($pathinfo, 'ru__RG__trouble_ticket_contact', key($requiredSchemes));
            }

            return array (  '_controller' => 'Core\\TroubleTicketBundle\\Controller\\TroubleTicketController::contactAction',  '_locale' => 'ru',  '_route' => 'ru__RG__trouble_ticket_contact',);
        }

        // ru__RG__test_action_cron
        if ($pathinfo === '/test-cron.html') {
            $requiredSchemes = array (  'http' => 0,);
            if (!isset($requiredSchemes[$this->context->getScheme()])) {
                return $this->redirect($pathinfo, 'ru__RG__test_action_cron', key($requiredSchemes));
            }

            return array (  '_controller' => 'Core\\CommonBundle\\Controller\\PagesController::testAction',  '_locale' => 'ru',  '_route' => 'ru__RG__test_action_cron',);
        }

        if (0 === strpos($pathinfo, '/ajax')) {
            // ru__RG__core_file_ajax_upload_file
            if ($pathinfo === '/ajax/upload_file') {
                return array (  '_controller' => 'Core\\FileBundle\\Controller\\AjaxFileController::UploadFileAction',  '_locale' => 'ru',  '_route' => 'ru__RG__core_file_ajax_upload_file',);
            }

            if (0 === strpos($pathinfo, '/ajax/re')) {
                // ru__RG__core_file_ajax_replace_image
                if ($pathinfo === '/ajax/replace_image') {
                    return array (  '_controller' => 'Core\\FileBundle\\Controller\\AjaxFileController::ReplaceImageAction',  '_locale' => 'ru',  '_route' => 'ru__RG__core_file_ajax_replace_image',);
                }

                // ru__RG__core_file_ajax_remove_file
                if ($pathinfo === '/ajax/remove_file') {
                    return array (  '_controller' => 'Core\\FileBundle\\Controller\\AjaxFileController::AjaxRemoveFileAction',  '_locale' => 'ru',  '_route' => 'ru__RG__core_file_ajax_remove_file',);
                }

            }

            // ru__RG__core_file_ajax_google_api_add
            if ($pathinfo === '/ajax/google_api/add.json') {
                return array (  '_controller' => 'Core\\FileBundle\\Controller\\AjaxFileController::googleApiAddAction',  '_locale' => 'ru',  '_route' => 'ru__RG__core_file_ajax_google_api_add',);
            }

        }

        if (0 === strpos($pathinfo, '/e')) {
            // ru__RG__ef_connect
            if ($pathinfo === '/efconnect') {
                return array (  '_controller' => 'FM\\ElfinderBundle\\Controller\\ElfinderController::loadAction',  '_locale' => 'ru',  '_route' => 'ru__RG__ef_connect',);
            }

            // ru__RG__elfinder
            if ($pathinfo === '/elfinder') {
                return array (  '_controller' => 'FM\\ElfinderBundle\\Controller\\ElfinderController::showAction',  '_locale' => 'ru',  '_route' => 'ru__RG__elfinder',);
            }

        }

        if (0 === strpos($pathinfo, '/trouble-tickets')) {
            if (0 === strpos($pathinfo, '/trouble-tickets/index')) {
                // ru__RG__trouble_ticket_index
                if (preg_match('#^/trouble\\-tickets/index\\-(?P<owner>[^/\\.]++)\\.html$#s', $pathinfo, $matches)) {
                    $requiredSchemes = array (  'http' => 0,);
                    if (!isset($requiredSchemes[$this->context->getScheme()])) {
                        return $this->redirect($pathinfo, 'ru__RG__trouble_ticket_index', key($requiredSchemes));
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__trouble_ticket_index')), array (  '_controller' => 'Core\\TroubleTicketBundle\\Controller\\TroubleTicketController::indexAction',  '_locale' => 'ru',));
                }

                // ru__RG__trouble_ticket_index_auth
                if ($pathinfo === '/trouble-tickets/index.html') {
                    $requiredSchemes = array (  'http' => 0,);
                    if (!isset($requiredSchemes[$this->context->getScheme()])) {
                        return $this->redirect($pathinfo, 'ru__RG__trouble_ticket_index_auth', key($requiredSchemes));
                    }

                    return array (  '_controller' => 'Core\\TroubleTicketBundle\\Controller\\TroubleTicketController::indexAction',  '_locale' => 'ru',  '_route' => 'ru__RG__trouble_ticket_index_auth',);
                }

            }

            // ru__RG__trouble_ticket_log
            if (0 === strpos($pathinfo, '/trouble-tickets/log') && preg_match('#^/trouble\\-tickets/log/(?P<id>[^/\\.]++)\\.html$#s', $pathinfo, $matches)) {
                $requiredSchemes = array (  'http' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'ru__RG__trouble_ticket_log', key($requiredSchemes));
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__trouble_ticket_log')), array (  '_controller' => 'Core\\TroubleTicketBundle\\Controller\\TroubleTicketController::logAction',  '_locale' => 'ru',));
            }

            if (0 === strpos($pathinfo, '/trouble-tickets/contacts')) {
                // ru__RG__trouble_ticket_contact_with_order_id
                if (0 === strpos($pathinfo, '/trouble-tickets/contacts/order') && preg_match('#^/trouble\\-tickets/contacts/order/(?P<order_id>\\d+)\\.html$#s', $pathinfo, $matches)) {
                    $requiredSchemes = array (  'http' => 0,);
                    if (!isset($requiredSchemes[$this->context->getScheme()])) {
                        return $this->redirect($pathinfo, 'ru__RG__trouble_ticket_contact_with_order_id', key($requiredSchemes));
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__trouble_ticket_contact_with_order_id')), array (  '_controller' => 'Core\\TroubleTicketBundle\\Controller\\TroubleTicketController::contactAction',  '_locale' => 'ru',));
                }

                // ru__RG__trouble_ticket_contact_with_product_id
                if (0 === strpos($pathinfo, '/trouble-tickets/contacts/product') && preg_match('#^/trouble\\-tickets/contacts/product/(?P<product_id>\\d+)\\.html$#s', $pathinfo, $matches)) {
                    $requiredSchemes = array (  'http' => 0,);
                    if (!isset($requiredSchemes[$this->context->getScheme()])) {
                        return $this->redirect($pathinfo, 'ru__RG__trouble_ticket_contact_with_product_id', key($requiredSchemes));
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__trouble_ticket_contact_with_product_id')), array (  '_controller' => 'Core\\TroubleTicketBundle\\Controller\\TroubleTicketController::contactAction',  '_locale' => 'ru',));
                }

            }

            // ru__RG__trouble_ticket_edit
            if (0 === strpos($pathinfo, '/trouble-tickets/edit') && preg_match('#^/trouble\\-tickets/edit\\-(?P<hash>[^/\\.]++)\\.html$#s', $pathinfo, $matches)) {
                $requiredSchemes = array (  'http' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'ru__RG__trouble_ticket_edit', key($requiredSchemes));
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__trouble_ticket_edit')), array (  '_controller' => 'Core\\TroubleTicketBundle\\Controller\\TroubleTicketController::editAction',  '_locale' => 'ru',));
            }

            // ru__RG__trouble_ticket_read
            if (0 === strpos($pathinfo, '/trouble-tickets/read') && preg_match('#^/trouble\\-tickets/read\\-(?P<hash>[^/\\.]++)\\.html$#s', $pathinfo, $matches)) {
                $requiredSchemes = array (  'http' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'ru__RG__trouble_ticket_read', key($requiredSchemes));
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__trouble_ticket_read')), array (  '_controller' => 'Core\\TroubleTicketBundle\\Controller\\AjaxTroubleTicketController::readAction',  '_locale' => 'ru',));
            }

            // ru__RG__trouble_ticket_close
            if (0 === strpos($pathinfo, '/trouble-tickets/close') && preg_match('#^/trouble\\-tickets/close\\-(?P<id>[^/\\.]++)\\.html$#s', $pathinfo, $matches)) {
                $requiredSchemes = array (  'http' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'ru__RG__trouble_ticket_close', key($requiredSchemes));
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__trouble_ticket_close')), array (  '_controller' => 'Core\\TroubleTicketBundle\\Controller\\AjaxTroubleTicketController::closeAction',  '_locale' => 'ru',));
            }

        }

        if (0 === strpos($pathinfo, '/admin')) {
            if (0 === strpos($pathinfo, '/admin/s')) {
                // ru__RG__switch_language
                if (0 === strpos($pathinfo, '/admin/switchlanguage') && preg_match('#^/admin/switchlanguage/(?P<activeLanguage>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__switch_language')), array (  '_controller' => 'Core\\LanguageBundle\\Controller\\LanguageController::switchLanguageAction',  '_locale' => 'ru',));
                }

                // ru__RG__set_record_to_union
                if ($pathinfo === '/admin/set_record_to_union') {
                    $requiredSchemes = array (  'https' => 0,);
                    if (!isset($requiredSchemes[$this->context->getScheme()])) {
                        return $this->redirect($pathinfo, 'ru__RG__set_record_to_union', key($requiredSchemes));
                    }

                    return array (  '_controller' => 'Core\\UnionBundle\\Controller\\AjaxUnionController::setRecordToUnionAction',  '_locale' => 'ru',  '_route' => 'ru__RG__set_record_to_union',);
                }

            }

            // ru__RG__unset_record_from_union
            if ($pathinfo === '/admin/unset_record_from_union') {
                $requiredSchemes = array (  'https' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'ru__RG__unset_record_from_union', key($requiredSchemes));
                }

                return array (  '_controller' => 'Core\\UnionBundle\\Controller\\AjaxUnionController::unsetRecordFromUnionAction',  '_locale' => 'ru',  '_route' => 'ru__RG__unset_record_from_union',);
            }

            if (0 === strpos($pathinfo, '/admin/product_')) {
                // ru__RG__product_modification_create
                if ($pathinfo === '/admin/product_modification_create') {
                    $requiredSchemes = array (  'https' => 0,);
                    if (!isset($requiredSchemes[$this->context->getScheme()])) {
                        return $this->redirect($pathinfo, 'ru__RG__product_modification_create', key($requiredSchemes));
                    }

                    return array (  '_controller' => 'Core\\ProductBundle\\Controller\\ProductModificationController::createProductModificationAction',  '_locale' => 'ru',  '_route' => 'ru__RG__product_modification_create',);
                }

                // ru__RG__product_dublicate_create
                if ($pathinfo === '/admin/product_dublicate_create') {
                    $requiredSchemes = array (  'https' => 0,);
                    if (!isset($requiredSchemes[$this->context->getScheme()])) {
                        return $this->redirect($pathinfo, 'ru__RG__product_dublicate_create', key($requiredSchemes));
                    }

                    return array (  '_controller' => 'Core\\ProductBundle\\Controller\\ProductModificationController::createProductDublicateAction',  '_locale' => 'ru',  '_route' => 'ru__RG__product_dublicate_create',);
                }

            }

            // ru__RG__set_record_to_modification
            if ($pathinfo === '/admin/set_record_to_modification') {
                $requiredSchemes = array (  'https' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'ru__RG__set_record_to_modification', key($requiredSchemes));
                }

                return array (  '_controller' => 'Core\\ProductBundle\\Controller\\ProductModificationController::setRecordToModificationAction',  '_locale' => 'ru',  '_route' => 'ru__RG__set_record_to_modification',);
            }

            // ru__RG__unset_record_from_modification
            if ($pathinfo === '/admin/unset_record_from_modification') {
                $requiredSchemes = array (  'https' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'ru__RG__unset_record_from_modification', key($requiredSchemes));
                }

                return array (  '_controller' => 'Core\\ProductBundle\\Controller\\ProductModificationController::unsetRecordFromModificationAction',  '_locale' => 'ru',  '_route' => 'ru__RG__unset_record_from_modification',);
            }

            if (0 === strpos($pathinfo, '/admin/core_product_')) {
                if (0 === strpos($pathinfo, '/admin/core_product_upload_')) {
                    // ru__RG__core_product_upload_price_file
                    if ($pathinfo === '/admin/core_product_upload_price_file.html') {
                        $requiredSchemes = array (  'https' => 0,);
                        if (!isset($requiredSchemes[$this->context->getScheme()])) {
                            return $this->redirect($pathinfo, 'ru__RG__core_product_upload_price_file', key($requiredSchemes));
                        }

                        return array (  '_controller' => 'Core\\ProductBundle\\Controller\\AjaxProductController::uploadPriceFileAction',  '_locale' => 'ru',  '_route' => 'ru__RG__core_product_upload_price_file',);
                    }

                    // ru__RG__core_product_upload_check_status
                    if ($pathinfo === '/admin/core_product_upload_check_status.html') {
                        $requiredSchemes = array (  'https' => 0,);
                        if (!isset($requiredSchemes[$this->context->getScheme()])) {
                            return $this->redirect($pathinfo, 'ru__RG__core_product_upload_check_status', key($requiredSchemes));
                        }

                        return array (  '_controller' => 'Core\\ProductBundle\\Controller\\AjaxProductController::uploadPriceFileCheckStatusAction',  '_locale' => 'ru',  '_route' => 'ru__RG__core_product_upload_check_status',);
                    }

                }

                if (0 === strpos($pathinfo, '/admin/core_product_yml_generator_')) {
                    // ru__RG__core_product_yml_generator_start
                    if ($pathinfo === '/admin/core_product_yml_generator_start.html') {
                        $requiredSchemes = array (  'https' => 0,);
                        if (!isset($requiredSchemes[$this->context->getScheme()])) {
                            return $this->redirect($pathinfo, 'ru__RG__core_product_yml_generator_start', key($requiredSchemes));
                        }

                        return array (  '_controller' => 'Core\\ProductBundle\\Controller\\AjaxProductController::ymlGeneratorStartAction',  '_locale' => 'ru',  '_route' => 'ru__RG__core_product_yml_generator_start',);
                    }

                    // ru__RG__core_product_yml_generator_check_status
                    if ($pathinfo === '/admin/core_product_yml_generator_check_status.html') {
                        $requiredSchemes = array (  'https' => 0,);
                        if (!isset($requiredSchemes[$this->context->getScheme()])) {
                            return $this->redirect($pathinfo, 'ru__RG__core_product_yml_generator_check_status', key($requiredSchemes));
                        }

                        return array (  '_controller' => 'Core\\ProductBundle\\Controller\\AjaxProductController::ymlGeneratorCheckStatusAction',  '_locale' => 'ru',  '_route' => 'ru__RG__core_product_yml_generator_check_status',);
                    }

                }

            }

        }

        // ru__RG__gregwar_captcha.generate_captcha
        if (0 === strpos($pathinfo, '/generate-captcha') && preg_match('#^/generate\\-captcha/(?P<key>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__gregwar_captcha.generate_captcha')), array (  '_controller' => 'Gregwar\\CaptchaBundle\\Controller\\CaptchaController::generateCaptchaAction',  '_locale' => 'ru',));
        }

        if (0 === strpos($pathinfo, '/catalog')) {
            // ru__RG__core_shop_product_catalog
            if (preg_match('#^/catalog/(?P<slug>.+)/(?P<page>\\d+)\\.html$#s', $pathinfo, $matches)) {
                $requiredSchemes = array (  'http' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'ru__RG__core_shop_product_catalog', key($requiredSchemes));
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__core_shop_product_catalog')), array (  '_controller' => 'Core\\ProductBundle\\Controller\\ProductController::categoryAction',  'page' => 1,  '_locale' => 'ru',));
            }

            // ru__RG__core_shop_product_catalog_first_page
            if (preg_match('#^/catalog/(?P<slug>.+)\\.html$#s', $pathinfo, $matches)) {
                $requiredSchemes = array (  'http' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'ru__RG__core_shop_product_catalog_first_page', key($requiredSchemes));
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__core_shop_product_catalog_first_page')), array (  '_controller' => 'Core\\ProductBundle\\Controller\\ProductController::categoryAction',  '_locale' => 'ru',));
            }

        }

        if (0 === strpos($pathinfo, '/vendors')) {
            // ru__RG__core_shop_product_brand_series
            if (preg_match('#^/vendors/(?P<slug>.+)/series/(?P<slugSeries>.+)/(?P<page>\\d+)\\.html$#s', $pathinfo, $matches)) {
                $requiredSchemes = array (  'http' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'ru__RG__core_shop_product_brand_series', key($requiredSchemes));
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__core_shop_product_brand_series')), array (  '_controller' => 'Core\\ProductBundle\\Controller\\ProductController::brandAndSeriesAction',  'page' => 1,  '_locale' => 'ru',));
            }

            // ru__RG__core_shop_product_brand_series_first_page
            if (preg_match('#^/vendors/(?P<slug>.+)/series/(?P<slugSeries>.+)\\.html$#s', $pathinfo, $matches)) {
                $requiredSchemes = array (  'http' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'ru__RG__core_shop_product_brand_series_first_page', key($requiredSchemes));
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__core_shop_product_brand_series_first_page')), array (  '_controller' => 'Core\\ProductBundle\\Controller\\ProductController::brandAndSeriesAction',  '_locale' => 'ru',));
            }

            // ru__RG__core_shop_product_brand
            if (preg_match('#^/vendors/(?P<slug>.+)/(?P<page>\\d+)\\.html$#s', $pathinfo, $matches)) {
                $requiredSchemes = array (  'http' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'ru__RG__core_shop_product_brand', key($requiredSchemes));
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__core_shop_product_brand')), array (  '_controller' => 'Core\\ProductBundle\\Controller\\ProductController::brandAction',  'page' => 1,  '_locale' => 'ru',));
            }

            // ru__RG__core_shop_product_brand_first_page
            if (preg_match('#^/vendors/(?P<slug>.+)\\.html$#s', $pathinfo, $matches)) {
                $requiredSchemes = array (  'http' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'ru__RG__core_shop_product_brand_first_page', key($requiredSchemes));
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__core_shop_product_brand_first_page')), array (  '_controller' => 'Core\\ProductBundle\\Controller\\ProductController::brandAction',  '_locale' => 'ru',));
            }

        }

        // ru__RG__core_product
        if (0 === strpos($pathinfo, '/products') && preg_match('#^/products/(?P<slug>.+)\\.html$#s', $pathinfo, $matches)) {
            $requiredSchemes = array (  'http' => 0,);
            if (!isset($requiredSchemes[$this->context->getScheme()])) {
                return $this->redirect($pathinfo, 'ru__RG__core_product', key($requiredSchemes));
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__core_product')), array (  '_controller' => 'Core\\ProductBundle\\Controller\\ProductController::productAction',  '_locale' => 'ru',));
        }

        if (0 === strpos($pathinfo, '/a')) {
            if (0 === strpos($pathinfo, '/ajax/products')) {
                // ru__RG__core_product_update_favorites
                if (0 === strpos($pathinfo, '/ajax/products/favorites') && preg_match('#^/ajax/products/favorites/(?P<action>add|remove)/(?P<id>\\d+)\\.(?P<_format>json)$#s', $pathinfo, $matches)) {
                    $requiredSchemes = array (  'http' => 0,);
                    if (!isset($requiredSchemes[$this->context->getScheme()])) {
                        return $this->redirect($pathinfo, 'ru__RG__core_product_update_favorites', key($requiredSchemes));
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__core_product_update_favorites')), array (  '_controller' => 'Core\\ProductBundle\\Controller\\AjaxProductController::updateFavoritesAction',  '_locale' => 'ru',));
                }

                // ru__RG__core_product_update_cart
                if ($pathinfo === '/ajax/products/cart.json') {
                    $requiredSchemes = array (  'http' => 0,);
                    if (!isset($requiredSchemes[$this->context->getScheme()])) {
                        return $this->redirect($pathinfo, 'ru__RG__core_product_update_cart', key($requiredSchemes));
                    }

                    return array (  '_controller' => 'Core\\ProductBundle\\Controller\\AjaxProductController::updateCartAction',  '_locale' => 'ru',  '_route' => 'ru__RG__core_product_update_cart',);
                }

                // ru__RG__core_product_subscribe_to_report
                if ($pathinfo === '/ajax/products/subscribe_to_report.json') {
                    $requiredSchemes = array (  'http' => 0,);
                    if (!isset($requiredSchemes[$this->context->getScheme()])) {
                        return $this->redirect($pathinfo, 'ru__RG__core_product_subscribe_to_report', key($requiredSchemes));
                    }

                    return array (  '_controller' => 'Core\\ProductBundle\\Controller\\AjaxProductController::subscribeToReportAction',  '_locale' => 'ru',  '_route' => 'ru__RG__core_product_subscribe_to_report',);
                }

                // ru__RG__core_product_get_date_and_count_for_nearest_supply
                if ($pathinfo === '/ajax/products/get_date_and_count_for_nearest_suply.json') {
                    $requiredSchemes = array (  'http' => 0,);
                    if (!isset($requiredSchemes[$this->context->getScheme()])) {
                        return $this->redirect($pathinfo, 'ru__RG__core_product_get_date_and_count_for_nearest_supply', key($requiredSchemes));
                    }

                    return array (  '_controller' => 'Core\\ProductBundle\\Controller\\AjaxProductController::getDateAndCountForNearestSupplyAction',  '_locale' => 'ru',  '_route' => 'ru__RG__core_product_get_date_and_count_for_nearest_supply',);
                }

            }

            if (0 === strpos($pathinfo, '/admin/a')) {
                if (0 === strpos($pathinfo, '/admin/audit')) {
                    // ru__RG__simple_things_entity_audit_home
                    if (preg_match('#^/admin/audit(?:/(?P<page>\\d+))?$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__simple_things_entity_audit_home')), array (  '_controller' => 'SimpleThings\\EntityAudit\\Controller\\AuditController::indexAction',  'page' => 1,  '_locale' => 'ru',));
                    }

                    if (0 === strpos($pathinfo, '/admin/audit/view')) {
                        // ru__RG__simple_things_entity_audit_viewrevision
                        if (0 === strpos($pathinfo, '/admin/audit/viewrev') && preg_match('#^/admin/audit/viewrev/(?P<rev>\\d+)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__simple_things_entity_audit_viewrevision')), array (  '_controller' => 'SimpleThings\\EntityAudit\\Controller\\AuditController::viewRevisionAction',  '_locale' => 'ru',));
                        }

                        if (0 === strpos($pathinfo, '/admin/audit/viewent')) {
                            // ru__RG__simple_things_entity_audit_viewentity_detail
                            if (preg_match('#^/admin/audit/viewent/(?P<className>[^/]++)/(?P<id>[^/]++)/(?P<rev>\\d+)$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__simple_things_entity_audit_viewentity_detail')), array (  '_controller' => 'SimpleThings\\EntityAudit\\Controller\\AuditController::viewDetailAction',  '_locale' => 'ru',));
                            }

                            // ru__RG__simple_things_entity_audit_viewentity
                            if (preg_match('#^/admin/audit/viewent/(?P<className>[^/]++)/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__simple_things_entity_audit_viewentity')), array (  '_controller' => 'SimpleThings\\EntityAudit\\Controller\\AuditController::viewEntityAction',  '_locale' => 'ru',));
                            }

                        }

                    }

                    // ru__RG__simple_things_entity_audit_compare
                    if (0 === strpos($pathinfo, '/admin/audit/compare') && preg_match('#^/admin/audit/compare/(?P<className>[^/]++)/(?P<id>[^/]++)(?:/(?P<oldRev>[^/]++)(?:/(?P<newRev>[^/]++))?)?$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__simple_things_entity_audit_compare')), array (  '_controller' => 'SimpleThings\\EntityAudit\\Controller\\AuditController::compareAction',  'oldRev' => NULL,  'newRev' => NULL,  '_locale' => 'ru',));
                    }

                }

                if (0 === strpos($pathinfo, '/admin/ajax/ge')) {
                    // ru__RG__core_statistics_ajax_get_chart_price_history
                    if ($pathinfo === '/admin/ajax/get_chart_price_history') {
                        $requiredSchemes = array (  'https' => 0,);
                        if (!isset($requiredSchemes[$this->context->getScheme()])) {
                            return $this->redirect($pathinfo, 'ru__RG__core_statistics_ajax_get_chart_price_history', key($requiredSchemes));
                        }

                        return array (  '_controller' => 'Core\\StatisticsBundle\\Controller\\AjaxAdminStatisticsController::getChartPriceHistoryAction',  '_locale' => 'ru',  '_route' => 'ru__RG__core_statistics_ajax_get_chart_price_history',);
                    }

                    // ru__RG__core_statistics_generate_inventory
                    if ($pathinfo === '/admin/ajax/generate_inventory') {
                        $requiredSchemes = array (  'https' => 0,);
                        if (!isset($requiredSchemes[$this->context->getScheme()])) {
                            return $this->redirect($pathinfo, 'ru__RG__core_statistics_generate_inventory', key($requiredSchemes));
                        }

                        return array (  '_controller' => 'Core\\StatisticsBundle\\Controller\\AjaxAdminStatisticsController::generateInventoryStatisticsAction',  '_locale' => 'ru',  '_route' => 'ru__RG__core_statistics_generate_inventory',);
                    }

                    // ru__RG__core_statistics_get_audit_information
                    if ($pathinfo === '/admin/ajax/get_audit_information') {
                        $requiredSchemes = array (  'https' => 0,);
                        if (!isset($requiredSchemes[$this->context->getScheme()])) {
                            return $this->redirect($pathinfo, 'ru__RG__core_statistics_get_audit_information', key($requiredSchemes));
                        }

                        return array (  '_controller' => 'Core\\StatisticsBundle\\Controller\\AjaxAdminStatisticsController::getAuditInformationAction',  '_locale' => 'ru',  '_route' => 'ru__RG__core_statistics_get_audit_information',);
                    }

                }

            }

        }

        if (0 === strpos($pathinfo, '/faq')) {
            // ru__RG__core_faq_homepage
            if ($pathinfo === '/faq.html') {
                $requiredSchemes = array (  'http' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'ru__RG__core_faq_homepage', key($requiredSchemes));
                }

                return array (  '_controller' => 'Core\\FaqBundle\\Controller\\FaqController::indexAction',  '_locale' => 'ru',  '_route' => 'ru__RG__core_faq_homepage',);
            }

            // ru__RG__core_faq_search
            if ($pathinfo === '/faq/search.html') {
                $requiredSchemes = array (  'http' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'ru__RG__core_faq_search', key($requiredSchemes));
                }

                return array (  '_controller' => 'Core\\FaqBundle\\Controller\\FaqController::searchAction',  '_locale' => 'ru',  '_route' => 'ru__RG__core_faq_search',);
            }

            // ru__RG__core_faq_article
            if (preg_match('#^/faq/(?P<categorySlug>[a-z0-9\\- _/]+)/(?P<articleSlug>[a-z0-9\\- _/]+)\\.html$#s', $pathinfo, $matches)) {
                $requiredSchemes = array (  'http' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'ru__RG__core_faq_article', key($requiredSchemes));
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__core_faq_article')), array (  '_controller' => 'Core\\FaqBundle\\Controller\\FaqController::articleAction',  '_locale' => 'ru',));
            }

            // ru__RG__core_faq_article_rate
            if (preg_match('#^/faq/(?P<categorySlug>[a-z0-9\\- _/]+)/artilce\\-(?P<article_slug>[^/]++)/rate\\.html$#s', $pathinfo, $matches)) {
                $requiredSchemes = array (  'http' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'ru__RG__core_faq_article_rate', key($requiredSchemes));
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__core_faq_article_rate')), array (  '_controller' => 'Core\\FaqBundle\\Controller\\FaqController::articleRateAction',  '_locale' => 'ru',));
            }

            // ru__RG__core_faq_category
            if (preg_match('#^/faq/(?P<categorySlug>[a-z0-9\\- _/]+)\\.html$#s', $pathinfo, $matches)) {
                $requiredSchemes = array (  'http' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'ru__RG__core_faq_category', key($requiredSchemes));
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__core_faq_category')), array (  '_controller' => 'Core\\FaqBundle\\Controller\\FaqController::categoryAction',  '_locale' => 'ru',));
            }

        }

        if (0 === strpos($pathinfo, '/admin/c')) {
            if (0 === strpos($pathinfo, '/admin/core_')) {
                // ru__RG__core_logistics_delete_book_from_transit
                if ($pathinfo === '/admin/core_logistics_delete_book_from_transit') {
                    $requiredSchemes = array (  'https' => 0,);
                    if (!isset($requiredSchemes[$this->context->getScheme()])) {
                        return $this->redirect($pathinfo, 'ru__RG__core_logistics_delete_book_from_transit', key($requiredSchemes));
                    }

                    return array (  '_controller' => 'Core\\LogisticsBundle\\Controller\\AjaxLogisticsAdminController::deleteBookFromTransitAction',  '_locale' => 'ru',  '_route' => 'ru__RG__core_logistics_delete_book_from_transit',);
                }

                if (0 === strpos($pathinfo, '/admin/core_order_')) {
                    // ru__RG__core_order_add_to_transit
                    if ($pathinfo === '/admin/core_order_add_to_transit') {
                        $requiredSchemes = array (  'https' => 0,);
                        if (!isset($requiredSchemes[$this->context->getScheme()])) {
                            return $this->redirect($pathinfo, 'ru__RG__core_order_add_to_transit', key($requiredSchemes));
                        }

                        return array (  '_controller' => 'Core\\OrderBundle\\Controller\\AdminAjaxOrderController::addProductToTransitAction',  '_locale' => 'ru',  '_route' => 'ru__RG__core_order_add_to_transit',);
                    }

                    // ru__RG__core_order_update_serials
                    if ($pathinfo === '/admin/core_order_update_serials') {
                        $requiredSchemes = array (  'https' => 0,);
                        if (!isset($requiredSchemes[$this->context->getScheme()])) {
                            return $this->redirect($pathinfo, 'ru__RG__core_order_update_serials', key($requiredSchemes));
                        }

                        return array (  '_controller' => 'Core\\OrderBundle\\Controller\\AdminAjaxOrderController::updateSerialsAction',  '_locale' => 'ru',  '_route' => 'ru__RG__core_order_update_serials',);
                    }

                    // ru__RG__core_order_get_contragent_receipments
                    if ($pathinfo === '/admin/core_order_get_contragent_receipments') {
                        $requiredSchemes = array (  'https' => 0,);
                        if (!isset($requiredSchemes[$this->context->getScheme()])) {
                            return $this->redirect($pathinfo, 'ru__RG__core_order_get_contragent_receipments', key($requiredSchemes));
                        }

                        return array (  '_controller' => 'Core\\OrderBundle\\Controller\\AdminAjaxOrderController::getContragentReceipmentsAction',  '_locale' => 'ru',  '_route' => 'ru__RG__core_order_get_contragent_receipments',);
                    }

                }

                if (0 === strpos($pathinfo, '/admin/core_pre_order_')) {
                    // ru__RG__core_pre_order_get
                    if ($pathinfo === '/admin/core_pre_order_get') {
                        $requiredSchemes = array (  'https' => 0,);
                        if (!isset($requiredSchemes[$this->context->getScheme()])) {
                            return $this->redirect($pathinfo, 'ru__RG__core_pre_order_get', key($requiredSchemes));
                        }

                        return array (  '_controller' => 'Core\\OrderBundle\\Controller\\AdminAjaxPreOrderController::getPreOrdersAction',  '_locale' => 'ru',  '_route' => 'ru__RG__core_pre_order_get',);
                    }

                    // ru__RG__core_pre_order_combine
                    if ($pathinfo === '/admin/core_pre_order_combine') {
                        $requiredSchemes = array (  'https' => 0,);
                        if (!isset($requiredSchemes[$this->context->getScheme()])) {
                            return $this->redirect($pathinfo, 'ru__RG__core_pre_order_combine', key($requiredSchemes));
                        }

                        return array (  '_controller' => 'Core\\OrderBundle\\Controller\\AdminAjaxPreOrderController::combinePreOrdersAction',  '_locale' => 'ru',  '_route' => 'ru__RG__core_pre_order_combine',);
                    }

                }

            }

            // ru__RG__core_order_create_new_supply
            if ($pathinfo === '/admin/create_new_supply') {
                $requiredSchemes = array (  'https' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'ru__RG__core_order_create_new_supply', key($requiredSchemes));
                }

                return array (  '_controller' => 'Core\\OrderBundle\\Controller\\AdminAjaxOrderController::createNewSupplyAction',  '_locale' => 'ru',  '_route' => 'ru__RG__core_order_create_new_supply',);
            }

        }

        if (0 === strpos($pathinfo, '/cart')) {
            // ru__RG__core_order_cart
            if ($pathinfo === '/cart.html') {
                $requiredSchemes = array (  'http' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'ru__RG__core_order_cart', key($requiredSchemes));
                }

                return array (  '_controller' => 'Core\\OrderBundle\\Controller\\OrderController::step1Action',  '_locale' => 'ru',  '_route' => 'ru__RG__core_order_cart',);
            }

            if (0 === strpos($pathinfo, '/cart/step')) {
                // ru__RG__core_order_cart_step2
                if ($pathinfo === '/cart/step2.html') {
                    $requiredSchemes = array (  'http' => 0,);
                    if (!isset($requiredSchemes[$this->context->getScheme()])) {
                        return $this->redirect($pathinfo, 'ru__RG__core_order_cart_step2', key($requiredSchemes));
                    }

                    return array (  '_controller' => 'Core\\OrderBundle\\Controller\\OrderController::buyerInfoAction',  '_locale' => 'ru',  '_route' => 'ru__RG__core_order_cart_step2',);
                }

                if (0 === strpos($pathinfo, '/cart/step3')) {
                    // ru__RG__core_order_cart_step3
                    if ($pathinfo === '/cart/step3.html') {
                        $requiredSchemes = array (  'http' => 0,);
                        if (!isset($requiredSchemes[$this->context->getScheme()])) {
                            return $this->redirect($pathinfo, 'ru__RG__core_order_cart_step3', key($requiredSchemes));
                        }

                        return array (  '_controller' => 'Core\\OrderBundle\\Controller\\OrderController::deliveryAction',  '_locale' => 'ru',  '_route' => 'ru__RG__core_order_cart_step3',);
                    }

                    // ru__RG__core_order_cart_step3_5
                    if ($pathinfo === '/cart/step3_5.html') {
                        $requiredSchemes = array (  'http' => 0,);
                        if (!isset($requiredSchemes[$this->context->getScheme()])) {
                            return $this->redirect($pathinfo, 'ru__RG__core_order_cart_step3_5', key($requiredSchemes));
                        }

                        return array (  '_controller' => 'Core\\OrderBundle\\Controller\\OrderController::step3_5Action',  '_locale' => 'ru',  '_route' => 'ru__RG__core_order_cart_step3_5',);
                    }

                }

                // ru__RG__core_order_cart_step4
                if ($pathinfo === '/cart/step4.html') {
                    $requiredSchemes = array (  'http' => 0,);
                    if (!isset($requiredSchemes[$this->context->getScheme()])) {
                        return $this->redirect($pathinfo, 'ru__RG__core_order_cart_step4', key($requiredSchemes));
                    }

                    return array (  '_controller' => 'Core\\OrderBundle\\Controller\\OrderController::step4Action',  '_locale' => 'ru',  '_route' => 'ru__RG__core_order_cart_step4',);
                }

            }

            if (0 === strpos($pathinfo, '/cart/finish')) {
                // ru__RG__core_order_finish
                if (preg_match('#^/cart/finish/(?P<paymentSystem>WebMoney|BankTransfer|Qiwi|YandexMoney|PlasticCard|Robokassa|PaymentOnDelivery|PayPal|PlasticCardTerminal)\\.html$#s', $pathinfo, $matches)) {
                    $requiredSchemes = array (  'http' => 0,);
                    if (!isset($requiredSchemes[$this->context->getScheme()])) {
                        return $this->redirect($pathinfo, 'ru__RG__core_order_finish', key($requiredSchemes));
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__core_order_finish')), array (  '_controller' => 'Core\\OrderBundle\\Controller\\OrderController::finishAction',  '_locale' => 'ru',));
                }

                // ru__RG__core_order_finish_with_payment_id
                if (preg_match('#^/cart/finish/(?P<paymentSystem>WebMoney|BankTransfer|Qiwi|YandexMoney|PlasticCard|Robokassa|PaymentOnDelivery|PayPal|PlasticCardTerminal)/(?P<id>\\d+)\\.html$#s', $pathinfo, $matches)) {
                    $requiredSchemes = array (  'http' => 0,);
                    if (!isset($requiredSchemes[$this->context->getScheme()])) {
                        return $this->redirect($pathinfo, 'ru__RG__core_order_finish_with_payment_id', key($requiredSchemes));
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__core_order_finish_with_payment_id')), array (  '_controller' => 'Core\\OrderBundle\\Controller\\OrderController::finishAction',  '_locale' => 'ru',));
                }

                // ru__RG__core_order_finish_with_order_id
                if (preg_match('#^/cart/finish/(?P<paymentSystem>Balance|PaymentOnDelivery)/(?P<orderId>[^/\\.]++)\\.html$#s', $pathinfo, $matches)) {
                    $requiredSchemes = array (  'http' => 0,);
                    if (!isset($requiredSchemes[$this->context->getScheme()])) {
                        return $this->redirect($pathinfo, 'ru__RG__core_order_finish_with_order_id', key($requiredSchemes));
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__core_order_finish_with_order_id')), array (  '_controller' => 'Core\\OrderBundle\\Controller\\OrderController::finishAction',  '_locale' => 'ru',));
                }

            }

        }

        if (0 === strpos($pathinfo, '/ajax')) {
            // ru__RG__core_order_contact
            if ($pathinfo === '/ajax/cart_contact.json') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_ru__RG__core_order_contact;
                }

                $requiredSchemes = array (  'http' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'ru__RG__core_order_contact', key($requiredSchemes));
                }

                return array (  '_controller' => 'Core\\OrderBundle\\Controller\\OrderController::contactAction',  '_locale' => 'ru',  '_route' => 'ru__RG__core_order_contact',);
            }
            not_ru__RG__core_order_contact:

            if (0 === strpos($pathinfo, '/ajax/products')) {
                // ru__RG__core_product_buy_by_order
                if ($pathinfo === '/ajax/products/buy_by_order.json') {
                    $requiredSchemes = array (  'http' => 0,);
                    if (!isset($requiredSchemes[$this->context->getScheme()])) {
                        return $this->redirect($pathinfo, 'ru__RG__core_product_buy_by_order', key($requiredSchemes));
                    }

                    return array (  '_controller' => 'Core\\OrderBundle\\Controller\\AjaxOrderController::buyByOrderAction',  '_locale' => 'ru',  '_route' => 'ru__RG__core_product_buy_by_order',);
                }

                // ru__RG__core_pre_order_cost
                if ($pathinfo === '/ajax/products/pre_order_cost.json') {
                    return array (  '_controller' => 'Core\\OrderBundle\\Controller\\AjaxOrderController::preOrderCostAction',  '_locale' => 'ru',  '_route' => 'ru__RG__core_pre_order_cost',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/payment')) {
            // ru__RG__core_payment_back_redirect_result
            if (0 === strpos($pathinfo, '/payment/feedback') && preg_match('#^/payment/feedback/(?P<paymentSystem>WebMoney|BankTransfer|Qiwi|YandexMoney|PlasticCard|Robokassa|PaymentOnDelivery|PayPal|PlasticCardTerminal)\\.html$#s', $pathinfo, $matches)) {
                $requiredSchemes = array (  'http' => 0,  'https' => 1,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'ru__RG__core_payment_back_redirect_result', key($requiredSchemes));
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__core_payment_back_redirect_result')), array (  '_controller' => 'Core\\PaymentBundle\\Controller\\PaymentSystemController::doPassedAction',  '_locale' => 'ru',));
            }

            // ru__RG__core_payment_bank_transfer_print_invoice
            if (0 === strpos($pathinfo, '/payment/bank_transfer/print') && preg_match('#^/payment/bank_transfer/print/(?P<type>invoice|savings_bank)/(?P<id>\\d+)\\.html$#s', $pathinfo, $matches)) {
                $requiredSchemes = array (  'http' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'ru__RG__core_payment_bank_transfer_print_invoice', key($requiredSchemes));
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__core_payment_bank_transfer_print_invoice')), array (  '_controller' => 'Core\\PaymentBundle\\Controller\\PaymentSystemController::bankTransferPrintAction',  '_locale' => 'ru',));
            }

        }

        // ru__RG__delivery_index
        if ($pathinfo === '/delivery') {
            $requiredSchemes = array (  'http' => 0,);
            if (!isset($requiredSchemes[$this->context->getScheme()])) {
                return $this->redirect($pathinfo, 'ru__RG__delivery_index', key($requiredSchemes));
            }

            return array (  '_controller' => 'Core\\DeliveryBundle\\Controller\\DeliveryController::indexAction',  '_locale' => 'ru',  '_route' => 'ru__RG__delivery_index',);
        }

        if (0 === strpos($pathinfo, '/ajax')) {
            // ru__RG__delivery_calculate
            if ($pathinfo === '/ajax/delivery.json') {
                $requiredSchemes = array (  'http' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'ru__RG__delivery_calculate', key($requiredSchemes));
                }

                return array (  '_controller' => 'Core\\DeliveryBundle\\Controller\\DeliveryController::calculateAction',  '_locale' => 'ru',  '_route' => 'ru__RG__delivery_calculate',);
            }

            // ru__RG__delivery_product_calculate
            if ($pathinfo === '/ajax/procduct/delivery.json') {
                $requiredSchemes = array (  'http' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'ru__RG__delivery_product_calculate', key($requiredSchemes));
                }

                return array (  '_controller' => 'Core\\DeliveryBundle\\Controller\\DeliveryController::calculateProductAction',  '_locale' => 'ru',  '_route' => 'ru__RG__delivery_product_calculate',);
            }

        }

        // ru__RG__delivery_print_waybill
        if (0 === strpos($pathinfo, '/delivery/print-waybill') && preg_match('#^/delivery/print\\-waybill\\-(?P<hash>[^/\\.]++)\\.html$#s', $pathinfo, $matches)) {
            $requiredSchemes = array (  'https' => 0,);
            if (!isset($requiredSchemes[$this->context->getScheme()])) {
                return $this->redirect($pathinfo, 'ru__RG__delivery_print_waybill', key($requiredSchemes));
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__delivery_print_waybill')), array (  '_controller' => 'Core\\DeliveryBundle\\Controller\\DeliveryController::printWaybillAction',  '_locale' => 'ru',));
        }

        // ru__RG__core_directrory_product_tags
        if ($pathinfo === '/product_tags') {
            $requiredSchemes = array (  'https' => 0,);
            if (!isset($requiredSchemes[$this->context->getScheme()])) {
                return $this->redirect($pathinfo, 'ru__RG__core_directrory_product_tags', key($requiredSchemes));
            }

            return array (  '_controller' => 'Core\\DirectoryBundle\\Controller\\AjaxProductTagsController::getAutocompleteAction',  '_locale' => 'ru',  '_route' => 'ru__RG__core_directrory_product_tags',);
        }

        // ru__RG__core_review_send
        if ($pathinfo === '/review/send.html') {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_ru__RG__core_review_send;
            }

            $requiredSchemes = array (  'http' => 0,);
            if (!isset($requiredSchemes[$this->context->getScheme()])) {
                return $this->redirect($pathinfo, 'ru__RG__core_review_send', key($requiredSchemes));
            }

            return array (  '_controller' => 'Core\\ReviewBundle\\Controller\\ReviewController::sendAction',  '_locale' => 'ru',  '_route' => 'ru__RG__core_review_send',);
        }
        not_ru__RG__core_review_send:

        if (0 === strpos($pathinfo, '/ajax/review')) {
            // ru__RG__core_review_rate_ajax
            if ($pathinfo === '/ajax/review/rate.json') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_ru__RG__core_review_rate_ajax;
                }

                $requiredSchemes = array (  'http' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'ru__RG__core_review_rate_ajax', key($requiredSchemes));
                }

                return array (  '_controller' => 'Core\\ReviewBundle\\Controller\\AjaxReviewController::rateAction',  '_locale' => 'ru',  '_route' => 'ru__RG__core_review_rate_ajax',);
            }
            not_ru__RG__core_review_rate_ajax:

            // ru__RG__core_review_view_more_ajax
            if ($pathinfo === '/ajax/review/view/more.json') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_ru__RG__core_review_view_more_ajax;
                }

                $requiredSchemes = array (  'http' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'ru__RG__core_review_view_more_ajax', key($requiredSchemes));
                }

                return array (  '_controller' => 'Core\\ReviewBundle\\Controller\\AjaxReviewController::viewMoreAction',  '_locale' => 'ru',  '_route' => 'ru__RG__core_review_view_more_ajax',);
            }
            not_ru__RG__core_review_view_more_ajax:

            // ru__RG__core_review_change_sort_or_filter_ajax
            if ($pathinfo === '/ajax/review/change/sort.json') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_ru__RG__core_review_change_sort_or_filter_ajax;
                }

                $requiredSchemes = array (  'http' => 0,);
                if (!isset($requiredSchemes[$this->context->getScheme()])) {
                    return $this->redirect($pathinfo, 'ru__RG__core_review_change_sort_or_filter_ajax', key($requiredSchemes));
                }

                return array (  '_controller' => 'Core\\ReviewBundle\\Controller\\AjaxReviewController::changeSortOrFilterAction',  '_locale' => 'ru',  '_route' => 'ru__RG__core_review_change_sort_or_filter_ajax',);
            }
            not_ru__RG__core_review_change_sort_or_filter_ajax:

        }

        if (0 === strpos($pathinfo, '/shtumi_')) {
            // ru__RG__shtumi_ajaxautocomplete
            if ($pathinfo === '/shtumi_ajaxautocomplete') {
                return array (  '_controller' => 'Shtumi\\UsefulBundle\\Controller\\AjaxAutocompleteJSONController::getJSONAction',  '_locale' => 'ru',  '_route' => 'ru__RG__shtumi_ajaxautocomplete',);
            }

            // ru__RG__shtumi_select2_entity
            if ($pathinfo === '/shtumi_select2_entity') {
                return array (  '_controller' => 'Shtumi\\UsefulBundle\\Controller\\Select2EntityController::getJSONAction',  '_locale' => 'ru',  '_route' => 'ru__RG__shtumi_select2_entity',);
            }

            // ru__RG__shtumi_ajaxfileupload
            if ($pathinfo === '/shtumi_ajaxfileupload') {
                return array (  '_controller' => 'Shtumi\\UsefulBundle\\Controller\\AjaxFileController::uploadAction',  '_locale' => 'ru',  '_route' => 'ru__RG__shtumi_ajaxfileupload',);
            }

            if (0 === strpos($pathinfo, '/shtumi_dependent_filtered_')) {
                // ru__RG__shtumi_dependent_filtered_entity
                if ($pathinfo === '/shtumi_dependent_filtered_entity') {
                    return array (  '_controller' => 'ShtumiUsefulBundle:DependentFilteredEntity:getOptions',  '_locale' => 'ru',  '_route' => 'ru__RG__shtumi_dependent_filtered_entity',);
                }

                // ru__RG__shtumi_dependent_filtered_select2
                if ($pathinfo === '/shtumi_dependent_filtered_select2') {
                    return array (  '_controller' => 'Shtumi\\UsefulBundle\\Controller\\DependentFilteredEntityController::getJsonAction',  '_locale' => 'ru',  '_route' => 'ru__RG__shtumi_dependent_filtered_select2',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/admin/monitor/health')) {
            // ru__RG__liip_monitor_health_interface
            if (rtrim($pathinfo, '/') === '/admin/monitor/health') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'ru__RG__liip_monitor_health_interface');
                }

                return array (  '_controller' => 'liip_monitor.health_controller:indexAction',  '_locale' => 'ru',  '_route' => 'ru__RG__liip_monitor_health_interface',);
            }

            // ru__RG__liip_monitor_list_checks
            if ($pathinfo === '/admin/monitor/health/checks') {
                return array (  '_controller' => 'liip_monitor.health_controller:listAction',  '_locale' => 'ru',  '_route' => 'ru__RG__liip_monitor_list_checks',);
            }

            if (0 === strpos($pathinfo, '/admin/monitor/health/run')) {
                // ru__RG__liip_monitor_run_all_checks
                if ($pathinfo === '/admin/monitor/health/run') {
                    return array (  '_controller' => 'liip_monitor.health_controller:runAllChecksAction',  '_locale' => 'ru',  '_route' => 'ru__RG__liip_monitor_run_all_checks',);
                }

                // ru__RG__liip_monitor_run_single_check
                if (preg_match('#^/admin/monitor/health/run/(?P<checkId>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__liip_monitor_run_single_check')), array (  '_controller' => 'liip_monitor.health_controller:runSingleCheckAction',  '_locale' => 'ru',));
                }

            }

        }

        if (0 === strpos($pathinfo, '/sitemap')) {
            // ru__RG__PrestaSitemapBundle_index
            if (preg_match('#^/sitemap\\.(?P<_format>xml)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__PrestaSitemapBundle_index')), array (  '_controller' => 'Presta\\SitemapBundle\\Controller\\SitemapController::indexAction',  '_locale' => 'ru',));
            }

            // ru__RG__PrestaSitemapBundle_section
            if (preg_match('#^/sitemap\\.(?P<name>[^/\\.]++)\\.(?P<_format>xml)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ru__RG__PrestaSitemapBundle_section')), array (  '_controller' => 'Presta\\SitemapBundle\\Controller\\SitemapController::sectionAction',  '_locale' => 'ru',));
            }

        }

        // ru__RG__core_slug_history_editor_ajax
        if ($pathinfo === '/admin/ajax/slug_history/editor.json') {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_ru__RG__core_slug_history_editor_ajax;
            }

            $requiredSchemes = array (  'https' => 0,);
            if (!isset($requiredSchemes[$this->context->getScheme()])) {
                return $this->redirect($pathinfo, 'ru__RG__core_slug_history_editor_ajax', key($requiredSchemes));
            }

            return array (  '_controller' => 'Core\\SlugHistoryBundle\\Controller\\AdminAjaxSlugHistoryController::editorSlugAction',  '_locale' => 'ru',  '_route' => 'ru__RG__core_slug_history_editor_ajax',);
        }
        not_ru__RG__core_slug_history_editor_ajax:

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
