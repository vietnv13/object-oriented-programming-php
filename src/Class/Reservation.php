<?php


namespace Nfq\Classes;

use DateTime;

class Reservation
{
    /**
     * @var DateTime
     */
    private $startDate;
    /**
     * @var DateTime
     */
    private $endDate;
    /**
     * @var Guest
     */
    private $guest;

    /**
     * Reservation constructor.
     * @param DateTime $startDate
     * @param DateTime $endDate
     * @param Guest $guest
     */
    public function __construct(DateTime $startDate, DateTime $endDate, Guest $guest)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->guest = $guest;
    }

    /**
     * @return DateTime
     */
    public function getStartDate(): DateTime
    {
        return $this->startDate;
    }

    /**
     * @return DateTime
     */
    public function getEndDate(): DateTime
    {
        return $this->endDate;
    }

    /**
     * @return Guest
     */
    public function getGuest(): Guest
    {
        return $this->guest;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return sprintf(
            '%s atliko rezervaciją nuo %s iki %s',
            $this->guest,
            $this->startDate->format('Y-m-d'),
            $this->endDate->format('Y-m-d')
        );
    }
}
