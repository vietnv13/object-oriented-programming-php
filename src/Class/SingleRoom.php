<?php


namespace Nfq\Classes;


class SingleRoom extends Room
{
    /**
     * SingleRoom constructor.
     * @param int $roomNumber
     * @param float $roomPrice
     */
    public function __construct(int $roomNumber, float $roomPrice)
    {
        parent::__construct(
            'Standard',
            true,
            false,
            1,
            $roomNumber,
            ['TV', 'air-conditioner'],
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