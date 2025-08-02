<?php

namespace Bnine\MdEditorsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DemoController extends AbstractController
{
    #[Route('/demo', name: 'bninefiles_files', methods: ['GET'])]
    public function demo(Request $request): Response
    {
        return $this->render('@BnineMdEditorBundle/demo/editor.html.twig');
    }
}
