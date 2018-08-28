<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180828103640 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, typename VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE song (id INT AUTO_INCREMENT NOT NULL, idgenre_id INT DEFAULT NULL, iduser_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, coverpicture VARCHAR(255) DEFAULT NULL, downloadable TINYINT(1) NOT NULL, explicit TINYINT(1) NOT NULL, dateupload VARCHAR(255) NOT NULL, datecreation VARCHAR(255) NOT NULL, duration INT NOT NULL, enable TINYINT(1) NOT NULL, nblike INT DEFAULT NULL, nbplayed INT DEFAULT NULL, nbdownloaded INT DEFAULT NULL, INDEX IDX_33EDEEA1E8439B12 (idgenre_id), INDEX IDX_33EDEEA1786A81FB (iduser_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, avatar VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE song ADD CONSTRAINT FK_33EDEEA1E8439B12 FOREIGN KEY (idgenre_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE song ADD CONSTRAINT FK_33EDEEA1786A81FB FOREIGN KEY (iduser_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE song DROP FOREIGN KEY FK_33EDEEA1E8439B12');
        $this->addSql('ALTER TABLE song DROP FOREIGN KEY FK_33EDEEA1786A81FB');
        $this->addSql('DROP TABLE type');
        $this->addSql('DROP TABLE song');
        $this->addSql('DROP TABLE user');
    }
}
