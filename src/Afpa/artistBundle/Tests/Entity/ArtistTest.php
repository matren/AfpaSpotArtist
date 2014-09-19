<?php

namespace Afpa\artistBundle\Tests\Entity;

use Afpa\artistBundle\Entity\Artist;

class ArtistTest extends \PHPUnit_Framework_TestCase
{
	public function testGetCategory()
	{
		$nena = new Artist();
		$nena->setPopularite(5);
		
		$icone="Icône";
		$ss="Super-Star";
		$star="Star";
		$chanteur="Chanteur";
		$bad="Artiste peu connu";
		
		$result=$nena->getCategory();
		
		$this->assertEquals($bad,$result);
	}
}