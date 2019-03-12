<?php


class StringUtils{

	/* this method we are using it to create the hash based on the input string that we have been given. The Hash is then converted to a HexaDecimal String */

	public static  function applySHA256($input){

		try {
			$output = hash("sha256",$input,true);

			# our output is of type string, we convert it to a HexaDecimal String as follows

			$HexaDecimal = '';

			for ($i=0; $i < strlen($output); $i++) { 
				
				$HexaDecimal .= dechex(ord($output[$i]));
			}
			return $HexaDecimal;

		} catch (Exception $e) {
			throw new Exception($e, 1);
		}

		
	}

	 public static function getDificultyString($difficulty) {
	 	$StringValue  = '';
	 	for($i=0;$i < (int)$difficulty;$i++){
	 		$StringValue .= "0";
	 	}
        return $StringValue;
    }
}
?>