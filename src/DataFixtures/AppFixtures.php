<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Comment;
use App\Entity\Trick;
use App\Entity\User;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


 class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
{
    // TODO: Implement load() method.
}
/*    const CATEGORIES = [
        'Front',
        'Flip',
        'Back',
        'Rotations',
        'Grabs'
    ];
    const TRICKS_DATA = [
        ['title' => 'Backside air'],
        ['title' => 'Mc Twist'],
        ['title' => 'Cork'],
        ['title' => 'Crippler'],
        ['title' => 'Backside rodeo'],
    ];

    public function __construct(
        private UserPasswordHasherInterface $passwordHasher
    )
    {
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($u = 0; $u < 20; $u++) {
            $user = new User;
            $passHashed = $this->passwordHasher->hashPassword($user, 'password');
            $user
                ->setEmail($faker->email())
                ->setPassword($passHashed)
                ->setCreatedAt($faker->dateTimebetween('-7 days'));

            $manager->persist($user);
        }
        for ($c = 0; $c < count(self::CATEGORIES); ++$c) {
            $category = new Category();

            $category
                ->setName(self::CATEGORIES[$c]);

            $manager->persist($category);
        }

        foreach (self::TRICKS_DATA as $t => $titles) {
           $date = $faker->dateTimeBetween('-2 months');

            $trick = (new Trick())
                ->setAuthor($user)
                ->setTitle($t)
                ->setDescription($faker->paragraph())
                ->setCreatedAt($date)
                ->setUpdatedAt($date);

            $manager->persist($trick);


        for ($co = 0; $co < mt_rand(5, 20); ++$co) {

            $date = max($user->getCreatedAt(), $trick->getCreatedAt());
            $comment = new Comment();
            $comment
                ->setContent($faker->paragraph())
                ->setCreatedAt($faker->dateTimeBetween('-' . (new DateTime())->diff($date)->days . 'days'))
                ->setTrick($trick)
                ->setAuthor($user);

            $manager->persist($comment);
        }
        }

        $manager->flush();
    }*/

}

