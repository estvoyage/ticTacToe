<?php namespace estvoyage\ticTacToe\tests\units\nboolean\recipient;

require __DIR__ . '/../../../runner.php';

use estvoyage\ticTacToe\tests\units;

class switcher extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\nboolean\recipient')
		;
	}

	function testNbooleanIs()
	{
		$this
			->given(
				$true = null,
				$false = null,
				$this->newTestedInstance(
					$trueCallable = function() use (& $true) { $true = true; },
					$falseCallable = function() use (& $false) { $false = true; }
				)
			)
			->if(
				$this->testedInstance->nbooleanIs(true)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($trueCallable, $falseCallable))
				->boolean($true)
					->isTrue
				->variable($false)
					->isNull

			->given(
				$true = null,
				$false = null
			)
			->if(
				$this->testedInstance->nbooleanIs(false)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($trueCallable, $falseCallable))
				->variable($true)
					->isNull
				->boolean($false)
					->isTrue
		;
	}
}
