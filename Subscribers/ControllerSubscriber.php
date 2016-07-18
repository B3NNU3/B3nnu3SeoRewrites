<?php

namespace B3nnu3SeoRewrites\Subscribers;

use Enlight\Event\SubscriberInterface;

class ControllerSubscriber implements SubscriberInterface
{
    /** @var  string */
    protected $pluginPath;

    /**
     * ControllerSubscriber constructor.
     * @param string $pluginPath
     */
    public function __construct($pluginPath)
    {
        $this->pluginPath = $pluginPath;
    }

    public static function getSubscribedEvents()
    {
        return [
            'Enlight_Controller_Dispatcher_ControllerPath_Backend_SeoRewrite' => 'onGetControllerPathBackend',
        ];
    }

    public function onGetControllerPathBackend()
    {
        return $this->pluginPath . 'Controllers/Backend/SeoRewrite.php';
    }
}
