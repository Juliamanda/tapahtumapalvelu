<?php

  // Siistitään polku urlin alusta ja mahdolliset parametrit urlin lopusta.
  $request = str_replace('/~jisotalo/tapahtumapalvelu','',$_SERVER['REQUEST_URI']);
  $request = strtok($request, '?');

  // Selvitetään mitä sivua on kutsuttu ja suoritetaan sivua vastaava 
  // käsittelijä.
  if ($request === '/' || $request === '/tapahtumat') {
    echo '<h1>Kaikki tapahtumat</h1>';
  } else if ($request === '/tapahtuma') {
    echo '<h1>Yksittäisen tapahtuman tiedot</h1>';
  } else {
    echo '<h1>Pyydettyä sivua ei löytynyt :(</h1>';
  }

?> 