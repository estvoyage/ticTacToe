<?php namespace estvoyage\ticTacToe\tests\units\buffer\key\recipient;

require __DIR__ . '/../../../../runner.php';

use estvoyage\ticTacToe\{ tests\units, buffer };

class functor extends units\test
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\buffer\key\recipient')
		;
	}

	function testBufferKeyIs()
	{
		$this
			->given(
				$this->newTestedInstance($callable = function() use (& $arguments) { $arguments = func_get_args(); }),
				$key = new buffer\key
			)
			->if(
				$this->testedInstance->bufferKeyIs($key)
			)
			->then
				->object($this->testedInstance)
					->isEqualTo($this->newTestedInstance($callable))
				->array($arguments)
					->isEqualTo([ $key ])
		;
	}
}
