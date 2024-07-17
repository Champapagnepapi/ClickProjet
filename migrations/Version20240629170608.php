<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240629170608 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE administrateur (id INT NOT NULL, PRIMARY KEY (id))');
        $this->addSql('CREATE TABLE apprennant (id INT NOT NULL, categorie NVARCHAR(255) NOT NULL, niveau NVARCHAR(255), classe NVARCHAR(255) NOT NULL, type NVARCHAR(255) NOT NULL, PRIMARY KEY (id))');
        $this->addSql('CREATE TABLE client (id INT NOT NULL, PRIMARY KEY (id))');
        $this->addSql('CREATE TABLE comptabilite (id INT NOT NULL, PRIMARY KEY (id))');
        $this->addSql('CREATE TABLE cours (id INT IDENTITY NOT NULL, langue NVARCHAR(255) NOT NULL, libelle NVARCHAR(1000) NOT NULL, PRIMARY KEY (id))');
        $this->addSql('CREATE TABLE educateur (id INT NOT NULL, classe NVARCHAR(255) NOT NULL, langue NVARCHAR(255) NOT NULL, niveau NVARCHAR(255), date_payement DATETIME2(6), status NVARCHAR(255), date_renouvellement DATETIME2(6), estdinsponible BIT NOT NULL, PRIMARY KEY (id))');
        $this->addSql('CREATE TABLE matieres (id INT IDENTITY NOT NULL, intitule NVARCHAR(255) NOT NULL, niveau NVARCHAR(255) NOT NULL, classe NVARCHAR(255) NOT NULL, PRIMARY KEY (id))');
        $this->addSql('CREATE TABLE [user] (id INT IDENTITY NOT NULL, email NVARCHAR(180) NOT NULL, roles VARCHAR(MAX) NOT NULL, password NVARCHAR(255) NOT NULL, nom NVARCHAR(255) NOT NULL, prenom NVARCHAR(255) NOT NULL, adresse NVARCHAR(500) NOT NULL, numero INT NOT NULL, ville NVARCHAR(1000) NOT NULL, profession NVARCHAR(255) NOT NULL, quartier NVARCHAR(500) NOT NULL, pays NVARCHAR(1000) NOT NULL, discriminator NVARCHAR(255) NOT NULL, PRIMARY KEY (id))');
        $this->addSql('EXEC sp_addextendedproperty N\'MS_Description\', N\'(DC2Type:json)\', N\'SCHEMA\', \'dbo\', N\'TABLE\', \'user\', N\'COLUMN\', roles');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT IDENTITY NOT NULL, body VARCHAR(MAX) NOT NULL, headers VARCHAR(MAX) NOT NULL, queue_name NVARCHAR(190) NOT NULL, created_at DATETIME2(6) NOT NULL, available_at DATETIME2(6) NOT NULL, delivered_at DATETIME2(6), PRIMARY KEY (id))');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
        $this->addSql('EXEC sp_addextendedproperty N\'MS_Description\', N\'(DC2Type:datetime_immutable)\', N\'SCHEMA\', \'dbo\', N\'TABLE\', \'messenger_messages\', N\'COLUMN\', created_at');
        $this->addSql('EXEC sp_addextendedproperty N\'MS_Description\', N\'(DC2Type:datetime_immutable)\', N\'SCHEMA\', \'dbo\', N\'TABLE\', \'messenger_messages\', N\'COLUMN\', available_at');
        $this->addSql('EXEC sp_addextendedproperty N\'MS_Description\', N\'(DC2Type:datetime_immutable)\', N\'SCHEMA\', \'dbo\', N\'TABLE\', \'messenger_messages\', N\'COLUMN\', delivered_at');
        $this->addSql('ALTER TABLE administrateur ADD CONSTRAINT FK_32EB52E8BF396750 FOREIGN KEY (id) REFERENCES [user] (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE apprennant ADD CONSTRAINT FK_BA6A1191BF396750 FOREIGN KEY (id) REFERENCES [user] (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455BF396750 FOREIGN KEY (id) REFERENCES [user] (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE comptabilite ADD CONSTRAINT FK_A737A41BBF396750 FOREIGN KEY (id) REFERENCES [user] (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE educateur ADD CONSTRAINT FK_763C0122BF396750 FOREIGN KEY (id) REFERENCES [user] (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA db_accessadmin');
        $this->addSql('CREATE SCHEMA db_backupoperator');
        $this->addSql('CREATE SCHEMA db_datareader');
        $this->addSql('CREATE SCHEMA db_datawriter');
        $this->addSql('CREATE SCHEMA db_ddladmin');
        $this->addSql('CREATE SCHEMA db_denydatareader');
        $this->addSql('CREATE SCHEMA db_denydatawriter');
        $this->addSql('CREATE SCHEMA db_owner');
        $this->addSql('CREATE SCHEMA db_securityadmin');
        $this->addSql('CREATE SCHEMA dbo');
        $this->addSql('ALTER TABLE administrateur DROP CONSTRAINT FK_32EB52E8BF396750');
        $this->addSql('ALTER TABLE apprennant DROP CONSTRAINT FK_BA6A1191BF396750');
        $this->addSql('ALTER TABLE client DROP CONSTRAINT FK_C7440455BF396750');
        $this->addSql('ALTER TABLE comptabilite DROP CONSTRAINT FK_A737A41BBF396750');
        $this->addSql('ALTER TABLE educateur DROP CONSTRAINT FK_763C0122BF396750');
        $this->addSql('DROP TABLE administrateur');
        $this->addSql('DROP TABLE apprennant');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE comptabilite');
        $this->addSql('DROP TABLE cours');
        $this->addSql('DROP TABLE educateur');
        $this->addSql('DROP TABLE matieres');
        $this->addSql('DROP TABLE [user]');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
