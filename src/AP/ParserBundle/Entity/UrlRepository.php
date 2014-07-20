<?php

namespace AP\ParserBundle\Entity;

use AP\ParserBundle\Parsers\AbstractLinkParser;
use Doctrine\ORM\EntityRepository;

/**
 * UrlRepository
 */
class UrlRepository extends EntityRepository
{
    /**
     * @var AbstractLinkParser
     */
    private $linkParser;

    /**
     * @param AbstractLinkParser $linkParser
     * @return $this
     */
    public function setLinkParser(AbstractLinkParser $linkParser)
    {
        $this->linkParser = $linkParser;
        return $this;
    }

    function saveUrls()
    {
        $em = $this->getEntityManager();
        foreach ($this->getLinkParser()->getUrls() as $url)
        {
            $urlModel = new Url();
            $urlModel->setAttributes($url);
            $this->$em->persist($urlModel);
        }
        $em->flush();
    }

    /**
     * @return \AP\ParserBundle\Parsers\AbstractLinkParser
     */
    public function getLinkParser()
    {
        return $this->linkParser;
    }

}
