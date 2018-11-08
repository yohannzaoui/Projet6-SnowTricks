<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181105132740 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649214C50C0');
        $this->addSql('DROP INDEX UNIQ_8D93D649214C50C0 ON user');
        $this->addSql('ALTER TABLE user ADD profilImage VARCHAR(255) NOT NULL, DROP profil_image_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user ADD profil_image_id CHAR(36) DEFAULT NULL COLLATE utf8mb4_unicode_ci COMMENT \'(DC2Type:uuid)\', DROP profilImage');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649214C50C0 FOREIGN KEY (profil_image_id) REFERENCES image (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649214C50C0 ON user (profil_image_id)');
    }
}
