<?php
// src/Controller/BaseController.php
namespace App\Controller;

use App\Entity\User;
use App\Form\NewUserForm;
use App\Form\EditUserForm;

use Doctrine\Persistence\ManagerRegistry;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BaseController extends AbstractController
{ 
    #[Route('/', name: 'base')]

    public function base(Request $request, ManagerRegistry $doctrine): Response
    {
        $user = new User(); // Create a new User object

        $form = $this->createForm(NewUserForm::class, $user); // Create the form

        $form->handleRequest($request); // Handle the request

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();

            $em = $doctrine->getManager();
            $em->persist($user);
            $em->flush();
            // Perform some action, such as saving the task to the database

            return $this->redirectToRoute('base'); // Redirect on success
        }

        $users = $doctrine->getRepository(User::class)->findAll();

        return $this->render('table.html.twig', [
            'form' => $form->createView(),
            'users' => $users,
        ]);
    }

    #[Route('/user/{id}', name: 'user')]
    public function user($id, ManagerRegistry $doctrine): Response
    {
        $user = $doctrine->getRepository(User::class)->find($id);


        return $this->render('user.html.twig', [
            'user' => $user,
        ]);
    }

    #[Route('/user/{id}/edit', name: 'user_edit')]
    public function user_edit($id,Request $request, ManagerRegistry $doctrine): Response
    {
        $user = $doctrine->getRepository(User::class)->find($id);

        $form = $this->createForm(EditUserForm::class, $user); // Create the form

        $form->handleRequest($request); // Handle the request

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();

            $em = $doctrine->getManager();
            $em->persist($user);
            $em->flush();
            // Perform some action, such as saving the task to the database

            return $this->redirectToRoute("user",['id' =>$user->getId()]); // Redirect on success
        }

        return $this->render('user_edit.html.twig', [
            'form' => $form->createView(),
            'user' => $user,
        ]);
    }
}