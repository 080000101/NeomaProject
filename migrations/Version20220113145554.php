<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220113145554 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adress ADD contact_id INT NOT NULL');
        $this->addSql('ALTER TABLE adress ADD CONSTRAINT FK_5CECC7BEE7A1254A FOREIGN KEY (contact_id) REFERENCES contact (id)');
        $this->addSql('CREATE INDEX IDX_5CECC7BEE7A1254A ON adress (contact_id)');
        $this->addSql('ALTER TABLE email ADD contact_id INT NOT NULL');
        $this->addSql('ALTER TABLE email ADD CONSTRAINT FK_E7927C74E7A1254A FOREIGN KEY (contact_id) REFERENCES contact (id)');
        $this->addSql('CREATE INDEX IDX_E7927C74E7A1254A ON email (contact_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adress DROP FOREIGN KEY FK_5CECC7BEE7A1254A');
        $this->addSql('DROP INDEX IDX_5CECC7BEE7A1254A ON adress');
        $this->addSql('ALTER TABLE adress DROP contact_id');
        $this->addSql('ALTER TABLE email DROP FOREIGN KEY FK_E7927C74E7A1254A');
        $this->addSql('DROP INDEX IDX_E7927C74E7A1254A ON email');
        $this->addSql('ALTER TABLE email DROP contact_id');
    }
}
