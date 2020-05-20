<!DOCTYPE HTML>
<html>
	<head>
		<title>CopyCenter</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main1.css" />
	</head>
	<body class="bodypolotno">
		<div id="page">
			<!-- Меню -->
				<section id="header">
					<div class="container"> 
						<!-- Логотип -->
							<h1 id="logo"><a href="index.html">Copy Center</a></h1>
							<p> Make everything awesome</p>
						<!-- Nav -->
							<nav id="nav">
								<ul>
									<li><a class="icon fa-home" href="/"><span class="nav-span">Главная </span></a></li>
								  <li><a class="icon fa-cog" href="/web"><span class="nav-span">Полиграфические услуги</span></a></li>
									<li><a class="icon fa-retweet" href="/polygraphy"><span class="nav-span"> Печатные услуги</span></a></li>
									<li><a class="icon fa-sitemap" href="/vacancy"><span class="nav-span"> Вакансии</span></a></li>
								</ul>
							</nav>
					</div>
					<div class="poloska">.</div>
				</section>
        <?= require($content) ?>
        			<!-- Footer -->
      <footer id="footer">
					<div class="container">
						<header>
							<h2>Появились вопросы или пожелания?<strong>Свяжитесь с нами</strong></h2>
						</header>
						<div class="row">
							<div class="col-6 col-12-medium">
								<section>
									<p> Мы ежедневно работаем над улучшением качества наших услуг. <br>Помогите нам стать еще эффективнее!</p>
									<div class="row">
										<div class="col-6 col-12-small">
											<ul class="icons">
												<li class="icon fa-home">
													Коммунистический, 53/1<br />
													Ростов-на-Дону<br />
												    Россия 
												</li>
												<li class="icon fa-phone">
													8-951-830-72-68 
													<br>8-950-854-26-64
												</li>
												<li class="icon fa-envelope">
													<a href="#">Gebo888@bk.ru</a>
												</li>
											</ul>
										</div>
										
									<?php require('items/form.php') ?>
									</div>
								</section>
							</div>
						</div>
					</div>
					<div id="copyright" class="container">
						<ul class="links">
							<li> Копи-Центр на Коммунистическом || 2019 г. </li>
						</ul>
					</div>
				</footer>

		</div>
	</body>
</html>
