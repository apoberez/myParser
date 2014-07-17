<?php
/**
 * Created by PhpStorm.
 * User: sania
 * Date: 7/16/14
 * Time: 10:30 PM
 */

namespace AP\ParserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HotlineParserController extends Controller
{
    public function indexAction()
    {
        return $this->render('@APParser/HotlineParser/index.html.twig');
    }
}