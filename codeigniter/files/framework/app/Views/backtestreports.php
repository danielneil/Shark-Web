<header>

	<div class="heroe">

	<h1>Backtest Report - <?php echo $ticker; ?></h1>
	<h2>Backtest against instrument <?php echo $ticker; ?>, generated <?php echo date("F d Y H:i:s.", filemtime("/shark/log/config_gen.log")); ?></h2>
	</div>

</header>
<section>

	<h1>Portfolio (Single Instrument - <?php echo $ticker; ?>)</h1>
	<p>This report comprises of the results of a backtest ran against a single instrument, <?php echo $ticker; ?>:</p>


<pre><code>
<div style='font-weight: bold'>Portfolio Summary</div> 
<?php

$summary_fileName = "/shark/reports/" . $ticker  . ".backtest.summary.json";

if (file_exists($summary_fileName)) {

	$jsonObject = file_get_contents($summary_fileName);

	$json_arr = json_decode($jsonObject, true);

	echo "Final portfolio value\t\tCumulative returns\n\n";
	
	echo $json_arr['backtest_summary'][0]['final_portfolio_value'] . "\t\t";
	echo $json_arr['backtest_summary'][0]['cumulative_returns']\n\n";

	echo "Sharpe ratio\t\tMax. drawdown\t\tLongest drawdown duration\n\n";
	
	echo $json_arr['backtest_summary'][0]['sharpe_ratio'] . "\t\t"; 
	echo $json_arr['backtest_summary'][0]['max_drawdown'] . "\t\t" ;
	echo $json_arr['backtest_summary'][0]['longest_drawdown_duration']\n\n";

	echo "Total trades\t\tWins\t\tLosses\n\n";
	
	echo $json_arr['backtest_summary'][0]['total_trades'] . "\t\t";
	echo $json_arr['backtest_summary'][0]['wins'] . "\t\t";
	echo $json_arr['backtest_summary'][0]['losses']\n\n";
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

<pre><code>
<div style='font-weight: bold'>Total Trade Summary</div>
<?php

$totalTrades_fileName = "/shark/reports/" . $ticker  . ".backtest.totaltrades.json";

if (file_exists($totalTrades_fileName)) {

	$jsonObject = file_get_contents($totalTrades_fileName);

	$json_arr = json_decode($jsonObject, true);

	echo "Avg. profit\t\tProfits std. dev.\t\tMax. profit\t\tMin. profit" . PHP_EOL;
	
	echo $json_arr['total_trades'][0]['avg_profit'] . "\t\t\t";
	echo $json_arr['total_trades'][0]['profits_std_dev'] . "\t\t";
	echo $json_arr['total_trades'][0]['max_profit'] . "\t\t";
	echo $json_arr['total_trades'][0]['min_profit'] . PHP_EOL;

	echo "Avg. return\t\tReturns std. dev.\t\tMax. return\t\tMin. return" . PHP_EOL;
	
	echo $json_arr['total_trades'][0]['avg_return'] . "\t\t";
	echo $json_arr['total_trades'][0]['returns_std_dev'] . "\t\t";
	echo $json_arr['total_trades'][0]['max_return'] . "\t\t";
	echo $json_arr['total_trades'][0]['min_return'] . PHP_EOL;
}
else
{
        echo "Datafile " . $totalTrades_fileName . " not found...";
}
?>

<div style='font-weight: bold'>Profitable Trade Summary</div>
<?php
$profitableTrades_fileName = "/shark/reports/" . $ticker  . ".backtest.profitabletrades.json";

if (file_exists($profitableTrades_fileName)) {
	
	$jsonObject = file_get_contents($profitableTrades_fileName);
	$json_arr = json_decode($jsonObject, true);

	echo "Avg. profit\t\tProfits std. dev.\t\tMax. profit\t\tMin. profit" . PHP_EOL;
	
	echo $json_arr['profitable_trades'][0]['avg_profit'] . "\t\t";
	echo $json_arr['profitable_trades'][0]['profits_std_dev'] . "\t\t";
	echo $json_arr['profitable_trades'][0]['max_profit'] .  "\t\t";
	echo $json_arr['profitable_trades'][0]['min_profit'] . PHP_EOL;

	echo "Avg. return\t\tReturns std. dev.\t\tMax. return\t\tMin. return" . PHP_EOL;
		
	echo $json_arr['profitable_trades'][0]['avg_return'] . "%\t\t";
	echo $json_arr['profitable_trades'][0]['returns_std_dev'] . "%\t\t";
	echo $json_arr['profitable_trades'][0]['max_return'] .  "%\t\t";
	echo $json_arr['profitable_trades'][0]['min_return'] . "%" . PHP_EOL;
}
else
{
        echo "Datafile " . $profitableTrades_fileName . " not found...";
}
?>

<div style='font-weight: bold'>Unprofitable Trade Summary</div>
<?php

$unprofitableTrades_fileName = "/shark/reports/" . $ticker  . ".backtest.unprofitabletrades.json";

if (file_exists($unprofitableTrades_fileName)) {

	$jsonObject = file_get_contents($unprofitableTrades_fileName);
	$json_arr = json_decode($jsonObject, true);

	echo "Avg. loss\t\tLosses std. dev.\t\tMax. loss\t\tMin. loss" . PHP_EOL;
	
	echo "$" . $json_arr['unprofitable_trades'][0]['avg_loss'] . "\t\t";
	echo "$" . $json_arr['unprofitable_trades'][0]['losses_std_dev'] . "\t\t";
	echo "$" . $json_arr['unprofitable_trades'][0]['max_loss'] .  "\t\t";
	echo "$" . $json_arr['unprofitable_trades'][0]['min_loss'] . PHP_EOL;

	echo "Avg. return\t\tReturns std. dev.\t\tMax. return\t\tMin. return" . PHP_EOL;

	echo "$" . $json_arr['unprofitable_trades'][0]['avg_return'] . "%\t\t";
	echo "$" . $json_arr['unprofitable_trades'][0]['returns_std_dev'] . "%\t\t";
	echo "$" . $json_arr['unprofitable_trades'][0]['max_return'] .  "%\t\t";
	echo "$" . $json_arr['unprofitable_trades'][0]['min_return'] . "%" . PHP_EOL;

}
else
{
        echo "Datafile " . $unprofitableTrades_fileName . " not found...";
}
?>

</code></pre>
</section>
