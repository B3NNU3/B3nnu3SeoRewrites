<?php

namespace B3nnu3SeoRewrites\Components\Services;

use B3nnu3SeoRewrites\Components\Services\Hydrator\RewriteHydrator;
use Doctrine\DBAL\Connection;

class DbalRewriteGateway
{
    /** @var  Connection */
    protected $dbalConnection;
    /** @var  RewriteHydrator */
    protected $rewriteHydrator;

    /**
     * DbalRewriteGateway constructor.
     * @param Connection $dbalConnection
     * @param RewriteHydrator $rewriteHydrator
     */
    public function __construct(Connection $dbalConnection, RewriteHydrator $rewriteHydrator)
    {
        $this->dbalConnection = $dbalConnection;
        $this->rewriteHydrator = $rewriteHydrator;
    }

    /**
     * @param \Enlight_Controller_Request_RequestHttp $request
     * @return \B3nnu3SeoRewrites\Components\Struct\Rewrite|bool
     */
    public function getRewrite(\Enlight_Controller_Request_RequestHttp $request)
    {
        $uri = $request->getRequestUri();
        $query = $this->getQuery($uri);
        $statement = $query->execute();
        $row = $statement->fetchAll();

        if (count($row) < 1) {
            return false;
        }
        return $this->rewriteHydrator->hydrateRow(array_shift($row));
    }

    protected function getQuery($uri)
    {
        $qb = $this->dbalConnection->createQueryBuilder();

        $qb->select(['seo.from_url', 'seo.to_url', 'seo.position', 'seo.type']);
        $qb->from('plugin_b3nnu3_seo_rewrites', 'seo');
        $qb->where('(' . $qb->expr()->literal($uri) . ' REGEXP seo.from_url) >= 1');
        $qb->orderBy('seo.position', 'ASC');
        $qb->setMaxResults(1);
        return $qb;
    }
}
