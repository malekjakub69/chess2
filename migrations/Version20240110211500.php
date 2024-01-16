<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240110211500 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, black_win INTEGER NOT NULL, white_win INTEGER NOT NULL, black_lose INTEGER NOT NULL, white_lose INTEGER NOT NULL, best_game INTEGER NOT NULL)');
        $this->addSql('DROP TABLE users');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE users (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL COLLATE "BINARY", black_win INTEGER NOT NULL, white_win INTEGER NOT NULL, black_lose INTEGER NOT NULL, white_lose INTEGER NOT NULL, best_game INTEGER NOT NULL)');
        $this->addSql('DROP TABLE user');
    }
}
