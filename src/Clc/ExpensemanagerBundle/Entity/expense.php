<?php
//Src/Clc/ExpensemanagerBundle/Entity/expense.php

namespace Clc\ExpensemanagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * expense
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Clc\ExpensemanagerBundle\Entity\expenseRepository")
 */
class expense
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=255)
     */
    private $category;

    /**
     * @var float
     *
     * @ORM\Column(name="amount", type="float")
     */
    private $amount;

    /**
     * @var integer
     *
     * @ORM\Column(name="number", type="integer")
     */
    private $number;
    
    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="string", length=255)
     */
    private $comment;
    
    /**
    * @ORM\ManyToOne(targetEntity="Clc\ColocBundle\Entity\coloc", cascade={"persist"})
    * @ORM\JoinColumn(nullable=false)
    */
    private $coloc;
    
    /**
    * @ORM\ManyToOne(targetEntity="Clc\UserBundle\Entity\User", cascade={"persist"})
    * @ORM\JoinColumn(nullable=false)
    */
    private $author;
  
   /**
    * @ORM\ManyToOne(targetEntity="Clc\UserBundle\Entity\User", cascade={"persist"})
    * @ORM\JoinColumn(nullable=false)
    */
    private $owner;
    
    /**
     * @ORM\ManyToMany(targetEntity="Clc\UserBundle\Entity\User", cascade={"persist"})
     */
     private $users;
     
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return expense
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set category
     *
     * @param string $category
     * @return expense
     */
    public function setCategory($category)
    {
        $this->category = $category;
    
        return $this;
    }

    /**
     * Get category
     *
     * @return string 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set amount
     *
     * @param float $amount
     * @return expense
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    
        return $this;
    }

    /**
     * Get amount
     *
     * @return float 
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set comment
     *
     * @param string $comment
     * @return expense
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    
        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set author
     *
     * @param \Clc\UserBundle\Entity\User $author
     * @return expense
     */
    public function setAuthor(\Clc\UserBundle\Entity\User $author = null)
    {
        $this->author = $author;
    
        return $this;
    }

    /**
     * Get author
     *
     * @return \Clc\UserBundle\Entity\User 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set owner
     *
     * @param \Clc\UserBundle\Entity\User $owner
     * @return expense
     */
    public function setOwner(\Clc\UserBundle\Entity\User $owner = null)
    {
        $this->owner = $owner;
    
        return $this;
    }

    /**
     * Get owner
     *
     * @return \Clc\UserBundle\Entity\User 
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Set number
     *
     * @param integer $number
     * @return expense
     */
    public function setNumber($number)
    {
        $this->number = $number;
    
        return $this;
    }

    /**
     * Get number
     *
     * @return integer 
     */
    public function getNumber()
    {
        return $this->number;
    }
    
    /**
     * Add users
     *
     * @param \Clc\UserBundle\Entity\User $users
     * @return expense
     */
    public function addUser(\Clc\UserBundle\Entity\User $users)
    {
        $this->users[] = $users;
    
        return $this;
    }

    /**
     * Remove users
     *
     * @param \Clc\UserBundle\Entity\User $users
     */
    public function removeUser(\Clc\UserBundle\Entity\User $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }
}