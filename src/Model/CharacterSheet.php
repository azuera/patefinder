<?php
namespace Model;

class CharacterSheet
{
    const CHARACTER_SHEET_STATUS_LIST = [
        'Allié',
        'Ennemie',
        'Neutre',
    ];

    protected int $characterSheetId;
    protected string $characterSheetName = "";
    protected string $characterSheetRace = "";
    protected string $characterSheetClass = "";
    protected ?int $characterSheetStatus = 0;
    protected ?int $characteristicInitiative = 0;
    protected ?int $characteristicHpMax = 0;
    protected ?int $characteristicActualHp = 0;
    protected ?int $characteristicMpMax = 0;
    protected ?int $characteristicActualMp = 0;
    protected ?int $characteristicStrength = 0;
    protected ?int $characteristicDexterity = 0;
    protected ?int $characteristicStamina = 0;
    protected ?int $characteristicIntelligence = 0;
    protected ?int $characteristicWisdom = 0;
    protected ?int $characteristicLuck = 0;
    protected ?int $gameId = null;
    protected ?int $userrId = null;

    public function __construct(array $data = [])
    {
        if (isset($data['characterSheetId'])) {
            $this->setCharacterSheetId(intval($data['characterSheetId']));
        }
        if (isset($data['characterSheetName'])) {
            $this->setcharacterSheetName(trim($data['characterSheetName']));
        }
        if (isset($data['characterSheetClass'])) {
            $this->setcharacterSheetClass(trim($data['characterSheetClass']));
        }
        if (isset($data['characterSheetRace'])) {
            $this->setcharacterSheetRace(trim($data['characterSheetRace']));
        }
        if (isset($data['characterSheetStatus'])) {
            $this->setcharacterSheetStatus(intval($data['characterSheetStatus']));
        }
        if (isset($data['characteristicInitiative'])) {
            $this->setcharacteristicInitiative(intval($data['characteristicInitiative']));
        }
        if (isset($data['characteristicHpMax'])) {
            $this->setcharacteristicHpMax(intval($data['characteristicHpMax']));
        }
        if (isset($data['characteristicActualHp'])) {
            $this->setcharacteristicActualHp(intval($data['characteristicActualHp']));
        }
        if (isset($data['characteristicMpMax'])) {
            $this->setcharacteristicMpMax(intval($data['characteristicMpMax']));
        }
        if (isset($data['characteristicActualMp'])) {
            $this->setcharacteristicActualMp(intval($data['characteristicActualMp']));
        }
        if (isset($data['characteristicStrength'])) {
            $this->setcharacteristicStrength(intval($data['characteristicStrength']));
        }
        if (isset($data['characteristicDexterity'])) {
            $this->setcharacteristicDexterity(intval($data['characteristicDexterity']));
        }
        if (isset($data['characteristicStamina'])) {
            $this->setcharacteristicStamina(intval($data['characteristicStamina']));
        }
        if (isset($data['characteristicIntelligence'])) {
            $this->setcharacteristicIntelligence(intval($data['characteristicIntelligence']));
        }
        if (isset($data['characteristicWisdom'])) {
            $this->setcharacteristicWisdom(intval($data['characteristicWisdom']));
        }
        if (isset($data['characteristicLuck'])) {
            $this->setcharacteristicLuck(intval($data['characteristicLuck']));
        }
    }

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


    public function getcharacteristicInitiative(): ?int
    {
        return $this->characteristicInitiative;
    }

    public function setcharacteristicInitiative(?int $characteristicInitiative): self
    {
        $this->characteristicInitiative = $characteristicInitiative;
        return $this;
    }

    public function getcharacteristicHpMax(): ?int
    {
        return $this->characteristicHpMax;
    }

    public function setcharacteristicHpMax(?int $characteristicHpMax): self
    {
        $this->characteristicHpMax = $characteristicHpMax;
        return $this;
    }

    public function getcharacteristicActualHp(): ?int
    {
        return $this->characteristicActualHp;
    }

    public function setcharacteristicActualHp(?int $characteristicActualHp): self
    {
        $this->characteristicActualHp = $characteristicActualHp;
        return $this;
    }

    public function getcharacteristicMpMax(): ?int
    {
        return $this->characteristicMpMax;
    }

    public function setcharacteristicMpMax(?int $characteristicMpMax): self
    {
        $this->characteristicMpMax = $characteristicMpMax;
        return $this;
    }

    public function getcharacteristicActualMp(): ?int
    {
        return $this->characteristicActualMp;
    }


    public function setcharacteristicActualMp(?int $characteristicActualMp): self
    {
        $this->characteristicActualMp = $characteristicActualMp;
        return $this;
    }

    public function getcharacteristicStrength(): ?int
    {
        return $this->characteristicStrength;
    }

    public function setcharacteristicStrength(?int $characteristicStrength): self
    {
        $this->characteristicStrength = $characteristicStrength;
        return $this;
    }

    public function getcharacteristicDexterity(): ?int
    {
        return $this->characteristicDexterity;
    }

    public function setcharacteristicDexterity(?int $characteristicDexterity): self
    {
        $this->characteristicDexterity = $characteristicDexterity;
        return $this;
    }

    public function getcharacteristicStamina(): ?int
    {
        return $this->characteristicStamina;
    }

    public function setcharacteristicStamina(?int $characteristicStamina): self
    {
        $this->characteristicStamina = $characteristicStamina;
        return $this;
    }

    public function getcharacteristicIntelligence(): ?int
    {
        return $this->characteristicIntelligence;
    }

    public function setcharacteristicIntelligence(?int $characteristicIntelligence): self
    {
        $this->characteristicIntelligence = $characteristicIntelligence;
        return $this;
    }

    public function getcharacteristicWisdom(): ?int
    {
        return $this->characteristicWisdom;
    }

    public function setcharacteristicWisdom(?int $characteristicWisdom): self
    {
        $this->characteristicWisdom = $characteristicWisdom;
        return $this;
    }

    public function getcharacteristicLuck(): ?int
    {
        return $this->characteristicLuck;
    }

    public function setcharacteristicLuck(?int $characteristicLuck): self
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

    /**
     * @return 
     */
    public function getCharacterSheetStatus(): ?int
    {
        return $this->characterSheetStatus;
    }

    /**
     * @param  $characterSheetStatus 
     * @return self
     */
    public function setCharacterSheetStatus(?int $characterSheetStatus): self
    {
        $this->characterSheetStatus = $characterSheetStatus;
        return $this;
    }
    public function getCharacterSheetStatusLabel(): string
    {
        return self::CHARACTER_SHEET_STATUS_LIST[$this->characterSheetStatus];
    }
}
?>