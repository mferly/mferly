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
    public function index()
    {
        $number = random_int(0, 100);

        return new Response(
            '
                <!doctype html>
                <html>
                    <head>
                        <link rel="shortcut icon" href="data:image/x-icon;," type="image/x-icon">
                        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
                        <style>
                            body {
                                font-family: \'Open Sans\', sans-serif;
                            }
                        </style>
                    </head>
                    <body>
                        Marc\'s (random) lucky number is <b>'. $number .'</b>
                    </body>
                </html>
            '
        );
    }
}
