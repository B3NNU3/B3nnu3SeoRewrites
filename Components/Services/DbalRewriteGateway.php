<?php

namespace B3nnu3SeoRewrites\Components\Services;

use Doctrine\DBAL\Connection;

class DbalRewriteGateway
{
    /** @var  Connection */
    protected $dbalConnection;

    /**
     * DbalRewriteGateway constructor.
     * @param Connection $dbalConnection
     */
    public function __construct(Connection $dbalConnection)
    {
        $this->dbalConnection = $dbalConnection;
    }

    public function getRewrite(\Enlight_Controller_Request_RequestHttp $request)
    {
        $uri = $request->getRequestUri();
        $query = $this->getQuery($uri);
        $statement = $query->execute();
        return $statement->fetchColumn();
    }

    protected function getQuery($uri)
    {
        $qb = $this->dbalConnection->createQueryBuilder();

        $qb->select(['seo.to_url']);
        $qb->from('plugin_b3nnu3_seo_rewrites', 'seo');
        $qb->where($qb->expr()->like(
            'seo.from_url',
            $qb->expr()->literal($uri)
        ));
        $qb->setMaxResults(1);
        return $qb;
    }
}
