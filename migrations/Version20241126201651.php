<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241126201651 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649C9139BF1');
        $this->addSql('DROP INDEX IDX_8D93D649C9139BF1 ON user');
        $this->addSql('ALTER TABLE user DROP historique_emprunts_id, DROP mot_de_passe');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD historique_emprunts_id INT NOT NULL, ADD mot_de_passe VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649C9139BF1 FOREIGN KEY (historique_emprunts_id) REFERENCES emprunt (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649C9139BF1 ON user (historique_emprunts_id)');
    }
}
