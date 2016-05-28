<?php

namespace PortalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comments
 *
 * @ORM\Table(name="comments", indexes={@ORM\Index(name="fk_article_comment", columns={"comment_article_id"})})
 * @ORM\Entity(repositoryClass="PortalBundle\Repository\UserRepository")
 */
class Comments
{
    /**
     * @var integer
     *
     * @ORM\Column(name="comment_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $commentId;

    /**
     * @var string
     *
     * @ORM\Column(name="comment_text", type="text", length=65535, nullable=false)
     */
    private $commentText;

    /**
     * @var \Articles
     *
     * @ORM\ManyToOne(targetEntity="Articles")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="comment_article_id", referencedColumnName="article_id")
     * })
     */
    private $commentArticle;

    /**
     * Get commentId
     *
     * @return integer 
     */
    public function getCommentId()
    {
        return $this->commentId;
    }

    /**
     * Set commentText
     *
     * @param string $commentText
     * @return Comments
     */
    public function setCommentText($commentText)
    {
        $this->commentText = $commentText;

        return $this;
    }

    /**
     * Get commentText
     *
     * @return string 
     */
    public function getCommentText()
    {
        return $this->commentText;
    }

    /**
     * Set commentArticle
     *
     * @param \PortalBundle\Entity\Articles $commentArticle
     * @return Comments
     */
    public function setCommentArticle(\PortalBundle\Entity\Articles $commentArticle = null)
    {
        $this->commentArticle = $commentArticle;

        return $this;
    }

    /**
     * Get commentArticle
     *
     * @return \PortalBundle\Entity\Articles 
     */
    public function getCommentArticle()
    {
        return $this->commentArticle;
    }
}
