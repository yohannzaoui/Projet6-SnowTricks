<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181026170857 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE trick_image');
        $this->addSql('DROP TABLE trick_video');
        $this->addSql('ALTER TABLE trick ADD image_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', ADD video_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE trick ADD CONSTRAINT FK_D8F0A91E3DA5256D FOREIGN KEY (image_id) REFERENCES image (id)');
        $this->addSql('ALTER TABLE trick ADD CONSTRAINT FK_D8F0A91E29C1004E FOREIGN KEY (video_id) REFERENCES video (id)');
        $this->addSql('CREATE INDEX IDX_D8F0A91E3DA5256D ON trick (image_id)');
        $this->addSql('CREATE INDEX IDX_D8F0A91E29C1004E ON trick (video_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE trick_image (trick_id CHAR(36) NOT NULL COLLATE utf8mb4_unicode_ci COMMENT \'(DC2Type:uuid)\', image_id CHAR(36) NOT NULL COLLATE utf8mb4_unicode_ci COMMENT \'(DC2Type:uuid)\', INDEX IDX_E1204E0B281BE2E (trick_id), INDEX IDX_E1204E03DA5256D (image_id), PRIMARY KEY(trick_id, image_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE trick_video (trick_id CHAR(36) NOT NULL COLLATE utf8mb4_unicode_ci COMMENT \'(DC2Type:uuid)\', video_id CHAR(36) NOT NULL COLLATE utf8mb4_unicode_ci COMMENT \'(DC2Type:uuid)\', INDEX IDX_B7E8DA93B281BE2E (trick_id), INDEX IDX_B7E8DA9329C1004E (video_id), PRIMARY KEY(trick_id, video_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE trick_image ADD CONSTRAINT FK_E1204E03DA5256D FOREIGN KEY (image_id) REFERENCES image (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE trick_image ADD CONSTRAINT FK_E1204E0B281BE2E FOREIGN KEY (trick_id) REFERENCES trick (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE trick_video ADD CONSTRAINT FK_B7E8DA9329C1004E FOREIGN KEY (video_id) REFERENCES video (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE trick_video ADD CONSTRAINT FK_B7E8DA93B281BE2E FOREIGN KEY (trick_id) REFERENCES trick (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE trick DROP FOREIGN KEY FK_D8F0A91E3DA5256D');
        $this->addSql('ALTER TABLE trick DROP FOREIGN KEY FK_D8F0A91E29C1004E');
        $this->addSql('DROP INDEX IDX_D8F0A91E3DA5256D ON trick');
        $this->addSql('DROP INDEX IDX_D8F0A91E29C1004E ON trick');
        $this->addSql('ALTER TABLE trick DROP image_id, DROP video_id');
    }
}
