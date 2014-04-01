<?php

namespace Promaker\Base\Factory;

interface IFactory
{
    public function make($data);
    public function makeAll($collection);
}
