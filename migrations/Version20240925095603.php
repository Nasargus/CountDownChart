<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240925095603 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE carte_tache (carte_id INT NOT NULL, tache_id INT NOT NULL, PRIMARY KEY(carte_id, tache_id))');
        $this->addSql('CREATE INDEX IDX_1B2854AAC9C7CEB6 ON carte_tache (carte_id)');
        $this->addSql('CREATE INDEX IDX_1B2854AAD2235D39 ON carte_tache (tache_id)');
        $this->addSql('ALTER TABLE carte_tache ADD CONSTRAINT FK_1B2854AAC9C7CEB6 FOREIGN KEY (carte_id) REFERENCES carte (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE carte_tache ADD CONSTRAINT FK_1B2854AAD2235D39 FOREIGN KEY (tache_id) REFERENCES tache (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE carte_tache DROP CONSTRAINT FK_1B2854AAC9C7CEB6');
        $this->addSql('ALTER TABLE carte_tache DROP CONSTRAINT FK_1B2854AAD2235D39');
        $this->addSql('DROP TABLE carte_tache');
    }
}
