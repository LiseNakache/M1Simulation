<?php

namespace miageSimulation\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Subject
 *
 * @ORM\Table(name="subject")
 * @ORM\Entity(repositoryClass="miageSimulation\AdminBundle\Repository\SubjectRepository")
 */
class Subject
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="coef", type="integer")
     * @Assert\Range(
     *      min = 0,
     *      max = 15,
     *      minMessage = "Le coefficient doit être supérieur à 0",
     *      maxMessage = "Le coefficient doit être inférieur à 20",
     *)
     */
    private $coef;

    /**
     * @var string
     *
     * @ORM\Column(name="teacherName", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $teacherName;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Subject
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set coef
     *
     * @param integer $coef
     *
     * @return Subject
     */
    public function setCoef($coef)
    {
        $this->coef = $coef;

        return $this;
    }

    /**
     * Get coef
     *
     * @return int
     */
    public function getCoef()
    {
        return $this->coef;
    }

    /**
     * Set teacherName
     *
     * @param string $teacherName
     *
     * @return Subject
     */
    public function setTeacherName($teacherName)
    {
        $this->teacherName = $teacherName;

        return $this;
    }

    /**
     * Get teacherName
     *
     * @return string
     */
    public function getTeacherName()
    {
        return $this->teacherName;
    }
}

