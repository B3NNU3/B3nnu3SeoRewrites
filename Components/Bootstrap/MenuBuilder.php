<?php

namespace B3nnu3SeoRewrites\Components\Bootstrap;

use Shopware\Components\Model\ModelManager;
use Shopware\Models\Menu\Menu;

class MenuBuilder
{
    /** @var  ModelManager */
    protected $modelManager;

    /**
     * MenuBuilder constructor.
     * @param ModelManager $modelManager
     */
    public function __construct(ModelManager $modelManager)
    {
        $this->modelManager = $modelManager;
    }

    public function createMenuEntry()
    {
        $parentItem = 'Einstellungen';

        /** @var Menu $parent */
        $parent = $this->modelManager->getRepository('Shopware\\Models\\Menu\\Menu')->findOneBy(['label' => $parentItem]);

        if (!$parent) {
            throw new \RuntimeException(sprintf("Item '%s' Not found", $parentItem));
        }

        $item = new Menu();
        $item->setAction('index');
        $item->setActive(true);
        $item->setClass('sprite-ui-scroll-pane-detail');
        $item->setLabel('SeoRewriteTool');
        $item->setParent($parent);
        $item->setController('Seorewrites');
        $item->setPosition(99);

        $this->modelManager->persist($item);
        $this->modelManager->flush($item);
    }

    public function removeMenuEntry()
    {
        /** @var Menu $parent */
        $entry = $this->modelManager->getRepository('Shopware\\Models\\Menu\\Menu')->findOneBy(['label' => 'SeoRewriteTool']);
        if (!$entry) {
            return;
        }
        $this->modelManager->remove($entry);
        $this->modelManager->flush();
    }
}

