<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240419150415 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE barre_en_stock (id INT AUTO_INCREMENT NOT NULL, produit_id INT DEFAULT NULL, stock_id INT DEFAULT NULL, longueur DOUBLE PRECISION NOT NULL, nombre_barre INT NOT NULL, UNIQUE INDEX UNIQ_A839066AF347EFB (produit_id), UNIQUE INDEX UNIQ_A839066ADCD6110 (stock_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT DEFAULT NULL, livraison_id INT DEFAULT NULL, date_commande DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', type_commande VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_6EEAA67DFB88E14F (utilisateur_id), UNIQUE INDEX UNIQ_6EEAA67D8E54FB25 (livraison_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fournir_produit (id INT AUTO_INCREMENT NOT NULL, quantite INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fournisseur (id INT AUTO_INCREMENT NOT NULL, fournir_produit_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, rue VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, code_postal INT NOT NULL, email VARCHAR(255) NOT NULL, INDEX IDX_369ECA323187F06A (fournir_produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE historique_prix (id INT AUTO_INCREMENT NOT NULL, produit_id INT DEFAULT NULL, date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', prix DOUBLE PRECISION NOT NULL, marge DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_73B6CDBCF347EFB (produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ligne_commande (id INT AUTO_INCREMENT NOT NULL, commande_id INT DEFAULT NULL, produit_id INT DEFAULT NULL, longueur DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_3170B74B82EA2E54 (commande_id), UNIQUE INDEX UNIQ_3170B74BF347EFB (produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livraison (id INT AUTO_INCREMENT NOT NULL, date_livraison DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, fournir_produit_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, epaisseur DOUBLE PRECISION NOT NULL, hauteur DOUBLE PRECISION NOT NULL, largeur DOUBLE PRECISION NOT NULL, kg_par_m DOUBLE PRECISION NOT NULL, prix_par_kg DOUBLE PRECISION NOT NULL, hebhea INT NOT NULL, epaisseur_semelle DOUBLE PRECISION NOT NULL, epaisseur_lame DOUBLE PRECISION NOT NULL, hauteur_lame DOUBLE PRECISION NOT NULL, largeur_semelle DOUBLE PRECISION NOT NULL, section_cm2 DOUBLE PRECISION NOT NULL, diametre_exterieur DOUBLE PRECISION NOT NULL, hauteur_aile DOUBLE PRECISION NOT NULL, INDEX IDX_29A5EC273187F06A (fournir_produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, type_role VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stock (id INT AUTO_INCREMENT NOT NULL, entrepot VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, role_id INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, telephone INT NOT NULL, rue VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, code_postal INT NOT NULL, nom_entreprise VARCHAR(255) DEFAULT NULL, siret INT DEFAULT NULL, type_utilisateur VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_1D1C63B3D60322AC (role_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE barre_en_stock ADD CONSTRAINT FK_A839066AF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE barre_en_stock ADD CONSTRAINT FK_A839066ADCD6110 FOREIGN KEY (stock_id) REFERENCES stock (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D8E54FB25 FOREIGN KEY (livraison_id) REFERENCES livraison (id)');
        $this->addSql('ALTER TABLE fournisseur ADD CONSTRAINT FK_369ECA323187F06A FOREIGN KEY (fournir_produit_id) REFERENCES fournir_produit (id)');
        $this->addSql('ALTER TABLE historique_prix ADD CONSTRAINT FK_73B6CDBCF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE ligne_commande ADD CONSTRAINT FK_3170B74B82EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id)');
        $this->addSql('ALTER TABLE ligne_commande ADD CONSTRAINT FK_3170B74BF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC273187F06A FOREIGN KEY (fournir_produit_id) REFERENCES fournir_produit (id)');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE barre_en_stock DROP FOREIGN KEY FK_A839066AF347EFB');
        $this->addSql('ALTER TABLE barre_en_stock DROP FOREIGN KEY FK_A839066ADCD6110');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DFB88E14F');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D8E54FB25');
        $this->addSql('ALTER TABLE fournisseur DROP FOREIGN KEY FK_369ECA323187F06A');
        $this->addSql('ALTER TABLE historique_prix DROP FOREIGN KEY FK_73B6CDBCF347EFB');
        $this->addSql('ALTER TABLE ligne_commande DROP FOREIGN KEY FK_3170B74B82EA2E54');
        $this->addSql('ALTER TABLE ligne_commande DROP FOREIGN KEY FK_3170B74BF347EFB');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC273187F06A');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3D60322AC');
        $this->addSql('DROP TABLE barre_en_stock');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE fournir_produit');
        $this->addSql('DROP TABLE fournisseur');
        $this->addSql('DROP TABLE historique_prix');
        $this->addSql('DROP TABLE ligne_commande');
        $this->addSql('DROP TABLE livraison');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE stock');
        $this->addSql('DROP TABLE utilisateur');
    }
}
