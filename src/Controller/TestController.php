<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TestController extends AbstractController
{
    /**
     * @Route("/test", methods={"GET"})
     */
    public function test()
    {
        return new Response(
            '
                <!doctype html>
                <html>
                    <head>
                        <title>mferly/mferly</title>
                        <link href="data:image/x-icon;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAA/ElEQVQ4Ed3SsSuFYRQG8F/dGK4YbJLJSCnlDyCDhdFkN8km012VLIrc9S7KZvWP3K4km0FiEINu6Hydr957DcrGqdP3nvM85+l7zvvy72IKuzjD6VBGL7DgfItxHKKduZyMdWxgBEs4SdHgxkwVkzhHC894x1jmJyKnMYpXPGIvZ2LWMbbxkeQQCGAx6xBYwQTestfHVs5Wfq8Kcgx0cVf07tEr6uBc5K4qgcshMAg/ZacWCAureMJ12rnNvwg7Ye0GD9jP/gvWagv1EqNxlIudzaXt5O00sJDYATbLJUa/vsYA55MYnyZminoOwRm4xgKvHsmvHlIp8sfOXxaST6xSO0JHAAAAAElFTkSuQmCC" rel="icon" type="image/x-icon" />
                        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
                        <style>
                            body {
                                font-family: \'Open Sans\', sans-serif;
                            }
                        </style>
                    </head>
                    <body>
                        This is just a test route..
                    </body>
                </html>
            '
        );
    }
}
