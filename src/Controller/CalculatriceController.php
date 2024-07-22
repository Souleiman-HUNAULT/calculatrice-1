<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CalculatriceController extends AbstractController
{
    #[Route('/', name: 'app_calculatrice')]
    public function index(Request $request): Response
    {
        $resultat = null;
        if ($request->isMethod('POST')) {
            $nombre1 = $request->request->get('nombre1');
            $nombre2 = $request->request->get('nombre2');
            $operation = $request->request->get('operation');

            switch ($operation) {
                case 'addition':
                    $resultat = $nombre1 + $nombre2;
                    break;
                case 'soustraction':
                    $resultat = $nombre1 - $nombre2;
                    break;
                case 'multiplication':
                    $resultat = $nombre1 * $nombre2;
                    break;
                case 'division':
                    $resultat = $nombre2 != 0 ? $nombre1 / $nombre2 : 'Erreur';
                    break;
            }
        }
        return $this->render('calculatrice/index.html.twig', [
            'resultat' => $resultat,
        ]);
    }
}
