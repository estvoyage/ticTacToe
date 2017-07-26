<?php namespace estvoyage\ticTacToe\tests\units\ninteger\generator;

require __DIR__ . '/../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class between extends units\test
{
	function testPayloadForIteratorIs()
	{
		$this
			->given(
				$this->newTestedInstance($start = 0, $end = 5),

				$recipient = new mockOfTicTacToe\ninteger\recipient,
				$this->calling($recipient)->nintegerIs = function($ninteger) use (& $nintegers) {
					$nintegers[] = $ninteger;
				}
			)
			->if(
				$this->testedInstance->recipientOfNIntegerIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($start, $end))
				->array($nintegers)
					->isEqualTo([ 0, 1, 2, 3, 4, 5 ])
		;
	}
}
