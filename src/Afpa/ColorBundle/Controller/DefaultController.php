<?php

namespace Afpa\ColorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
		$col1 = rand(0,255);
		$col2 = rand(0,255);
		$col3 = rand(0,255);
		return $this->render('AfpaColorBundle:Default:index.html.twig', array(
			'name' => $name ,
			'bleu'=>$col1,
			'rouge'=>$col2,
			'vert'=>$col3
			)
		);
    }
}
