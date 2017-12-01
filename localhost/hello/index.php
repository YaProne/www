<?
$who = 'world';

function inc($x)
{
	return $x+1;
}
?>
Здравствуй, <?= ucfirst($who) ?>!
<hr>
5+1=<?= inc("5") ?>