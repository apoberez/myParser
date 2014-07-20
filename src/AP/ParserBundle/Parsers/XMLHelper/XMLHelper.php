<?php
/**
 * Created by PhpStorm.
 * User: sania
 * Date: 7/19/14
 * Time: 4:19 PM
 */

namespace AP\ParserBundle\Parsers\XMLHelper;


class XMLHelper implements XMLHelperInterface
{
    private $url;

    /**
     * @return string charset=utf-8
     */
    private function getPageContent(){
        $content = file_get_contents($this->getUrl());
        $charset = mb_detect_encoding($content);
        $content = mb_convert_encoding($content, 'utf-8', $charset);
        $tidy = new \tidy();
        $tidy->parseString($content, array(), 'utf8');
        $tidy->cleanRepair();
        $content = '<meta http-equiv="content-type" content="text/html; charset="utf-8">' . $tidy->body()->value;
        return $content;
    }

    /**
     * @param string $url
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return \DOMDocument
     */
    public function getDomDocument(){
        $content = $this->getPageContent();
        libxml_use_internal_errors(true);//todo enable
        $document = new \DOMDocument();
        $document->loadHTML($content);
        return $document;
    }
} 