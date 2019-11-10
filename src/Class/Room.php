<?php


namespace Nfq\Classes;

use DateTime;
use Nfq\Exceptions\ReservationException;
use Nfq\Interfaces\ReservableInterface;

class Room implements ReservableInterface
{
    /**
     * @var string
     */
    private $roomType;
    /**
     * @var boolean
     */
    private $hasRestroom;
    /**
     * @var boolean
     */
    private $hasBalcony;
    /**
     * @var integer
     */
    private $bedCount;
    /**
     * @var integer
     */
    private $roomNumber;
    /**
     * @var array
     */
    private $extras;
    /**
     * @var float
     */
    private $price;
    /**
     * @var array
     */
    private $reservations = [];

    /**
     * Room constructor.
     * @param string $roomType
     * @param bool $hasRestroom
     * @param bool $hasBalcony
     * @param int $bedCount
     * @param int $roomNumber
     * @param array $extras
     * @param float $price
     */
    public function __construct(
        string $roomType,
        bool $hasRestroom,
        bool $hasBalcony,
        int $bedCount,
        int $roomNumber,
        array $extras,
        float $price)
    {
        $this->roomType = $roomType;
        $this->hasRestroom = $hasRestroom;
        $this->hasBalcony = $hasBalcony;
        $this->bedCount = $bedCount;
        $this->roomNumber = $roomNumber;
        $this->extras = $extras;
        $this->price = $price;
    }

    /**
     * @param Reservation $reservation
     * @return bool
     * @throws ReservationException
     */
    public function addReservation(Reservation $reservation): bool
    {
        if(!$this->isAlreadyBooked($reservation->getStartDate(), $reservation->getEndDate())) {
                array_push($this->reservations, $reservation);
                return true;
        } else {
            throw new ReservationException(
                'Registration can\'t be made, because another registration ' .
                'already exists in the given period'
            );
        }
    }

    /**
     * @param Reservation $reservation
     * @return bool
     */
    public function removeReservation(Reservation $reservation): bool
    {
        $key = array_search($reservation, $this->reservations);
        if($key) {
            array_splice($this->reservations, $key);
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param DateTime $start
     * @param DateTime $end
     * @return bool
     */
    public function isAlreadyBooked(DateTime $start, DateTime $end): bool
    {
        foreach ($this->reservations as $reservation)
        {
            $reservationStarts = $reservation->getStartDate();
            $reservationEnds = $reservation->getEndDate();
            if($start === $reservationStarts || $end === $reservationEnds) {
                return true;
            } else if ($start > $reservationStarts && $end < $reservationEnds) {
                return true;
            } else if ($start < $reservationStarts && $end > $reservationEnds) {
                return true;
            }
        }
        return false;
    }

    /**
     * @return int
     */
    public function getRoomNumber(): int
    {
        return $this->roomNumber;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return sprintf(
            "%d bed, %s room, %s, extras - %s. \r\nRoom number: %d; room price: %d",
            $this->bedCount,
            $this->roomType,
            $this->hasRestroom && $this->hasBalcony
                ? 'with restroom and balcony'
                : $this->hasRestroom
                ? 'with restroom, no balcony'
                : $this->hasBalcony
                    ? 'no restroom, with balcony'
                    : 'no restroom, no balcony',
            implode(', ', $this->extras),
            $this->roomNumber,
            $this->price
        );
    }
}