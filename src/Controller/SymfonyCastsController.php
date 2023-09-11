<?php

namespace App\Controller;

use App\Entity\SymfonyCasts;
use App\Form\SymfonyCastsTwoType;
use App\Repository\SymfonyCastsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SymfonyCastsController extends AbstractController
{
    #[Route('/symfony/casts', name: 'app_symfony_casts')]
    public function index(EntityManagerInterface $em, Request $request): Response

    {

        $form = $this->createForm(SymfonyCastsTwoType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $data = $form->getData();
            // $cast = new SymfonyCasts();
            // $cast->setTitle($data->getTitle());
            // $cast->setContent($data->getContent());


            $em->persist($data);

            $em->flush();

            $this->addFlash('success', 'Flash AHA savoir of the universe');

            return $this->redirectToRoute('app_symfony_casts_all');
        }


        return $this->render('symfony_casts/index.html.twig', [
            'controller_name' => 'SymfonyCastsController',
            'myForm' => $form->createView(),

        ]);
    }

    #[Route('/symfony/casts/all', name: 'app_symfony_casts_all')]
    public function showAll(EntityManagerInterface $em, SymfonyCastsRepository $repo): Response
    {

        $casts = $repo->findAll();


        return $this->render(
            'symfony_casts/all.html.twig',
            [
                'casts' => $casts,
            ]
        );
    }
    #[Route('/symfony/casts/{id}/edit', name: 'app_symfony_casts_edit')]
    public function edit(SymfonyCasts $casts, EntityManagerInterface $em, Request $request): Response

    {

        $form = $this->createForm(SymfonyCastsTwoType::class, $casts);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $data = $form->getData();
            $em->persist($data);
            $em->flush();

            $this->addFlash('success', 'Flash AARTICLE UPDATED savoir of the universe');

            return $this->redirectToRoute('app_symfony_casts_edit', [
                'id' => $casts->getId(),
            ]);
        }


        return $this->render('symfony_casts/index.html.twig', [
            'controller_name' => 'SymfonyCastsController',
            'myForm' => $form->createView(),

        ]);
    }
}
