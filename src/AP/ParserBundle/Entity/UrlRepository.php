<?php

namespace AP\ParserBundle\Entity;

use AP\ParserBundle\SiteParsers\AbstractLinkParser;
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

    function __construct(AbstractLinkParser $linkParser)
    {
        $this->linkParser = $linkParser;
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
     * @return \AP\ParserBundle\SiteParsers\AbstractLinkParser
     */
    public function getLinkParser()
    {
        return $this->linkParser;
    }

}
