<?php

namespace B3nnu3SeoRewrites\Models;

use Shopware\Components\Model\ModelEntity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="plugin_b3nnu3_seo_rewrites")
 * @ORM\HasLifecycleCallbacks
 */
class SeoRewrite extends ModelEntity
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string $from
     *
     * @ORM\Column(name="from_url", type="string", length=255, nullable=false)
     */
    private $from;

    /**
     * @var string $to
     *
     * @ORM\Column(name="to_url", type="string", length=255, nullable=false)
     */
    private $to;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param string $to
     */
    public function setTo($to)
    {
        $this->to = $to;
    }

    /**
     * @return string
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param string $from
     */
    public function setFrom($from)
    {
        $this->from = $from;
    }
}
