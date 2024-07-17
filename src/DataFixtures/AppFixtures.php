<?php

// src/DataFixtures/AppFixtures.php
namespace App\DataFixtures;

use App\Entity\Matieres;
use App\Entity\User;
use App\Entity\Educateur;
use App\Entity\Apprennant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager)
    {
        // Creating a basic User
        $user = new User();
        $user->setEmail('user@example.com');
        $user->setPassword($this->passwordHasher->hashPassword($user, 'password'));
        $user->setRoles(['ROLE_USER']);
        $user->setNom('Doe');
        $user->setPrenom('John');
        $user->setAdresse('123 Main St');
        $user->setNumero(1234567890);
        $user->setVille('Douala');
        $user->setProfession('Developer');
        $user->setQuartier('Bonamoussadi');
        $user->setPays('Cameroon');
        $manager->persist($user);

        // Creating an Educateur
        $educateur = new Educateur();
        $educateur->setEmail('educateur@example.com');
        $educateur->setPassword($this->passwordHasher->hashPassword($educateur, 'password'));
        $educateur->setRoles(['ROLE_EDUCATEUR']);
        $educateur->setNom('Smith');
        $educateur->setPrenom('Jane');
        $educateur->setAdresse('456 Secondary St');
        $educateur->setNumero(1234567891);
        $educateur->setVille('Yaoundé');
        $educateur->setProfession('Teacher');
        $educateur->setQuartier('Mokolo');
        $educateur->setPays('Cameroon');
        $educateur->setClasse('CE2');
        $educateur->setLangue('French');
        $educateur->setNiveau('Primary');
        $educateur->setDatePayement(new \DateTime('now'));
        $educateur->setStatus('Paid');
        $educateur->setDateRenouvellement(new \DateTime('next year'));
        $educateur->setEstdinsponible(true);
        $manager->persist($educateur);

        // Creating an Apprennant
        $apprennant = new Apprennant();
        $apprennant->setEmail('apprennant@example.com');
        $apprennant->setPassword($this->passwordHasher->hashPassword($apprennant, 'password'));
        $apprennant->setRoles(['ROLE_APPRENNANT']);
        $apprennant->setNom('Brown');
        $apprennant->setPrenom('Mike');
        $apprennant->setAdresse('789 Tertiary St');
        $apprennant->setNumero(1234567892);
        $apprennant->setVille('Bamenda');
        $apprennant->setProfession('Student');
        $apprennant->setQuartier('Nkwen');
        $apprennant->setPays('Cameroon');
        $apprennant->setCategorie('Apprenant autodidacte');
        $apprennant->setNiveau('Secondary');
        $apprennant->setClasse('Seconde');
        $apprennant->setType('Francophone');
        $manager->persist($apprennant);


        $matieresData = [
            ['intitule' => 'Mathématiques', 'niveau' => 'Primaire', 'classe' => 'CE1'],
            ['intitule' => 'Français', 'niveau' => 'Secondaire', 'classe' => 'Seconde'],
            ['intitule' => 'Histoire', 'niveau' => 'Universitaire', 'classe' => 'L1'],
            ['intitule' => 'Sciences', 'niveau' => 'Secondaire', 'classe' => 'Terminale'],
            ['intitule' => 'Anglais', 'niveau' => 'Secondaire', 'classe' => 'Terminale'],
            ['intitule'=> 'Mathématique', 'niveau'=> 'Universitaire', 'classe'=> 'L3']
        ];

        foreach ($matieresData as $data) {
            $matiere = new Matieres();
            $matiere->setIntitule($data['intitule']);
            $matiere->setNiveau($data['niveau']);
            $matiere->setClasse($data['classe']);
            $manager->persist($matiere);
        }
        // Persist all changes
        $manager->flush();
    }
}

