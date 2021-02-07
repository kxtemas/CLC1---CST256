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
    
    /**
     * Checks to see if the models are the same
     * @param UserProfileModel $model : The model to check against
     * @return boolean
     */
    public function Equals(UserProfileModel $model)
    {
        // If the users IDs don't match
        if($this->userid != $model->getUserid()) return FALSE;
        
        // If the users phone numbers don't match
        if($this->phoneNumber != $model->getPhoneNumber()) return FALSE;
        
        // If the users date of births don't match
        if($this->dateOfBirth != $model->getDateOfBirth()) return FALSE;
        
        // If the users streets don't match
        if($this->street != $model->getStreet()) return FALSE;
        
        // If the users citys don't match
        if($this->city != $model->getCity()) return FALSE;
        
        // If the users states don't match
        if($this->state != $model->getState()) return FALSE;
        
        // If the users Zipcodes don't match
        if($this->zipCode != $model->getZipCode()) return FALSE;
        
        // If the users Employment Status don't match
        if($this->employmentStatus != $model->getEmploymentStatus()) return FALSE;
        
        // If the users Occupations don't match
        if($this->occupation != $model->getOccupation()) return FALSE;
        
        // If the users Company names don't match
        if($this->companyName != $model->getCompanyName()) return FALSE;
        
        // If the users Educational Backgrounds don't match
        if($this->educationalBackground != $model->getEducationalBackground()) return FALSE;
        
        // If all previous values match
        return TRUE;
    }
}

