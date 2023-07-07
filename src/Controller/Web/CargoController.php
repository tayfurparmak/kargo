<?php

namespace App\Controller\Web;

use App\Entity\Cargo;
use App\Form\CargoType;
use App\Repository\CargoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('cargo')]
#[IsGranted('ROLE_USER')]
class CargoController extends AbstractController
{
    #[Route('/', name: 'web_cargo_new', methods: ['GET', 'POST'])]
    public function new(Request $request, CargoRepository $cargoRepository): Response
    {
        $cargo = new Cargo();
        $form = $this->createForm(CargoType::class, $cargo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $cargoRepository->save($cargo, true);

            return $this->redirectToRoute('app_home', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('cargo/new.html.twig', [
            'cargo' => $cargo,
            'form' => $form,
        ]);
    }
}
