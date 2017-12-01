<?
include('factorial.php')
?>
<li><a href=vvod>Расчёт произвольного факториала</a>
<li><a href=io>Другой расчёт произвольного факториала</a>

<table border>
<tr>
	<th>Число</th>
	<th>Циклом</th>
	<th>Рекурсией</th>
</tr>
<?
for($i=0; $i<=10; $i++):
?>
<tr align="right">
  <td><?= $i ?></td>
  <td><?= factorial($i) ?></td>
  <td><?= r_factorial($i) ?></td>
</tr>
<?	
endfor;
?>
</table>




