<?php

namespace App\Controller;

use App\Dto\Markdown;
use App\Form\DtoType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DemoController extends AbstractController
{
    #[Route('/demo', name: 'bninemdeditor_demo')]
    public function markdownDemo(Request $request): Response
    {
        $dto = new Markdown();
        $form = $this->createForm(DtoType::class, $dto);

        $form->handleRequest($request);

        return $this->render('demo/editor.html.twig', [
            'form' => $form->createView(),
            'dto' => $dto,
        ]);
    }
}
