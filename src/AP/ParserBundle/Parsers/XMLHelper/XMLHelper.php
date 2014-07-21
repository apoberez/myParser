<?php
/**
 * Created by PhpStorm.
 * User: sania
 * Date: 7/19/14
 * Time: 4:19 PM
 */

namespace AP\ParserBundle\Parsers\XMLHelper;


use Symfony\Component\HttpFoundation\File\Exception\FileException;

class XMLHelper implements XMLHelperInterface
{
    private $url;

    /**
     * @return string
     * @throws \Symfony\Component\HttpFoundation\File\Exception\FileException
     */
    private function getPageContent(){
        if(!$this->getUrl()){
            throw new FileException('url needed');
        }//todo check charset
        $content = file_get_contents($this->getUrl());
        $charset = mb_detect_encoding($this->getUrl());
        var_dump($charset);
        $content = mb_convert_encoding($content, 'utf-8', 'windows-1251');
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
        $document->preserveWhiteSpace = false;
        return $document;
    }

    public function getFinder(){
        return new \DOMXPath($this->getDomDocument());
    }
} 