<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php

include 'includes/config.php';
include 'includes/UrlShortener.php';
$short = new UrlShortener();
$rows = $short->getAll();
?>
 <table cellpadding=10 cellspacing=5 align=center width=100%> 
	<tr>
		<td align=center> Link </td>
		<td align=center>  Count Visists </td>
	</tr>
	
<?php
foreach($rows as $row)
{?>
	<tr>
		<td align=center> <?php echo $row['url']?></td>
		<td align=center> <?php echo $row['visits']?></td>
	</tr>
<?php
}
?>
</table>