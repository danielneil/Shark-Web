<header>

	<div class="heroe">
		<h1>Backtest Report - <?php echo $ticker; ?></h1>
		<h2>Backtest against instrument <?php echo $ticker; ?>, generated <?php echo date("F d Y H:i:s.", filemtime("/shark/reports/" . $ticker . ".backtest.summary.json")); ?></h2>
	</div>

</header>
<section>

	<h1>Portfolio (Single Instrument - <?php echo $ticker; ?>)</h1>
	<p>This report comprises of the results of a backtest ran against a single instrument, <?php echo $ticker; ?>:</p>


<h2>Portfolio Summary</h2>
<pre><code>
<?php

$summary_fileName = "/shark/reports/" . $ticker  . ".backtest.summary.json";

if (file_exists($summary_fileName)) {

	$jsonObject = file_get_contents($summary_fileName);

	$json_arr = json_decode($jsonObject, true);

	echo "<table style='text-align: left; width: 100%'>";
	echo "<tr>";
	echo "<th>Final portfolio value</th>";
	echo "<th>Cumulative returns</th>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>$" . $json_arr['backtest_summary'][0]['final_portfolio_value'];
	echo "<td>" . $json_arr['backtest_summary'][0]['cumulative_returns'];
	echo "</tr>";

	echo '<tr>';
    	echo '<td>&nbsp;</td>';
	echo '</tr>';
	
	echo "<tr>";
	echo "<th>Sharpe ratio</th>";
	echo "<th>Max. drawdown</th>";
	echo "<th>Longest drawdown duration</th>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>" . $json_arr['backtest_summary'][0]['sharpe_ratio']; 
	echo "<td>" . $json_arr['backtest_summary'][0]['max_drawdown'];
	echo "<td>" . $json_arr['backtest_summary'][0]['longest_drawdown_duration'];
	echo "</tr>";

	echo '<tr>';
    	echo '<td>&nbsp;</td>';
	echo '</tr>';
	
	echo "<tr>";
	echo "<th>Total trades</th>";
	echo "<th>Wins</th>";
	echo "<th>Losses</th>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>" . $json_arr['backtest_summary'][0]['total_trades'];
	echo "<td>" . $json_arr['backtest_summary'][0]['wins'];
	echo "<td>" . $json_arr['backtest_summary'][0]['losses'];
	echo "</tr>";
	echo "</table>";
}
else
{
	echo "Datafile " . $summary_fileName . " not found...";
}
?>
</code></pre>
<?php

$image_fileName = "/shark/reports/" . $ticker  . ".png";

if (file_exists($image_fileName)) {

$jsonObject = file_get_contents($image_fileName);

?>
<div style="text-align: left"><img src ="/shark-web/reports/<?php echo $ticker ?>.png" /></div>

<?php
}
else
{
        echo "Image file " . $image_fileName . " not found...";
}
?>

<h2>Trades Summary</h2>
	
<pre><code>
<div style='font-weight: bold'>All Trades Summary</div>
<?php

$totalTrades_fileName = "/shark/reports/" . $ticker  . ".backtest.totaltrades.json";

if (file_exists($totalTrades_fileName)) {

	$jsonObject = file_get_contents($totalTrades_fileName);

	$json_arr = json_decode($jsonObject, true);
	
	
	echo "<table style='text-align: left; width: 100%'>";
	echo "<tr>";
	echo "<th>Avg. profit</th>";
	echo "<th>Profits std. dev.</th>";
	echo "<th>Max. profit</th>";
	echo "<th>Min. profit</th>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>$" . $json_arr['total_trades'][0]['avg_profit'];
	echo "<td>$" . $json_arr['total_trades'][0]['profits_std_dev'];
	echo "<td>$" . $json_arr['total_trades'][0]['max_profit'];
	echo "<td>$" . $json_arr['total_trades'][0]['min_profit'];
	echo "</tr>";
	echo '<tr>';
    	echo '<td>&nbsp;</td>';
	echo '</tr>';
	echo "<tr>";	
	echo "<th>Avg. return</th>";
	echo "<th>Returns std. dev.</th>";
	echo "<th>Max. return</th>";
	echo "<th>Min. return</th>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>" . $json_arr['total_trades'][0]['avg_return'];
	echo "<td>" . $json_arr['total_trades'][0]['returns_std_dev'];
	echo "<td>" . $json_arr['total_trades'][0]['max_return'];
	echo "<td>" . $json_arr['total_trades'][0]['min_return'];
	echo "</tr>";
	echo "</table>";
	
	echo "<br />";
}
else
{
        echo "Datafile " . $totalTrades_fileName . " not found...";
}
?>

