<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/
	 * 	- or -
	 * 		http://example.com/welcome/index
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$tasks = $this->tasks->all();

		$count = 0;
		foreach($tasks as $task){
			if($task->status != 2)
				$count++;
		}			
		$this->data['remaining_tasks'] = $count;

		$count = 0;
		foreach(array_reverse($tasks) as $task){
			$task->priority = $this->priorities->get($task->priority)->name;
			$display_task[] = (array) $task;
			$count++;
			if($count >= 5 ) break;
		}
		$this->data['display_tasks'] = $display_task;

		$this->data['pagebody'] = 'homepage';
		$this->render(); 
	}

}
