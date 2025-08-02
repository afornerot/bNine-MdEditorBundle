<?php

namespace Bnine\MdEditorBundle\Form;

use Bnine\MdEditorBundle\Dto\Markdown;
use Bnine\MdEditorBundle\Form\Type\MarkdownType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DtoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('markdown', MarkdownType::class)
            ->add('submit', SubmitType::class, [
                'label' => 'Prévisualiser',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Markdown::class,
        ]);
    }
}
