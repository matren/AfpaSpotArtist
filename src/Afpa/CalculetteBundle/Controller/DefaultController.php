<?php

namespace Afpa\CalculetteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function addAction($a, $b)
    {
		$result = $a+$b;
        return $this->render('AfpaCalculetteBundle:Default:index.html.twig', array('result' => $result));
    }
	public function souAction($a, $b)
    {
		$result = $a-$b;		
        return $this->render('AfpaCalculetteBundle:Default:index.html.twig', array('result' => $result));
    }
	public function mulAction($a, $b)
    {
		$result = $a*$b;
		return $this->render('AfpaCalculetteBundle:Default:index.html.twig', array('result' => $result));
    }
	public function divAction($a, $b)
    {
		if ($b==0){
			$result = new Response();
			$result->setContent("Page d'erreur 404");
			$result->setStatusCode(404);
			return $result;
		} else {
			$result = $a/$b;
			return $this->render('AfpaCalculetteBundle:Default:index.html.twig', array('result' => $result));
		}
    }
	
	public function facAction($a)
    {
		if ($a<2){
			$result = 1;
		}
		else {
			$result=1;
			for ($i=1; $i<=$a; $i++){
				$result = $result * $i; 
			}
		}
        return $this->render('AfpaCalculetteBundle:Default:index.html.twig', array('result' => $result));
    }
}
