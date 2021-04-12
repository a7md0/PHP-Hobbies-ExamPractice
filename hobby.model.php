<?php

require_once('database.class.php');

class Hobby
{
    private $id;
    private $firstName;
    private $lastName;
    private $dob;
    private $gender;
    private $games;
    private $email;
    private $phone;
    private $password;
    private $image;

    public function __construct(
        $id = null,
        $firstName = null,
        $lastName = null,
        $dob = null,
        $gender = null,
        $games = null,
        $email = null,
        $phone = null,
        $password = null,
        $image = null
    ) {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->dob = $dob;
        $this->gender = $gender;
        $this->games = $games;
        $this->email = $email;
        $this->phone = $phone;
        $this->password = $password;
        $this->image = $image;
    }

    
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of firstName
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get the value of lastName
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get the value of dob
     */
    public function getDob()
    {
        return $this->dob;
    }

    /**
     * Set the value of dob
     *
     * @return  self
     */
    public function setDob($dob)
    {
        $this->dob = $dob;

        return $this;
    }

    /**
     * Get the value of gender
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set the value of gender
     *
     * @return  self
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get the value of games
     */
    public function getGames()
    {
        return $this->games;
    }

    /**
     * Set the value of games
     *
     * @return  self
     */
    public function setGames($games)
    {
        $this->games = $games;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of phone
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Add new hobby
     *
     * @return bool
     */
    public function add() {
        $games = join(", ", $this->games); // Join array of string to comma separated list

        $db = Database::getInstance();
        $db->query("INSERT INTO `myhobby` (`FName`, `LName`, `DOB`, `Gender`, `Game`, `Email`, `Phone`, `Password`, `ImgFile`) VALUES ('$this->firstName', '$this->lastName', '$this->dob', '$this->gender', '$games', '$this->email', '$this->phone', '$this->password', '$this->image');");
        if ($db->affected_rows > 0) {
            $this->id = $db->insert_id;

            return true;
        }

        echo $db->error;

        return false;
    }

    /**
     * Fetch hobby by id
     *
     * @param int $id
     * @return self|null
     */
    public static function findById($id) {
        $db = Database::getInstance();
        $result = $db->query("SELECT * FROM `myhobby` WHERE `idHobby` = $id;");
        if ($result->num_rows == 0) {
            return null;
        }

        $row = $result->fetch_assoc();

        return new self(
            $row['idHobby'],
            $row['FName'],
            $row['LName'],
            $row['DOB'],
            $row['Gender'],
            $row['Game'],
            $row['Email'],
            $row['Phone'],
            $row['Password'],
            $row['ImgFile']
        );
    }
}
