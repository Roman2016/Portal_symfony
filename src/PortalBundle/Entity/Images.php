<?php

namespace PortalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Images
 *
 * @ORM\Table(name="images", indexes={@ORM\Index(name="fk_article_images", columns={"image_article_id"})})
 * @ORM\Entity(repositoryClass="PortalBundle\Repository\UserRepository")
 */
class Images
{
    /**
     * @var integer
     *
     * @ORM\Column(name="image_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $imageId;

    /**
     * @var string
     *
     * @ORM\Column(name="image_link", type="string", length=255, nullable=true)
     */
    private $imageLink;

    /**
     * @var \Articles
     *
     * @ORM\ManyToOne(targetEntity="Articles")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="image_article_id", referencedColumnName="article_id")
     * })
     */
    private $imageArticle;

    /**
     * Get imageId
     *
     * @return integer 
     */
    public function getImageId()
    {
        return $this->imageId;
    }

    /**
     * Set imageLink
     *
     * @param string $imageLink
     * @return Images
     */
    public function setImageLink($imageLink)
    {
        $this->imageLink = $imageLink;

        return $this;
    }

    /**
     * Get imageLink
     *
     * @return string 
     */
    public function getImageLink()
    {
        return $this->imageLink;
    }

    /**
     * Set imageArticle
     *
     * @param \PortalBundle\Entity\Articles $imageArticle
     * @return Images
     */
    public function setImageArticle(\PortalBundle\Entity\Articles $imageArticle = null)
    {
        $this->imageArticle = $imageArticle;

        return $this;
    }

    /**
     * Get imageArticle
     *
     * @return \PortalBundle\Entity\Articles 
     */
    public function getImageArticle()
    {
        return $this->imageArticle;
    }
}
