<?php
namespace App\Models;

use DateTime;

class UserProfileModel
{
    /**
     * The user's ID number
     * @var int
     */
    private $userid;
    /**
     * The user's phone number
     * @var int
     */
    private $phoneNumber;
    /**
     * The user's date of birth
     * @var DateTime
     */
    private $dateOfBirth;
    /**
     * The user's street address
     * @var string
     */
    private $street;
    /**
     * The user's city address
     * @var string
     */
    private $city;
    /**
     * The user's state address
     * @var string
     */
    private $state;
    /**
     * The user's zip code
     * @var int
     */
    private $zipCode;
    /**
     * The user's employment status
     * @var string
     */
    private $employmentStatus;
    /**
     * The user's occupation status
     * @var string
     */
    private $occupation;
    /**
     * The user's company name
     * @var string
     */
    private $companyName;
    /**
     * The user's educational background
     * @var string
     */
    private $educationalBackground;
    


    /**
     * 
     * @param int $userID
     * @param int $phoneNumber
     * @param DateTime $dateOfBirth
     * @param string $street
     * @param string $city
     * @param string $state
     * @param int $zipCode
     * @param string $employmentStatus
     * @param string $occupation
     * @param string $companyName
     * @param string $educationalBackground
     */
    public function __construct(int $userID, int $phoneNumber, DateTime $dateOfBirth,
                                string $street, string $city, string $state,
                                int $zipCode, string $employmentStatus, string $occupation,
                                string $companyName, string $educationalBackground)
    {
        $this->userid = $userID;
        $this->phoneNumber = $phoneNumber;
        $this->dateOfBirth = $dateOfBirth;
        $this->street = $street;
        $this->city = $city;
        $this->state = $state;
        $this->zipCode = $zipCode;
        $this->employmentStatus = $employmentStatus;
        $this->occupation = $occupation;
        $this->companyName = $companyName;
        $this->educationalBackground = $educationalBackground;
    }
    
    
    /**
     * @return number
     */
    public function getUserid()
    {
        return $this->userid;
    }
    
    /**
     * @return number
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }
    
    /**
     * @return DateTime
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }
    
    /**
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }
    
    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }
    
    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }
    
    /**
     * @return number
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }
    
    /**
     * @return string
     */
    public function getEmploymentStatus()
    {
        return $this->employmentStatus;
    }
    
    /**
     * @return string
     */
    public function getOccupation()
    {
        return $this->occupation;
    }
    
    /**
     * @return string
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }
    
    /**
     * @return string
     */
    public function getEducationalBackground()
    {
        return $this->educationalBackground;
    }
}

