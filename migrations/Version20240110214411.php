<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240110214411 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__user AS SELECT id, name, black_win, white_win, black_lose, white_lose, best_game FROM user');
        $this->addSql('DROP TABLE user');
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, black_win INTEGER NOT NULL, white_win INTEGER NOT NULL, black_lose INTEGER NOT NULL, white_lose INTEGER NOT NULL, best_game INTEGER DEFAULT NULL)');
        $this->addSql('INSERT INTO user (id, name, black_win, white_win, black_lose, white_lose, best_game) SELECT id, name, black_win, white_win, black_lose, white_lose, best_game FROM __temp__user');
        $this->addSql('DROP TABLE __temp__user');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__user AS SELECT id, name, black_win, white_win, black_lose, white_lose, best_game FROM user');
        $this->addSql('DROP TABLE user');
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, black_win INTEGER NOT NULL, white_win INTEGER NOT NULL, black_lose INTEGER NOT NULL, white_lose INTEGER NOT NULL, best_game INTEGER NOT NULL)');
        $this->addSql('INSERT INTO user (id, name, black_win, white_win, black_lose, white_lose, best_game) SELECT id, name, black_win, white_win, black_lose, white_lose, best_game FROM __temp__user');
        $this->addSql('DROP TABLE __temp__user');
    }
}
