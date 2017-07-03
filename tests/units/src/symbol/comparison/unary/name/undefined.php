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
				$recipient = new mockOfTicTacToe\nboolean\recipient,
				$this->newTestedInstance
			)
			->if(
				$this->testedInstance->recipientOfComparisonWithTicTacToeSymbolIs($symbol, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('nbooleanIs')
						->withArguments(true)
							->once

			->given(
				$this->calling($symbol)->recipientOfTicTacToeSymbolNameIs = function($recipient) {
					$recipient->ticTacToeSymbolIsX();
				}
			)
			->if(
				$this->testedInstance->recipientOfComparisonWithTicTacToeSymbolIs($symbol, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('nbooleanIs')
						->withArguments(false)
							->once

			->given(
				$this->calling($symbol)->recipientOfTicTacToeSymbolNameIs = function($recipient) {
					$recipient->ticTacToeSymbolIsO();
				}
			)
			->if(
				$this->testedInstance->recipientOfComparisonWithTicTacToeSymbolIs($symbol, $recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
				->mock($recipient)
					->receive('nbooleanIs')
						->withArguments(false)
							->twice
		;
	}
}
