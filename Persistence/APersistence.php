<?php

namespace Promaker\Base\Persistence;

/**
* 
*/
abstract class APersistence
{
    protected $_limit;
    protected $_offset;
    protected $_count;
    protected $_order;

    abstract public function persist($data);
    abstract public function persistAll($collection);

    abstract public function retrieveAll();
    abstract public function retrieveAllWith($criteria);
    abstract public function retrieve($id);

    abstract public function remove($id);



    /**
     * Gets the value of limit.
     *
     * @return mixed
     */
    public function getLimit()
    {
        return $this->_limit;
    }

    /**
     * Sets the value of limit.
     *
     * @param mixed $_limit the _limit
     *
     * @return self
     */
    public function setLimit($limit)
    {
        $this->_limit = $limit;

        return $this;
    }

    /**
     * Gets the value of offset.
     *
     * @return mixed
     */
    public function getOffset()
    {
        return $this->_offset;
    }

    /**
     * Sets the value of offset.
     *
     * @param mixed $offset the _offset
     *
     * @return self
     */
    public function setOffset($offset)
    {
        $this->_offset = $offset;

        return $this;
    }

    /**
     * Gets the value of count.
     *
     * @return mixed
     */
    public function getCount()
    {
        return $this->_count;
    }

    /**
     * Sets the value of offset.
     *
     * @param mixed $offset the _offset
     *
     * @return self
     */
    public function setCount($count)
    {
        $this->_count = $count;

        return $this;
    }

    /**
     * Gets the value of order.
     *
     * @return array
     */
    public function getOrder()
    {
        return $this->_order;
    }

    /**
     * Sets the value of offset.
     *
     * @param array $order
     *
     * @return self
     */
    public function setOrder($order)
    {
        $this->_order = $order;

        return $this;
    }

    /**
     * Método práctico que genera la condicion SQL para la paginación y ordenamiento de las consultas
     * 
     * @return string $sql SQL del limite y ordenamiento
     */
    protected function getConditions()
    {
        $limit  = $this->getLimit();
        $offset = $this->getOffset();
        $order  = $this->getOrder();

        $sql = '';

        if (!empty($order) && is_array($order)) {
            foreach ($order as $field => $type) {
                $order[$field] = $field . ' ' . $type;
            }
            
            $sql .= ' ORDER BY '. implode(', ', $order);
        }

        if (!empty($limit) && $limit > 0) {

            $aux = ' LIMIT ';

            if (isset($offset)) {
                $aux .= $offset . ', ';
            }

            $aux .= $limit;

            $sql .= $aux;
        }

        return $sql;
    }
}
