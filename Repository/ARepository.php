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

    /**
     * Setea el limite para efectuar en las operaciones de lectura
     * 
     * @param Int $limit
     * @return self
     */
    public function setLimit($limit)
    {
        if (!isset($this->_persistence) || !($this->_persistence instanceof IPersistance)) {
            throw new Exception("Repository Exception : No existe la interfaz de la persistencia o no implementa la interfaz IPersistance.");
        }

        $this->_persistence->setLimit($limit);

        return $this;
    }

    /**
     * Setea en la abstración de la persistencia el offset en base a la pagina y el limite asignado
     * para efectuar en las operaciones de lectura
     * 
     * @param Int $page
     * @return self
     */
    public function setPage($page)
    {
        if (!isset($this->_persistence) || !($this->_persistence instanceof IPersistance)) {
            throw new Exception("Repository Exception : No existe la interfaz de la persistencia o no implementa la interfaz IPersistance.");
        }

        $limit = $this->_persistence->getLimit();

        if (!isset($limit)) {
            throw new Exception("Repository Exception : No estña seteado el limite de la operación de lectura.");
        }

        $this->_persistence->setOffset($limit * $page);

        return $this;
    }

    /**
     * Setea en la abstración de la persistencia el offset para efectuar en las operaciones de lectura
     * 
     * @param Int $page
     * @return self
     */
    public function setOffset($offset)
    {
        if (!isset($this->_persistence) || !($this->_persistence instanceof IPersistance)) {
            throw new Exception("Repository Exception : No existe la interfaz de la persistencia o no implementa la interfaz IPersistance.");
        }

        $this->_persistence->setOffset($offset);

        return $this;
    }
}
