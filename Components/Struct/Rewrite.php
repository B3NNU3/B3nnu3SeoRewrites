<?php

namespace B3nnu3SeoRewrites\Components\Struct;

class Rewrite
{
    /** @var  string */
    protected $fromUri;
    /** @var  string */
    protected $toUri;
    /** @var  int */
    protected $position;
    /** @var  int */
    protected $type;

    /**
     * Rewrite constructor.
     * @param string $fromUri
     * @param string $toUri
     * @param int $position
     * @param int $type
     */
    public function __construct($fromUri, $toUri, $position, $type)
    {
        $this->fromUri = $fromUri;
        $this->toUri = $toUri;
        $this->position = $position;
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getType()
    {
        return (int)$this->type;
    }

    /**
     * @return string
     */
    public function getFromUri()
    {
        return (string)$this->fromUri;
    }

    /**
     * @return string
     */
    public function getToUri()
    {
        return (string)$this->toUri;
    }

    /**
     * @return int
     */
    public function getPosition()
    {
        return (int)$this->position;
    }
}
