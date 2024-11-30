<?php 

namespace App\Component;

use App\Entity\Admin;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AdminFactory
{
    public function __construct(private UserPasswordHasherInterface $userPasswordHasherInterface)
    {}
    public function create(string $email, string $password):Admin
    {
        
         $admin = new Admin();
         $hashedPassword = $this->userPasswordHasherInterface->hashPassword($admin,$password);
         
         $admin->setEmail($email);
         $admin->setPassword($hashedPassword);

         return $admin;
    }
}