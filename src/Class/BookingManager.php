<?php


namespace Nfq\Classes;


use Nfq\Exceptions\ReservationException;

class BookingManager
{
    /**
     * @param Room $room
     * @param Reservation $reservation
     */
    static public function bookRoom(Room $room, Reservation $reservation): void
    {
        try {
            if ($room->addReservation($reservation)) {
                    printf(
                    'Room <strong>%d</strong> successfully booked for ' .
                    '<strong>%s</strong> from <time>%s</time> to <time>%s</time>!' . PHP_EOL,
                    $room->getRoomNumber(),
                    $reservation->getGuest(),
                    $reservation->getStartDate()->format('Y-m-d'),
                    $reservation->getEndDate()->format('Y-m-d')
                );
            }
        } catch (ReservationException $exception) {
            printf($exception);
        }
    }
}
