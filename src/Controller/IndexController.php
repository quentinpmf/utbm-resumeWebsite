<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

//require __DIR__.'../../vendor/autoload.php';

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="app_index")
     */
    public function number()
    {
        return $this->render('base.html.twig');
    }
}
