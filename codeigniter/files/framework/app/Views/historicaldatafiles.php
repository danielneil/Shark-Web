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
	
<pre><code>

<?php 

	$history_dir = '/shark/historical/yahoo_finance_data';

        $files = scandir($history_dir);

        if ( count($files)-2) {

		foreach (scandir($history_dir) as $f)
		{
			$fileName = $history_dir . '/'. $f;
			$lastModified = date ("F d Y H:i:s.", filemtime($fileName));

			if ($f !== '.' and $f !== '..')
			{
				echo "<a href=/shark-web/historical/yahoo_finance_data/" . $f . ">" . $f . "</a>" . "\t" . filesize($fileName) . ' bytes ' . "\t" . $lastModified  . PHP_EOL ;
			}
		}
	}
	else {
		echo "No historical data files found...";	
	}
?> 

</code></pre>
	
</section>
