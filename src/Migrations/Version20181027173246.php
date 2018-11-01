<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181027173246 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE st_tricks_pictures (trick_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', image_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', INDEX IDX_6D4F3705B281BE2E (trick_id), INDEX IDX_6D4F37053DA5256D (image_id), PRIMARY KEY(trick_id, image_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE st_tricks_pictures ADD CONSTRAINT FK_6D4F3705B281BE2E FOREIGN KEY (trick_id) REFERENCES trick (id)');
        $this->addSql('ALTER TABLE st_tricks_pictures ADD CONSTRAINT FK_6D4F37053DA5256D FOREIGN KEY (image_id) REFERENCES image (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE st_tricks_pictures');
    }
}
