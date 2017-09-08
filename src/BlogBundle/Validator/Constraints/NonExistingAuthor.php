<?php

namespace BlogBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

class NonExistingAuthor extends Constraint
{
    public $message = 'L\email %email% est déjà utilisé';

    public function validatedBy()
    {
        return 'blog.validate.non_existing_author';
    }
}
