<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220113144226 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE phone_number ADD contact_id INT NOT NULL');
        $this->addSql('ALTER TABLE phone_number ADD CONSTRAINT FK_6B01BC5BE7A1254A FOREIGN KEY (contact_id) REFERENCES contact (id)');
        $this->addSql('CREATE INDEX IDX_6B01BC5BE7A1254A ON phone_number (contact_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE phone_number DROP FOREIGN KEY FK_6B01BC5BE7A1254A');
        $this->addSql('DROP INDEX IDX_6B01BC5BE7A1254A ON phone_number');
        $this->addSql('ALTER TABLE phone_number DROP contact_id');
    }
}
