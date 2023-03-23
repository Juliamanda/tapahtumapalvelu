<!DOCTYPE html>
<html lang="fi">
  <head>
    <title>nimitähän - <?=$this->e($title)?></title>
    <meta charset="UTF-8">    
  </head>
  <body>
    <header>
      <h1><a href="<?=BASEURL?>">nimitähän</a></h1>
    </header>
    <section>
      <?=$this->section('content')?>
    </section>
    <footer>
      <hr>
      <div>Nimitähän by Kurpitsa</div>
    </footer>
  </body>
</html>
