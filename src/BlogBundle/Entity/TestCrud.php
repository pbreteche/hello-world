<?php

namespace BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TestCrud
 *
 * @ORM\Table(name="test_crud")
 * @ORM\Entity(repositoryClass="BlogBundle\Repository\TestCrudRepository")
 */
class TestCrud
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
     * @ORM\Column(name="testField", type="string", length=255)
     */
    private $testField;


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
     * Set testField
     *
     * @param string $testField
     *
     * @return TestCrud
     */
    public function setTestField($testField)
    {
        $this->testField = $testField;

        return $this;
    }

    /**
     * Get testField
     *
     * @return string
     */
    public function getTestField()
    {
        return $this->testField;
    }
}
