<?php namespace estvoyage\ticTacToe\tests\units\symbol\name\recipient;

require __DIR__ . '/../../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class block extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\symbol\name\recipient')
		;
	}

	function testTicTacToeSymbolIsX()
	{
		$this
			->given(
				$this->newTestedInstance($xBlock = new mockOfTicTacToe\block, $oBlock = new mockOfTicTacToe\block)
			)
			->if(
				$this->testedInstance->ticTacToeSymbolIsX()
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($xBlock, $oBlock))
				->mock($xBlock)
					->receive('blockArgumentsAre')
						->once
				->mock($oBlock)
					->receive('blockArgumentsAre')
						->never
		;
	}

	function testTicTacToeSymbolIsY()
	{
		$this
			->given(
				$this->newTestedInstance($xBlock = new mockOfTicTacToe\block, $oBlock = new mockOfTicTacToe\block)
			)
			->if(
				$this->testedInstance->ticTacToeSymbolIsO()
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($xBlock, $oBlock))
				->mock($xBlock)
					->receive('blockArgumentsAre')
						->never
				->mock($oBlock)
					->receive('blockArgumentsAre')
						->once
		;
	}
}
