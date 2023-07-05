<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230704231404 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cargo (id INT AUTO_INCREMENT NOT NULL, kargo_id INT DEFAULT NULL, alici_adi VARCHAR(50) DEFAULT NULL, alici_adresi VARCHAR(100) DEFAULT NULL, gönderici_adi VARCHAR(50) DEFAULT NULL, gönderici_adresi VARCHAR(100) DEFAULT NULL, agirlik INT DEFAULT NULL, boyutlar INT DEFAULT NULL, gönderim_tarihi DATETIME DEFAULT NULL, teslimat_durumu VARCHAR(100) DEFAULT NULL, odeme_durumu VARCHAR(40) DEFAULT NULL, created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', update_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE cargo');
    }
}
