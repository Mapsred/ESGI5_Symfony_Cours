<?php

namespace App\Controller\Back;

use App\Entity\Tag;
use App\Form\TagType;
use App\Repository\TagRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/**
 * @Route("/tag")
 */
class TagController extends AbstractController
{
    /**
     * @Route("/", name="tag_index", methods="GET")
     * @param TagRepository $tagRepository
     * @return Response
     */
    public function index(TagRepository $tagRepository): Response
    {
        return $this->render('Back/Tag/index.html.twig', ['tags' => $tagRepository->findAll()]);
    }

    /**
     * @Route("/new", name="tag_new", methods="GET|POST")
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $tag = new Tag();
        $form = $this->createForm(TagType::class, $tag);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tag);
            $em->flush();

            return $this->redirectToRoute('tag_index');
        }

        return $this->render('Back/Tag/new.html.twig', [
            'tag' => $tag,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tag_show", methods="GET")
     * @param Tag $tag
     * @return Response
     */
    public function show(Tag $tag): Response
    {
        return $this->render('Back/Tag/show.html.twig', ['tag' => $tag]);
    }

    /**
     * @Route("/{id}/edit", name="tag_edit", methods="GET|POST")
     * @param Request $request
     * @param Tag $tag
     * @return Response
     */
    public function edit(Request $request, Tag $tag): Response
    {
        $form = $this->createForm(TagType::class, $tag);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tag_edit', ['id' => $tag->getId()]);
        }

        return $this->render('Back/Tag/edit.html.twig', [
            'tag' => $tag,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tag_delete", methods="GET")
     * @param Request $request
     * @param Tag $tag
     * @return Response
     */
    public function delete(Request $request, Tag $tag): Response
    {
        if (!$this->isCsrfTokenValid('delete-item', $request->query->get('_token'))) {
            throw new AccessDeniedException('Access Denied');
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($tag);
        $em->flush();


        return $this->redirectToRoute('tag_index');
    }
}
