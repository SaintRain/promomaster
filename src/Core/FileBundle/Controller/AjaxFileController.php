<?php

/**
 * Контроллер файлов, обрабатывает ajax-запросы
 *
 * @author Sergeev A.M.
 * @copyright LLC "PromoMaster"
 */

namespace Core\FileBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Core\FileBundle\FileBundleEvents;
use Core\FileBundle\Event\FileEvent;

class AjaxFileController extends Controller
{

    /**
     * Загрузка картинки
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \Symfony\Component\HttpFoundation\Response - json объект
     */
    public function UploadFileAction(Request $request)
    {

        // подключаем сервис
        $logic = $this->get('core_file_logic');

        // вызываем метод загрузки картинок
        $response = $logic->uploadFile($request);

        // включаем диспатчер и активируем подписчиков
        /** @var $dispatcher \Symfony\Component\EventDispatcher\EventDispatcherInterface */
        $dispatcher = $this->container->get('event_dispatcher');

        $dispatcher->dispatch(FileBundleEvents::FILE_UPLOAD, new FileEvent($response));

        return new Response(json_encode($response));
    }

    /**
     * Замена картинки
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \Symfony\Component\HttpFoundation\Response - json объект
     */
    public function ReplaceImageAction(Request $request)
    {

        // подключаем сервис
        $logic = $this->get('core_file_logic');

        // вызываем метод замены картинок
        $response = $logic->replaceImage($request);

        return new Response(json_encode($response));
    }

    /**
     * Удаление файлов
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \Symfony\Component\HttpFoundation\Response - json объект
     */
    public function AjaxRemoveFileAction(Request $request)
    {

        // подключаем сервис
        $logic = $this->get('core_file_logic');

        // вызываем метод замены картинок
        $response = $logic->ajaxRemoveFile($request);

        // включаем диспатчер и активируем подписчиков
        /** @var $dispatcher \Symfony\Component\EventDispatcher\EventDispatcherInterface */
        $dispatcher = $this->container->get('event_dispatcher');

        $dispatcher->dispatch(FileBundleEvents::FILE_DELETE, new FileEvent($response));

        return new Response(json_encode($response));
    }

    /**
     * Добавление файлов через Google Api Search Images
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \Symfony\Component\HttpFoundation\Response - json объект
     */
    public function googleApiAddAction(Request $request)
    {
        // подключаем сервис
        $logic = $this->get('core_file_logic');

        // вызываем метод замены картинок
        $response = $logic->googleApiAdd($request);

        return new Response(json_encode($response));
    }

}
