<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Task;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class HomeController extends Controller
{
    /**
     * @Route("/home", name="hom")
     */
    public function newAction(Request $request)
    {
        $task = new Task();

        $task->setTask('Write a blog post');
        $form = $this->createFormBuilder($task)
            ->add('task', TextType::class)
            ->add('save', SubmitType::class, ['label' => 'Create Task'])
            ->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $task = $form->getData();   #samo test GET-a
            var_dump($task);
            #return $this->redirectToRoute('/hom');
        }
    return $this->render('default/login.html.twig', [
        'form' => $form->createView(),
        ]);
    }
}



#http://praktikanti/miro.cotic/proba/web/app_dev.php/nova    