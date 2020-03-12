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




class RegisterController extends Controller
{
    /**
     * @Route("/register")
     */
    public function newAction(Request $request)
    {
        $user = new User();

        $form = $this->createFormBuilder($user)
            ->add('username', TextType::class)
            ->add('email', EmailType::class)
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'first_options' => ['label' => 'Enter password' ],
                'second_options' => ['label' => 'Repeat password' ],
            ])  
            ->add('save', SubmitType::class, ['label' => 'Register'])
            ->getForm();
        $form->handleRequest($request);    
        if ($form->isSubmitted() && $form->isValid()) 
        {
            $user = $form->getData();   
            var_dump($user);
            return $this->redirectToRoute('log' , []);
        }

        return $this->render('default/register.html.twig', [
            'form' => $form->createView(),
        ]);
       
    }


  

    public function validate(User $user)
    {
        $link = $this->connectToDatabase();
        $result_object = mysqli_query( $link,"SHOW TABLES");
        $result = mysqli_fetch_all($result);
        foreach($result as $korisnik)
        {
            var_dump($result);
            if($user.getEmail() == $korisnik.getEmail())
                return true;
        }
        return false;
    }

    public function connectToDatabase()
    {
        $link = mysqli_connect('localhost', 'miro.cotic', 'MiroCotic123!', 'miro.cotic');
        mysqli_set_charset($link,'UTF-8');
        return $link;
    }
}


#http://praktikanti/miro.cotic/proba/web/app_dev.php/nova    