<?php

namespace Listerical\PackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User;

/**
 * HSUser
 *
 * @ORM\Table()
 * @ORM\Entity()
 */
class HSUser extends User
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="Listerical\PackBundle\Entity\HSPack", mappedBy="openedBy")
     */
    protected $packs;

    /**
     * @ORM\OneToMany(targetEntity="Listerical\PackBundle\Entity\HSCollection", mappedBy="openedBy")
     */
    protected $cards;
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->packs = new \Doctrine\Common\Collections\ArrayCollection();
        $this->cards = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add packs
     *
     * @param \Listerical\PackBundle\Entity\HSPack $packs
     * @return HSUser
     */
    public function addPack(\Listerical\PackBundle\Entity\HSPack $packs)
    {
        $this->packs[] = $packs;

        return $this;
    }

    /**
     * Remove packs
     *
     * @param \Listerical\PackBundle\Entity\HSPack $packs
     */
    public function removePack(\Listerical\PackBundle\Entity\HSPack $packs)
    {
        $this->packs->removeElement($packs);
    }

    /**
     * Get packs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPacks()
    {
        return $this->packs;
    }

    /**
     * Add cards
     *
     * @param \Listerical\PackBundle\Entity\HSCollection $cards
     * @return HSUser
     */
    public function addCard(\Listerical\PackBundle\Entity\HSCollection $cards)
    {
        $this->cards[] = $cards;

        return $this;
    }

    /**
     * Remove cards
     *
     * @param \Listerical\PackBundle\Entity\HSCollection $cards
     */
    public function removeCard(\Listerical\PackBundle\Entity\HSCollection $cards)
    {
        $this->cards->removeElement($cards);
    }

    /**
     * Get cards
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCards()
    {
        return $this->cards;
    }
}
