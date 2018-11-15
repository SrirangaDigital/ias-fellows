<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic Page Needs
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta charset="utf-8">
    <title><?php if($pageTitle) echo $pageTitle . ' | '; ?>Indian Academy of Sciences</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Mobile Specific Metas
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FONT
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="stylesheet" id="royal_enqueue_Lato-css" href="https://fonts.googleapis.com/css?family=Lato%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900&amp;ver=1.0.0" type="text/css" media="all">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400italic,400,600,700' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,400,300,600" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Tangerine" rel="stylesheet">

    <!-- Javascript calls
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>    
    <script type="text/javascript" src="<?=PUBLIC_URL?>js/common.js"></script>
 
    <!-- CSS
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="stylesheet" href="<?=PUBLIC_URL?>css/normalize.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">    <link rel="stylesheet" href="<?=PUBLIC_URL?>css/navbar.css?v=3.0">
    <link rel="stylesheet" href="<?=PUBLIC_URL?>css/navbar.css?v=1.4">
    <link rel="stylesheet" href="<?=PUBLIC_URL?>css/carousel.css?v=1.1">
    <link rel="stylesheet" href="<?=PUBLIC_URL?>css/page.css?v=1.4">
    <link rel="stylesheet" href="<?=PUBLIC_URL?>css/profile.css?v=1.4">
    <link rel="stylesheet" href="<?=PUBLIC_URL?>css/archive.css?v=1.1">
    <link rel="stylesheet" href="<?=PUBLIC_URL?>css/general.css?v=1.3">
    <link rel="stylesheet" href="<?=PUBLIC_URL?>css/flat.css?v=1.1">
    <link rel="stylesheet" href="<?=PUBLIC_URL?>css/form.css?v=1.1">
    <link rel="stylesheet" href="<?=PUBLIC_URL?>css/aux.css?v=1.1">
    <link rel="stylesheet" href="<?=PUBLIC_URL?>css/social.css?v=1.1">
    <link rel="stylesheet" href="<?=PUBLIC_URL?>css/viewer.css?v=1.1">
    <script type="text/javascript">var base_url = "<?= BASE_URL?>";</script>
    <!-- Favicon
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="icon" type="image/png" href="<?=PUBLIC_URL?>images/favicon.png">
</head>
<body>
    <header id="header">
        <!-- Navigation
        –––––––––––––––––––––––––––––––––––––––––––––––––– -->
        <nav id="mainNavBar" class="navbar navbar-light navbar-expand-lg">
            <div class="container-fluid clear-paddings">
                <a class="navbar-brand" href="<?=BASE_URL?>"><img src="<?=PUBLIC_URL?>images/logo.png" alt="Logo" class="logo"></a>
                <p class="navbar-text" id="navbarText"><small>Indian Academy of Sciences, Bengaluru</small><br />Fellows' portal</p>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <?=$this->printNavigation($navigation)?>
                    <?=$viewHelper->printUserIcon()?>
                </div>
            </div>
        </nav>
        <!-- End Navigation
        –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    </header>
