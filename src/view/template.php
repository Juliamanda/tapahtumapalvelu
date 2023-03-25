<!DOCTYPE html>
<html lang="fi">
  <head>
    <title>Karavaanarit ry - <?=$this->e($title)?></title>
    <meta charset="UTF-8"> 
    <link href="styles/styles.css" rel="stylesheet">   
  </head>
  <body>
    <header>
      <h1><a href="<?=BASEURL?>">Karavanaarit ry</a></h1>
      <div class="profile">
        <?php
          if (isset($_SESSION['user'])) {
            echo "<div>$_SESSION[user]</div>";
            echo "<div><a href='logout'>Kirjaudu ulos</a></div>";
          } else {
            echo "<div><a href='kirjaudu'>Kirjaudu</a></div>";
          }
        ?>
      </div>
    </header>
      <ul>
        <li><a href="etusivu">Etusivu</a></li>
        <li><a href="tapahtumat">Tapahtumat</a></li>
        <li><a href="jasensivu">Jäseneksi</a></li>
      </ul>
    <section>
      <?=$this->section('content')?>
    </section>
    <footer>
      <hr>
      <div>Karavaanarit ry by Kurpitsa</div>
    </footer>
  </body>
</html>
