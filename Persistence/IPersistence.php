<?php

namespace Promaker\Base\Persistence;

/**
* 
*/
interface IPersistence
{
    public function persist($data);
    public function persistAll($collection);

    public function retrieveAll();
    public function retrieveAllWith($criteria);
    public function retrieve($id);

    public function remove($id);
}
