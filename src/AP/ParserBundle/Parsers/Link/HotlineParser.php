<?php
/**
 * Created by PhpStorm.
 * User: sania
 * Date: 7/19/14
 * Time: 3:54 PM
 */

namespace AP\ParserBundle\Parsers\Link;

class HotlineParser extends AbstractParser
{
    private function getProduct($url)
    {
        $query = '//*[@id="full-props-list"][1]/tr';
        $propList = $this->getXmlHelper()->getNodeList($url, $query);
        $len = $propList->length;
        $product = array();
        for ($i = 0; $i < $len; $i++) {
            $property = $propList->item($i)->childNodes;
            if ($property->length > 2) {
                $label = $this->prepareString($property->item(0)->textContent);
                $value = $this->prepareString($property->item(2)->textContent);
                $product[$label] = $value;
            }
        }
        return $product;
    }

    public function getProducts()
    {
        $result = array($this->getProduct('http://hotline.ua/computer-planshety/asus-transformer-pad-tf300t-a1-16gb/'));
        return $result;
    }

    /**
     * @return array
     */
    public function getProductsList()
    {
        $products = array();
        $pages = $this->getCategoryPages();
        foreach ($pages as $page) {
            $pageProducts = $this->getPageProducts($page);
            $products = array_merge($products, $pageProducts);
        }
        return $products;
    }

    /**
     * @param $url string
     * @return array
     */
    private function getPageProducts($url)
    {
        $query = '//td[@id="catalogue"]/ul[3]//div[@class="title-box"]//a';
        $productNodes = $this->getXmlHelper()->getNodeList($url, $query);
        $products = array();
        $length = $productNodes->length;
        for ($i = 0; $i < $length; $i++) {
            $node = $productNodes->item($i);
            $products[] = array(
                'title' => $this->prepareString($node->textContent),
                'url' => 'http://hotline.ua' . $node->getAttribute('href')
            );
        }
        return $products;
    }

    /**
     * @param $string
     * @return string
     */
    private function prepareString($string)
    {
        $string = quoted_printable_decode($string);
        $string = str_replace("\n", " ", $string);
        $string = trim($string);
        return $string;
    }

    /**
     * @return array
     */
    private function getCategoryPages()
    {
        $pages = array($this->getCategoryUrl());
        $pagesAmount = $this->getLastPage();
        for ($i = 1; $i < $pagesAmount; $i++) {
            $url = $this->getCategoryUrl() . "?p=$i";
            $pages[] = $url;
        }
        return $pages;
    }

    /**
     * @return integer
     */
    private function getLastPage()
    {
        $query = '//*[@id="catalogue"]/*[contains(concat(" ", normalize-space(@class), " "), " pager ")]/a[2]';
        $pager = $this->getXmlHelper()->getNodeList($this->getCategoryUrl(), $query);

        $href = $pager->item(0)->getAttribute('href');
        $href = explode('=', $href);
        $pageNumber = (integer)end($href);
        return $pageNumber;
    }
} 