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
<div style='font-weight: bold'>Backtest Reports (per instrument)</div> 
<?php 

	$report_dir = '/shark/reports';

        $files = scandir($report_dir);

        if ( count($files)-2) {
		
		$a = array();
		
		foreach (scandir($report_dir) as $f)
		{
			if ($f !== '.' and $f !== '..')
			{
				$files = explode(".", $f);			
				$ticker = $files[0];
				
				array_push($a, $ticker);
			}
		}
		
		$result = array_unique($a);
		
		foreach ($result as $ticker)
		{
			echo "<a href=/framework/public/index.php/BacktestReport?ticker=" . $ticker . ">" . $ticker . "</a>"  . PHP_EOL ;
		}
	}
	else 
	{
		echo "No report files found, they are probably still being generated...";	
	}
?> 
</code></pre>
</section>
