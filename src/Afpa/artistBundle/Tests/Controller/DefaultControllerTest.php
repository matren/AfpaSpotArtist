<?php

namespace Afpa\artistBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testView()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/artist/Coldplay');
	
		//print_r($client->getResponse()->getContent());
		
        $this->assertTrue($crawler->filter('html:contains("Coldplay")')->count() > 0);
		//$this->assertCount(1, $crawler->filter('.nomGroupe'));
    }
}