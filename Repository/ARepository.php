<?php

namespace Promaker\Base\Repository;

use Promaker\Base\Entity\IEntity;
use Promaker\Base\Persistance\IPersistance;

abstract class ARepository
{
    protected $_persistence;

    /**
     * Retorna una colección de entidades
     * 
     * @param Int $id
     * @return Array $entitiesArray
     */
    abstract public function getAll();

    /**
     * Retorna una colección de entidades que cumplan con el criterio de búsqueda
     * 
     * @param Array $criteria
     * @return Array $entitiesArray
     */
    abstract public function getAllWith($criteria);

    /**
     * Retorna la entidad
     * 
     * @param Int $id
     * @return Entity $entity
     */
    abstract public function getById($id);

    /**
     * Retorna la ultima entidad cargada
     * 
     * @return Entity $entity
     */
    abstract public function getLast();

    /**
     * Persiste una nueva entidad
     * 
     * @param Entity $entity
     */
    abstract public function add(IEntity $entity);

    /**
     * Persiste una coleccion de nuevas entidades
     * 
     * @param Array $entitiesArray
     */
    abstract public function addAll($entitiesArray);

    /**
     * Remueve una entidad
     * 
     * @param Int $id
     */
    abstract public function removeById($id);
}
