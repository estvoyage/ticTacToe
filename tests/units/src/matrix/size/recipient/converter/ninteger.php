<?php namespace estvoyage\ticTacToe\tests\units\matrix\size\recipient\converter;

require __DIR__ . '/../../../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class ninteger extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\matrix\size\recipient')
		;
	}

	function testMatrixSizeIs()
	{
		$this
			->given(
				$this->newTestedInstance($recipient = new mockOfTicTacToe\ninteger\recipient),

				$size = new mockOfTicTacToe\matrix\size,

				$sizeValue = rand(PHP_INT_MIN, PHP_INT_MAX),
				$this->calling($size)->recipientOfValueOfOIntegerIs = function($recipient) use ($sizeValue) {
					$recipient->nintegerIs($sizeValue);
				}
			)
			->if(
				$this->testedInstance->matrixSizeIs($size)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($recipient))
				->mock($recipient)
					->receive('nintegerIs')
						->withArguments($sizeValue)
							->once
		;
	}
}
