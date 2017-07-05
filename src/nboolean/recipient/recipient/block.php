<?php namespace estvoyage\ticTacToe\nboolean\recipient\recipient;

use estvoyage\{ ticTacToe, ticTacToe\nboolean };

class block extends ticTacToe\block\proxy
	implements
		nboolean\recipient\recipient
{
	function nbooleanRecipientIs(nboolean\recipient $recipient) :void
	{
		parent::blockArgumentsAre($recipient);
	}
}
