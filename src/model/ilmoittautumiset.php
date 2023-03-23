<?php

  require_once HELPERS_DIR . 'DB.php';

  function haeIlmoittautuminen($idhenkilo,$idtapahtuma) {
    return DB::run('SELECT * FROM ilmoittautumiset WHERE idhenkilo = ? AND idtapahtuma = ?',
                   [$idhenkilo, $idtapahtuma])->fetchAll();
  }

  function lisaaIlmoittautuminen($idhenkilo,$idtapahtuma) {
    DB::run('INSERT INTO ilmoittautumiset (idhenkilo, idtapahtuma) VALUE (?,?)',
            [$idhenkilo, $idtapahtuma]);
    return DB::lastInsertId();
  }

  function poistaIlmoittautuminen($idhenkilo, $idtapahtuma) {
    return DB::run('DELETE FROM ilmoittautumiset  WHERE idhenkilo = ? AND idtapahtuma = ?',
                   [$idhenkilo, $idtapahtuma])->rowCount();
  }

?>
