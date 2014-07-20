<?php
/**
 * Created by PhpStorm.
 * User: sania
 * Date: 7/20/14
 * Time: 8:39 PM
 */

namespace AP\ParserBundle\Parsers\XMLHelper;


interface XMLHelperInterface
{
    /**
     * @return \DOMDocument
     */
    public function getDomDocument();
} 