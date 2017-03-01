<?php
	$prize_arr = array(
		'0'=>array('id'=>1,'min'=>array(18,103),'max'=>array(62,146),'prize'=>'集分宝','v'=>11),
		'1'=>array('id'=>2,'min'=>64,'max'=>101,'prize'=>'精美礼品','v'=>11),
		'2'=>array('id'=>3,'min'=>152,'max'=>193,'prize'=>'再来一次','v'=>25),
		'3'=>array('id'=>4,'min'=>195,'max'=>240,'prize'=>'10元','v'=>2),
		'4'=>array('id'=>5,'min'=>242,'max'=>284,'prize'=>'祝你好运','v'=>25),
		'5'=>array('id'=>6,'min'=>290,'max'=>331,'prize'=>'50元','v'=>1),
		'6'=>array('id'=>7,'min'=>337,'max'=>373,'prize'=>'再接再厉','v'=>25)
	);
	
	foreach($prize_arr as $key => $val){ 
    	$arr[$val['id']] = $val['v']; 
	} 
 
	$rid = getRand($arr); //根据概率获取奖项id 
 
	$res = $prize_arr[$rid-1]; //中奖项 
	$min = $res['min']; 
	$max = $res['max']; 
	if($res['id']==1){ //再接再厉 
	    $i = mt_rand(0,2); 
	    $result['angle'] = mt_rand($min[$i],$max[$i]); 
	}else if($res['id']==4){//集分宝 
		$i = mt_rand(0,1); 
	    $result['angle'] = mt_rand($min[$i],$max[$i]); 
	}else{ 
	    $result['angle'] = mt_rand($min,$max); //随机生成一个角度 
	} 
	$result['prize'] = $res['prize']; 
	
	
	function getRand($proArr){
		$result = '';
		
		//概率数组的总概率精度
		$proSum = array_sum($proArr);
		
		//概率数组循环
		foreach($proArr as $key => $proCur){
			$randNum = mt_rand(1,$proSum);
			if($randNum <= $proCur){
				$result = $key;
				break;
			}else{
				$proSum -= $proCur;
			}
		}
		unset($proArr);
		
		return $result;
	}
	
	 
	echo json_encode($result); 
?>