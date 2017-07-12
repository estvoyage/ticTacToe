<?php namespace estvoyage\ticTacToe\tests\units\matrix\dimension\side;

require __DIR__ . '/../../../../runner.php';

use estvoyage\ticTacToe\tests\units;

class any extends units\ointeger\any
{
	function testClass()
	{
		$this->testedClass
			->implements('estvoyage\ticTacToe\matrix\dimension\side')
		;
	}
}
