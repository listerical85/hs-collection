<?php

namespace Listerical\PackBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PackControllerTest extends WebTestCase
{
    public function testListpacks()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/listPacks');
    }

    public function testDetailpack()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/detailPack');
    }

    public function testCreatepack()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/createPack');
    }

}
