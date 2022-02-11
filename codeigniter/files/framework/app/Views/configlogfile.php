<!-- HEADER: MENU + HEROE SECTION -->
<header>

	<div class="heroe">

		<h1>Running Configuration</h1>

		<h2>Shark's Running Configuration as per the last build on <?php echo date("F d Y H:i:s.", filemtime("/shark/log/config_gen.log")); ?></h2>
	</div>

</header>

<!-- CONTENT -->

<section>

<h1>Overview</h1>
	
<p>Shark's running configuration comprises of:</p>

<pre><code>
<h4>Instruments</h4>		
Trading Instruments: 		<?php echo exec("grep -o -i 'Created instrument:' /shark/log/config_gen.log | wc -l") . PHP_EOL; ?> 
Trading Groups:			<?php echo exec("grep -o -i 'instrument group' /shark/log/config_gen.log | wc -l") . PHP_EOL; ?> 
Shark Plugins: 			<?php echo exec("grep -i 'Attached plugin' /shark/log/config_gen.log | awk '{ print $6 }' | sort | uniq | wc -l") . PHP_EOL; ?> 
Shark Plugin Groups:		<?php echo exec("grep -o -i 'plugin group' /shark/log/config_gen.log | wc -l") . PHP_EOL; ?> 
Trading Brokers: 		<?php echo exec("grep -o -i 'Created broker' /shark/log/config_gen.log | wc -l") . PHP_EOL; ?> 

<h4>Git Configuration Repositories</h4>
Shark Config Git REPO:		<?php echo exec("cd /shark/Shark-Config && git config --get remote.origin.url") . PHP_EOL; ?> 
Shark Plugin Git REPO:		<?php echo exec("cd /shark/Shark-Plugins && git config --get remote.origin.url") . PHP_EOL; ?> 
Shark Web Git REPO: 		<?php echo exec("cd /shark/Shark-Web && git config --get remote.origin.url") . PHP_EOL; ?> 
Shark Brokers Git REPO:		<?php echo exec("cd /shark/Shark-Brokers && git config --get remote.origin.url") . PHP_EOL; ?> 

<h4>Configuration Files</h4>
Trading Configuration File: 	<a href ="http://<?php echo $_SERVER['SERVER_ADDR'];?>/shark-web/Shark-Config/config/files/trading-config.yml">trading-config.yml</a>

<h4>Historical Data</h4>
Number of data files:		<?php echo exec("find /shark/historical/yahoo_finance_data/ -type f | wc -l") . PHP_EOL; ?> 
</code></pre>

<h1>Configuration File Parser Log</h1>
<p>This is the log file for the YAML configuration parser, and details the conversion process from the YAML code into Shark's native configuration language, along with any 
errors encountered.</p>
<pre><code>	

<?php
echo nl2br(htmlentities(file_get_contents("/shark/log/config_gen.log")));
?>

</code></pre>

</section>

</div>
