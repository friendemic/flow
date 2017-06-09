<?php

namespace Friendemic\Flow;

use Symfony\Component\Workflow\Registry;

class Flow
{
	protected $registry;
	
	public function __construct($config)
	{		
		$registry = new Registry;
		foreach($config as $name => $options) {
			$workflow = $this->buildWorklow($options, $name);			
			foreach($options['supports'] as $class) {
				$registry->add($workflow, $class);
			}
		}
		$this->registry = $registry;
	}
	
	public function buildWorkflow($options, $name) 
	{		
	}
}