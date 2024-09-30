<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240925091449 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE tableau_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE tableau (id INT NOT NULL, ta_libelle TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE utilisateur_projet (utilisateur_id INT NOT NULL, projet_id INT NOT NULL, PRIMARY KEY(utilisateur_id, projet_id))');
        $this->addSql('CREATE INDEX IDX_31B8A622FB88E14F ON utilisateur_projet (utilisateur_id)');
        $this->addSql('CREATE INDEX IDX_31B8A622C18272 ON utilisateur_projet (projet_id)');
        $this->addSql('CREATE TABLE utilisateur_profil (utilisateur_id INT NOT NULL, profil_id INT NOT NULL, PRIMARY KEY(utilisateur_id, profil_id))');
        $this->addSql('CREATE INDEX IDX_877B881CFB88E14F ON utilisateur_profil (utilisateur_id)');
        $this->addSql('CREATE INDEX IDX_877B881C275ED078 ON utilisateur_profil (profil_id)');
        $this->addSql('ALTER TABLE utilisateur_projet ADD CONSTRAINT FK_31B8A622FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE utilisateur_projet ADD CONSTRAINT FK_31B8A622C18272 FOREIGN KEY (projet_id) REFERENCES projet (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE utilisateur_profil ADD CONSTRAINT FK_877B881CFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE utilisateur_profil ADD CONSTRAINT FK_877B881C275ED078 FOREIGN KEY (profil_id) REFERENCES profil (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE tableau_id_seq CASCADE');
        $this->addSql('ALTER TABLE utilisateur_projet DROP CONSTRAINT FK_31B8A622FB88E14F');
        $this->addSql('ALTER TABLE utilisateur_projet DROP CONSTRAINT FK_31B8A622C18272');
        $this->addSql('ALTER TABLE utilisateur_profil DROP CONSTRAINT FK_877B881CFB88E14F');
        $this->addSql('ALTER TABLE utilisateur_profil DROP CONSTRAINT FK_877B881C275ED078');
        $this->addSql('DROP TABLE tableau');
        $this->addSql('DROP TABLE utilisateur_projet');
        $this->addSql('DROP TABLE utilisateur_profil');
    }
}
