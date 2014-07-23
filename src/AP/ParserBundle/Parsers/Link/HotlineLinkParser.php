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
        $res = $this->getLastPage();
        return $res;
    }

    public function getCategoryProducts()
    {
        return;
    }

    private function getCategoryPages()
    {
        $pages = array($this->getCategoryUrl());
//        for($i=)
    }

    /**
     * @return \DOMNode
     */
    private function getLastPage()
    {
        $pager = $this->getXmlHelper()
            ->setUrl($this->getCategoryUrl())
            ->getFinder()->query('//*[contains(concat(" ", normalize-space(@class), " "), " pager ")]/a');

        var_dump($pager->length, $pager->item(0)->nodeValue, $pager->item(1)->nodeValue);
        return $pager;
    }


} 