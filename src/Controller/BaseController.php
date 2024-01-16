<?php
// src/Controller/BaseController.php
namespace App\Controller;

use App\Entity\User;
use App\Form\NewUserForm;

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


        return $this->render('base.html.twig', [
            'form' => $form->createView(),
            'users' => $users,
        ]);
    }

    #[Route('/update/{id}/{field}/{value}', name: 'update')]
    public function update($id, $field, $value, ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();
        $user = $em->getRepository(User::class)->find($id);
    
        if (!$user) {
            throw $this->createNotFoundException(
                'No user found for id '.$id
            );
        }
    
        $setter = 'set'.ucfirst($field);
        if (method_exists($user, $setter)) {
            $user->$setter($value);
            $em->flush();
        }
    
        return $this->redirectToRoute('base');
    }
}