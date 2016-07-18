<?php

class Shopware_Controllers_Backend_SeoRewrite extends Shopware_Controllers_Backend_Application
{
    protected $model = 'B3nnu3SeoRewrites\\Models\\SeoRewrite';
    protected $alias = 'seoRewriteModel';

    public function preDispatch()
    {
        parent::preDispatch();
        $path = $this->container->getParameter('b3nnu3_seorewrites.path');
        $this->View()->addTemplateDir($path . 'Resources/Views/');
    }

    public function modelAction()
    {
        return $this->listAction();
    }
}
