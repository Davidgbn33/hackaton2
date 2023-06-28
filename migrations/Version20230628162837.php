<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230628162837 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE brand ADD image VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE `condition` CHANGE price price INT DEFAULT NULL');
        $this->addSql('ALTER TABLE memory CHANGE price price INT DEFAULT NULL');
        $this->addSql('ALTER TABLE model ADD brand_id INT DEFAULT NULL, ADD image VARCHAR(255) NOT NULL, CHANGE price price INT DEFAULT NULL');
        $this->addSql('ALTER TABLE model ADD CONSTRAINT FK_D79572D944F5D008 FOREIGN KEY (brand_id) REFERENCES brand (id)');
        $this->addSql('CREATE INDEX IDX_D79572D944F5D008 ON model (brand_id)');
        $this->addSql('ALTER TABLE network CHANGE price price INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ram CHANGE price price INT DEFAULT NULL');
        $this->addSql('ALTER TABLE telephone DROP FOREIGN KEY FK_450FF01044F5D008');
        $this->addSql('DROP INDEX IDX_450FF01044F5D008 ON telephone');
        $this->addSql('ALTER TABLE telephone DROP brand_id, CHANGE estimated_price estimated_price INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE brand DROP image');
        $this->addSql('ALTER TABLE `condition` CHANGE price price VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE telephone ADD brand_id INT DEFAULT NULL, CHANGE estimated_price estimated_price VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE telephone ADD CONSTRAINT FK_450FF01044F5D008 FOREIGN KEY (brand_id) REFERENCES brand (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_450FF01044F5D008 ON telephone (brand_id)');
        $this->addSql('ALTER TABLE ram CHANGE price price VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE memory CHANGE price price VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE network CHANGE price price VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE model DROP FOREIGN KEY FK_D79572D944F5D008');
        $this->addSql('DROP INDEX IDX_D79572D944F5D008 ON model');
        $this->addSql('ALTER TABLE model DROP brand_id, DROP image, CHANGE price price VARCHAR(255) DEFAULT NULL');
    }
}
