<?php

namespace Listerical\PackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HSCard
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Listerical\PackBundle\Entity\HSCardRepository")
 */
class HSCard
{
    /**
     * @var integer
     *
     * @ORM\Column(name="cardId", type="string", length=255)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $cardId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="cardSet", type="string", length=255)
     */
    private $cardSet;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="faction", type="string", length=255, nullable=true)
     */
    private $faction;

    /**
     * @var string
     *
     * @ORM\Column(name="rarity", type="string", length=255)
     */
    private $rarity;

    /**
     * @var integer
     *
     * @ORM\Column(name="cost", type="integer")
     */
    private $cost;

    /**
     * @var integer
     *
     * @ORM\Column(name="attack", type="integer", nullable=true)
     */
    private $attack;

    /**
     * @var integer
     *
     * @ORM\Column(name="health", type="integer", nullable=true)
     */
    private $health;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text", nullable=true)
     */
    private $text;

    /**
     * @var string
     *
     * @ORM\Column(name="inPlayText", type="text", nullable=true)
     */
    private $inPlayText;

    /**
     * @var string
     *
     * @ORM\Column(name="flavor", type="text")
     */
    private $flavor;

    /**
     * @var string
     *
     * @ORM\Column(name="artist", type="string", length=255)
     */
    private $artist;

    /**
     * @var boolean
     *
     * @ORM\Column(name="collectible", type="boolean")
     */
    private $collectible;

    /**
     * @var boolean
     *
     * @ORM\Column(name="elite", type="boolean")
     */
    private $elite = false;

    /**
     * @var string
     *
     * @ORM\Column(name="race", type="string", length=255, nullable=true)
     */
    private $race;

    /**
     * @var string
     *
     * @ORM\Column(name="playerClass", type="string", length=255, nullable=true)
     */
    private $playerClass;

    /**
     * @var string
     *
     * @ORM\Column(name="howToGet", type="string", length=255, nullable=true)
     */
    private $howToGet;

    /**
     * @var string
     *
     * @ORM\Column(name="howToGetGold", type="string", length=255, nullable=true)
     */
    private $howToGetGold;

    /**
     * @var string
     *
     * @ORM\Column(name="img", type="string", length=255)
     */
    private $img;

    /**
     * @var string
     *
     * @ORM\Column(name="imgGold", type="string", length=255)
     */
    private $imgGold;

    /**
     * @var string
     *
     * @ORM\Column(name="locale", type="string", length=255)
     */
    private $locale;

    /**
     * @var array
     *
     * @ORM\Column(name="mechanics", type="array")
     */
    private $mechanics;


    /**
     * @var integer
     * @ORM\Column(name="durability", type="integer", nullable=true)
     */
    private $durability;



    /**
     * Set name
     *
     * @param string $name
     * @return HSCard
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get ]name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set cardSet
     *
     * @param string $cardSet
     * @return HSCard
     */
    public function setCardSet($cardSet)
    {
        $this->cardSet = $cardSet;

        return $this;
    }

    /**
     * Get cardSet
     *
     * @return string 
     */
    public function getCardSet()
    {
        return $this->cardSet;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return HSCard
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set faction
     *
     * @param string $faction
     * @return HSCard
     */
    public function setFaction($faction)
    {
        $this->faction = $faction;

        return $this;
    }

    /**
     * Get faction
     *
     * @return string 
     */
    public function getFaction()
    {
        return $this->faction;
    }

    /**
     * Set rarity
     *
     * @param string $rarity
     * @return HSCard
     */
    public function setRarity($rarity)
    {
        $this->rarity = $rarity;

        return $this;
    }

    /**
     * Get rarity
     *
     * @return string 
     */
    public function getRarity()
    {
        return $this->rarity;
    }

    /**
     * Set cost
     *
     * @param integer $cost
     * @return HSCard
     */
    public function setCost($cost)
    {
        $this->cost = $cost;

        return $this;
    }

    /**
     * Get cost
     *
     * @return integer 
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Set attack
     *
     * @param integer $attack
     * @return HSCard
     */
    public function setAttack($attack)
    {
        $this->attack = $attack;

        return $this;
    }

    /**
     * Get attack
     *
     * @return integer 
     */
    public function getAttack()
    {
        return $this->attack;
    }

    /**
     * Set health
     *
     * @param integer $health
     * @return HSCard
     */
    public function setHealth($health)
    {
        $this->health = $health;

        return $this;
    }

    /**
     * Get health
     *
     * @return integer 
     */
    public function getHealth()
    {
        return $this->health;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return HSCard
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set flavor
     *
     * @param string $flavor
     * @return HSCard
     */
    public function setFlavor($flavor)
    {
        $this->flavor = $flavor;

        return $this;
    }

    /**
     * Get flavor
     *
     * @return string 
     */
    public function getFlavor()
    {
        return $this->flavor;
    }

    /**
     * Set artist
     *
     * @param string $artist
     * @return HSCard
     */
    public function setArtist($artist)
    {
        $this->artist = $artist;

        return $this;
    }

    /**
     * Get artist
     *
     * @return string 
     */
    public function getArtist()
    {
        return $this->artist;
    }

    /**
     * Set collectible
     *
     * @param boolean $collectible
     * @return HSCard
     */
    public function setCollectible($collectible)
    {
        $this->collectible = $collectible;

        return $this;
    }

    /**
     * Get collectible
     *
     * @return boolean 
     */
    public function getCollectible()
    {
        return $this->collectible;
    }

    /**
     * Set elite
     *
     * @param boolean $elite
     * @return HSCard
     */
    public function setElite($elite)
    {
        $this->elite = $elite;

        return $this;
    }

    /**
     * Get elite
     *
     * @return boolean 
     */
    public function getElite()
    {
        return $this->elite;
    }

    /**
     * Set img
     *
     * @param string $img
     * @return HSCard
     */
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    /**
     * Get img
     *
     * @return string 
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Set imgGold
     *
     * @param string $imgGold
     * @return HSCard
     */
    public function setImgGold($imgGold)
    {
        $this->imgGold = $imgGold;

        return $this;
    }

    /**
     * Get imgGold
     *
     * @return string 
     */
    public function getImgGold()
    {
        return $this->imgGold;
    }

    /**
     * Set locale
     *
     * @param string $locale
     * @return HSCard
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * Get locale
     *
     * @return string 
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * Set mechanics
     *
     * @param array $mechanics
     * @return HSCard
     */
    public function setMechanics($mechanics)
    {
        $this->mechanics = $mechanics;

        return $this;
    }

    /**
     * Get mechanics
     *
     * @return array 
     */
    public function getMechanics()
    {
        return $this->mechanics;
    }

    /**
     * Set cardId
     *
     * @param integer $cardId
     * @return HSCard
     */
    public function setCardId($cardId)
    {
        $this->cardId = $cardId;

        return $this;
    }

    /**
     * Get cardId
     *
     * @return integer 
     */
    public function getCardId()
    {
        return $this->cardId;
    }

    /**
     * Set pack
     *
     * @param \Listerical\PackBundle\Entity\HSPack $pack
     * @return HSCard
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
     * Set durability
     *
     * @param integer $durability
     * @return HSCard
     */
    public function setDurability($durability)
    {
        $this->durability = $durability;

        return $this;
    }

    /**
     * Get durability
     *
     * @return integer 
     */
    public function getDurability()
    {
        return $this->durability;
    }

    /**
     * Set inPlayText
     *
     * @param string $inPlayText
     * @return HSCard
     */
    public function setInPlayText($inPlayText)
    {
        $this->inPlayText = $inPlayText;

        return $this;
    }

    /**
     * Get inPlayText
     *
     * @return string 
     */
    public function getInPlayText()
    {
        return $this->inPlayText;
    }

    /**
     * Set race
     *
     * @param string $race
     * @return HSCard
     */
    public function setRace($race)
    {
        $this->race = $race;

        return $this;
    }

    /**
     * Get race
     *
     * @return string 
     */
    public function getRace()
    {
        return $this->race;
    }

    /**
     * Set playerClass
     *
     * @param string $playerClass
     * @return HSCard
     */
    public function setPlayerClass($playerClass)
    {
        $this->playerClass = $playerClass;

        return $this;
    }

    /**
     * Get playerClass
     *
     * @return string 
     */
    public function getPlayerClass()
    {
        return $this->playerClass;
    }

    /**
     * Set howToGet
     *
     * @param string $howToGet
     * @return HSCard
     */
    public function setHowToGet($howToGet)
    {
        $this->howToGet = $howToGet;

        return $this;
    }

    /**
     * Get howToGet
     *
     * @return string 
     */
    public function getHowToGet()
    {
        return $this->howToGet;
    }

    /**
     * Set howToGetGold
     *
     * @param string $howToGetGold
     * @return HSCard
     */
    public function setHowToGetGold($howToGetGold)
    {
        $this->howToGetGold = $howToGetGold;

        return $this;
    }

    /**
     * Get howToGetGold
     *
     * @return string 
     */
    public function getHowToGetGold()
    {
        return $this->howToGetGold;
    }
}
