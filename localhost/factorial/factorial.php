<?
function factorial($n)
{
	$result = 1;
	for($i = 1; $i <= $n; $i++)
	{		
		$result *= $i;
	}
	return $result;
}

function r_factorial($n)
{
	if($n<=1)
		return 1;
	else
		return r_factorial($n-1)*$n;
}
?>
