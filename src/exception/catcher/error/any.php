<?php namespace estvoyage\ticTacToe\exception\catcher\error;

use estvoyage\ticTacToe\{ block, php\classname, future, nstring };

class any
{
	private
		$error,
		$classname
	;

	function __construct(\error $error, classname $classname)
	{
		$this->error = $error;
		$this->classname = $classname;
	}

	function blockIs(block $block) :void
	{
		try
		{
			$block->blockArgumentsAre();
		}
		catch (\error $error)
		{
			(
				new future\block(
					new block\functor(
						function() use ($error)
						{
							throw $error;
						}
					)
				)
			)
				->futureForBlockIs(
					new block\functor(
						function($future)
						{
							$this->classname
								->recipientOfPhpClassNameAsNStringIs(
									new nstring\recipient\functor(
										function($classname) use ($future)
										{
											$future->valueForFutureIs($classname);
										}
									)
								)
							;
						}
					),
					new block\functor(
						function($classname) use ($error)
						{
							throw ($error instanceof $classname ? $this->error : $error);
						}
					)
				)
			;
		}
	}
}
