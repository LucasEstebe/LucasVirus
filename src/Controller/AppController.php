<?php

namespace App\Controller;

use App\Repository\CountryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
     /**
     * @Route("/", name="app")
     */
    public function index()
    {
        return $this->redirectToRoute('country_index');
    }
}
