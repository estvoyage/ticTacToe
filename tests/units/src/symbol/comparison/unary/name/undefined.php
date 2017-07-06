<?php namespace estvoyage\ticTacToe\tests\units\symbol\comparison\unary\name;

require __DIR__ . '/../../../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class undefined extends units\test
{
	function testRecipientOfComparisonWithTicTacToeSymbolIs()
	{
		$this
			->given(
				$symbol = new mockOfTicTacToe\symbol,
				$condition = new mockOfTicTacToe\condition,
				$this->newTestedInstance
			)
			->if(
				$this->testedInstance->recipientOfComparisonWithTicTacToeSymbolIs($symbol, $condition)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($condition)
					->receive('nbooleanIs')
						->withArguments(true)
							->once

			->given(
				$this->calling($symbol)->recipientOfTicTacToeSymbolNameIs = function($condition) {
					$condition->ticTacToeSymbolIsX();
				}
			)
			->if(
				$this->testedInstance->recipientOfComparisonWithTicTacToeSymbolIs($symbol, $condition)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($condition)
					->receive('nbooleanIs')
						->withArguments(false)
							->once

			->given(
				$this->calling($symbol)->recipientOfTicTacToeSymbolNameIs = function($condition) {
					$condition->ticTacToeSymbolIsO();
				}
			)
			->if(
				$this->testedInstance->recipientOfComparisonWithTicTacToeSymbolIs($symbol, $condition)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($condition)
					->receive('nbooleanIs')
						->withArguments(false)
							->twice
		;
	}
}
