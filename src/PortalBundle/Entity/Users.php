<?php

namespace PortalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Users
 *
 * @ORM\Table(name="users", uniqueConstraints={@ORM\UniqueConstraint(name="user_name_UNIQUE", columns={"user_name"}), @ORM\UniqueConstraint(name="user_email_UNIQUE", columns={"user_email"})})
 * @ORM\Entity(repositoryClass="PortalBundle\Repository\UserRepository")
 */
class Users
{
    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $userId;

    /**
     * @var string
     *
     * @ORM\Column(name="user_name", type="string", length=25, nullable=false)
     * @Assert\Length(min=3)
     */
    private $userName;

    /**
     * @var string
     *
     * @ORM\Column(name="user_password", type="string", length=25, nullable=false)
     * @Assert\Length(
     *      min = 5,
     *      max = 12,
     *      minMessage = "Your name must be at least {{ limit }} characters long",
     *      maxMessage = "Your name cannot be longer than {{ limit }} characters"
     * )
     *
     */
    private $userPassword;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="user_registration_date", type="date", nullable=false)
     */
    private $userRegistrationDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="user_last_visit_date", type="datetime", nullable=false)
     */
    private $userLastVisitDate;

    /**
     * @var string
     *
     * @ORM\Column(name="user_email", type="string", length=255, nullable=false)
     */
    private $userEmail;

    /**
     * Get userId
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set userName
     *
     * @param string $userName
     * @return Users
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;

        return $this;
    }

    /**
     * Get userName
     *
     * @return string 
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * Set userPassword
     *
     * @param string $userPassword
     * @return Users
     */
    public function setUserPassword($userPassword)
    {
        $this->userPassword = $userPassword;

        return $this;
    }

    /**
     * Get userPassword
     *
     * @return string 
     */
    public function getUserPassword()
    {
        return $this->userPassword;
    }

    /**
     * Set userRegistrationDate
     *
     * @param \DateTime $userRegistrationDate
     * @return Users
     */
    public function setUserRegistrationDate($userRegistrationDate)
    {
        $this->userRegistrationDate = $userRegistrationDate;

        return $this;
    }

    /**
     * Get userRegistrationDate
     *
     * @return \DateTime 
     */
    public function getUserRegistrationDate()
    {
        return $this->userRegistrationDate;
    }

    /**
     * Set userLastVisitDate
     *
     * @param \DateTime $userLastVisitDate
     * @return Users
     */
    public function setUserLastVisitDate($userLastVisitDate)
    {
        $this->userLastVisitDate = $userLastVisitDate;

        return $this;
    }

    /**
     * Get userLastVisitDate
     *
     * @return \DateTime 
     */
    public function getUserLastVisitDate()
    {
        return $this->userLastVisitDate;
    }

    /**
     * Set userEmail
     *
     * @param string $userEmail
     * @return Users
     */
    public function setUserEmail($userEmail)
    {
        $this->userEmail = $userEmail;

        return $this;
    }

    /**
     * Get userEmail
     *
     * @return string 
     */
    public function getUserEmail()
    {
        return $this->userEmail;
    }
}
