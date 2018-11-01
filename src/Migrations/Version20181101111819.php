<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181101111819 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tricks_images DROP FOREIGN KEY FK_D4A857A83DA5256D');
        $this->addSql('ALTER TABLE tricks_images DROP FOREIGN KEY FK_D4A857A8B281BE2E');
        $this->addSql('ALTER TABLE tricks_images ADD CONSTRAINT FK_D4A857A83DA5256D FOREIGN KEY (image_id) REFERENCES image (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tricks_images ADD CONSTRAINT FK_D4A857A8B281BE2E FOREIGN KEY (trick_id) REFERENCES trick (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tricks_videos DROP FOREIGN KEY FK_1D1D8DF029C1004E');
        $this->addSql('ALTER TABLE tricks_videos DROP FOREIGN KEY FK_1D1D8DF0B281BE2E');
        $this->addSql('ALTER TABLE tricks_videos ADD CONSTRAINT FK_1D1D8DF029C1004E FOREIGN KEY (video_id) REFERENCES video (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tricks_videos ADD CONSTRAINT FK_1D1D8DF0B281BE2E FOREIGN KEY (trick_id) REFERENCES trick (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tricks_images DROP FOREIGN KEY FK_D4A857A8B281BE2E');
        $this->addSql('ALTER TABLE tricks_images DROP FOREIGN KEY FK_D4A857A83DA5256D');
        $this->addSql('ALTER TABLE tricks_images ADD CONSTRAINT FK_D4A857A8B281BE2E FOREIGN KEY (trick_id) REFERENCES trick (id)');
        $this->addSql('ALTER TABLE tricks_images ADD CONSTRAINT FK_D4A857A83DA5256D FOREIGN KEY (image_id) REFERENCES image (id)');
        $this->addSql('ALTER TABLE tricks_videos DROP FOREIGN KEY FK_1D1D8DF0B281BE2E');
        $this->addSql('ALTER TABLE tricks_videos DROP FOREIGN KEY FK_1D1D8DF029C1004E');
        $this->addSql('ALTER TABLE tricks_videos ADD CONSTRAINT FK_1D1D8DF0B281BE2E FOREIGN KEY (trick_id) REFERENCES trick (id)');
        $this->addSql('ALTER TABLE tricks_videos ADD CONSTRAINT FK_1D1D8DF029C1004E FOREIGN KEY (video_id) REFERENCES video (id)');
    }
}
