<?php

  require_once HELPERS_DIR . 'DB.php';

  function lisaaHenkilo($nimi,$email,$jasennro,$salasana) {
    DB::run('INSERT INTO jasen (nimi, email, jasennro, salasana) VALUE  (?,?,?,?);',[$nimi,$email,$jasennro,$salasana]);
    return DB::lastInsertId();
  }

?>