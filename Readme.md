# PdfGenerator

## en_US

This modules allows to generate PDF files from a template who will be sought in
the current PDF template


## Uses

The URL to use to generate a PDF from a template is like :

https://yourshop.tld/getpdf/template_name_without_extension/output_file_name_without_extension

The URL to use to generate a PDF to visualise in the navigator is like :

https://yourshop.tld/viewpdf/template_name_without_extension/output_file_name_without_extension

For example, if you have in your PDF templates a file `category.html`, you are going to utilise:

https://yourshop.tld/viewpdf/category/category-list

## Installation

### Manually

* Copy the module into ```<thelia_root>/local/modules/``` directory and be sure that the name of the module is PdfGenerator.
* Activate it in your thelia administration panel

### Composer

Add it in your main thelia composer.json file

```
composer require cqfdev/pdf-generator-module:~0.5.1
```
  


## fr_Fr

Ce module permet de générer un PDF à parti d'un template qui sera cherché dans
le template PDF courant.


## Utilisation

L'URL à utiliser pour générer un PDF à télécharger est la suivante :

https://yourshop.tld/getpdf/template_name_without_extension/output_file_name_without_extension

L'URL à utiliser pour générer un PDF à visualiser dans le navigateur est la suivante :

https://yourshop.tld/viewpdf/template_name_without_extension/output_file_name_without_extension

Par exemple, si vous avez dans votre template pdf une fichier `category.html`, vous allez utiliser :

https://yourshop.tld/viewpdf/category/category-list

Vous obtinedrez un fichier category-list.pdf.

## Installation

### Manuellement

* Copier le module dans le dossier ```<thelia_root>/local/modules/``` et fait bien attention que le nom du module soit PdfGenerator.
* Activer le module dans votre espace d'administration

### Composer

Ajouter dans le fichier composer.json de thelia

```
composer require cqfdev/pdf-generator-module:~0.5.1
```

## TODO

Internationalisation et traductions.


