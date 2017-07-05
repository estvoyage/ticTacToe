<?php namespace estvoyage\ticTacToe\nboolean\recipient\recipient;

use estvoyage\ticTacToe\{ nboolean, block };

class functor extends block\functor
	implements
		nboolean\recipient\recipient
{
	function nbooleanRecipientIs(nboolean\recipient $recipient) :void
	{
		parent::blockArgumentsAre($recipient);
	}
}
