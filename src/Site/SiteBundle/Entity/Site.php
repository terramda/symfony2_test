<?php

namespace Site\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Site\SiteBundle\Repository\SiteRepository")
 * @ORM\Table(name="site")
 * @ORM\HasLifecycleCallbacks()
 */
class Site {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=250)
     */
    protected $url;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $is_active;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $created_at;

    public function __construct() {
        $this->setCreatedAt(new \DateTime());
    }
    
    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function setUrl($url) {
        $this->url = $url;
    }

    public function getUrl() {
        return $this->url;
    }

    public function setIsActive($is_active) {
        $this->is_active = $is_active;
    }

    public function getIsActive() {
        return $this->is_active;
    }

    public function setCreatedAt($created_at) {
        $this->created_at = $created_at;
    }

    public function getCreatedAt() {
        return $this->created_at;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

}