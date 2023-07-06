<?php

namespace App\Test\Controller\Admin;

use App\Entity\Admin\Comment;
use App\Repository\Admin\CommentRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CommentControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private CommentRepository $repository;
    private string $path = '/admin/comment/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = static::getContainer()->get('doctrine')->getRepository(Comment::class);

        foreach ($this->repository->findAll() as $object) {
            $this->repository->remove($object, true);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Comment index');

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
            'comment[subject]' => 'Testing',
            'comment[comment]' => 'Testing',
            'comment[status]' => 'Testing',
            'comment[ip]' => 'Testing',
            'comment[userid]' => 'Testing',
            'comment[created_at]' => 'Testing',
            'comment[update_at]' => 'Testing',
            'comment[rate]' => 'Testing',
        ]);

        self::assertResponseRedirects('/admin/comment/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Comment();
        $fixture->setSubject('My Title');
        $fixture->setComment('My Title');
        $fixture->setStatus('My Title');
        $fixture->setIp('My Title');
        $fixture->setUserid('My Title');
        $fixture->setCreated_at('My Title');
        $fixture->setUpdate_at('My Title');
        $fixture->setRate('My Title');

        $this->repository->save($fixture, true);

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Comment');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Comment();
        $fixture->setSubject('My Title');
        $fixture->setComment('My Title');
        $fixture->setStatus('My Title');
        $fixture->setIp('My Title');
        $fixture->setUserid('My Title');
        $fixture->setCreated_at('My Title');
        $fixture->setUpdate_at('My Title');
        $fixture->setRate('My Title');

        $this->repository->save($fixture, true);

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'comment[subject]' => 'Something New',
            'comment[comment]' => 'Something New',
            'comment[status]' => 'Something New',
            'comment[ip]' => 'Something New',
            'comment[userid]' => 'Something New',
            'comment[created_at]' => 'Something New',
            'comment[update_at]' => 'Something New',
            'comment[rate]' => 'Something New',
        ]);

        self::assertResponseRedirects('/admin/comment/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getSubject());
        self::assertSame('Something New', $fixture[0]->getComment());
        self::assertSame('Something New', $fixture[0]->getStatus());
        self::assertSame('Something New', $fixture[0]->getIp());
        self::assertSame('Something New', $fixture[0]->getUserid());
        self::assertSame('Something New', $fixture[0]->getCreated_at());
        self::assertSame('Something New', $fixture[0]->getUpdate_at());
        self::assertSame('Something New', $fixture[0]->getRate());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new Comment();
        $fixture->setSubject('My Title');
        $fixture->setComment('My Title');
        $fixture->setStatus('My Title');
        $fixture->setIp('My Title');
        $fixture->setUserid('My Title');
        $fixture->setCreated_at('My Title');
        $fixture->setUpdate_at('My Title');
        $fixture->setRate('My Title');

        $this->repository->save($fixture, true);

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/admin/comment/');
    }
}
