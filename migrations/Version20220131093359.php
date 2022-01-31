<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220131093359 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE account (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_7D3656A4E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE adress (id INT AUTO_INCREMENT NOT NULL, contact_id INT NOT NULL, country VARCHAR(45) DEFAULT NULL, city VARCHAR(45) DEFAULT NULL, adress VARCHAR(75) DEFAULT NULL, name VARCHAR(45) DEFAULT NULL, zip_code VARCHAR(45) DEFAULT NULL, INDEX IDX_5CECC7BEE7A1254A (contact_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, account_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_64C19C19B6B5FBA (account_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, account_id INT NOT NULL, category_id INT DEFAULT NULL, firstname VARCHAR(40) NOT NULL, lastname VARCHAR(40) NOT NULL, INDEX IDX_4C62E6389B6B5FBA (account_id), INDEX IDX_4C62E63812469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE email (id INT AUTO_INCREMENT NOT NULL, contact_id INT NOT NULL, name VARCHAR(45) DEFAULT NULL, email VARCHAR(75) DEFAULT NULL, INDEX IDX_E7927C74E7A1254A (contact_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE phone_number (id INT AUTO_INCREMENT NOT NULL, contact_id INT NOT NULL, name VARCHAR(255) DEFAULT NULL, number VARCHAR(255) DEFAULT NULL, INDEX IDX_6B01BC5BE7A1254A (contact_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE adress ADD CONSTRAINT FK_5CECC7BEE7A1254A FOREIGN KEY (contact_id) REFERENCES contact (id)');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C19B6B5FBA FOREIGN KEY (account_id) REFERENCES account (id)');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E6389B6B5FBA FOREIGN KEY (account_id) REFERENCES account (id)');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E63812469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE email ADD CONSTRAINT FK_E7927C74E7A1254A FOREIGN KEY (contact_id) REFERENCES contact (id)');
        $this->addSql('ALTER TABLE phone_number ADD CONSTRAINT FK_6B01BC5BE7A1254A FOREIGN KEY (contact_id) REFERENCES contact (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C19B6B5FBA');
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E6389B6B5FBA');
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E63812469DE2');
        $this->addSql('ALTER TABLE adress DROP FOREIGN KEY FK_5CECC7BEE7A1254A');
        $this->addSql('ALTER TABLE email DROP FOREIGN KEY FK_E7927C74E7A1254A');
        $this->addSql('ALTER TABLE phone_number DROP FOREIGN KEY FK_6B01BC5BE7A1254A');
        $this->addSql('DROP TABLE account');
        $this->addSql('DROP TABLE adress');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE email');
        $this->addSql('DROP TABLE phone_number');
    }
}
