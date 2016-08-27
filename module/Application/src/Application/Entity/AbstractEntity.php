<?php

namespace Application\Entity;

abstract class AbstractEntity
{
    /**
    * Gets an array copy
    */
    public function getArrayCopy()
    {
        $values = get_object_vars($this);
        foreach ($values as $property => $value) {
        // Skip relations
            if (is_object($value)) {
                unset($values[$property]);
            }
        }

        return $values;
    }

    /**
    * Maps the specified data to the properties of this object
    *
    * @param array $data
    */
    public function exchangeArray($data)
    {
        foreach ($data as $property => $value) {
            if (isset($this->$property)) {
                $method = 'set' . ucfirst($property);
                $this->$method($value);
            }
        }
    }

    /**
    * Gets associations
    */
    public function getAssociations()
    {
        $values = get_object_vars($this);
        foreach ($values as $property => $value) {
            // Skip scalar values
            if (!is_object($value)) {
                unset($values[$property]);
            }
        }

        return $values;
    }
}