<?php

namespace viduc\phpmesureBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
	protected $container;
	
	public function __construct($container)
	{
		$this->container = $container;
	}
    public function indexAction()
    {
        return $this->render('viducphpmesureBundle:Default:index.html.twig');
    }
    
    public function test()
    {
		return $this->container->getParameter('viducphpmesure.test');
	}
}
