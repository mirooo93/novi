<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Task;
use AppBundle\Controller\User;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;



class LoginController extends Controller
{
    /**
     * @Route("/login", name="log")
     */
    public function newAction(Request $request)
    {
        $task = new User();

        $form = $this->createFormBuilder($task)
            ->add('username', TextType::class)
            ->add('password', PasswordType::class) 
            ->add('save', SubmitType::class, ['label' => 'LOGIN'])
            ->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) 
        {
            $task = $form->getData();   #samo test GET-a
            var_dump($task);
            return $this->redirectToRoute('hom');
        }
        return $this->render('default/login.html.twig', [
            'form' => $form->createView(),
           
        ]);
    }
}

