<?php

namespace app\admin\controller;

use think\Controller;


class Article extends Controller
{
    public function adds()
    {
        return $this->fetch();
    }
	
	public function lists()
    {
        return $this->fetch();
    }

    
}
