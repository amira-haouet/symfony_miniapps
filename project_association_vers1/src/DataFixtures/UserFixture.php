<?php

namespace App\DataFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use App\Entity\User;

use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
private $passwordEncoder;
public function __construct(UserPasswordEncoderInterface $passwordEncoder)
{
$this->passwordEncoder = $passwordEncoder;
}
public function load(ObjectManager $manager)
{
$user = new User();
$user->setEmail('haouet@gmail.com');
$user->setRoles(['ROLE_ADMIN']);
$user->setPassword($this->passwordEncoder->encodePassword(
$user,
'0000'
));
$manager->persist($user);
$user2 = new User();
$user2->setEmail('haoueta@gmail.com');
$user2->setPassword($this->passwordEncoder->encodePassword(
$user2,
'1111'
));
$manager->persist($user2);
$manager->flush();
}
}