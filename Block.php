<?php


include './StringUtil.php';

class Block{
	
	static private $hashes;
	static private $previousHash;
	static private $data;
	static private $timeStamp;
	static private $nonce=0;

	public static function __constructor($data,$previousHash ){
		$this->data = $data;
		$this -> previousHash = $previousHash;

		$dateTime = date('Y-m-d H:i:s',time());
		$this -> timeStamp = $dateTime;

		$this -> hashes = $this->CalculateHash();

	}

	public static function CalculateHash(){

		$HashValue = StringUtils::applySHA256(Block::$previousHash.Block::$timeStamp.Block::$nonce.Block::$data);
		return $HashValue;
	}

	public static function mineBlock($difficultyIndex){

			while (Block::$hashes.substr("0", 0,5) !=StringUtils::getDificultyString((int)$difficultyIndex)) {
				Block::$nonce ++;
				Block::$hashes = Block::$CalculateHash();
			}

			return Block::$hashes;
	}

	
}
?>