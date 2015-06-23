<?php

	$percents = array('12.5', '16.66', '33.33', '66.66');
	for ($i = 5; $i <= 100; $i+=5) {
		$percents[] = $i;
	}
	
	$sizes = array(
		'xs'	=>	'(min-width: 0px) and (max-width: 768px)',
		'sm'	=>	'(min-width:768px) and (max-width: 992px)',
		'md'	=>	'(min-width:992px) and (max-width: 1200px)',
		'lg'	=>	'(min-width:1200px)'
	);
	
	foreach ($percents as $i) {
		$ii = str_replace('.', '-', ''.$i);
		echo ".t3responsive-img-size-{$ii} .csc-textpic-imagewrap { width: {$i}%; } ";
		echo ".t3responsive-img-size-{$ii}.csc-textpic-intext-left-nowrap .csc-textpic-text { margin-left: {$i}%; } ";
		echo ".t3responsive-img-size-{$ii}.csc-textpic-intext-right-nowrap .csc-textpic-text { margin-right: {$i}%; } ";
		echo ".float-img.t3responsive-img-size-{$ii} .csc-textpic-imagecolumn { width: {$i}%; } ";
		echo "\n";
	}
		
	echo "\n\n";
	
	foreach ($sizes as $size=>$m) {
		echo "\n@media {$m} {\n";
		foreach ($percents as $i) {
			$ii = str_replace('.', '-', ''.$i);
			echo "\t.t3responsive-img-size-{$size}-{$ii} .csc-textpic-imagewrap { width: {$i}%; } ";
			echo ".t3responsive-img-size-{$size}-{$ii}.csc-textpic-intext-left-nowrap .csc-textpic-text { margin-left: {$i}%; } ";		
			echo ".t3responsive-img-size-{$size}-{$ii}.csc-textpic-intext-right-nowrap .csc-textpic-text { margin-right: {$i}%; } ";
			echo ".float-img.t3responsive-img-size-{$size}-{$ii} .csc-textpic-imagecolumn { width: {$i}%; } ";
		}
		echo "\n}\n\n";
	}
	
	die();
?>