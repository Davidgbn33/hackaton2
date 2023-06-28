<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230628134916 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE brand (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `condition` (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, price VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE location (id INT AUTO_INCREMENT NOT NULL, city VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE memory (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, price VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE model (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, price VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE network (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, price VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ram (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, price VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE telephone (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, brand_id INT DEFAULT NULL, model_id INT DEFAULT NULL, ram_id INT DEFAULT NULL, memory_id INT DEFAULT NULL, network_id INT DEFAULT NULL, status_id INT DEFAULT NULL, cable_charger TINYINT(1) NOT NULL, estimated_price VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_450FF010A76ED395 (user_id), INDEX IDX_450FF01044F5D008 (brand_id), INDEX IDX_450FF0107975B7E7 (model_id), INDEX IDX_450FF0103366068 (ram_id), INDEX IDX_450FF010CCC80CB3 (memory_id), INDEX IDX_450FF01034128B91 (network_id), INDEX IDX_450FF0106BF700BD (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE telephone ADD CONSTRAINT FK_450FF010A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE telephone ADD CONSTRAINT FK_450FF01044F5D008 FOREIGN KEY (brand_id) REFERENCES brand (id)');
        $this->addSql('ALTER TABLE telephone ADD CONSTRAINT FK_450FF0107975B7E7 FOREIGN KEY (model_id) REFERENCES model (id)');
        $this->addSql('ALTER TABLE telephone ADD CONSTRAINT FK_450FF0103366068 FOREIGN KEY (ram_id) REFERENCES ram (id)');
        $this->addSql('ALTER TABLE telephone ADD CONSTRAINT FK_450FF010CCC80CB3 FOREIGN KEY (memory_id) REFERENCES memory (id)');
        $this->addSql('ALTER TABLE telephone ADD CONSTRAINT FK_450FF01034128B91 FOREIGN KEY (network_id) REFERENCES network (id)');
        $this->addSql('ALTER TABLE telephone ADD CONSTRAINT FK_450FF0106BF700BD FOREIGN KEY (status_id) REFERENCES `condition` (id)');
        $this->addSql('ALTER TABLE user ADD location_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64964D218E FOREIGN KEY (location_id) REFERENCES location (id)');
        $this->addSql('CREATE INDEX IDX_8D93D64964D218E ON user (location_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64964D218E');
        $this->addSql('ALTER TABLE telephone DROP FOREIGN KEY FK_450FF010A76ED395');
        $this->addSql('ALTER TABLE telephone DROP FOREIGN KEY FK_450FF01044F5D008');
        $this->addSql('ALTER TABLE telephone DROP FOREIGN KEY FK_450FF0107975B7E7');
        $this->addSql('ALTER TABLE telephone DROP FOREIGN KEY FK_450FF0103366068');
        $this->addSql('ALTER TABLE telephone DROP FOREIGN KEY FK_450FF010CCC80CB3');
        $this->addSql('ALTER TABLE telephone DROP FOREIGN KEY FK_450FF01034128B91');
        $this->addSql('ALTER TABLE telephone DROP FOREIGN KEY FK_450FF0106BF700BD');
        $this->addSql('DROP TABLE brand');
        $this->addSql('DROP TABLE `condition`');
        $this->addSql('DROP TABLE location');
        $this->addSql('DROP TABLE memory');
        $this->addSql('DROP TABLE model');
        $this->addSql('DROP TABLE network');
        $this->addSql('DROP TABLE ram');
        $this->addSql('DROP TABLE telephone');
        $this->addSql('DROP INDEX IDX_8D93D64964D218E ON user');
        $this->addSql('ALTER TABLE user DROP location_id');
    }
}
