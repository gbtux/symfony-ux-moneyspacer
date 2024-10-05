<?php

namespace Symfony\UX\Moneyspacer\Form;

use Symfony\Component\Form\DataTransformerInterface;

class MoneyDataTransformer implements DataTransformerInterface
{

    public function transform($value): mixed
    {
        if(null !== $value) {
            if(is_string($value)){
                return floatval(str_replace(" ", "", $value));
            }
            return number_format($value, 0, ",", " ");
        }
        return $value;
    }

    public function reverseTransform($value): mixed
    {
        if(null !== $value) {
            return floatval(str_replace(" ", "", $value));
        }
        return $value;
    }
}