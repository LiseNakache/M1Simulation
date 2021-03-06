<?php

namespace miageSimulation\AdminBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Course
 *
 * @ORM\Table(name="course")
 * @ORM\Entity(repositoryClass="miageSimulation\AdminBundle\Repository\CourseRepository")
 */
class Course
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->yearStart = new \Datetime();
        $this->yearEnd= new \Datetime('+1 year');
        $this->subjects = new ArrayCollection();
    }

    /**
     * @ORM\ManyToMany(targetEntity="miageSimulation\AdminBundle\Entity\Subject", cascade={"persist"})
     */
    private $subjects;


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
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="yearStart", type="datetime")
     * @Assert\DateTime()
     */
    private $yearStart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="yearEnd", type="datetime")
     * @Assert\DateTime()
     */
    private $yearEnd;

    /**
     * @var array
     *
     * @ORM\Column(name="studentsName", type="array")
     */
    private $studentsName;

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
     * Set type
     *
     * @param string $type
     *
     * @return Course
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
     * Set name
     *
     * @param string $name
     *
     * @return Course
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
     * Set studentsName
     *
     * @param array $studentsName
     *
     * @return Course
     */
    public function setStudentsName($studentsName)
    {
        $this->studentsName = $studentsName;

        return $this;
    }

    /**
     * Get studentsName
     *
     * @return array
     */
    public function getStudentsName()
    {
        return $this->studentsName;
    }


    /**
     * Add subject
     *
     * @param \miageSimulation\AdminBundle\Entity\Subject $subject
     *
     * @return Course
     */
    public function addSubject(\miageSimulation\AdminBundle\Entity\Subject $subject)
    {
        $this->subjects[] = $subject;

        return $this;
    }

    /**
     * Remove subject
     *
     * @param \miageSimulation\AdminBundle\Entity\Subject $subject
     */
    public function removeSubject(\miageSimulation\AdminBundle\Entity\Subject $subject)
    {
        $this->subjects->removeElement($subject);
    }

    /**
     * Get subjects
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSubjects()
    {
        return $this->subjects;
    }

    public function getTotalCoef()
{
    $this->totalCoef = 0;
    foreach($this->getSubjects() as $subject) {
        $this->totalCoef += $subject->getCoef();
    }

    return $this->totalCoef;
}

    public function getTotalSubjects()
    {
        $this->totalSubjects = $this->subjects->count();

        return $this->totalSubjects;
    }

    /**
     * Set yearStart
     *
     * @param \DateTime $yearStart
     *
     * @return Course
     */
    public function setYearStart($yearStart)
    {
        $this->yearStart = $yearStart;

        return $this;
    }

    /**
     * Get yearStart
     *
     * @return \DateTime
     */
    public function getYearStart()
    {
        return $this->yearStart;
    }

    /**
     * Set yearEnd
     *
     * @param \DateTime $yearEnd
     *
     * @return Course
     */
    public function setYearEnd($yearEnd)
    {
        $this->yearEnd = $yearEnd;

        return $this;
    }

    /**
     * Get yearEnd
     *
     * @return \DateTime
     */
    public function getYearEnd()
    {
        return $this->yearEnd;
    }
}
