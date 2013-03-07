<?php
//src/Clc/UserBundle/Entity/User.php
 
namespace Clc\UserBundle\Entity;
 
use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
 
/**
 * User
 * 
 * @ORM\Table(name="clc_user")
 * @ORM\Entity(repositoryClass="Clc\UserBundle\Entity\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\OneToOne(targetEntity="Clc\UserBundle\Entity\profilepicture", cascade={"persist"})
     */
    protected $picture;
    
    /**
     * @ORM\ManyToOne(targetEntity="Clc\ColocBundle\Entity\coloc", inversedBy="user", cascade={"persist"})
     */
    protected $coloc;
   
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
     * Set picture
     *
     * @param \Clc\UserBundle\Entity\profilepicture $picture
     * @return User
     */
    public function setPicture(\Clc\UserBundle\Entity\profilepicture $picture = null)
    {
        $this->picture = $picture;
    
        return $this;
    }

    /**
     * Get picture
     *
     * @return \Clc\UserBundle\Entity\profilepicture 
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set users
     *
     * @param \Clc\ColocBundle\Entity\coloc $users
     * @return User
     */
    public function setUsers(\Clc\ColocBundle\Entity\coloc $users = null)
    {
        $this->users = $users;
    
        return $this;
    }

    /**
     * Get users
     *
     * @return \Clc\ColocBundle\Entity\coloc 
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Set coloc
     *
     * @param \Clc\ColocBundle\Entity\coloc $coloc
     * @return User
     */
    public function setColoc(\Clc\ColocBundle\Entity\coloc $coloc = null)
    {
        $this->coloc = $coloc;
    
        return $this;
    }

    /**
     * Get coloc
     *
     * @return \Clc\ColocBundle\Entity\coloc 
     */
    public function getColoc()
    {
        return $this->coloc;
    }
}