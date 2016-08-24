<?php

namespace BlogBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use BlogBundle\Entity\TestCrud;
use BlogBundle\Form\TestCrudType;

/**
 * TestCrud controller.
 *
 * @Route("/testcrud")
 */
class TestCrudController extends Controller
{
    /**
     * Lists all TestCrud entities.
     *
     * @Route("/", name="testcrud_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $testCruds = $em->getRepository('BlogBundle:TestCrud')->findAll();


        return $this->render('testcrud/index.html.twig', array(
            'testCruds' => $testCruds,
        ));
    }

    /**
     * Creates a new TestCrud entity.
     *
     * @Route("/new", name="testcrud_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $testCrud = new TestCrud();
        $form = $this->createForm(TestCrudType::class, $testCrud);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($testCrud);
            $em->flush();

            return $this->redirectToRoute('testcrud_show', array('id' => $testCrud->getId()));
        }

        return $this->render('testcrud/new.html.twig', array(
            'testCrud' => $testCrud,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TestCrud entity.
     *
     * @Route("/{id}", name="testcrud_show")
     * @Method("GET")
     */
    public function showAction(TestCrud $testCrud)
    {
        $deleteForm = $this->createDeleteForm($testCrud);

        return $this->render('testcrud/show.html.twig', array(
            'testCrud' => $testCrud,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing TestCrud entity.
     *
     * @Route("/{id}/edit", name="testcrud_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TestCrud $testCrud)
    {
        $deleteForm = $this->createDeleteForm($testCrud);
        $editForm = $this->createForm('BlogBundle\Form\TestCrudType', $testCrud);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($testCrud);
            $em->flush();

            return $this->redirectToRoute('testcrud_edit', array('id' => $testCrud->getId()));
        }

        return $this->render('testcrud/edit.html.twig', array(
            'testCrud' => $testCrud,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a TestCrud entity.
     *
     * @Route("/{id}", name="testcrud_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TestCrud $testCrud)
    {
        $form = $this->createDeleteForm($testCrud);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($testCrud);
            $em->flush();
        }

        return $this->redirectToRoute('testcrud_index');
    }

    /**
     * Creates a form to delete a TestCrud entity.
     *
     * @param TestCrud $testCrud The TestCrud entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TestCrud $testCrud)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('testcrud_delete', array('id' => $testCrud->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
