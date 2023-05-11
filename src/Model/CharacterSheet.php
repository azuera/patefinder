<?php
namespace Model;

class CharacterSheet
{

    protected int $characterSheetId;
    protected string $characterSheetName;
    protected string $characterSheetRace;
    protected string $characterSheetClass;
    protected int $characterSheetStatus;
    protected int $characteristicInitiative;
    protected int $characteristicHpMax;
    protected int $characteristicActualHp;
    protected int $characteristicMpMax;
    protected int $characteristicActualMp;
    protected int $characteristicStrength;
    protected int $characteristicDexterity;
    protected int $characteristicStamina;
    protected int $characteristicIntelligence;
    protected int $characteristicWisdom;
    protected int $characteristicLuck;
    protected ?int $gameId = null;
    protected ?int $userrId = null;
    // protected ?string $userrName = null;
    // protected ?int $userrRole = null;
    // protected ?string $userrPassword = null;
    // protected ?string $userrProfilePicture = null;
    // protected ?string $userrGender = null;
    // protected ?string $userrEmail = null;



    /**
     * @return 
     */
    public function getCharacterSheetId(): int
    {
        return $this->characterSheetId;
    }

    /**
     * @param  $characterSheetId 
     * @return self
     */
    public function setCharacterSheetId(int $characterSheetId): self
    {
        $this->characterSheetId = $characterSheetId;
        return $this;
    }

    public function getcharacterSheetName(): string
    {
        return $this->characterSheetName;
    }

    public function setcharacterSheetName(string $characterSheetName): self
    {
        $this->characterSheetName = $characterSheetName;
        return $this;
    }


    public function getcharacteristicInitiative(): int
    {
        return $this->characteristicInitiative;
    }

    public function setcharacteristicInitiative(int $characteristicInitiative): self
    {
        $this->characteristicInitiative = $characteristicInitiative;
        return $this;
    }

    public function getcharacteristicHpMax(): int
    {
        return $this->characteristicHpMax;
    }

    public function setcharacteristicHpMax(int $characteristicHpMax): self
    {
        $this->characteristicHpMax = $characteristicHpMax;
        return $this;
    }

    public function getcharacteristicActualHp(): int
    {
        return $this->characteristicActualHp;
    }

    public function setcharacteristicActualHp(int $characteristicActualHp): self
    {
        $this->characteristicActualHp = $characteristicActualHp;
        return $this;
    }

    public function getcharacteristicMpMax(): int
    {
        return $this->characteristicMpMax;
    }

    public function setcharacteristicMpMax(int $characteristicMpMax): self
    {
        $this->characteristicMpMax = $characteristicMpMax;
        return $this;
    }

    public function getcharacteristicActualMp(): int
    {
        return $this->characteristicActualMp;
    }


    public function setcharacteristicActualMp(int $characteristicActualMp): self
    {
        $this->characteristicActualMp = $characteristicActualMp;
        return $this;
    }

    public function getcharacteristicStrength(): int
    {
        return $this->characteristicStrength;
    }

    public function setcharacteristicStrength(int $characteristicStrength): self
    {
        $this->characteristicStrength = $characteristicStrength;
        return $this;
    }

    public function getcharacteristicDexterity(): int
    {
        return $this->characteristicDexterity;
    }

    public function setcharacteristicDexterity(int $characteristicDexterity): self
    {
        $this->characteristicDexterity = $characteristicDexterity;
        return $this;
    }

    public function getcharacteristicStamina(): int
    {
        return $this->characteristicStamina;
    }

    public function setcharacteristicStamina(int $characteristicStamina): self
    {
        $this->characteristicStamina = $characteristicStamina;
        return $this;
    }

    public function getcharacteristicIntelligence(): int
    {
        return $this->characteristicIntelligence;
    }

    public function setcharacteristicIntelligence(int $characteristicIntelligence): self
    {
        $this->characteristicIntelligence = $characteristicIntelligence;
        return $this;
    }

    public function getcharacteristicWisdom(): int
    {
        return $this->characteristicWisdom;
    }

    public function setcharacteristicWisdom(int $characteristicWisdom): self
    {
        $this->characteristicWisdom = $characteristicWisdom;
        return $this;
    }

    public function getcharacteristicLuck(): int
    {
        return $this->characteristicLuck;
    }

    public function setcharacteristicLuck(int $characteristicLuck): self
    {
        $this->characteristicLuck = $characteristicLuck;
        return $this;
    }

    public function getcharacterSheetRace(): string
    {
        return $this->characterSheetRace;
    }

    public function setcharacterSheetRace(string $characterSheetRace): self
    {
        $this->characterSheetRace = $characterSheetRace;
        return $this;
    }

    public function getcharacterSheetClass(): string
    {
        return $this->characterSheetClass;
    }

    public function setcharacterSheetClass(string $characterSheetClass): self
    {
        $this->characterSheetClass = $characterSheetClass;
        return $this;
    }

    public function getcharacterSheetStatus(): int
    {
        return $this->characterSheetStatus;
    }

    public function setcharacterSheetStatus(int $characterSheetStatus): self
    {
        $this->characterSheetStatus = $characterSheetStatus;
        return $this;
    }

    /**
     * @return 
     */
    public function getGameId(): ?int
    {
        return $this->gameId;
    }

    /**
     * @param  $gameId 
     * @return self
     */
    public function setGameId(?int $gameId): self
    {
        $this->gameId = $gameId;
        return $this;
    }

    /**
     * @return 
     */
    public function getUserrId(): ?int
    {
        return $this->userrId;
    }

    /**
     * @param  $userrId 
     * @return self
     */
    public function setUserrId(?int $userrId): self
    {
        $this->userrId = $userrId;
        return $this;
    }
}
?>