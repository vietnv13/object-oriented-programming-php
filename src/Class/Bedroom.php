<?php


namespace Nfq\Classes;


class Bedroom extends Room
{
    /**
     * Bedroom constructor.
     * @param int $roomNumber
     * @param float $roomPrice
     */
    public function __construct(int $roomNumber, float $roomPrice)
    {
        parent::__construct(
            'Gold',
            true,
            true,
            2,
            $roomNumber,
            ['TV', 'air-conditioner', 'refrigerator', 'mini-bar', 'bathtub'],
            $roomPrice
        );
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return parent::__toString();
    }
}