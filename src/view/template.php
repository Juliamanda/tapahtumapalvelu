<!DOCTYPE html>
<html lang="fi">
  <head>
    <title>Karavaanarit ry - <?=$this->e($title)?></title>
    <meta charset="UTF-8"> 
    <link href="styles/styles.css" rel="stylesheet">   
  </head>
  <body>
    <header>
      <h1><a href="<?=BASEURL?>">Karavaanarit ry</a></h1>
    </header>
    <section>
      <?=$this->section('content')?>
    </section>
    <footer>
      <hr>
      <div>Karavaanarit ry by Kurpitsa</div>
    </footer>
  </body>
</html>
