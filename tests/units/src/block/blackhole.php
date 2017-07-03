<?php namespace estvoyage\ticTacToe\tests\units\block;

require __DIR__ . '/../../runner.php';

use estvoyage\ticTacToe\tests\units;

class blackhole extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\block')
		;
	}

	function testBlockArgumentsAre()
	{
		$this
			->given(
				$this->newTestedInstance
			)
			->if(
				$this->newTestedInstance->blockArgumentsAre()
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance)
		;
	}
}
