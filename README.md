# BnineMdEditorBundle

A lightweight Symfony bundle to integrate a Markdown editor (`EasyMDE`) into your forms using a reusable `FormType`.

The bundle packages the required JS/CSS assets and provides a simple configuration and rendering mechanism.


## ✨ Features

- Simple integration of EasyMDE Markdown editor via a custom `FormType`.
- Bundled JS/CSS assets, no external CDN dependency required.
- Ready-to-use form integration and demo controller.
- Symfony 7 compatible.
- Assets auto-installed via `assets:install`.


## 🚀 Installation

Require the bundle via Composer:

```bash
composer require bnine/mdeditorbundle
```

Then install the assets:

```bash
php bin/console assets:install
```

Make sure Symfony copies the bundle's public assets to public/bundles/bninemdeditor.

## 🧩 Usage


### Include the JavaScript helper in your base layout  
In your base Twig layout (e.g. base.html.twig), add:

```twig
<script src="{{ asset('bundles/bninemdeditor/bninemdeditor.js') }}"></script>
```

### Use the MarkdownType in a Form

```php
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
```

## 📦 Requirements

- PHP ^8.1
- Symfony ^7.1


## 📜 License

MIT

## 👤 Author

Arnaud Fornerot  
https://github.com/afornerot