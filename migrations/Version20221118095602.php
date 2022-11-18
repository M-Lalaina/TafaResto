<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221118095602 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `order` ADD dish_id INT NOT NULL');
        $this->addSql('ALTER TABLE `order` ADD CONSTRAINT FK_F5299398148EB0CB FOREIGN KEY (dish_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_F5299398148EB0CB ON `order` (dish_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `order` DROP FOREIGN KEY FK_F5299398148EB0CB');
        $this->addSql('DROP INDEX IDX_F5299398148EB0CB ON `order`');
        $this->addSql('ALTER TABLE `order` DROP dish_id');
    }
}
