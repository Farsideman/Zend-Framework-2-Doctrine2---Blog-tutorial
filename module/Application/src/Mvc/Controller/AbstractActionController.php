<?php

namespace Application\Mvc\Controller;

use Application\Doctrine\ConnectionString;
use Doctrine\ORM\EntityManager;
use Zend\Mvc\Controller\AbstractActionController as ZendAbstractActionController;

/**
* AbstractActionController
*/
abstract class AbstractActionController extends ZendAbstractActionController
{
    /**
    * @var EntityManager
    */
    protected $entityManager;

    /**
    * Max results per page
    * @var integer
    */
    protected $maxResults = 10;

    /**
    * Gets the entity manager
    * @return EntityManager
    */
    public function getEntityManager()
    {
        if (null === $this->entityManager) {
            $this->entityManager = $this->getServiceLocator()->get(ConnectionString::DOCTRINE_DEFAULT);
        }

        return $this->entityManager;
    }
}