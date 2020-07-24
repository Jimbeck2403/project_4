<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200723174103 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE artist ADD category_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE artist ADD CONSTRAINT FK_15996879777D11E FOREIGN KEY (category_id_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_15996879777D11E ON artist (category_id_id)');
        $this->addSql('ALTER TABLE performance ADD category_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE performance ADD CONSTRAINT FK_82D796819777D11E FOREIGN KEY (category_id_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_82D796819777D11E ON performance (category_id_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE artist DROP FOREIGN KEY FK_15996879777D11E');
        $this->addSql('DROP INDEX IDX_15996879777D11E ON artist');
        $this->addSql('ALTER TABLE artist DROP category_id_id');
        $this->addSql('ALTER TABLE performance DROP FOREIGN KEY FK_82D796819777D11E');
        $this->addSql('DROP INDEX IDX_82D796819777D11E ON performance');
        $this->addSql('ALTER TABLE performance DROP category_id_id');
    }
}
