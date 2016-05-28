<?php

namespace PortalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Articles
 *
 * @ORM\Table(name="articles", indexes={@ORM\Index(name="fk_user_article", columns={"article_user_id"})})
 * @ORM\Entity(repositoryClass="PortalBundle\Repository\UserRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Articles
{
    /**
     * @var integer
     *
     * @ORM\Column(name="article_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $articleId;

    /**
     * @var string
     *
     * @ORM\Column(name="article_title", type="string", length=255, nullable=false)
     */
    private $articleTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="article_text", type="text", length=65535, nullable=false)
     */
    private $articleText;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="article_add_date", type="datetime", nullable=false)
     */
    private $articleAddDate;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="article_user_id", referencedColumnName="user_id")
     * })
     */
    private $articleUser;

    /**
     * Articles constructor.
     *
     * Set type ArrayCollection for articleUser parameter
     */
    public function __construct()
    {
        $this->articleUser = new ArrayCollection();
    }

    /**
     * Get articleId
     *
     * @return integer 
     */
    public function getArticleId()
    {
        return $this->articleId;
    }

    /**
     * Set articleTitle
     *
     * @param string $articleTitle
     * @return Articles
     */
    public function setArticleTitle($articleTitle)
    {
        $this->articleTitle = $articleTitle;

        return $this;
    }

    /**
     * Get articleTitle
     *
     * @return string 
     */
    public function getArticleTitle()
    {
        return $this->articleTitle;
    }

    /**
     * Set articleText
     *
     * @param string $articleText
     * @return Articles
     */
    public function setArticleText($articleText)
    {
        $this->articleText = $articleText;

        return $this;
    }

    /**
     * Get articleText
     *
     * @return string 
     */
    public function getArticleText()
    {
        return $this->articleText;
    }

    /**
     * Set articleAddDate
     *
     * @ORM\PrePersist
     */
    public function setArticleAddDate()
    {
        $this->articleAddDate = new \DateTime();

        return $this;
    }

    /**
     * Get articleAddDate
     *
     * @return \DateTime 
     */
    public function getArticleAddDate()
    {
        return $this->articleAddDate;
    }

    /**
     * Set articleUser
     *
     * @param \PortalBundle\Entity\Users $articleUser
     * @return Articles
     */
    public function setArticleUser(\PortalBundle\Entity\Users $articleUser = null)
    {
        $this->articleUser = $articleUser;

        return $this;
    }

    /**
     * Get articleUser
     *
     * @return \PortalBundle\Entity\Users 
     */
    public function getArticleUser()
    {
        return $this->articleUser;
    }
}
