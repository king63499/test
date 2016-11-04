<?php
	$file = file("/Users/jinchangli/b.txt");
	$i = 0;
	echo '$data = ['."\n";
	$str='';
	$b = [
		1 => 'yxp_order_createtime',
		2 => 'dispose_time',
		3 => 'yxp_transfer_localtime',
		4 => 'dispose_price',
		5 => 'dispose_transfer_fee',
		6 => 'dispose_trade_fee',
		7 => 'transfer_deposit_fee',
	];
	foreach($file as $line){
		$line = trim($line);
		
		if(preg_match('/^[0-9]{4}\/[0-9]{1,2}\/[0-9]{1,2}\s+[0-9]{1,2}:[0-9]{1,2}$/',$line) != 0){
			$line = date('Y-m-d H:i:s',strtotime($line));
		}

		if($i%8 == 0){
			if(preg_match('/^\s*$/', $line) == 0){
				$str .="\t". "'".$line."'".'=> [';
			}else{
				break;
			}			
	//testooo
		}else{
			$k = $i%8;
			if(($i+1)%8 == 0){
				$str .="'".$b[$k]."' =>". "'".$line."'],\n";
			}else{
				$str .= "'".$b[$k]."' =>"."'".$line."'".',';
			}
		}
		$i++;	
	}
	echo $str;
	echo ']';

?>

