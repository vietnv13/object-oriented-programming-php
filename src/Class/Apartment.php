<?php


namespace Nfq\Classes;


class Apartment extends Room
{
    /**
     * Apartment constructor.
     * @param int $roomNumber
     * @param float $roomPrice
     */
    public function __construct(int $roomNumber, float $roomPrice)
    {
        parent::__construct(
            'Diamond',
            true,
            true,
            4,
            $roomNumber,
            ['TV', 'air-conditioner', 'refrigerator', 'mini-bar', 'bathtub', 'kitchen box', 'free Wi-fi'],
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