<?php

namespace Listerical\PackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Table(name="HSCollection")
 * @ORM\Entity(repositoryClass="Listerical\PackBundle\Entity\HSCollectionRepository")
 */
class HSCollection
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
     * @ORM\ManyToOne(targetEntity="Listerical\PackBundle\Entity\HSCard")
     * @ORM\JoinColumn(name="card", referencedColumnName="cardId")
     */
    private $card;

    /**
     * @ORM\ManyToOne(targetEntity="Listerical\PackBundle\Entity\HSPack", inversedBy="cards")
     * @ORM\JoinColumn(name="pack", referencedColumnName="id")
     */
    private $pack;

    /**
     * @ORM\ManyToOne(targetEntity="Listerical\PackBundle\Entity\HSUser", inversedBy="cards")
     * @ORM\JoinColumn(name="openedBy", referencedColumnName="id")
     */
    private $openedBy;

    /**
     * @ORM\Column(name="golden", type="boolean")
     */
    private $golden;

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
     * Set golden
     *
     * @param boolean $golden
     * @return HSCollection
     */
    public function setGolden($golden)
    {
        $this->golden = $golden;

        return $this;
    }

    /**
     * Get golden
     *
     * @return boolean 
     */
    public function getGolden()
    {
        return $this->golden;
    }

    /**
     * Set card
     *
     * @param \Listerical\PackBundle\Entity\HSCard $card
     * @return HSCollection
     */
    public function setCard(\Listerical\PackBundle\Entity\HSCard $card = null)
    {
        $this->card = $card;

        return $this;
    }

    /**
     * Get card
     *
     * @return \Listerical\PackBundle\Entity\HSCard 
     */
    public function getCard()
    {
        return $this->card;
    }

    /**
     * Set pack
     *
     * @param \Listerical\PackBundle\Entity\HSPack $pack
     * @return HSCollection
     */
    public function setPack(\Listerical\PackBundle\Entity\HSPack $pack = null)
    {
        $this->pack = $pack;

        return $this;
    }

    /**
     * Get pack
     *
     * @return \Listerical\PackBundle\Entity\HSPack 
     */
    public function getPack()
    {
        return $this->pack;
    }

    /**
     * Set openedBy
     *
     * @param \Listerical\PackBundle\Entity\HSUser $openedBy
     * @return HSCollection
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
