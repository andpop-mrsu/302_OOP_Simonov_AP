<?php

class Vector
{
    private float $x;
    private float $y;
    private float $z;

    public function __construct(float $x, float $y, float $z)
    {
        $this->x = $x;
        $this->y = $y;
        $this->z = $z;
    }

    public function getX(): float
    {
        return $this->x;
    }

    public function getY(): float
    {
        return $this->y;
    }

    public function getZ(): float
    {
        return $this->z;
    }

    public function add(Vector $vector): Vector
    {
        return new Vector(
            $this->x + $vector->getX(),
            $this->y + $vector->getY(),
            $this->z + $vector->getZ()
        );
    }

    public function sub(Vector $vector): Vector
    {
        return new Vector(
            $this->x - $vector->getX(),
            $this->y - $vector->getY(),
            $this->z - $vector->getZ()
        );
    }

    public function product(float $number): Vector
    {
        return new Vector(
            $this->x * $number,
            $this->y * $number,
            $this->z * $number
        );
    }

    public function scalarProduct(Vector $vector): float
    {
        return $this->x * $vector->getX() +
               $this->y * $vector->getY() +
               $this->z * $vector->getZ();
    }

    public function vectorProduct(Vector $vector): Vector
    {
        return new Vector(
            $this->y * $vector->getZ() - $this->z * $vector->getY(),
            $this->z * $vector->getX() - $this->x * $vector->getZ(),
            $this->x * $vector->getY() - $this->y * $vector->getX()
        );
    }

    public function __toString(): string
    {
        return sprintf("(%g; %g; %g)", $this->x, $this->y, $this->z);
    }
}