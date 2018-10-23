<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181021170525 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE category (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', name VARCHAR(255) NOT NULL, UNIQUE INDEX name (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', trick_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', author_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', pseudo VARCHAR(255) NOT NULL, message LONGTEXT NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_9474526CB281BE2E (trick_id), INDEX IDX_9474526CF675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE trick (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', author_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', category_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', image_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', video_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_D8F0A91EF675F31B (author_id), INDEX IDX_D8F0A91E12469DE2 (category_id), INDEX IDX_D8F0A91E3DA5256D (image_id), INDEX IDX_D8F0A91E29C1004E (video_id), UNIQUE INDEX name (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CB281BE2E FOREIGN KEY (trick_id) REFERENCES trick (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CF675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE trick ADD CONSTRAINT FK_D8F0A91EF675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE trick ADD CONSTRAINT FK_D8F0A91E12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE trick ADD CONSTRAINT FK_D8F0A91E3DA5256D FOREIGN KEY (image_id) REFERENCES image (id)');
        $this->addSql('ALTER TABLE trick ADD CONSTRAINT FK_D8F0A91E29C1004E FOREIGN KEY (video_id) REFERENCES video (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649214C50C0 FOREIGN KEY (profil_image_id) REFERENCES image (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649214C50C0 ON user (profil_image_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE trick DROP FOREIGN KEY FK_D8F0A91E12469DE2');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CB281BE2E');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE trick');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649214C50C0');
        $this->addSql('DROP INDEX UNIQ_8D93D649214C50C0 ON user');
    }
}
