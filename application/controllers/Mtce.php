<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mtce extends Application
{
	public function index()
	{
        $this->data['pagetitle'] = 'TODO List Maintenance';
        $tasks = $this->tasks->all();
        
        foreach($tasks as $task){
            if(!empty($task->status)){
                $task->status = $this->statuses->get($task->status)->name;
            }
        }

        $result = '';       

        foreach($tasks as $task){
            //$converted[] = (array) $task;
            $result .= $this->parser->parse('oneitem',(array)$task, true);
        }

        $this->data['display_tasks'] = $result;
        $this->data['pagebody'] = 'itemlist';

		//$this->data['content'] = 'Coming soon to a sctreen near you!';
		$this->render(); 
	}
}