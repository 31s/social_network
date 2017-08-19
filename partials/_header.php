<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Reseau social pour developpeur">
    <meta name="author" content="Duranteau Ibrahim">

    <title>
        <?=
            isset($title) ? $title .' - '.WEBSITE_NAME : WEBSITE_NAME. '- Simple Rapide Efficace';
        ?>
    </title>

    <!-- STYLESHEETS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cerulean/bootstrap.min.css" rel="stylesheet" integrity="sha384-zF4BRsG/fLiTGfR9QL82DrilZxrwgY/+du4p/c7J72zZj+FLYq4zY00RylP9ZjiT" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/main.css" />
  </head>

  <body>

<?php include('partials/_nav.php');