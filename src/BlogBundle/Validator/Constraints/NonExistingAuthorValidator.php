<?php

namespace BlogBundle\Validator\Constraints;

use BlogBundle\Repository\AuthorRepository;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class NonExistingAuthorValidator extends ConstraintValidator
{
    /**
     * @var AuthorRepository
     */
    private $authorRepository;

    public function __construct($authorRepository)
    {
        $this->authorRepository = $authorRepository;
    }

    /**
     * Checks if the passed value is valid.
     *
     * @param mixed $email The value that should be validated
     * @param Constraint $constraint The constraint for the validation
     */
    public function validate($email, Constraint $constraint)
    {
        if ($this->authorRepository->findOneByEmail($email)) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('%email%', $email)
                ->addViolation();
        }
    }
}
