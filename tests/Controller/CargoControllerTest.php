<?php

namespace App\Test\Controller\Admin;

use App\Entity\Admin\Cargo;
use App\Repository\Admin\CargoRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CargoControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private CargoRepository $repository;
    private string $path = '/admin/cargo/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = static::getContainer()->get('doctrine')->getRepository(Cargo::class);

        foreach ($this->repository->findAll() as $object) {
            $this->repository->remove($object, true);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Cargo index');

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
            'cargo[KargoId]' => 'Testing',
            'cargo[alici_adi]' => 'Testing',
            'cargo[alici_adresi]' => 'Testing',
            'cargo[gönderici_adi]' => 'Testing',
            'cargo[gönderici_adresi]' => 'Testing',
            'cargo[agirlik]' => 'Testing',
            'cargo[boyutlar]' => 'Testing',
            'cargo[gönderim_tarihi]' => 'Testing',
            'cargo[teslimat_durumu]' => 'Testing',
            'cargo[odeme_durumu]' => 'Testing',
            'cargo[created_at]' => 'Testing',
            'cargo[update_at]' => 'Testing',
        ]);

        self::assertResponseRedirects('/admin/cargo/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Cargo();
        $fixture->setKargoId('My Title');
        $fixture->setAlici_adi('My Title');
        $fixture->setAlici_adresi('My Title');
        $fixture->setGönderici_adi('My Title');
        $fixture->setGönderici_adresi('My Title');
        $fixture->setAgirlik('My Title');
        $fixture->setBoyutlar('My Title');
        $fixture->setGönderim_tarihi('My Title');
        $fixture->setTeslimat_durumu('My Title');
        $fixture->setOdeme_durumu('My Title');
        $fixture->setCreated_at('My Title');
        $fixture->setUpdate_at('My Title');

        $this->repository->save($fixture, true);

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Cargo');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Cargo();
        $fixture->setKargoId('My Title');
        $fixture->setAlici_adi('My Title');
        $fixture->setAlici_adresi('My Title');
        $fixture->setGönderici_adi('My Title');
        $fixture->setGönderici_adresi('My Title');
        $fixture->setAgirlik('My Title');
        $fixture->setBoyutlar('My Title');
        $fixture->setGönderim_tarihi('My Title');
        $fixture->setTeslimat_durumu('My Title');
        $fixture->setOdeme_durumu('My Title');
        $fixture->setCreated_at('My Title');
        $fixture->setUpdate_at('My Title');

        $this->repository->save($fixture, true);

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'cargo[KargoId]' => 'Something New',
            'cargo[alici_adi]' => 'Something New',
            'cargo[alici_adresi]' => 'Something New',
            'cargo[gönderici_adi]' => 'Something New',
            'cargo[gönderici_adresi]' => 'Something New',
            'cargo[agirlik]' => 'Something New',
            'cargo[boyutlar]' => 'Something New',
            'cargo[gönderim_tarihi]' => 'Something New',
            'cargo[teslimat_durumu]' => 'Something New',
            'cargo[odeme_durumu]' => 'Something New',
            'cargo[created_at]' => 'Something New',
            'cargo[update_at]' => 'Something New',
        ]);

        self::assertResponseRedirects('/admin/cargo/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getKargoId());
        self::assertSame('Something New', $fixture[0]->getAlici_adi());
        self::assertSame('Something New', $fixture[0]->getAlici_adresi());
        self::assertSame('Something New', $fixture[0]->getGönderici_adi());
        self::assertSame('Something New', $fixture[0]->getGönderici_adresi());
        self::assertSame('Something New', $fixture[0]->getAgirlik());
        self::assertSame('Something New', $fixture[0]->getBoyutlar());
        self::assertSame('Something New', $fixture[0]->getGönderim_tarihi());
        self::assertSame('Something New', $fixture[0]->getTeslimat_durumu());
        self::assertSame('Something New', $fixture[0]->getOdeme_durumu());
        self::assertSame('Something New', $fixture[0]->getCreated_at());
        self::assertSame('Something New', $fixture[0]->getUpdate_at());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new Cargo();
        $fixture->setKargoId('My Title');
        $fixture->setAlici_adi('My Title');
        $fixture->setAlici_adresi('My Title');
        $fixture->setGönderici_adi('My Title');
        $fixture->setGönderici_adresi('My Title');
        $fixture->setAgirlik('My Title');
        $fixture->setBoyutlar('My Title');
        $fixture->setGönderim_tarihi('My Title');
        $fixture->setTeslimat_durumu('My Title');
        $fixture->setOdeme_durumu('My Title');
        $fixture->setCreated_at('My Title');
        $fixture->setUpdate_at('My Title');

        $this->repository->save($fixture, true);

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/admin/cargo/');
    }
}
