<?php

namespace Helix\BlogBundle\Controller;

use Helix\BlogBundle\Entity\Blog;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Blog controller.
 *
 */
class BlogController extends Controller
{
    /**
     * Lists all blog entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $blogs = $em->getRepository('HelixBlogBundle:Blog')->findAll();

        return $this->render('@HelixBlog/Blog/index.html.twig', array(
            'blogs' => $blogs,
        ));
    }

    /**
     * Creates a new blog entity.
     *
     */
    public function newAction(Request $request)
    {
        $blog = new Blog();
        $form = $this->createForm('Helix\BlogBundle\Form\BlogType', $blog);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($blog);
            $em->flush();

            return $this->redirectToRoute('blog_show', array('id' => $blog->getId()));
        }

        return $this->render('@HelixBlog/Blog/new.html.twig', array(
            'blog' => $blog,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a blog entity.
     * @param Blog $blog
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction(Blog $blog)
    {
        $deleteForm = $this->createDeleteForm($blog);
        $em= $this->getDoctrine()->getManager();
        $blogs = $em->getRepository('HelixBlogBundle:Blog')->findby(array(),array('id'=>'desc'));


        return $this->render('@HelixBlog/Blog/detailarticle.html.twig', array(
            'blog' => $blog,
            'delete_form' => $deleteForm->createView(),
            'blogs'=>$blogs,

        ));
    }

    /**
     * Displays a form to edit an existing blog entity.
     * @param Request $request
     * @param Blog $blog
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Request $request, Blog $blog)
    {
        $deleteForm = $this->createDeleteForm($blog);
        $editForm = $this->createForm('Helix\BlogBundle\Form\BlogType', $blog);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('blog_edit', array('id' => $blog->getId()));
        }

        return $this->render('@HelixBlog/Blog/edit.html.twig', array(
            'blog' => $blog,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a blog entity.
     * @param Request $request
     * @param Blog $blog
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAction(Request $request, Blog $blog)
    {
        $form = $this->createDeleteForm($blog);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($blog);
            $em->flush();
        }

        return $this->redirectToRoute('blog_index');
    }

    public function deletelinkAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('HelixBlogBundle:Blog')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find entity.');
        }

        $em->remove($entity);
        $em->flush();


        return $this->redirect($this->generateUrl('blog_index'));
    }

    /**
     * Creates a form to delete a blog entity.
     *
     * @param Blog $blog The blog entity
     *
     * @return \Symfony\Component\Form\FormInterface
     */
    private function createDeleteForm(Blog $blog)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blog_delete', array('id' => $blog->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
