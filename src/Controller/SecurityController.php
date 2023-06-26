<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class SecurityController extends AbstractController
{
    
    public function __construct(private UrlGeneratorInterface $urlGenerator)
    {
    }

    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
       //  if ($this->getUser()) {
         //   return $this->redirectToRoute(route:'admin');
    //     }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/adminlogin.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    #[Route(path: '/admin/login', name: 'admin_login')]
    public function adminlogin(AuthenticationUtils $authenticationUtils): Response
    {
       // if ($this->getUser()) {
         //   return $this->redirectToRoute(route:'admin');
       // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/adminlogin.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }
    #[Route(path: '/logout', name: 'app_logout')]
    public function logout()
    {
        return new RedirectResponse($this->urlGenerator->generate('app_homepage'));
    }
}
