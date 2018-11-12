<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Tag;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ArticleFixtures extends Fixture implements DependentFixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();

        $tags = $manager->getRepository(Tag::class)->findAll();

        for ($i = 0; $i < 20; $i++) {
            $article = (new Article())
                ->setTitle($faker->firstName)
                ->setContent($faker->text())
                ->addTag($tags[array_rand($tags)])
            ;
            $manager->persist($article);
        }

        $manager->flush();
    }

    /**
     * @return array
     */
    public function getDependencies()
    {
        return [TagFixtures::class];
    }
}