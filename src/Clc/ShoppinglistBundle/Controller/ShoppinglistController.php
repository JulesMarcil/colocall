<?php
// src/Clc/ShoppinglistBundle/Controller/ShoppinglistController.php

namespace Clc\ShoppinglistBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Clc\ShoppinglistBundle\Entity\item;

class ShoppinglistController extends Controller
{
    public function indexAction($state)
    {
        return $this->render('ClcShoppinglistBundle::layout.html.twig', array(
            'item_list'=> $this->getByColocAction($state),
            'state'    => $state,
        ));
    }
    
    public function newAction()
    {
        $user = $this->getUser();
        $coloc = $user->getColoc();
        
        // initialisez simplement un objet $item
        $item = new item();
        $item->setState(0);
        $item->setAddedDate(new \DateTime('now'));
        $item->setAuthor($user);
        $item->setColoc($coloc);

        $form = $this->createFormBuilder($item)
                     ->add('name', 'text')
                     //->add('comment', 'text', array('required' => false) )  
                     ->getForm();
        
        $request = $this->get('request');

        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {
                
                $em = $this->getDoctrine()->getManager();
                $em->persist($item);
                $em->flush();
                
                $url = $this->getRequest()->headers->get("referer");
                return $this->redirect($url);
            }
        }
        
        return $this->render('ClcShoppinglistBundle:Default:new.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function newLineAction()
    {
        $user = $this->getUser();
        $coloc = $user->getColoc();
        
        // initialisez simplement un objet $item
        $item = new item();
        $item->setState(0);
        $item->setAddedDate(new \DateTime('today'));
        $item->setAuthor($user);
        $item->setColoc($coloc);

        $form = $this->createFormBuilder($item)
                     ->add('name', 'text')
                     //->add('comment', 'text', array('required' => false) )  
                     ->getForm();
        
        $request = $this->get('request');

        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {
                
                $em = $this->getDoctrine()->getManager();
                $em->persist($item);
                $em->flush();
                
                $url = $this->getRequest()->headers->get("referer");
                return $this->redirect($url);
            }
        }
        
        return $this->render('ClcShoppinglistBundle:Default:newLine.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    
    public function getByColocAction($state)
    {
        $coloc = $this->getUser()->getColoc();
        
        $sl = $this->container->get('clc_shoppinglist.shoppinglist');
        $item_list = $sl->getByColoc($coloc, $state);
        
        return $item_list;
    }
    
    public function removeAction($id)
    {
        $em = $this->getDoctrine()
                   ->getEntityManager();
        
        $item = $em->getRepository('ClcShoppinglistBundle:item')
                   ->find($id);
          
        $em->remove($item);
        $em->flush();

        $url = $this->getRequest()->headers->get("referer");
        return $this->redirect($url);
    } 
    
    public function checkAction($id)
    {
        $em = $this->getDoctrine()
                   ->getEntityManager();
        
        $task = $em->getRepository('ClcShoppinglistBundle:item')
                   ->find($id);
        
        $task->setState(1);
        $task->setDoneDate(new \DateTime('today'));
        $em->flush();
        
        $url = $this->getRequest()->headers->get("referer");
        return $this->redirect($url);
    }
    
    public function uncheckAction($id)
    {
        $em = $this->getDoctrine()
                   ->getEntityManager();
        
        $task = $em->getRepository('ClcShoppinglistBundle:item')
                   ->find($id);
        
        $task->setState(0);
        $task->setAddedDate(new \DateTime('today'));
        $em->flush();
        
        $url = $this->getRequest()->headers->get("referer");
        return $this->redirect($url);
    }

    public function receiveByEmailAction($state)
    {
        $user = $this->getUser();
        $coloc = $user->getColoc();
        $email = $user->getEmail();

        $em = $this->getDoctrine()->getEntityManager();
        $query = $em->createquery(
            'SELECT i FROM ClcShoppinglistBundle:item i WHERE i.coloc = :coloc AND i.state = :state ORDER BY i.addedDate DESC'
        )->setParameter('coloc', $coloc)
         ->setParameter('state', 0);

        $shopping_list = $query->getResult();
        
        $message = \Swift_Message::newInstance()
            ->setSubject('Your Shopping List from Coloc\'all !')
            ->setFrom('webmaster@colocall.co')
            ->setTo($email)
            ->setBody($this->renderView('ClcShoppinglistBundle:Default:shoppingListEmail.html.twig', array('user' => $user, 'shopping_list' => $shopping_list)))
        ;
        $this->get('mailer')->send($message);

        $url = $this->getRequest()->headers->get("referer");
        return $this->redirect($url);
    }
}
