<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Trick;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
class AppFixtures extends Fixture
{
    const CATEGORIES = [
        'Front',
        'Flip',
        'Back',
        'Rotations',
        'Grabs'
    ];
    const TRICKS_DATA = [
        [ 'title' => 'Backside air'],
        [ 'title' => 'Mc Twist'],
        [ 'title' => 'Cork'],
        [ 'title' => 'Crippler'],
        [ 'title' => 'Backside rodeo'],
    ];

    public function __construct(
        private UserPasswordHasherInterface $passwordHasher
    ){}

    public function load(ObjectManager $manager,): void
    {
        $faker = Factory::create();

        for ($u = 0; $u < 20; $u++) {
            $user = new User;
            $passHashed = $this->passwordHasher->hashPassword($user, 'password');
            $user
                ->setEmail($faker->email)
                ->setPassword($passHashed)
                ->setCreatedAt($faker->dateTimebetween('-7 days'));

            $manager->persist($user);

            for ($c = 0; $c < count(self::CATEGORIES); ++$c) {
                $category = new Category();

                $category
                    ->setName(self::CATEGORIES[$c]);

                $manager->persist($category);
            }

            for ($t = 0; $t < self::TRICKS_DATA; ++$t) {
                $titles = self::TRICKS_DATA;
                $date = $faker->dateTimeBetween('-2 months');

                $trick = (new Trick())
                    ->setAuthor($user)
                    ->setTitle($titles['title'])
                    ->setDescription($faker->paragraph)
                    ->setCreatedAt($date)
                    ->setUpdatedAt($date);

                $manager->persist($trick);

            }
            for ($co = 0; $co < mt_rand(10, 40); ++$co){
                $maxDate = max($user->getCreatedAt(), $trick->getCreatedAt());
}

        }

        $manager->flush();
    }
}