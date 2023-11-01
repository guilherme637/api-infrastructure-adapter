<?php

namespace Zuske\Adapter\Validator;

use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class Validator implements ValidatorAdapterInterface
{
    public function __construct(private ValidatorInterface $validator) {}

    public function validate(object $object): void
    {
        $errors = $this->validator->validate($object);

        if (count($errors) > 0) {
            /** @var ConstraintViolation $constraint */
            $constraint = $errors[0];

            throw new BadRequestException($errors[0]->getMessage());
        }
    }
}