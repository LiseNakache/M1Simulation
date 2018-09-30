<?php
namespace miageSimulation\AdminBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use miageSimulation\AdminBundle\Entity\Subject;

class LoadSubject implements FixtureInterface
{
    // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
    public function load(ObjectManager $manager)
    {
        // Liste des noms de catégorie à ajouter
        $names = array(
            'Mathématiques',
            'Base de données',
            'Statistiques',
        );

        $coefs = array(
            '8',
            '2',
            '4',
        );

        $teacherNames = array(
            'Dupont',
            'Dupuis',
            'Lala',
        );

        for ($i = 0; $i < 3; $i++) {
            $subject = new Subject();
            $subject->setName($names[$i]);
            $subject->setCoef($coefs[$i]);
            $subject->setTeacherName($teacherNames[$i]);;
            $manager->persist($subject);
        }

        // On déclenche l'enregistrement de toutes les catégories
        $manager->flush();
    }
}