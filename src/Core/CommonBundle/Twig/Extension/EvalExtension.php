<?php

/**
 * Twig расширение для генерации шаблона из строки {{ eval('...')}}
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\CommonBundle\Twig\Extension;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\HttpKernel;

class EvalExtension extends \Twig_Extension
{
    private $twig;

    function __construct($twig)
    {
        $this->twig = $twig;
    }

    public function getFunctions()
    {
        return array(
            'eval' => new \Twig_Function_Method($this, 'evaluateString', array(
                'needs_context' => true,
            )),
        );
    }

    /**
     * Loads a string template and returns the rendered version
     *
     * @param  array $context
     * @param  string $string The string template to load
     * @return string
     */
    public function evaluateString($context, $string)
    {
        $twig = clone $this->twig;
        $twig->setLoader(new \Twig_Loader_String());
        return $twig->render($string, $context);
    }


    public function getName()
    {
        return 'eval_extension';
    }

}
