<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260402070955 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE address CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE user_id user_id BINARY(16) DEFAULT NULL');
        $this->addSql('ALTER TABLE address RENAME INDEX uki200t3u1314k66hqexn0s65sv TO IDX_D4E6F81A76ED395');
        $this->addSql('ALTER TABLE brand CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE favorite CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE listing_id listing_id INT NOT NULL, CHANGE user_id user_id BINARY(16) NOT NULL');
        $this->addSql('ALTER TABLE favorite RENAME INDEX fkb9pkgeou19ul3cia5mw6nu68c TO IDX_68C58ED9A76ED395');
        $this->addSql('ALTER TABLE favorite RENAME INDEX fki9uf3de76fkduimlkv643gep5 TO IDX_68C58ED9D4619D1A');
        $this->addSql('ALTER TABLE fuel CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE image CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE path path LONGTEXT NOT NULL, CHANGE listing_id listing_id INT NOT NULL');
        $this->addSql('ALTER TABLE image RENAME INDEX fkhxmywv6fwl6opoc7ndlj25l3x TO IDX_C53D045FD4619D1A');
        $this->addSql('ALTER TABLE listing CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE description description LONGTEXT NOT NULL, CHANGE mileage mileage INT NOT NULL, CHANGE price price INT NOT NULL, CHANGE address_id address_id INT NOT NULL, CHANGE fuel_id fuel_id INT NOT NULL, CHANGE model_id model_id INT NOT NULL, CHANGE owner_id owner_id BINARY(16) NOT NULL');
        $this->addSql('ALTER TABLE listing RENAME INDEX fkpbyow6yptl6pj2b5hgtgpkchc TO IDX_CB0048D4F5B7AF75');
        $this->addSql('ALTER TABLE listing RENAME INDEX fkssall13ordr935olyhv1sinam TO IDX_CB0048D497C79677');
        $this->addSql('ALTER TABLE listing RENAME INDEX fkl1g0v5ynicgyvd7653ymqbs16 TO IDX_CB0048D47975B7E7');
        $this->addSql('ALTER TABLE listing RENAME INDEX fkrswnry98wnev8q2ilpf7dcyxu TO IDX_CB0048D47E3C61F9');
        $this->addSql('ALTER TABLE model CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE brand_id brand_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE model RENAME INDEX fkhbgv4j3vpt308sepyq9q79mhu TO IDX_D79572D944F5D008');
        $this->addSql('ALTER TABLE user DROP activation_code, DROP activation_code_sent_at, CHANGE id id BINARY(16) NOT NULL, CHANGE birth_at birth_at DATETIME DEFAULT NULL, CHANGE email email VARCHAR(180) NOT NULL, CHANGE first_name first_name VARCHAR(255) NOT NULL, CHANGE last_name last_name VARCHAR(255) NOT NULL, CHANGE phone phone VARCHAR(16) DEFAULT NULL, CHANGE roles roles JSON NOT NULL, CHANGE siret siret VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL ON user (email)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE address CHANGE id id BIGINT AUTO_INCREMENT NOT NULL, CHANGE user_id user_id VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE address RENAME INDEX idx_d4e6f81a76ed395 TO UKi200t3u1314k66hqexn0s65sv');
        $this->addSql('ALTER TABLE brand CHANGE id id BIGINT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE favorite CHANGE id id BIGINT AUTO_INCREMENT NOT NULL, CHANGE user_id user_id VARCHAR(255) NOT NULL, CHANGE listing_id listing_id VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE favorite RENAME INDEX idx_68c58ed9a76ed395 TO FKb9pkgeou19ul3cia5mw6nu68c');
        $this->addSql('ALTER TABLE favorite RENAME INDEX idx_68c58ed9d4619d1a TO FKi9uf3de76fkduimlkv643gep5');
        $this->addSql('ALTER TABLE fuel CHANGE id id BIGINT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE image CHANGE id id VARCHAR(255) NOT NULL, CHANGE path path TEXT NOT NULL, CHANGE listing_id listing_id VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE image RENAME INDEX idx_c53d045fd4619d1a TO FKhxmywv6fwl6opoc7ndlj25l3x');
        $this->addSql('ALTER TABLE listing CHANGE id id VARCHAR(255) NOT NULL, CHANGE description description TEXT NOT NULL, CHANGE mileage mileage BIGINT NOT NULL, CHANGE price price BIGINT NOT NULL, CHANGE address_id address_id BIGINT NOT NULL, CHANGE fuel_id fuel_id BIGINT NOT NULL, CHANGE model_id model_id BIGINT NOT NULL, CHANGE owner_id owner_id VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE listing RENAME INDEX idx_cb0048d47e3c61f9 TO FKrswnry98wnev8q2ilpf7dcyxu');
        $this->addSql('ALTER TABLE listing RENAME INDEX idx_cb0048d4f5b7af75 TO FKpbyow6yptl6pj2b5hgtgpkchc');
        $this->addSql('ALTER TABLE listing RENAME INDEX idx_cb0048d497c79677 TO FKssall13ordr935olyhv1sinam');
        $this->addSql('ALTER TABLE listing RENAME INDEX idx_cb0048d47975b7e7 TO FKl1g0v5ynicgyvd7653ymqbs16');
        $this->addSql('ALTER TABLE model CHANGE id id BIGINT AUTO_INCREMENT NOT NULL, CHANGE brand_id brand_id BIGINT DEFAULT NULL');
        $this->addSql('ALTER TABLE model RENAME INDEX idx_d79572d944f5d008 TO FKhbgv4j3vpt308sepyq9q79mhu');
        $this->addSql('DROP INDEX UNIQ_IDENTIFIER_EMAIL ON user');
        $this->addSql('ALTER TABLE user ADD activation_code VARCHAR(255) DEFAULT NULL, ADD activation_code_sent_at DATETIME DEFAULT NULL, CHANGE id id VARCHAR(255) NOT NULL, CHANGE email email VARCHAR(255) NOT NULL, CHANGE roles roles VARCHAR(255) NOT NULL, CHANGE birth_at birth_at DATE DEFAULT NULL, CHANGE first_name first_name VARCHAR(255) DEFAULT NULL, CHANGE last_name last_name VARCHAR(255) DEFAULT NULL, CHANGE phone phone VARCHAR(255) DEFAULT NULL, CHANGE siret siret VARCHAR(255) DEFAULT NULL');
    }
}
