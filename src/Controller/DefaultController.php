<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", methods={"GET"})
     */
    public function index(): Response
    {
        $number = random_int(0, 100);

        $maxNumbers = 7;
        $maxNumberRange = 50;
        $numbers = range(1, $maxNumberRange);
        shuffle($numbers);
        $drawn = array_slice($numbers, - $maxNumbers);
        sort($drawn);

        return $this->render('default/index.html.twig', [
            'number' => $number,
            'olg' => implode(' ', $drawn),
        ]);
    }
}
