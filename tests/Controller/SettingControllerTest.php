<?php

namespace App\Test\Controller;

use App\Entity\Setting;
use App\Repository\SettingRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SettingControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private SettingRepository $repository;
    private string $path = '/setting/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = static::getContainer()->get('doctrine')->getRepository(Setting::class);

        foreach ($this->repository->findAll() as $object) {
            $this->repository->remove($object, true);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Setting index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $originalNumObjectsInRepository = count($this->repository->findAll());

        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'setting[title]' => 'Testing',
            'setting[keywords]' => 'Testing',
            'setting[description]' => 'Testing',
            'setting[company]' => 'Testing',
            'setting[address]' => 'Testing',
            'setting[phone]' => 'Testing',
            'setting[fax]' => 'Testing',
            'setting[email]' => 'Testing',
            'setting[smtpserver]' => 'Testing',
            'setting[smtpemail]' => 'Testing',
            'setting[smtppassword]' => 'Testing',
            'setting[smtpport]' => 'Testing',
            'setting[aboutus]' => 'Testing',
            'setting[contact]' => 'Testing',
            'setting[reference]' => 'Testing',
            'setting[status]' => 'Testing',
        ]);

        self::assertResponseRedirects('/setting/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Setting();
        $fixture->setTitle('My Title');
        $fixture->setKeywords('My Title');
        $fixture->setDescription('My Title');
        $fixture->setCompany('My Title');
        $fixture->setAddress('My Title');
        $fixture->setPhone('My Title');
        $fixture->setFax('My Title');
        $fixture->setEmail('My Title');
        $fixture->setSmtpserver('My Title');
        $fixture->setSmtpemail('My Title');
        $fixture->setSmtppassword('My Title');
        $fixture->setSmtpport('My Title');
        $fixture->setAboutus('My Title');
        $fixture->setContact('My Title');
        $fixture->setReference('My Title');
        $fixture->setStatus('My Title');

        $this->repository->save($fixture, true);

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Setting');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Setting();
        $fixture->setTitle('My Title');
        $fixture->setKeywords('My Title');
        $fixture->setDescription('My Title');
        $fixture->setCompany('My Title');
        $fixture->setAddress('My Title');
        $fixture->setPhone('My Title');
        $fixture->setFax('My Title');
        $fixture->setEmail('My Title');
        $fixture->setSmtpserver('My Title');
        $fixture->setSmtpemail('My Title');
        $fixture->setSmtppassword('My Title');
        $fixture->setSmtpport('My Title');
        $fixture->setAboutus('My Title');
        $fixture->setContact('My Title');
        $fixture->setReference('My Title');
        $fixture->setStatus('My Title');

        $this->repository->save($fixture, true);

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'setting[title]' => 'Something New',
            'setting[keywords]' => 'Something New',
            'setting[description]' => 'Something New',
            'setting[company]' => 'Something New',
            'setting[address]' => 'Something New',
            'setting[phone]' => 'Something New',
            'setting[fax]' => 'Something New',
            'setting[email]' => 'Something New',
            'setting[smtpserver]' => 'Something New',
            'setting[smtpemail]' => 'Something New',
            'setting[smtppassword]' => 'Something New',
            'setting[smtpport]' => 'Something New',
            'setting[aboutus]' => 'Something New',
            'setting[contact]' => 'Something New',
            'setting[reference]' => 'Something New',
            'setting[status]' => 'Something New',
        ]);

        self::assertResponseRedirects('/setting/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getTitle());
        self::assertSame('Something New', $fixture[0]->getKeywords());
        self::assertSame('Something New', $fixture[0]->getDescription());
        self::assertSame('Something New', $fixture[0]->getCompany());
        self::assertSame('Something New', $fixture[0]->getAddress());
        self::assertSame('Something New', $fixture[0]->getPhone());
        self::assertSame('Something New', $fixture[0]->getFax());
        self::assertSame('Something New', $fixture[0]->getEmail());
        self::assertSame('Something New', $fixture[0]->getSmtpserver());
        self::assertSame('Something New', $fixture[0]->getSmtpemail());
        self::assertSame('Something New', $fixture[0]->getSmtppassword());
        self::assertSame('Something New', $fixture[0]->getSmtpport());
        self::assertSame('Something New', $fixture[0]->getAboutus());
        self::assertSame('Something New', $fixture[0]->getContact());
        self::assertSame('Something New', $fixture[0]->getReference());
        self::assertSame('Something New', $fixture[0]->getStatus());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new Setting();
        $fixture->setTitle('My Title');
        $fixture->setKeywords('My Title');
        $fixture->setDescription('My Title');
        $fixture->setCompany('My Title');
        $fixture->setAddress('My Title');
        $fixture->setPhone('My Title');
        $fixture->setFax('My Title');
        $fixture->setEmail('My Title');
        $fixture->setSmtpserver('My Title');
        $fixture->setSmtpemail('My Title');
        $fixture->setSmtppassword('My Title');
        $fixture->setSmtpport('My Title');
        $fixture->setAboutus('My Title');
        $fixture->setContact('My Title');
        $fixture->setReference('My Title');
        $fixture->setStatus('My Title');

        $this->repository->save($fixture, true);

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/setting/');
    }
}
