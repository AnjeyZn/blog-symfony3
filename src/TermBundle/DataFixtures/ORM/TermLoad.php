<?php

namespace TermBundle\DataFixtures\ORM;


use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use TermBundle\Entity\Term;

/**
 * Class TermLoad
 *
 * @package TermBundle\DataFixtures\ORM
 */
class TermLoad extends Fixture
{

    /**
     * Создаем сущности Term
     *
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 3; $i++) {
            $term = new Term();
            $term->setName('Term '.$i);
            $term->setDescription('Description '.$i);
            $term->setCreated(new DateTime());
            $manager->persist($term);
        }
        $manager->flush();
    }
}