<?php
/**
 * Created by PhpStorm.
 * User: sania
 * Date: 7/16/14
 * Time: 10:30 PM
 */

namespace AP\ParserBundle\Controller;

use AP\ParserBundle\Parsers\Link\HotlineLinkParser;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ParserController extends Controller
{
    function __construct()
    {
    }

    public function indexAction()
    {
        $parser = new HotlineLinkParser();
        $parser->setCategoryUrl('http://hotline.ua/computer/planshety/');
        $k = $parser->getUrls();
        var_dump($k);
        return $this->render('@APParser/Parser/index.html.twig', array(
//            'ss' =>$parser->getUrls()
        ));
    }

}