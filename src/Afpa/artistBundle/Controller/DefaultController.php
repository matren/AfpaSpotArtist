<?php

namespace Afpa\artistBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Afpa\artistBundle\Entity\Artist;

class DefaultController extends Controller
{
    /*
	public function indexAction($name)
    {
        return $this->render('AfpaartistBundle:Default:index.html.twig', array('name' => $name));
    }
	*/
	public function viewAction($name){
	
		$artistes = str_replace(' ', '_', $name);
		$url = "https://api.spotify.com/v1/search?&type=artist&q=".$artistes;
		// $singerjson = 'C:\wamp\www\spotify\src\Afpa\artistBundle\Resources\public\api\\'.$id.'.jSon';
		// $date = file_get_contents($url, false) si $singerjson
		$data = file_get_contents($url);
		$artist = json_decode($data, true);
		// le true permet de convertir l'objet en tableau
		
		//print_r($artist);
		
		$urlAlb = "https://api.spotify.com/v1/search?&type=album&q=".$artistes;
		$dataAlb = file_get_contents($urlAlb);
		$album = json_decode($dataAlb, true);
		
		return $this->render('AfpaartistBundle:Default:index.html.twig', array('artist' => $artist, 'album'=>$album));
	}
	public function saveAction($name){
		$doctrine = $this->getDoctrine();
		$em = $doctrine->getManager();
		
		//obtention des données de l'artiste
		$url = "https://api.spotify.com/v1/search?&type=artist&q=".$name;
		$data = file_get_contents($url);
		$tab = json_decode($data, true);
		// le true permet de convertir l'objet en tableau
		
		$groupe = new artist();
		$groupe->setNom($tab["artists"]["items"][0]["name"]);
		$groupe->setSpotId($tab["artists"]["items"][0]["id"]);
		$groupe->setPhoto($tab["artists"]["items"][0]["images"][2]["url"]);
		$groupe->setGenre($tab["artists"]["items"][0]["genres"]);
		$groupe->setPopularite($tab["artists"]["items"][0]["popularity"]);
		
		$em->persist($groupe);
		$em->flush();
		
		$artistes = str_replace(' ', '_', $tab["name"]);
		return $this->redirect($this->generateUrl('afpa_artist_name',
			array('name' => $artistes)));
	}
	public function saveAlbumAction($name){
		$doctrine = $this->getDoctrine();
		$em = $doctrine->getManager();
		
		// à finir !!!! + creeer objet album + ...
	}
}