<div style='font-weight: bold'>Profitable Trades Summary</div>
<?php
$profitableTrades_fileName = "/shark/reports/" . $ticker  . ".backtest.profitabletrades.json";

if (file_exists($profitableTrades_fileName)) {
	
	$jsonObject = file_get_contents($profitableTrades_fileName);
	$json_arr = json_decode($jsonObject, true);
	
	echo "<table style='text-align: left; width: 100%'>";
	echo "<tr>";

	echo "<th>Avg. profit</th>";
	echo "<th>Profits std. dev.</th>";
	echo "<th>Max. profit</th>";
	echo "<th>tMin. profit</th>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>$" . $json_arr['profitable_trades'][0]['avg_profit'];
	echo "<td>$" . $json_arr['profitable_trades'][0]['profits_std_dev'];
	echo "<td>$" .  $json_arr['profitable_trades'][0]['max_profit'];
	echo "<td>$" . $json_arr['profitable_trades'][0]['min_profit'];
	echo "</tr>";
	echo '<tr>';
    	echo '<td>&nbsp;</td>';
	echo '</tr>';
	echo "<tr>";	
	echo "<th>Avg. return</th>";
	echo "<th>Returns std. dev.</th>";
	echo "<th>Max. return</th>";
	echo "<th>Min. return</th>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>$" . $json_arr['profitable_trades'][0]['avg_return'];
	echo "<td>$" . $json_arr['profitable_trades'][0]['returns_std_dev'];
	echo "<td>$" . $json_arr['profitable_trades'][0]['max_return'];
	echo "<td>$" . $json_arr['profitable_trades'][0]['min_return'] . "%";
	echo "</tr>";
	echo "</table>";
	
	echo "<br />";
}
else
{
        echo "Datafile " . $profitableTrades_fileName . " not found...";
}
?>

<div style='font-weight: bold'>Unprofitable Trades Summary</div>
<?php

$unprofitableTrades_fileName = "/shark/reports/" . $ticker  . ".backtest.unprofitabletrades.json";

if (file_exists($unprofitableTrades_fileName)) {

	$jsonObject = file_get_contents($unprofitableTrades_fileName);
	$json_arr = json_decode($jsonObject, true);

	echo "Avg. loss\t\tLosses std. dev.\t\tMax. loss\t\tMin. loss" . PHP_EOL;
	
	echo "$" . $json_arr['unprofitable_trades'][0]['avg_loss'] . "\t\t";
	echo "$" . $json_arr['unprofitable_trades'][0]['losses_std_dev'] . "\t\t";
	echo "$" . $json_arr['unprofitable_trades'][0]['max_loss'] .  "\t\t";
	echo "$" . $json_arr['unprofitable_trades'][0]['min_loss'] . "\n\n";

	echo "Avg. return\t\tReturns std. dev.\t\tMax. return\t\tMin. return" . PHP_EOL;

	echo "$" . $json_arr['unprofitable_trades'][0]['avg_return'] . "%\t\t";
	echo "$" . $json_arr['unprofitable_trades'][0]['returns_std_dev'] . "%\t\t";
	echo "$" . $json_arr['unprofitable_trades'][0]['max_return'] .  "%\t\t";
	echo "$" . $json_arr['unprofitable_trades'][0]['min_return'] . "%" . "\n\n";
	
	echo "<br />";
}
else
{
        echo "Datafile " . $unprofitableTrades_fileName . " not found...";
}
?>

</code></pre>
</section>
