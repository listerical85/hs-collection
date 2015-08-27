<?php

namespace Listerical\PackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HSPack
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Listerical\PackBundle\Entity\HSPackRepository")
 */
class HSPack
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
     * @ORM\ManyToOne(targetEntity="Listerical\PackBundle\Entity\HSUser", inversedBy="packs")
     * @ORM\JoinColumn(name="openedBy", referencedColumnName="id")
     */
    private $openedBy;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="openedOn", type="datetime")
     */
    private $openedOn;

    /**
     * @var DoctrineCollection
     *
     * @ORM\OneToMany(targetEntity="Listerical\PackBundle\Entity\HSCollection", mappedBy="pack")
     */
    private $cards;


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
     * Set openedOn
     *
     * @param \DateTime $openedOn
     * @return HSPack
     */
    public function setOpenedOn($openedOn)
    {
        $this->openedOn = $openedOn;

        return $this;
    }

    /**
     * Get openedOn
     *
     * @return \DateTime 
     */
    public function getOpenedOn()
    {
        return $this->openedOn;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cards = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add cards
     *
     * @param \Listerical\PackBundle\Entity\HSCard $cards
     * @return HSPack
     */
    public function addCard(\Listerical\PackBundle\Entity\HSCard $cards)
    {
        $this->cards[] = $cards;

        return $this;
    }

    /**
     * Remove cards
     *
     * @param \Listerical\PackBundle\Entity\HSCard $cards
     */
    public function removeCard(\Listerical\PackBundle\Entity\HSCard $cards)
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

    /**
     * Set openedBy
     *
     * @param \Listerical\PackBundle\Entity\HSUser $openedBy
     * @return HSPack
     */
    public function setOpenedBy(\Listerical\PackBundle\Entity\HSUser $openedBy = null)
    {
        $this->openedBy = $openedBy;

        return $this;
    }

    /**
     * Get openedBy
     *
     * @return \Listerical\PackBundle\Entity\HSUser 
     */
    public function getOpenedBy()
    {
        return $this->openedBy;
    }
}
