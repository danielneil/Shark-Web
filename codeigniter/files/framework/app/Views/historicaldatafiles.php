<!-- HEADER: MENU + HEROE SECTION -->
<header>
	<div class="heroe">
		<h1>Historical Data</h1>

		<h2>Cached Historical Instrument Data</h2>
	</div>
</header>

<!-- CONTENT -->

<section>

<h1>Index of historical data file cache</h1>

<p>Files will appear here as they are cached by the yahoo_finance plugin.</p>
	
<pre><code>

<?php 

	$history_dir = '/shark/historical/yahoo_finance_data';

        $files = scandir($history_dir);

        if ( count($files)-2) {

		echo "<div style='font-weight: bold'>Creation Date\t\t\tSize\t\tFile Name</div>" . PHP_EOL ;
		foreach (scandir($history_dir) as $f)
		{
			$fileName = $history_dir . '/'. $f;
			$lastModified = date ("F d Y H:i:s", filemtime($fileName));

			if ($f !== '.' and $f !== '..')
			{
				echo $lastModified . "\t" . filesize($fileName) . ' bytes ' . "\t<a href=/shark-web/historical/yahoo_finance_data/" . $f . ">" . $f . "</a>"  . PHP_EOL ;
			}
		}
	}
	else {
		echo "No historical data files found...";	
	}
?> 

</code></pre>
	
</section>
