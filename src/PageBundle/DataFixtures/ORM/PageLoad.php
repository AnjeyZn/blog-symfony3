<?php

namespace PageBundle\DataFixtures\ORM;


use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use PageBundle\Entity\Page;
use TermBundle\DataFixtures\ORM\TermLoad;
use TermBundle\Entity\Term;

/**
 * Class PageLoad
 *
 * @package PageBundle\DataFixtures\ORM
 */
class PageLoad extends Fixture implements DependentFixtureInterface
{

    /**
     * Создаем сущности Page
     *
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $termRepo = $manager->getRepository(Term::class);
        for ($i = 1; $i <=25; $i++) {
            $page = new Page();
            $page->setTitle('Page '.$i);
            $page->setBody('Body Page '.$i);
            $term = $termRepo->findOneByName('Term '. (string) mt_rand(1, 3));
            $page->setCategory($term);
            $page->setCreated(new DateTime());
            $manager->persist($page);
        }
        $manager->flush();
    }

    /**
     * Зависимость для Page (класс Term)
     *
     * @return array
     */
    function getDependencies()
    {
        return [
          TermLoad::class
        ];
    }
}