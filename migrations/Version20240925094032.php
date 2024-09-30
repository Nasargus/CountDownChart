<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240925094032 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE invitation_invitation (invitation_source INT NOT NULL, invitation_target INT NOT NULL, PRIMARY KEY(invitation_source, invitation_target))');
        $this->addSql('CREATE INDEX IDX_6B2C4CEF138FA4B9 ON invitation_invitation (invitation_source)');
        $this->addSql('CREATE INDEX IDX_6B2C4CEFA6AF436 ON invitation_invitation (invitation_target)');
        $this->addSql('ALTER TABLE invitation_invitation ADD CONSTRAINT FK_6B2C4CEF138FA4B9 FOREIGN KEY (invitation_source) REFERENCES invitation (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE invitation_invitation ADD CONSTRAINT FK_6B2C4CEFA6AF436 FOREIGN KEY (invitation_target) REFERENCES invitation (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE invitation_invitation DROP CONSTRAINT FK_6B2C4CEF138FA4B9');
        $this->addSql('ALTER TABLE invitation_invitation DROP CONSTRAINT FK_6B2C4CEFA6AF436');
        $this->addSql('DROP TABLE invitation_invitation');
    }
}
