<?php

namespace App\Controller;

use App\Entity\MonEntite;
use App\Form\MonEntiteType;
use App\Repository\MonEntiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/mon/entite")
 */
class MonEntiteController extends AbstractController
{
    /**
     * @Route("/", name="mon_entite_index", methods={"GET"})
     */
    public function index(MonEntiteRepository $monEntiteRepository): Response
    {
        return $this->render('mon_entite/index.html.twig', [
            'mon_entites' => $monEntiteRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="mon_entite_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $monEntite = new MonEntite();
        $form = $this->createForm(MonEntiteType::class, $monEntite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($monEntite);
            $entityManager->flush();

            return $this->redirectToRoute('mon_entite_index');
        }

        return $this->render('mon_entite/new.html.twig', [
            'mon_entite' => $monEntite,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="mon_entite_show", methods={"GET"})
     */
    public function show(MonEntite $monEntite): Response
    {
        return $this->render('mon_entite/show.html.twig', [
            'mon_entite' => $monEntite,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="mon_entite_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, MonEntite $monEntite): Response
    {
        $form = $this->createForm(MonEntiteType::class, $monEntite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('mon_entite_index');
        }

        return $this->render('mon_entite/edit.html.twig', [
            'mon_entite' => $monEntite,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="mon_entite_delete", methods={"DELETE"})
     */
    public function delete(Request $request, MonEntite $monEntite): Response
    {
        if ($this->isCsrfTokenValid('delete'.$monEntite->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($monEntite);
            $entityManager->flush();
        }

        return $this->redirectToRoute('mon_entite_index');
    }
}
