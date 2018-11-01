<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181028175112 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE tricks_videos (trick_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', video_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', INDEX IDX_1D1D8DF0B281BE2E (trick_id), INDEX IDX_1D1D8DF029C1004E (video_id), PRIMARY KEY(trick_id, video_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tricks_videos ADD CONSTRAINT FK_1D1D8DF0B281BE2E FOREIGN KEY (trick_id) REFERENCES trick (id)');
        $this->addSql('ALTER TABLE tricks_videos ADD CONSTRAINT FK_1D1D8DF029C1004E FOREIGN KEY (video_id) REFERENCES video (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE tricks_videos');
    }
}
