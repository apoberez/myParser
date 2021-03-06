<?php

namespace AP\ParserBundle\Entity;

use AP\ParserBundle\Parsers\Link\HotlineParser;
use Doctrine\ORM\EntityRepository;

/**
 * ProductRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProductRepository extends EntityRepository
{
    /**
     * @param Category $category
     */
    public function addProducts($category)
    {
        $parser = new HotlineParser($category->getBaseUrl());
        $products = $parser->getProductsList();
        $em = $this->getEntityManager();

        foreach ($products as $title => $url) {
            $product = new Product();
            $product->setTitle($title)->setCategory($category)->setCreateDate(time());
            $em->persist($product);
        }
    }
}
