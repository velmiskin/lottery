<?php

namespace App\Tests\Application;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ChangeStatusMessageTest extends WebTestCase
{
    public function testInitial(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Lottery Application');
    }

    public function testChangeStatusMessage(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', 'admin/edit/0b0a9c3d-d830-4190-b9fd-13af5e0bba33');
        $form = $crawler->selectButton('admin_participant_form_update')->form();
        $form['admin_participant_form[status]']->select('176a6c5a-4e12-4c27-97a5-962f8f007e6a');
        $client->submit($form);
        $this->assertQueuedEmailCount(1);
    }
}
