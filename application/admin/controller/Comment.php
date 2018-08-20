<?php

namespace app\admin\controller;

use think\Controller;


class Comment extends Controller
{
    public function lists()
    {
        return $this->fetch();
    }
}
