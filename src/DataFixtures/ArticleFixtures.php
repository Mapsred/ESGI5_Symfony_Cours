<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Tag;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ArticleFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');
        $tags = $manager->getRepository(Tag::class)->findBy([], null, 3);
        for ($i = 0; $i < 10; $i++) {
            $article = new Article();
            $article
                ->setContent($faker->text)
                ->setSlug($faker->slug)
                ->setTitle($faker->title)
                ->setTags($tags);

            $manager->persist($article);
        }

        $manager->flush();
    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on
     *
     * @return array
     */
    public function getDependencies()
    {
        return [
            TagFixtures::class
        ];
    }
}
