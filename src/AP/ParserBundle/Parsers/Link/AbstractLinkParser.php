<?php
/**
 * Created by PhpStorm.
 * User: sania
 * Date: 7/17/14
 * Time: 9:43 PM
 */

namespace AP\ParserBundle\Parsers\Link;


use AP\ParserBundle\Parsers\XMLHelper\XMLHelper;
use AP\ParserBundle\Parsers\XMLHelper\XMLHelperInterface;

abstract class AbstractLinkParser
{
    /**
     * @return \AP\ParserBundle\Parsers\XMLHelper\XMLHelperInterface
     */
    abstract public function getXmlHelper();

    /**
     * @return array
     */
    abstract public function getUrls();
} 