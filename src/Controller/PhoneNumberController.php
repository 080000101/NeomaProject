<?php

namespace App\Controller;

use App\Entity\PhoneNumber;
use App\Form\PhoneNumber1Type;
use App\Repository\PhoneNumberRepository;
use App\Repository\ContactRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/phone/number')]
class PhoneNumberController extends AbstractController
{
    #[Route('/', name: 'phone_number_index', methods: ['GET'])]
    public function index(PhoneNumberRepository $phoneNumberRepository): Response
    {
        $this->redirect('contact/{id}');
        /* return $this->render('phone_number/index.html.twig', [
            'phone_numbers' => $phoneNumberRepository->findAll(),
        ]);*/
    }

    #[Route('/new', name: 'phone_number_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, ContactRepository $contactRepository): Response
    {
        $phoneNumber = new PhoneNumber();
        $form = $this->createForm(PhoneNumber1Type::class, $phoneNumber);
        $form->handleRequest($request);
        $contact = $contactRepository->find($request->get("id"));

        if ($form->isSubmitted() && $form->isValid()) {
            $phoneNumber->setContact($contact);
            $entityManager->persist($phoneNumber);
            $entityManager->flush();

            return $this->redirectToRoute('contact_show', ['id'=> $request->get("id") ], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('phone_number/new.html.twig', [
            'phone_number' => $phoneNumber,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'phone_number_show', methods: ['GET'])]
    public function show(PhoneNumber $phoneNumber): Response
    {
        return $this->render('phone_number/show.html.twig', [
            'phone_number' => $phoneNumber,
        ]);
    }

    #[Route('/{id}/edit', name: 'phone_number_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, PhoneNumber $phoneNumber, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PhoneNumber1Type::class, $phoneNumber);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('phone_number_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('phone_number/edit.html.twig', [
            'phone_number' => $phoneNumber,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'phone_number_delete', methods: ['POST'])]
    public function delete(Request $request, PhoneNumber $phoneNumber, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$phoneNumber->getId(), $request->request->get('_token'))) {
            $entityManager->remove($phoneNumber);
            $entityManager->flush();
        }

        return $this->redirectToRoute('phone_number_index', [], Response::HTTP_SEE_OTHER);
    }
}
