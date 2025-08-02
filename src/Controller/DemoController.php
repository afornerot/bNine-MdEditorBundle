<?php

namespace Bnine\MdEditorBundle\Controller;

use Bnine\MdEditorBundle\Dto\Markdown;
use Bnine\MdEditorBundle\Form\DtoType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DemoController extends AbstractController
{
    #[Route('/demo', name: 'bninefiles_demo')]
    public function markdownDemo(Request $request): Response
    {
        $dto = new Markdown();
        $form = $this->createForm(DtoType::class, $dto);

        $form->handleRequest($request);
        $content = '';
        if ($form->isSubmitted() && $form->isValid()) {
            dump('bon');
            $content = $dto->getMarkdown();
        }
        dump($content);

        return $this->render('@BnineMdEditor/demo/editor.html.twig', [
            'form' => $form->createView(),
            'dto' => $dto,
        ]);
    }
}
