<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231125151411 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON commande');
        $this->addSql('ALTER TABLE commande DROP id, CHANGE id_commande id_commande INT AUTO_INCREMENT NOT NULL, CHANGE id_membre id_membre INT DEFAULT NULL, CHANGE id_vehicule id_vehicule INT DEFAULT NULL, CHANGE date_enregistrement date_enregistrement DATETIME NOT NULL');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DD0834EC4 FOREIGN KEY (id_membre) REFERENCES membre (id_membre)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D79F41388 FOREIGN KEY (id_vehicule) REFERENCES vehicule (id_vehicule)');
        $this->addSql('CREATE INDEX IDX_6EEAA67DD0834EC4 ON commande (id_membre)');
        $this->addSql('CREATE INDEX IDX_6EEAA67D79F41388 ON commande (id_vehicule)');
        $this->addSql('ALTER TABLE commande ADD PRIMARY KEY (id_commande)');
        $this->addSql('ALTER TABLE membre MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON membre');
        $this->addSql('ALTER TABLE membre DROP id, CHANGE id_membre id_membre INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE membre ADD PRIMARY KEY (id_membre)');
        $this->addSql('ALTER TABLE vehicule MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON vehicule');
        $this->addSql('ALTER TABLE vehicule DROP id, CHANGE id_vehicule id_vehicule INT AUTO_INCREMENT NOT NULL, CHANGE titre titre VARCHAR(200) NOT NULL, CHANGE marque marque VARCHAR(50) NOT NULL, CHANGE modele modele VARCHAR(50) NOT NULL, CHANGE description description LONGTEXT NOT NULL, CHANGE photo photo VARCHAR(200) NOT NULL, CHANGE prix_journalier prix_journalier INT NOT NULL');
        $this->addSql('ALTER TABLE vehicule ADD PRIMARY KEY (id_vehicule)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DD0834EC4');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D79F41388');
        $this->addSql('DROP INDEX IDX_6EEAA67DD0834EC4 ON commande');
        $this->addSql('DROP INDEX IDX_6EEAA67D79F41388 ON commande');
        $this->addSql('ALTER TABLE commande ADD id INT AUTO_INCREMENT NOT NULL, CHANGE id_commande id_commande INT NOT NULL, CHANGE id_membre id_membre INT NOT NULL, CHANGE id_vehicule id_vehicule INT NOT NULL, CHANGE date_enregistrement date_enregistrement DATETIME DEFAULT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE membre ADD id INT AUTO_INCREMENT NOT NULL, CHANGE id_membre id_membre INT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE vehicule ADD id INT AUTO_INCREMENT NOT NULL, CHANGE id_vehicule id_vehicule INT NOT NULL, CHANGE titre titre VARCHAR(200) DEFAULT NULL, CHANGE marque marque VARCHAR(50) DEFAULT NULL, CHANGE modele modele VARCHAR(50) DEFAULT NULL, CHANGE description description LONGTEXT DEFAULT NULL, CHANGE photo photo VARCHAR(200) DEFAULT NULL, CHANGE prix_journalier prix_journalier INT DEFAULT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
    }
}
