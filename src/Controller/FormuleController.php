<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\FormuleRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class FormuleController extends AbstractController
{
    #[Route('/formule', name: 'app_formule')]
    public function index(FormuleRepository $formuleRepository, SessionInterface $session): Response
    {
        $panier = $session->get('panier', []);

        $panierWithData = [];

        foreach($panier as $id => $quantity) {
            $formule = $formuleRepository->find($id);
            
            if ($formule !== null) {
                $panierWithData[] = [
                    'formule' => $formule,
                    'quantité' => $quantity
                ];
            } else {
                // Si la formule n'existe pas, vous pouvez gérer cette situation
                // Par exemple, supprimer l'élément du panier ou afficher un message
            }
        }

        $total = 0;

        foreach($panierWithData as $item) {
            if ($item['formule'] !== null) {
                $totalItem = $item['formule']->getTarif() * $item['quantité'];
                $total += $totalItem;
            } else {
                // Gérez le cas où la formule n'est pas trouvée (facultatif)
                // Par exemple, vous pouvez ignorer cet élément ou afficher un message d'erreur
            }
        }

        return $this->render('formule/tarifs.html.twig', [
            'formules' => $formuleRepository->findAll(),
            'items' => $panierWithData,
            'total' => $total
        ]);
        
    }
    

    #[Route('/formule/add/{id}', name: 'formule_add')]
    public function add($id, SessionInterface $session): Response
    {
        $panier = $session->get('panier', []);

        // Ajout de l'ID dans le panier avec une quantité de 1
        if (!empty($panier[$id])) {
            $panier[$id]++;
        } else {
            $panier[$id] = 1;
        }

        $session->set('panier', $panier);

        return $this->redirectToRoute("app_formule");
    }

    #[Route('/panier/remove/{id}', name: 'panier_remove')]
    public function remove($id, SessionInterface $session) {
        $panier = $session->get('panier', []);

        if(!empty($panier[$id])) {
            unset($panier[$id]);
        }

        $session->set('panier', $panier);   

        return $this->redirectToRoute("app_formule");
    }
}
