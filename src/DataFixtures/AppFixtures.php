<?php

namespace App\DataFixtures;

use App\Entity\MicroPost;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        
        $microPost1 = new MicroPost();
        $microPost1->setTitle('welcome to England!');
        $microPost1->setText('hey this is your post text');
        $microPost1->setCreated(new DateTime());
        $microPost1->setDatecreated(new DateTime());
        $manager->persist($microPost1);

        $microPost2 = new MicroPost();
        $microPost2->setTitle('welcome to France!');
        $microPost2->setText('hey this is your post text twooooo');
        $microPost2->setCreated(new DateTime());
        $microPost2->setDatecreated(new DateTime());
        $manager->persist($microPost2);

        $manager->flush();
    }
}
