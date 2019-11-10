<?php

namespace Nfq\Interfaces;

use Nfq\Classes\Reservation;

interface ReservableInterface
{
    /**
     * @param Reservation $reservation
     * @return mixed
     */
    public function addReservation(Reservation $reservation);
    /**
     * @param Reservation $reservation
     * @return mixed
     */
    public function removeReservation(Reservation $reservation);
}