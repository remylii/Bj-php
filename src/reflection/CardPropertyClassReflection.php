<?php

namespace Bj\Reflection;

use PHPStan\Reflection\PropertyReflection;
use PHPStan\Reflection\ClassReflection;
use PHPStan\Type;

class CardPropertyClassReflection implements PropertyReflection
{
    /**
     * @var ClassReflection
     */
    private $classReflection;

    /**
     * @var string
     */
    private $propertyName;

    public function __construct(ClassReflection $classReflection, string $propertyName)
    {
        $this->classReflection = $classReflection;
        $this->propertyName = $propertyName;
    }

    public function getType(): \PHPStan\Type\Type
    {
        return new Type\ObjectType($this->classReflection->getName());
    }

    public function getDeclaringClass(): ClassReflection
    {
        return $this->classReflection;
    }

    public function isStatic(): bool
    {
        return false;
    }

    public function isPrivate(): bool
    {
        return false;
    }

    public function isPublic(): bool
    {
        return true;
    }

    public function isReadable(): bool
    {
        return true;
    }

    public function isWritable(): bool
    {
        return false;
    }
}
