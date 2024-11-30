<?php 

namespace App\Component;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Admin;

class AdminManager
{
    public function __construct(private EntityManagerInterface $entityManagerInterface)
    {}

    public function save(Admin $admin,$isNeedFlush = false)
    {
         $this->entityManagerInterface->persist($admin);

         if($isNeedFlush){
            $this->entityManagerInterface->flush();
         }
    }
}