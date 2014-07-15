<?php

namespace AP\ParserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('APParserBundle:Default:index.html.twig', array('name' => $name));
    }
}
