<?php declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Psr\Log\LoggerInterface;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", methods={"GET"})
     */
    public function index(LoggerInterface $logger): Response
    {
        /**
         * This is an example logger; we're using Monolog.
         * Check in ~/var/log/{env}.log to see the output of below.
         * 
         * @url https://symfony.com/doc/current/logging.html
         * @url https://github.com/Seldaek/monolog
         */
        $logger->info('Testing.. 1, 2, 3. We are now logging!');

        /**
         * Not much going on here.
         * Simply showing how we can send values to our template.
         */
        $numbers = range(1, 50);
        shuffle($numbers);
        $drawn = array_slice($numbers, - 7);
        sort($drawn);

        return $this->render('default/index.html.twig', [
            'number' => random_int(1, 100),
            'olg' => implode(' ', $drawn),
        ]);
    }
}
