<?php
/**
 * Created by PhpStorm.
 * User: sania
 * Date: 7/16/14
 * Time: 10:30 PM
 */

namespace AP\ParserBundle\Controller;

use AP\ParserBundle\Parsers\Link\HotlineParser;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ParserController extends Controller
{
    function __construct()
    {
    }

    public function indexAction()
    {
        $parser = new HotlineParser('http://hotline.ua/computer/planshety/');
        $k = $parser->getProducts();
        $product = $k[0];
//        var_dump($product);
        return $this->render('@APParser/Parser/index.html.twig', array(
            'ss' => $product
        ));
    }
}