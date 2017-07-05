<?php namespace estvoyage\ticTacToe\tests\units\nboolean\recipient\recipient;

require __DIR__ . '/../../../../runner.php';

use estvoyage\ticTacToe\tests\units;
use mock\estvoyage\ticTacToe as mockOfTicTacToe;

class block extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\nboolean\recipient\recipient')
		;
	}

	function testNBooleanIs()
	{
		$this
			->given(
				$this->newTestedInstance($block = new mockOfTicTacToe\block),
				$recipient = new mockOfTicTacToe\nboolean\recipient
			)
			->if(
				$this->testedInstance->nbooleanRecipientIs($recipient)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($block))
				->mock($block)
					->receive('blockArgumentsAre')
						->withArguments($recipient)
							->once
		;
	}

}
