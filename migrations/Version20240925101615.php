<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240925101615 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE carte ADD tableau_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE carte ADD utilisateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE carte ADD categorie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE carte ADD CONSTRAINT FK_BAD4FFFDB062D5BC FOREIGN KEY (tableau_id) REFERENCES tableau (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE carte ADD CONSTRAINT FK_BAD4FFFDFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE carte ADD CONSTRAINT FK_BAD4FFFDBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_BAD4FFFDB062D5BC ON carte (tableau_id)');
        $this->addSql('CREATE INDEX IDX_BAD4FFFDFB88E14F ON carte (utilisateur_id)');
        $this->addSql('CREATE INDEX IDX_BAD4FFFDBCF5E72D ON carte (categorie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE carte DROP CONSTRAINT FK_BAD4FFFDB062D5BC');
        $this->addSql('ALTER TABLE carte DROP CONSTRAINT FK_BAD4FFFDFB88E14F');
        $this->addSql('ALTER TABLE carte DROP CONSTRAINT FK_BAD4FFFDBCF5E72D');
        $this->addSql('DROP INDEX IDX_BAD4FFFDB062D5BC');
        $this->addSql('DROP INDEX IDX_BAD4FFFDFB88E14F');
        $this->addSql('DROP INDEX IDX_BAD4FFFDBCF5E72D');
        $this->addSql('ALTER TABLE carte DROP tableau_id');
        $this->addSql('ALTER TABLE carte DROP utilisateur_id');
        $this->addSql('ALTER TABLE carte DROP categorie_id');
    }
}
