<?php
/**
 * @var \Moon\View $this
 * @var string $content
 */
?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $this->e($this->title) ?></title>
    <style>
        .container {
            margin-top: 6rem;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container">
    <?= $content ?>
</div>
</body>
</html>