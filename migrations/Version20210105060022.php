<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210105060022 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_736D0B65A76ED395');
        $this->addSql('CREATE TEMPORARY TABLE __temp__toy_request AS SELECT id, user_id, name FROM toy_request');
        $this->addSql('DROP TABLE toy_request');
        $this->addSql('CREATE TABLE toy_request (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER DEFAULT NULL, name VARCHAR(255) NOT NULL COLLATE BINARY, status CLOB NOT NULL --(DC2Type:array)
        , CONSTRAINT FK_736D0B65A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO toy_request (id, user_id, name) SELECT id, user_id, name FROM __temp__toy_request');
        $this->addSql('DROP TABLE __temp__toy_request');
        $this->addSql('CREATE INDEX IDX_736D0B65A76ED395 ON toy_request (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_736D0B65A76ED395');
        $this->addSql('CREATE TEMPORARY TABLE __temp__toy_request AS SELECT id, user_id, name FROM toy_request');
        $this->addSql('DROP TABLE toy_request');
        $this->addSql('CREATE TABLE toy_request (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER DEFAULT NULL, name VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO toy_request (id, user_id, name) SELECT id, user_id, name FROM __temp__toy_request');
        $this->addSql('DROP TABLE __temp__toy_request');
        $this->addSql('CREATE INDEX IDX_736D0B65A76ED395 ON toy_request (user_id)');
    }
}
