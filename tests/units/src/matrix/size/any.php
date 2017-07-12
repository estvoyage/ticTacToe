<?php namespace estvoyage\ticTacToe\tests\units\matrix\size;

require __DIR__ . '/../../../runner.php';

use estvoyage\ticTacToe\tests\units;

class any extends units\ointeger\unsigned
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\matrix\size')
		;
	}
}
