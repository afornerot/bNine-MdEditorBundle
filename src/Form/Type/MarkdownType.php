<?php

namespace Bnine\MdEditorBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
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
            'markdown_height' => null,
        ]);

        $resolver->setAllowedTypes('markdown_height', ['null', 'int']);
    }

    public function buildView(FormView $view, FormInterface $form, array $options): void
    {
        if ($options['markdown_height']) {
            $view->vars['attr']['data-markdown-height'] = $options['markdown_height'];
        }
    }

    public function getBlockPrefix(): string
    {
        return 'markdown';
    }
}
