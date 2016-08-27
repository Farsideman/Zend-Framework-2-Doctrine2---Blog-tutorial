<?php

namespace Blog\Controller;

use Application\Mvc\Controller\AbstractActionController;

class PostController extends AbstractActionController
{
    public function indexAction()
    {
        return [
            'posts' => $this->getEntityManager()->getRepository('Blog\Entity\Post')->findAll(),
        ];
    }
}