<?php

namespace Afpa\artistBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Artist
 *
 * @ORM\Table(name="artist")
 * @ORM\Entity(repositoryClass="Afpa\artistBundle\Entity\ArtistRepository")
 */
class Artist
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
     * @var string
     *
     * @ORM\Column(name="spotid", type="string", length=255)
     */
    private $spotid;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var array
     *
     * @ORM\Column(name="genre", type="array")
     */
    private $genre;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=255)
     */
    private $photo;

    /**
     * @var integer
     *
     * @ORM\Column(name="popularite", type="integer")
     */
    private $popularite;


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
     * Get spotid
     *
     * @return string 
     */
    public function getSpotId()
    {
        return $this->spotid;
    }
	
	/**
     * Set spotid
     *
     * @param string $spotid
     * @return Artist
     */
    public function setSpotId($spotid)
    {
        $this->spotid = $spotid;

        return $this;
    }
	
    /**
     * Set nom
     *
     * @param string $nom
     * @return Artist
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set genre
     *
     * @param array $genre
     * @return Artist
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre
     *
     * @return array 
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set photo
     *
     * @param string $photo
     * @return Artist
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string 
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set popularite
     *
     * @param integer $popularite
     * @return Artist
     */
    public function setPopularite($popularite)
    {
        $this->popularite = $popularite;

        return $this;
    }

    /**
     * Get popularite
     *
     * @return integer 
     */
    public function getPopularite()
    {
        return $this->popularite;
    }
	/**
     * Get category
     *
     * @return string 
     */
    public function getCategory()
    {
		$cat = $this->popularite;
		$result="";
		if ($cat>80)
			$result="Icône";
		else if ($cat>60)
			$result="Super-Star";
		else if ($cat>40)
			$result="Star";
		else if ($cat>20)
			$result="Chanteur";
		else $result="Artiste peu connu";
		
		return $result;
		
    }
}
