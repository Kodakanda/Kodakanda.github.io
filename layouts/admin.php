<html>
  <head>
    <title>CopyCenter manager panel</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main1.css" />
  </head>
  <body>
    <div id="page">
      <section id="header">
        <div class="container"> 
          <!-- Логотип -->
          <h1 id="logo"><a href="/">Copy Center</a></h1>
          <p> Make everything awesome</p>
          <!-- Nav -->
          <nav id="nav">
            <ul>
              <li><a class="icon fa-home" href="/orders"><span class="nav-span">Заказы</span></a></li>
              <li><a class="icon fa-cog" href="/order_types"><span class="nav-span">Типы заказов</span></a></li>
            </ul>
          </nav>
        </div>
      </section>
      <?php require($content) ?>
      <footer id="footer">
        <div id="copyright" class="container">
          <ul class="links">
            <li> Копи-Центр на Коммунистическом || 2019 г. </li>
          </ul>
				</div>
      </footer>
    </div>
  </body>
</html>