<?php

namespace BlogBundle\Controller;

use BlogBundle\Entity\Author;
use BlogBundle\Form\Type\AuthorType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;

class AuthorController extends Controller
{
    /**
     * @Route("/new")
     */
    public function createAction(Request $request)
    {
        $author = new Author();
        $form = $this->createForm(AuthorType::class, $author);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $this->validateUniqueEmail($form, $author);
        }

        if ($form->isValid()) {

        }

        return $this->render('BlogBundle:Author:create.html.twig', array(
            // ...
        ));
    }

    private function validateUniqueEmail(Form $form, Author $author)
    {
        $authorFound = $this->getDoctrine()
            ->getRepository('BlogBundle:Author')
            ->findOneByEmail($author->getEmail());
        if ($authorFound) {
            $form->get('email')->addError(new FormError('email déjà utilisé'));
        }
    }

}
