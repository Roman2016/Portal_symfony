<?php

namespace PortalBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use PortalBundle\Entity\Articles;
use PortalBundle\Form\ArticlesType;

/**
 * Articles controller.
 *
 */
class ArticlesController extends Controller
{
    /**
     * Lists all Articles entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $articles = $em->getRepository('PortalBundle:Articles')->findAll();

        return $this->render('articles/index.html.twig', array(
            'articles' => $articles,
        ));
    }

    /**
     * Creates a new Articles entity.
     *
     */
    public function newAction(Request $request)
    {
        $article = new Articles();
        $form = $this->createForm('PortalBundle\Form\ArticlesType', $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();

            return $this->redirectToRoute('article_show', array('id' => $article->getId()));
        }

        return $this->render('articles/new.html.twig', array(
            'article' => $article,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Articles entity.
     *
     */
    public function showAction(Articles $article)
    {
        $deleteForm = $this->createDeleteForm($article);

        return $this->render('articles/show.html.twig', array(
            'article' => $article,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Articles entity.
     *
     */
    public function editAction(Request $request, Articles $article)
    {
        $deleteForm = $this->createDeleteForm($article);
        $editForm = $this->createForm('PortalBundle\Form\ArticlesType', $article);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();

            return $this->redirectToRoute('article_edit', array('id' => $article->getId()));
        }

        return $this->render('articles/edit.html.twig', array(
            'article' => $article,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Articles entity.
     *
     */
    public function deleteAction(Request $request, Articles $article)
    {
        $form = $this->createDeleteForm($article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($article);
            $em->flush();
        }

        return $this->redirectToRoute('article_index');
    }

    /**
     * Creates a form to delete a Articles entity.
     *
     * @param Articles $article The Articles entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Articles $article)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('article_delete', array('id' => $article->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
