<?php

namespace App\DataFixtures;

use App\Entity\Comment;
use App\Entity\Trick;
use App\Entity\User;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class CommentFixtures extends Fixture implements DependentFixtureInterface
{
    CONST COMMENTS =
        [
            "Ouai trop fort !",
            "Wow le ouf j'aimerais trop faire la même...un jour lol",
            "Moi franchement je vais continuer le ski eh eh",
            "Le snow le meilleur sport du moooooonde les gars",
            "C'était ou ce spot ? J'aimerais trop allez rider là bas aussi.",
            "Moi j'arrive pas à graber le noze de ma board par contre pas de problème pour le tail.",
            "C'est pas dur essaye de changer de partir en switch",
            "Vous êtes plus goofy ou regular ? Moi je pense que je suis regular.",
            "C'est top ce site franchement je vais prévenir mes potes pour qu'ils viennent",
            "J'ai un bon pop sur les frontside nose-roll nollies parce que je les fais à partir d’un carve",
            "La vie est comme le snowboard, il faut se relever à chaque fois que l’on tombe je sais plus qui à dit ça !",
            "Comme dit Shawn White : Certaines personnes attachent des snowboards à leurs pieds, très peu les attachent à leur âme.",
            "C'est trop beau j'en ai les larmes aux yeux",
            "Utiliser votre cerveau, c'est la partie la plus importante de votre équipement les gars !",
            "Y a des gens des Arcs qui voudrais aller rider au snow Park avec moi ?",
            "Keep calm and snow tout droit !",
            "Au moins nous on s'embête pas avec des bâtons. Vive le free ride !"
        ];

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        foreach (CommentFixtures::COMMENTS as $commentData) {
            $trick = $this->getReference('trick' . mt_rand(0, max(array_keys(TrickFixtures::TRICKS_DATA))));
            $user = $this->getReference('user' . mt_rand(1, UserFixtures::DATA));

            $comment = new Comment();

            $comment
                ->setContent($commentData)
                ->setTrick($trick)
                ->setAuthor($user)
                ->setCreatedAt(max($user->getCreatedAt(), $trick->getCreatedAt()));

            $manager->persist($comment);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            TrickFixtures::class,
            UserFixtures::class

        ];
    }
}
