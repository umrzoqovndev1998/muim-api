<?php

namespace App\Controller;

use App\Component\AdminFactory;
use App\Component\AdminManager;
use App\Entity\Admin;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminCreateAction extends AbstractController
{
    public function __construct(private AdminFactory $adminFactory,private AdminManager $adminManager)
    {

    }

    public function __invoke(Admin $data):Admin
    {
        $admin = $this->adminFactory->create($data->getEmail(),$data->getPassword());

        $this->adminManager->save($admin,true);

        return $admin;
    }

}