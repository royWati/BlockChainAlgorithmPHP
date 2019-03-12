<?php

	include './Block.php';
	class Chain{

		public static $blockData= array();


		public static function isChainValid($blockHashes,$difficulty){
			$currentBlock;
			$previousBlock;

			for($i =1 ; i < sizeof($blockHashes) ; $i++){
				$currentBlock = $blockHashes[$i];
				$previousBlock = $blockHashes[$i-1];

				if($currentBlock->hashes != $currentBlock->CalculateHash()){
					return false;
				}

				if($previousBlock->hashes != $previousBlock->CalculateHash()){
					return false;

				}

				if($currentBlock->hashes.substr("0", 0,5) !=StringUtils::getDificultyString((int)$difficultyIndex)){
					return false;

				}


			}

			return true;
		}

		public static function addBlock ($blockData,$difficulty){
			$v=Block::mineBlock($difficulty);

			$block = array();
			$block['d']=Block::mineBlock($difficulty);
			var_dump($v);
			array_push(Chain::$blockData, $block);
		}

		public static function StartMining(){
			$difficulty = 5;

			var_dump("trying to mine block 1...");
			Chain::addBlock(new Block("This is the genesis block","0000011111"),$difficulty);
			var_dump("trying to mine block 2...");
			Chain::addBlock(new Block("this is our first block to mine",Chain::$blockData[sizeof($blockData)-1]),$difficulty);
			var_dump("trying to mine block 1...");
			Chain::addBlock(new Block("this is our second block to mine",Chain::$blockData[sizeof($blockData)-2]),$difficulty);

			$response['mines']= Chain::$blockData;

			return json_encode($response);

		}
	}
?>