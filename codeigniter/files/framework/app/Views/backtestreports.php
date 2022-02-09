<!-- HEADER: MENU + HEROE SECTION -->
<header>

	<div class="heroe">

		<h1>Backtest Report - ADA-USD</h1>

		<h2>Backtest against instrument ADA-USD, generated <?php echo date("F d Y H:i:s.", filemtime("/shark/log/config_gen.log")); ?></h2>
	</div>

</header>

<!-- CONTENT -->

<section>

	<h1>Report Overview</h1>
	
	<p>This report comprises of the results of a backtest ran against instrument ADA-USD:</p>


<pre><code>
<div style='font-weight: bold'>Portfolio Summary</div> 
Final portfolio value   Cumulative returns
$1001673.07     	0.17 %

Sharpe ratio    	Max. drawdown   	Longest drawdown duration
1.41  			0.12 %  		91 days, 0:00:00        

Total trades    	Wins    		Losses
9			3			6
</code></pre>


<div style="text-align: left"><img src ="http://172.105.187.181/shark-web/reports/ADA-USD.png" /></div>
<pre><code>
<div style='font-weight: bold'>Additional Portfolio Information</div>
LAvg. profit	LProfits std. dev.	LMax. profit	LMin. profit
$97	$339	$1042	$-146

LAvg. return	LReturns std. dev.	LMax. return	LMin. return
76	214 %	681 %	-9 %

Avg. profit	Profits std. dev.	Max. profit	Min. profit
$384	$466	$1042	$31

Avg. return	Returns std. dev.	Max. return	Min. return
239 %	313 %	681 %	6 %

Avg. loss	Losses std. dev.	Max. loss	Min. loss
$-46	$49	$-146	$-6

Avg. return	Returns std. dev.	Max. return	Min. return
-5 %	3 %	-1 %	-9 %

</code></pre>
</section>
