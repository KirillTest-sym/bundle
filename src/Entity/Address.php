<?php


namespace App\Limur\Map\Entity;

use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Mapping\ClassMetadata;

class Address
{
    private $country;

    private $city;

    private $street;

    private $build;

    public function __get($name)
    {
        if (!property_exists($this, $name)) {
            return null;
        }
        return $this->$name;
    }

    public function __set($name, $value)
    {
        if (!property_exists($this, $name)) {
            return $this;
        }
        $this->$name = $value;
        return $this;
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraints('country', [
            new NotBlank(),
            new Type([
                'type' => 'string'
            ])
        ]);
        $metadata->addPropertyConstraints('city', [
            new NotBlank(),
            new Type([
                'type' => 'string'
            ])
        ]);
        $metadata->addPropertyConstraints('street', [
            new NotBlank(),
            new Type([
                'type' => 'string'
            ])
        ]);
        $metadata->addPropertyConstraints('build', [
            new NotBlank(),
            new Type([
                'type' => 'string'
            ])
        ]);
    }

    public function toArray()
    {
        return get_object_vars($this);
    }
}