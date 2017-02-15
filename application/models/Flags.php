<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Flags extends MY_Model {

        public function __construct()
        {
                parent::__construct('flags', 'id');
        }

}
