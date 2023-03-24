<?php

  require_once HELPERS_DIR . 'DB.php';

  function lisaaHenkilo($nimi,$email,$jasennro,$salasana) {
    DB::run('INSERT INTO jasen (nimi, email, jasennro, salasana) VALUE  (?,?,?,?);',[$nimi,$email,$jasennro,$salasana]);
    return DB::lastInsertId();
  }
  function haeHenkiloSahkopostilla($email) {
    return DB::run('SELECT * FROM jasen WHERE email = ?;', [$email])->fetchAll();
  }
  function haeHenkilo($email) {
    return DB::run('SELECT * FROM jasen WHERE email = ?;', [$email])->fetch();
  }
  function paivitaVahvavain($email,$avain) {
    return DB::run('UPDATE jasen SET vahvavain = ? WHERE email = ?', [$avain,$email])->rowCount();
  }
  function vahvistaTili($avain) {
    return DB::run('UPDATE jasen SET vahvistettu = TRUE WHERE vahvavain = ?', [$avain])->rowCount();
  }

?>
