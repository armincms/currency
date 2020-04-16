<?php return [
	/*
	| ----------------------------------------------
	| The policy class of the currency model.
	| ----------------------------------------------
	|
	| By default this policy return true for all access.
	|
	*/

	'policy' => Armincms\Currency\Policies\CurrencyPolicy::class,

	/*
	| ----------------------------------------------
	| Resource register status
	| ----------------------------------------------
	|
	| If you need custom resource, you should change this to `false`. 
	|
	*/ 

	'resource'	=> true,
];