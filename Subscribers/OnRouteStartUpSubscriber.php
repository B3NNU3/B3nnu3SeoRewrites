<?php

namespace B3nnu3SeoRewrites\Subscribers;

use B3nnu3SeoRewrites\Components\Services\DbalRewriteGateway;
use Enlight\Event\SubscriberInterface;

class OnRouteStartUpSubscriber implements SubscriberInterface
{
    /** @var  DbalRewriteGateway */
    protected $rewriteGateway;

    /**
     * OnRouteStartUpSubscriber constructor.
     * @param DbalRewriteGateway $rewriteGateway
     */
    public function __construct(DbalRewriteGateway $rewriteGateway)
    {
        $this->rewriteGateway = $rewriteGateway;
    }

    public static function getSubscribedEvents()
    {
        return [
            'Enlight_Controller_Front_RouteStartup' => 'onRouteStartUp'
        ];
    }

    public function onRouteStartUp(\Enlight_Event_EventArgs $args)
    {
        /** @var \Enlight_Controller_Request_RequestHttp $request */
        $request = $args->get('request');
        /** @var \Enlight_Controller_Response_ResponseHttp $response */
        $response = $args->get('response');
        $rewrite = $this->rewriteGateway->getRewrite($request);

        if (!$rewrite) {
            return;
        }
        $response->setRedirect($rewrite->getToUri(), $rewrite->getType());
        $args->setProcessed(true);
        $request->setDispatched(true);
    }
}
