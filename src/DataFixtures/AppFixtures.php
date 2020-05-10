<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('en_GB');
        for($i = 0; $i <= 10; $i++) {
            $category = new Category();
            $category->setName($faker->sentence(2));
            $manager->persist($category);
            $article = new Article();
            $article->setTitle($faker->sentence(6))->setContent($faker->paragraph(3))->setCategory($category);
            $manager->persist($article);
        }
        $manager->flush();
    }
}
