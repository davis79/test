<?php

namespace App\Controller;

use App\Entity\KartaProduktu;
use App\Form\KartaProduktuType;
use App\Repository\KartaProduktuRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/karta_produktu")
 */
class KartaProduktuController extends AbstractController
{
    /**
     * @Route("/", name="karta_produktu_index", methods={"GET"})
     */
    public function index(KartaProduktuRepository $kartaProduktuRepository): Response
    {
        return $this->render('karta_produktu/index.html.twig', [
            'karta_produktus' => $kartaProduktuRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="karta_produktu_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $kartaProduktu = new KartaProduktu();
        $form = $this->createForm(KartaProduktuType::class, $kartaProduktu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($kartaProduktu);
            $entityManager->flush();

            return $this->redirectToRoute('karta_produktu_index');
        }

        return $this->render('karta_produktu/new.html.twig', [
            'karta_produktu' => $kartaProduktu,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="karta_produktu_show", methods={"GET"})
     */
    public function show(KartaProduktu $kartaProduktu): Response
    {
        return $this->render('karta_produktu/show.html.twig', [
            'karta_produktu' => $kartaProduktu,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="karta_produktu_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, KartaProduktu $kartaProduktu): Response
    {
        $form = $this->createForm(KartaProduktuType::class, $kartaProduktu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('karta_produktu_index');
        }

        return $this->render('karta_produktu/edit.html.twig', [
            'karta_produktu' => $kartaProduktu,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="karta_produktu_delete", methods={"DELETE"})
     */
    public function delete(Request $request, KartaProduktu $kartaProduktu): Response
    {
        if ($this->isCsrfTokenValid('delete'.$kartaProduktu->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($kartaProduktu);
            $entityManager->flush();
        }

        return $this->redirectToRoute('karta_produktu_index');
    }
}
