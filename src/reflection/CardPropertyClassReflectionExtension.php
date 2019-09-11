<?php

namespace Bj\Reflection;

use PHPStan\Reflection\ClassReflection;
use PHPStan\Reflection\PropertyReflection;
use PHPStan\Reflection\PropertiesClassReflectionExtension;

use Bj\Card;

class CardPropertyClassReflectionExtension implements PropertiesClassReflectionExtension
{
    const PROPERTY_NAMES = ['symbol', 'number', 'score', 'label'];

    public function hasProperty(ClassReflection $classReflection, string $propertyName): bool
    {
        if ($classReflection->getName() === Card::class && in_array($propertyName, self::PROPERTY_NAMES, true)) {
            return true;
        }

        return false;
    }

    public function getProperty(ClassReflection $classReflection, string $propertyName): PropertyReflection
    {
        return new CardPropertyClassReflection($classReflection, $propertyName);
    }
}
