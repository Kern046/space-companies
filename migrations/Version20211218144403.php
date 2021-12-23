<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211218144403 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE company__companies (id UUID NOT NULL, name VARCHAR(120) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7256E2B15E237E06 ON company__companies (name)');
        $this->addSql('COMMENT ON COLUMN company__companies.id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE production__product__products (id UUID NOT NULL, name VARCHAR(100) NOT NULL, description TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN production__product__products.id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE trade__customers (id UUID NOT NULL, company_id UUID DEFAULT NULL, user_id UUID DEFAULT NULL, email VARCHAR(100) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_15CB4D1979B1AD6 ON trade__customers (company_id)');
        $this->addSql('CREATE INDEX IDX_15CB4D1A76ED395 ON trade__customers (user_id)');
        $this->addSql('COMMENT ON COLUMN trade__customers.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN trade__customers.company_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN trade__customers.user_id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE trade__offers (id UUID NOT NULL, product_id UUID DEFAULT NULL, price JSON NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_D0F5BB524584665A ON trade__offers (product_id)');
        $this->addSql('COMMENT ON COLUMN trade__offers.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN trade__offers.product_id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE trade__order_offers (order_id UUID NOT NULL, offer_id UUID NOT NULL, quantity INT NOT NULL, PRIMARY KEY(order_id, offer_id))');
        $this->addSql('CREATE INDEX IDX_D2E173E78D9F6D38 ON trade__order_offers (order_id)');
        $this->addSql('CREATE INDEX IDX_D2E173E753C674EE ON trade__order_offers (offer_id)');
        $this->addSql('COMMENT ON COLUMN trade__order_offers.order_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN trade__order_offers.offer_id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE trade__orders (id UUID NOT NULL, customer_id UUID DEFAULT NULL, status VARCHAR(25) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_EF9C429B9395C3F3 ON trade__orders (customer_id)');
        $this->addSql('COMMENT ON COLUMN trade__orders.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN trade__orders.customer_id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE users (id UUID NOT NULL, email VARCHAR(100) NOT NULL, password VARCHAR(150) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E9E7927C74 ON users (email)');
        $this->addSql('COMMENT ON COLUMN users.id IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE trade__customers ADD CONSTRAINT FK_15CB4D1979B1AD6 FOREIGN KEY (company_id) REFERENCES company__companies (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE trade__customers ADD CONSTRAINT FK_15CB4D1A76ED395 FOREIGN KEY (user_id) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE trade__offers ADD CONSTRAINT FK_D0F5BB524584665A FOREIGN KEY (product_id) REFERENCES production__product__products (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE trade__order_offers ADD CONSTRAINT FK_D2E173E78D9F6D38 FOREIGN KEY (order_id) REFERENCES trade__orders (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE trade__order_offers ADD CONSTRAINT FK_D2E173E753C674EE FOREIGN KEY (offer_id) REFERENCES trade__offers (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE trade__orders ADD CONSTRAINT FK_EF9C429B9395C3F3 FOREIGN KEY (customer_id) REFERENCES trade__customers (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE trade__customers DROP CONSTRAINT FK_15CB4D1979B1AD6');
        $this->addSql('ALTER TABLE trade__offers DROP CONSTRAINT FK_D0F5BB524584665A');
        $this->addSql('ALTER TABLE trade__orders DROP CONSTRAINT FK_EF9C429B9395C3F3');
        $this->addSql('ALTER TABLE trade__order_offers DROP CONSTRAINT FK_D2E173E753C674EE');
        $this->addSql('ALTER TABLE trade__order_offers DROP CONSTRAINT FK_D2E173E78D9F6D38');
        $this->addSql('ALTER TABLE trade__customers DROP CONSTRAINT FK_15CB4D1A76ED395');
        $this->addSql('DROP TABLE company__companies');
        $this->addSql('DROP TABLE production__product__products');
        $this->addSql('DROP TABLE trade__customers');
        $this->addSql('DROP TABLE trade__offers');
        $this->addSql('DROP TABLE trade__order_offers');
        $this->addSql('DROP TABLE trade__orders');
        $this->addSql('DROP TABLE users');
    }
}
