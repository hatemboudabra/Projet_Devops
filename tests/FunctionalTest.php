<?php
namespace App\Tests;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FunctionalTest extends WebTestCase
{
    public function testShouldDisplayClientIndex()
    {
        $client = static::createClient();
        $client->followRedirects();
        $crawler = $client->request('GET', '/client');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Client index');
    }

    public function testShouldDisplayCreateNewClient()
    {
        $client = static::createClient();
        $client->followRedirects();
        $crawler = $client->request('GET', '/client/new');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Create new Client');
    }

    public function testShouldAddNewClient()
    {
        $client = static::createClient();
        $client->followRedirects();
        $crawler = $client->request('GET', '/client/new' );
        $buttonCrawlerNode = $crawler->selectButton('Save');
        $form = $buttonCrawlerNode->form();
        $uuid = uniqid();
        $form = $buttonCrawlerNode->form([
            'client[nom]' => 'Add Client For Test' . $uuid,
            'client[prenom]' => 'Add Client For Test' . $uuid,
            'client[cin]' => 'Add Client For Test' . $uuid,
        ]);
        $client->submit($form);
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('body', 'Add Client For Test' . $uuid);
    }
    public function testShouldAddNewVoiture()
    {
        $client = static::createClient();
        $client->followRedirects();
        $crawler = $client->request('GET', '/voiture/new'); 
        
        
        $buttonCrawlerNode = $crawler->selectButton('Save');
    
        
        $form = $buttonCrawlerNode->form([
            'voiture[serie]' => 'Add Voiture For Test' . uniqid(),
        ]);
    
        $client->submit($form);
    
        $this->assertResponseIsSuccessful();
        
    }
   

}