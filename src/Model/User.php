<?php

namespace Model;

class User
{
    protected ?int $userrId;
    protected ?int $userrRole;
    protected ?string $userrName;
    protected ?string $userrEmail;
    protected ?string $userrPassword;

    protected ?string $userrProfilePicture;

    protected ?int $userrGender;

    /**
     * @return int|null
     */
    public function getUserrId(): ?int
    {
        return $this->userrId;
    }

    /**
     * @param int|null $userrId
     */
    public function setUserrId(?int $userrId): void
    {
        $this->userrId = $userrId;
    }

    /**
     * @return int|null
     */
    public function getUserrRole(): ?int
    {
        return $this->userrRole;
    }

    /**
     * @param int|null $userrRole
     */
    public function setUserrRole(?int $userrRole): void
    {
        $this->userrRole = $userrRole;
    }

    /**
     * @return string|null
     */
    public function getUserrName(): ?string
    {
        return $this->userrName;
    }

    /**
     * @param string|null $userrName
     */
    public function setUserrName(?string $userrName): void
    {
        $this->userrName = $userrName;
    }

    /**
     * @return string|null
     */
    public function getUserrEmail(): ?string
    {
        return $this->userrEmail;
    }

    /**
     * @param string|null $userrEmail
     */
    public function setUserrEmail(?string $userrEmail): void
    {
        $this->userrEmail = $userrEmail;
    }

    /**
     * @return string|null
     */
    public function getUserrPassword(): ?string
    {
        return $this->userrPassword;
    }

    /**
     * @param string|null $userrPassword
     */
    public function setUserrPassword(?string $userrPassword): void
    {
        $this->userrPassword = $userrPassword;
    }

    /**
     * @return string|null
     */
    public function getUserrProfilePicture(): ?string
    {
        return $this->userrProfilePicture;
    }

    /**
     * @param string|null $userrProfilePicture
     */
    public function setUserrProfilePicture(?string $userrProfilePicture): void
    {
        $this->userrProfilePicture = $userrProfilePicture;
    }

    /**
     * @return int|null
     */
    public function getUserrGender(): ?int
    {
        return $this->userrGender;
    }

    /**
     * @param int|null $userrGender
     */
    public function setUserrGender(?int $userrGender): void
    {
        $this->userrGender = $userrGender;
    }







}