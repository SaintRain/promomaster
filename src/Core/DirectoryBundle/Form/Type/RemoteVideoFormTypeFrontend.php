<?php

/**
 * Форма для видео с хостингов фронтенд
 *
 * @author  Kaluzhniy. N.
 * @copyright LLC "PromoMaster"
 */

namespace Core\DirectoryBundle\Form\Type;

class RemoteVideoFormTypeFrontend extends RemoteVideoFormType
{
    public function getName()
    {
        return 'remote_video_form_frontend';
    }
}