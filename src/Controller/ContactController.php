<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\Category;
use App\Form\ContactType;
use App\Repository\ContactRepository;
use App\Repository\PhoneNumberRepository;
use App\Repository\EmailRepository;
use App\Repository\AdressRepository;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/contact')]
class ContactController extends AbstractController
{
    #[Route('/', name: 'contact_index', methods: ['GET'])]
    public function index(ContactRepository $contactRepository, CategoryRepository $categoryRepository): Response
    {
        $user = $this->getUser();

        return $this->render('contact/index.html.twig', [
            'contacts' => $contactRepository->findByAccount($user),
            'Categories' => $categoryRepository->findByAccount($user),
        ]);
    }

    #[Route('/new', name: 'contact_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, CategoryRepository $categoryRepository): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);
        $user = $this->getUser();

        if(isset($_POST['envoi'])){ 
            return $this;
        }

        if ($form->isSubmitted() && $form->isValid()) {

            $contact->setAccount($user);
            $entityManager->persist($contact);
            $entityManager->flush();

            return $this->redirectToRoute('contact_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('contact/new.html.twig', [
            'contact' => $contact,
            'form' => $form,
            'Categories' => $categoryRepository->findAll(),
        ]);
    }

    #[Route('/{contact}', name: 'contact_show', methods: ['GET'])]
    public function show(Contact $contact, PhoneNumberRepository $PhoneNumberRepository, EmailRepository $emailRepository, AdressRepository $adressRepository, CategoryRepository $categoryRepository): Response
    {
        return $this->render('contact/show.html.twig', [
            'contact' => $contact,
            'PhoneNumbers' => $PhoneNumberRepository->findByContact($contact),
            'Emails' => $emailRepository->findByContact($contact),
            'Adresses' => $adressRepository->findByContact($contact),
            'categories' => $categoryRepository->findAll(),
        ]);
    }

    #[Route('/{id}/edit', name: 'contact_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Contact $contact, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('contact_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('contact/edit.html.twig', [
            'contact' => $contact,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'contact_delete', methods: ['POST'])]
    public function delete(Request $request, Contact $contact, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $contact->getId(), $request->request->get('_token'))) {
            $entityManager->remove($contact);
            $entityManager->flush();
        }

        return $this->redirectToRoute('contact_index', [], Response::HTTP_SEE_OTHER);
    }
}