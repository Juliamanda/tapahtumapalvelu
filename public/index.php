<?php
    // Aloitetaan istunnot.
    session_start();

    // Suoritetaan projektin alustusskripti.
    require_once '../src/init.php';

    // Siistitään polku urlin alusta ja mahdolliset parametrit urlin lopusta.
    // Siistimisen jälkeen osoite /~koodaaja/lanify/tapahtuma?id=1 on 
    // lyhentynyt muotoon /tapahtuma.
    $request = str_replace($config['urls']['baseUrl'],'',$_SERVER['REQUEST_URI']);
    $request = strtok($request, '?');

    // Luodaan uusi Plates-olio ja kytketään se sovelluksen sivupohjiin.
    $templates = new League\Plates\Engine(TEMPLATE_DIR);

    // Selvitetään mitä sivua on kutsuttu ja suoritetaan sivua vastaava
    // käsittelijä.
    switch ($request) {
        case '/':
        case '/tapahtumat':
          require_once MODEL_DIR . 'tapahtuma.php';
          $tapahtumat = haeTapahtumat();
          echo $templates->render('tapahtumat',['tapahtumat' => $tapahtumat]);
          break;
        case '/tapahtuma':
          require_once MODEL_DIR . 'tapahtuma.php';
          $tapahtuma = haeTapahtuma($_GET['id']);
          if ($tapahtuma) {
            echo $templates->render('tapahtuma',['tapahtuma' => $tapahtuma]);
          } else {
            echo $templates->render('tapahtumanotfound');
          }
          break;
        case '/lisaa_tili':
          if (isset($_POST['laheta'])) {
          $formdata = cleanArrayData($_POST);
          require_once CONTROLLER_DIR . 'tili.php';
          $tulos = lisaaTili($formdata);
          if ($tulos['status'] == "200") {
            echo $templates->render('tili_luotu', ['formdata' => $formdata]);
          break;
          }
            echo $templates->render('lisaa_tili', ['formdata' => $formdata, 'error' => $tulos['error']]);
          break;
          } else {
            echo $templates->render('lisaa_tili', ['formdata' => [], 'error' => []]);
          break;
          }
        case "/kirjaudu":
          if (isset($_POST['laheta'])) {
          require_once CONTROLLER_DIR . 'kirjaudu.php';
            if (tarkistaKirjautuminen($_POST['email'],$_POST['salasana'])) {
            $_SESSION['user'] = $_POST['email'];
            header("Location: " . $config['urls']['baseUrl']);
            } else {
              echo $templates->render('kirjaudu', [ 'error' => ['virhe' => 'Väärä käyttäjätunnus tai salasana!']]);
            }
          } else {
            echo $templates->render('kirjaudu', [ 'error' => []]);
          }
          break;
        case "/logout":
          require_once CONTROLLER_DIR . 'kirjaudu.php';
          logout();
          header("Location: " . $config['urls']['baseUrl']);
          break;
        default:
          echo $templates->render('notfound');
      }    
    

?> 
