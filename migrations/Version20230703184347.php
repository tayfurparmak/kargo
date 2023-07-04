<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230703184347 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, parentid INT DEFAULT NULL, title VARCHAR(150) DEFAULT NULL, keywprds VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, image VARCHAR(75) DEFAULT NULL, status VARCHAR(10) DEFAULT NULL, created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE setting (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(150) DEFAULT NULL, keywords VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, company VARCHAR(150) DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, phone VARCHAR(20) DEFAULT NULL, fax VARCHAR(20) DEFAULT NULL, email VARCHAR(50) DEFAULT NULL, smtpserver VARCHAR(20) DEFAULT NULL, smtpemail VARCHAR(50) DEFAULT NULL, smtppassword VARCHAR(50) DEFAULT NULL, smtpport VARCHAR(255) DEFAULT NULL, aboutus LONGTEXT DEFAULT NULL, contact LONGTEXT DEFAULT NULL, reference LONGTEXT DEFAULT NULL, status VARCHAR(6) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, name VARCHAR(20) DEFAULT NULL, surname VARCHAR(50) DEFAULT NULL, created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', update_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE setting');
        $this->addSql('DROP TABLE user');
    }
}
