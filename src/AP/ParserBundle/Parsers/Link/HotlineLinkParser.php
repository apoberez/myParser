<?php
/**
 * Created by PhpStorm.
 * User: sania
 * Date: 7/19/14
 * Time: 3:54 PM
 */

namespace AP\ParserBundle\Parsers\Link;

class HotlineLinkParser extends AbstractLinkParser
{

    public function getUrls()
    {
        $res = array();
        foreach($this->getPager()->childNodes as $page){
            array_push($res, $page->nodeValue);
        }
        return $res;
    }

    public function getCategoryProducts()
    {

        return ;
    }

    /**
     * @return \DOMNode
     */
    private function getPager()
    {
        $pager = $this->getXmlHelper()
            ->setUrl($this->getCategoryUrl())
            ->getFinder()->query('//*[contains(concat(" ", normalize-space(@class), " "), " pager ")]')->item(1);
        return $pager;
    }

    private function getCategoryPages(){}


} 