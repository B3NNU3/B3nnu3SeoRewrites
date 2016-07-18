<?php

namespace B3nnu3SeoRewrites;

use B3nnu3SeoRewrites\Components\Bootstrap\MenuBuilder;
use B3nnu3SeoRewrites\Models\SeoRewrite;
use Doctrine\ORM\Tools\SchemaTool;
use Shopware\Components\Model\ModelManager;
use \Shopware\Components\Plugin;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class B3nnu3SeoRewrites extends Plugin
{
    public function build(ContainerBuilder $container)
    {
        $container->setParameter('b3nnu3_seorewrites.path', $this->getPath() . '/');
        parent::build($container);
    }

    public function install(Plugin\Context\InstallContext $context)
    {
        $this->initSchemaTool()->createSchema([
            $this->initModelManager()->getClassMetadata(SeoRewrite::class)
        ]);
        $this->initMenuBuilder()->createMenuEntry();
        parent::install($context);
    }

    public function uninstall(Plugin\Context\UninstallContext $context)
    {
        $this->initSchemaTool()->dropSchema([
            $this->initModelManager()->getClassMetadata(SeoRewrite::class)
        ]);
        $this->initMenuBuilder()->removeMenuEntry();
        parent::uninstall($context);
    }

    protected function initSchemaTool()
    {
        return new SchemaTool($this->initModelManager());
    }

    protected function initMenuBuilder()
    {
        return new MenuBuilder($this->initModelManager());
    }

    /**
     * @return ModelManager
     */
    protected function initModelManager()
    {
        return $this->container->get('models');
    }
}
