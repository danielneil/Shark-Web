<header>
	<div class="heroe">
		<h1>Backtest Reports</h1>
		<h2>Backtesting results of all configured instruments</h2>
	</div
</header>
<section>

	<h1>Completed Backtest Reports</h1>
	<p>Reports which are still being processed will not appear below until their backtest computation is complete.</p>

<pre><code>
<div style='font-weight: bold'>Portfolio Summary</div> 
<?php 

	report_dir = '/shark/report';

        $files = scandir($history_dir);

        if ( count($files)-2) {

		echo "<div style='font-weight: bold'>Instrument Report</div>" . PHP_EOL ;
		
		foreach (scandir($history_dir) as $f)
		{
			$fileName = $history_dir . '/'. $f;

			if ($f !== '.' and $f !== '..')
			{
				$files = explode(".", $fileName);			
				$ticker = $files[0];
				
				echo "<a href=/framework/public/index.php/BacktestReport?ticker=" . $ticker . ">" . $ticker . "</a>"  . PHP_EOL ;
			}
		}
	}
	else 
	{
		echo "No report files found, they are probably still being generated...";	
	}
?> 
</code></pre>
</section>
