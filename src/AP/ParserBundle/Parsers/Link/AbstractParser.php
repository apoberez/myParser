<?php
/**
 * Created by PhpStorm.
 * User: sania
 * Date: 7/17/14
 * Time: 9:43 PM
 */

namespace AP\ParserBundle\Parsers\Link;


use AP\ParserBundle\Parsers\XMLHelper\XMLHelper;

abstract class AbstractParser
{
    /**
     * @var string
     */
    private $categoryUrl;

    /**
     * @var \AP\ParserBundle\Parsers\XMLHelper\XMLHelperInterface
     */
    private $xmlHelper;

    function __construct($categoryUrl = null)
    {
        $this->categoryUrl = $categoryUrl;
        $this->xmlHelper = new XMLHelper();
    }

    /**
     * @return string
     */
    protected function getCategoryUrl()
    {
        return $this->categoryUrl;
    }

    /**
     * @param string $categoryUrl
     */
    public function setCategoryUrl($categoryUrl)
    {
        $this->categoryUrl = $categoryUrl;
    }


    /**
     * @return \AP\ParserBundle\Parsers\XMLHelper\XMLHelper
     */
    protected function getXmlHelper()
    {
        return $this->xmlHelper;
    }

    /**
     * @return array
     */
    abstract public function getProducts();

    /**
     * @return array
     */
    abstract public function getProductsList();
} 