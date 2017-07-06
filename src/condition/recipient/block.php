<?php namespace estvoyage\ticTacToe\condition\recipient;

use estvoyage\{ ticTacToe, ticTacToe\condition };

class block extends ticTacToe\block\proxy
	implements
		condition\recipient
{
	function conditionIs(condition $condition) :void
	{
		parent::blockArgumentsAre($condition);
	}
}
