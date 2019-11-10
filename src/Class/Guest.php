<?php


namespace Nfq\Classes;


class Guest
{
    /**
     * @var string
     */
    private $firstName;
    /**
     * @var string
     */
    private $lastName;

    /**
     * Guest constructor.
     * @param string $firstname
     * @param string $lastName
     */
    public function __construct(string $firstname, string $lastName)
    {
        $this->firstName = $firstname;
        $this->lastName = $lastName;
    }
    /**
     * @return string
     */
    public function __toString(): string
    {
        return sprintf('%s %s', $this->firstName, $this->lastName);
    }
}
