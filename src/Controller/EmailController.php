<?php

namespace App\Controller;

use App\Entity\Email;
use App\Form\EmailType;
use App\Repository\EmailRepository;
use App\Repository\ContactRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/email')]
class EmailController extends AbstractController
{
    #[Route('/new', name: 'email_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, ContactRepository $contactRepository): Response
    {
        $email = new Email();
        $form = $this->createForm(EmailType::class, $email);
        $form->handleRequest($request);
        $contact = $contactRepository->find($request->get("id"));

        if ($form->isSubmitted() && $form->isValid()) {
            $email->setContact($contact);
            $entityManager->persist($email);
            $entityManager->flush();

            return $this->redirectToRoute('contact_show', ['contact'=> $request->get("id") ], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('email/new.html.twig', [
            'email' => $email,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/edit', name: 'email_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Email $email, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EmailType::class, $email);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('contact_show', ['contact'=> $email->getContact()->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('email/edit.html.twig', [
            'email' => $email,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'email_delete', methods: ['POST'])]
    public function delete(Request $request, Email $email, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$email->getId(), $request->request->get('_token'))) {
            $entityManager->remove($email);
            $entityManager->flush();
        }

        return $this->redirectToRoute('contact_show', ['contact'=> $email->getContact()->getId()], Response::HTTP_SEE_OTHER);
    }
}
