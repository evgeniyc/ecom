<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo base_url();?>assets\css\styles.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
	<link rel="shortcut icon" href="<?php echo base_url();?>assets/img/icon.jpg" type="image/jpg">
    <title>Магазин мобильных телефонов</title>
  </head>
  <body>
    <div id="page" class="container">
		<header class="row">
			<div id="logo" class="col-md-3"></div>
			<div id="title" class="col-md-6">
				<img src="<?php echo base_url();?>assets/img/title2.png" alt="Название сайта">
				<?php echo form_open('items/search'); ?>
					<div id="search-form" class="input-group mb-3">
						<input type="text" class="form-control" placeholder="Поиск" aria-label="Поиск товара" aria-describedby="button-addon2">
						<div class="input-group-append">
							<button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
						</div>
					</div>
				</form>
				
			</div>
			<div id="contacts" class="col-12 col-md-3"><i class="fas fa-home"></i>Здесь контактные данные<br><i class="fas fa-phone"></i>(095)322-23-23</div>
		</header>
		<nav class="row nav justify-content-center">
			<a class="nav-link" href="<?php echo site_url().'/items/index'?>">Главная</a>
			<a class="nav-link" href="#">Каталог</a>
			<a class="nav-link" href="#">О нас</a>
			<a class="nav-link" href="#">Контакты</a>
		</nav>
		<div id="breadcrumbs" class="row"><?php echo $this->breadcrumbs->show(); ?></div> 
		<main class="row">