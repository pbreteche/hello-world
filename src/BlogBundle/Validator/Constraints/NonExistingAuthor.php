<?php
/**
 * Created by PhpStorm.
 * User: pierre
 * Date: 20/07/16
 * Time: 11:30
 */

namespace BlogBundle\Validator\Constraints;


use BlogBundle\Entity\Author;
use Symfony\Component\ExpressionLanguage\Tests\Node\Obj;
use Symfony\Component\Validator\Constraint;

class NonExistingAuthor extends Constraint
{
    public $message = 'L\email %email% est déjà utilisé';

    public function validatedBy()
    {
        return 'blog.validate.non_existing_author';
    }

    public function demo() {
        $primitive = 123;
        $objet2 = new Obj();
        $objet = new Author($objet2);
    }

}