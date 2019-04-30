<div class="showtxt">
		<?php 

	$in = array("1","2","3","4");
	$power_perms = power_perms($in);
			
	//header("Content-type:text/x-json");	
	echo json_encode($power_perms);

 function power_perms($arr) {

    $power_set = power_set($arr);
    $result = array();

    foreach($power_set as $set) {
        $perms = perms($set);
        $result = array_merge($result,$perms);
    }
    return $result;
}

function power_set($in,$minLength = 1) {

   $count = count($in);
   $members = pow(2,$count);
   $return = array();
   for ($i = 0; $i < $members; $i++) {
      $b = sprintf("%0".$count."b",$i);
      $out = array();
      for ($j = 0; $j < $count; $j++) {
         if ($b{$j} == '1') $out[] = $in[$j];
      }
      if (count($out) >= $minLength) {
         $return[] = $out;
      }
   }

   //usort($return,"cmp");  //can sort here by length
   return $return;
}

function factorial($int){
   if($int < 2) {
       return 1;
   }

   for($f = 2; $int-1 > 1; $f *= $int--);

   return $f;
}

function perm($arr, $nth = null) {

    if ($nth === null) {
        return perms($arr);
    }

    $result = array();
    $length = count($arr);

    while ($length--) {
        $f = factorial($length);
        $p = floor($nth / $f);
        $result[] = $arr[$p];
        array_delete_by_key($arr, $p);
        $nth -= $p * $f;
    }

    $result = array_merge($result,$arr);
    return $result;
}

function perms($arr) {
    $p = array();
    for ($i=0; $i < factorial(count($arr)); $i++) {
        $p[] = perm($arr, $i);
    }
    return $p;
}

function array_delete_by_key(&$array, $delete_key, $use_old_keys = FALSE) {

    unset($array[$delete_key]);

    if(!$use_old_keys) {
        $array = array_values($array);
    }

    return TRUE;
}
		?>
	</div>