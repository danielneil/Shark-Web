<!-- HEADER: MENU + HEROE SECTION -->
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

	echo "Final portfolio value\t\tCumulative returns" . PHP_EOL;
	echo $json_arr['backtest_summary'][0]['final_portfolio_value'] . "\t\t" . $json_arr['backtest_summary'][0]['cumulative_returns'] . PHP_EOL;

	echo "Sharpe ratio\t\tMax. drawdown\t\tLongest drawdown duration" . PHP_EOL;
	echo $json_arr['backtest_summary'][0]['sharpe_ratio'] . "\t\t" . $json_arr['backtest_summary'][0]['max_drawdown'] . "\t\t" . $json_arr['backtest_summary'][0]['longest_drawdown_duration'] . PHP_EOL;

	echo "Total trades\t\tWins\t\tLosses" . PHP_EOL;
	echo $json_arr['backtest_summary'][0]['total_trades'] . "\t\t" . $json_arr['backtest_summary'][0]['wins'] . "\t\t" . $json_arr['backtest_summary'][0]['losses'] . PHP_EOL;
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

<pre><code>
<div style='font-weight: bold'>Total Trade Summary</div>
<?php

$totalTrades_fileName = "/shark/reports/" . $ticker  . ".backtest.totaltrades.json";

if (file_exists($totalTrades_fileName)) {

$jsonObject = file_get_contents($totalTrades_fileName);

?>
Avg. profit	Profits std. dev.	Max. profit	Min. profit
$97		$339			$1042		$-146

Avg. return	Returns std. dev.	Max. return	Min. return
76		214 %			681 %		-9 %
<?php
}
else
{
        echo "Datafile " . $totalTrades_fileName . " not found...";
}
?>

<div style='font-weight: bold'>Profitable Trade Summary</div>
<?php

$profitableTrades_fileName = "/shark/reports/" . $ticker  . ".backtest.profitabletrades.json";

if (file_exists($totalTrades_fileName)) {

$jsonObject = file_get_contents($profitableTrades_fileName);

?>

Avg. profit	Profits std. dev.	Max. profit	Min. profit
$384		$466			$1042		$31

Avg. return	Returns std. dev.	Max. return	Min. return
239 %		313 %			681 %		6 %
<?php
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

?>

Avg. loss	Losses std. dev.	Max. loss	Min. loss
$-46		$49			$-146		$-6

Avg. return	Returns std. dev.	Max. return	Min. return
-5 %		3 %			-1 %		-9 %
<?php
}
else
{
        echo "Datafile " . $unprofitableTrades_fileName . " not found...";
}
?>

</code></pre>
</section>
