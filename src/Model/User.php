<?php

namespace model;

class User
{
    protected ?int $userr_id;
    protected ?int $userr_role;
    protected ?string $userr_name;
    protected ?string $userr_email;
    protected ?string $userr_password;

    protected ?string $userr_profile_picture;

    protected ?int $userr_gender;


    /**
     * @return int|null
     */
    public function getUserrId(): ?int
    {
        return $this->userr_id;
    }

    /**
     * @param int|null $userr_id
     */
    public function setUserrId(?int $userr_id): void
    {
        $this->userr_id = $userr_id;
    }

    /**
     * @return int|null
     */
    public function getUserrRole(): ?int
    {
        return $this->userr_role;
    }

    /**
     * @param int|null $userr_role
     */
    public function setUserrRole(?int $userr_role): void
    {
        $this->userr_role = $userr_role;
    }

    /**
     * @return string|null
     */
    public function getUserrName(): ?string
    {
        return $this->userr_name;
    }

    /**
     * @param string|null $userr_name
     */
    public function setUserrName(?string $userr_name): void
    {
        $this->userr_name = $userr_name;
    }

    /**
     * @return string|null
     */
    public function getUserrEmail(): ?string
    {
        return $this->userr_email;
    }

    /**
     * @param string|null $userr_email
     */
    public function setUserrEmail(?string $userr_email): void
    {
        $this->userr_email = $userr_email;
    }

    /**
     * @return string|null
     */
    public function getUserrPassword(): ?string
    {
        return $this->userr_password;
    }

    /**
     * @param string|null $userr_password
     */
    public function setUserrPassword(?string $userr_password): void
    {
        $this->userr_password = $userr_password;
    }

    /**
     * @return string|null
     */
    public function getUserrProfilePicture(): ?string
    {
        return $this->userr_profile_picture;
    }

    /**
     * @param string|null $userr_profile_picture
     */
    public function setUserrProfilePicture(?string $userr_profile_picture): void
    {
        $this->userr_profile_picture = $userr_profile_picture;
    }

    /**
     * @return int|null
     */
    public function getUserrGender(): ?int
    {
        return $this->userr_gender;
    }

    /**
     * @param int|null $userr_gender
     */
    public function setUserrGender(?int $userr_gender): void
    {
        $this->userr_gender = $userr_gender;
    }




}