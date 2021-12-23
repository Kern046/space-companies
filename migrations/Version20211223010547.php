<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211223010547 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE trade__offers ALTER price TYPE TEXT');
        $this->addSql('ALTER TABLE trade__offers ALTER price DROP DEFAULT');
        $this->addSql('COMMENT ON COLUMN trade__offers.price IS \'(DC2Type:object)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE trade__offers ALTER price TYPE JSON');
        $this->addSql('ALTER TABLE trade__offers ALTER price DROP DEFAULT');
        $this->addSql('COMMENT ON COLUMN trade__offers.price IS NULL');
    }
}
