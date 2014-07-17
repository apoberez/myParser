<?php
/**
 * Created by PhpStorm.
 * User: sania
 * Date: 7/17/14
 * Time: 9:43 PM
 */

namespace AP\ParserBundle\SiteParsers;


abstract class AbstractLinkParser
{
    /**
     * @var string
     */
    private $startUrl;

    /**
     * @return string
     */
    public function getStartUrl()
    {
        return $this->startUrl;
    }

    /**
     * @param $startUrl
     */
    public function __construct($startUrl)
    {
        $this->startUrl = $startUrl;
    }

    /**
     * @return array
     */
    abstract public function getUrls();
} 