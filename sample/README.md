# Exemple d'intégration

Ce dossier n'est pas chargé par le bundle : c'est un exemple à copier dans une
application Symfony.

- `src/Controller/DemoController.php` → `src/Controller/`
- `src/Dto/Markdown.php` → `src/Dto/`
- `src/Form/DtoType.php` → `src/Form/`
- `templates/demo/editor.html.twig` → `templates/demo/`

L'application doit fournir `symfony/twig-bundle`, `symfony/asset` et le filtre
`markdown_to_html` (`league/commonmark` + `twig/markdown-extra`, déjà requis par
le bundle).

La route `/demo` n'est pas enregistrée par le bundle : elle appartient à
l'exemple.
