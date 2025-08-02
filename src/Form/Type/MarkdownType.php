<?php

namespace Bnine\MdEditorBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MarkdownType extends AbstractType
{
    public function getParent(): string
    {
        return TextareaType::class;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'attr' => [
                'class' => 'easymde-textarea',
                'rows' => 15,
            ],
            'required' => false,
            'label' => 'Editeur Markdown',
        ]);
    }

    public function getBlockPrefix(): string
    {
        return 'markdown';
    }
}
