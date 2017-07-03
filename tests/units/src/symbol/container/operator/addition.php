<?php namespace estvoyage\ticTacToe\tests\units\symbol\container\operator;

require __DIR__ . '/../../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class addition extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\symbol\container\operator')
		;
	}

	function testRecipientOfTicTacToeSymbolContainerAfterOperationWithSymbolIs()
	{
		$this
			->given(
				$this->newTestedInstance($container = new mockOfTicTacToe\symbol\container),

				$symbol = new mockOfTicTacToe\symbol,

				$recipient = new mockOfTicTacToe\symbol\container\recipient,

				$containerWithSymbol = new mockOfTicTacToe\symbol\container,
				$this->calling($container)->recipientOfContainerWithTicTacToeSymbolIs = function($aSymbol, $recipient) use ($symbol, $containerWithSymbol) {
					if ($aSymbol === $symbol)
					{
						$recipient->ticTacToeSymbolContainerIs($containerWithSymbol);
					}
				}
			)
			->if(
				$this->testedInstance->ticTacToeSymbolIs($symbol)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($containerWithSymbol))
		;
	}

	function testRecipientOfTicTacToeSymbolContainerIs()
	{
		$this
			->given(
				$this->newTestedInstance($container = new mockOfTicTacToe\symbol\container),
				$recipient = new mockOfTicTacToe\symbol\container\recipient
			)
			->if(
				$this->testedInstance->recipientOfTicTacToeSymbolContainerIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($container))
				->mock($recipient)
					->receive('ticTacToeSymbolContainerIs')
						->withArguments($container)
							->once
		;
	}
}
