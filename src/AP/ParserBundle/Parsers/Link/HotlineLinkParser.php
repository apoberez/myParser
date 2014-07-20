<?php
/**
 * Created by PhpStorm.
 * User: sania
 * Date: 7/19/14
 * Time: 3:54 PM
 */

namespace AP\ParserBundle\Parsers\Link;


use AP\ParserBundle\Parsers\XMLHelper\XMLHelper;

class HotlineLinkParser extends AbstractLinkParser
{
    /**
     * @var \AP\ParserBundle\Parsers\XMLHelper\XMLHelper
     */
    private $xmlHelper;

    function __construct()
    {
        $this->xmlHelper = new XMLHelper();
    }

    /**
     * @return \AP\ParserBundle\Parsers\XMLHelper\XMLHelper
     */
    public function getXmlHelper()
    {
        return $this->xmlHelper;
    }

    /**
     * @return array
     */
    public function getUrls()
    {
    }

    public function getCategoryProducts($categoryUrl)
    {
        $document = $this->getXmlHelper()
            ->setUrl($categoryUrl)
            ->getDomDocument();
    }

} 