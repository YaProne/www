<?
// Счетчик данного пользователя
setcookie('raz', $raz = 1 + $_COOKIE['raz']);

// Счетчик всех пользователей
$all = file_get_contents('all.txt') + 1;
file_put_contents('all.txt', $all);
?>	
<title>Счётчик посещений</title>
<h1>Счётчик посещений</h1>

Вы были здесь
<ul>
  <li>Один <?= $raz ?> раз.
  <li>Все вместе <?= $all ?> раз.
</ul>
