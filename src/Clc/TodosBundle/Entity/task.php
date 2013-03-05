<?php

namespace Clc\TodosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * task
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Clc\TodosBundle\Entity\taskRepository")
 */
class task
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
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="todo", type="string", length=255)
     */
    private $todo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="duedate", type="date")
     */
    private $duedate;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text")
     */
    private $comment;
    
    /**
    * @ORM\ManyToOne(targetEntity="Clc\UserBundle\Entity\User", cascade={"persist"})
    */
    private $author;
  
   /**
    * @ORM\ManyToOne(targetEntity="Clc\UserBundle\Entity\User", cascade={"persist"})
    */
    private $owner;


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
     * Set todo
     *
     * @param string $todo
     * @return task
     */
    public function setTodo($todo)
    {
        $this->todo = $todo;
    
        return $this;
    }

    /**
     * Get todo
     *
     * @return string 
     */
    public function getTodo()
    {
        return $this->todo;
    }

    /**
     * Set duedate
     *
     * @param \DateTime $duedate
     * @return task
     */
    public function setDuedate($duedate)
    {
        $this->duedate = $duedate;
    
        return $this;
    }

    /**
     * Get duedate
     *
     * @return \DateTime 
     */
    public function getDuedate()
    {
        return $this->duedate;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return task
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
     * Set comment
     *
     * @param string $comment
     * @return task
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
     * @return task
     */
    public function setAuthor(\Clc\UserBundle\Entity\User $author)
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
     * @return task
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
}