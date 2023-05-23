<?php

namespace Model;

class CharacterSheet
{
    const CHARACTER_SHEET_STATUS_LIST = [
        'Allié',
        'Ennemie',
        'Neutre',
    ];

    protected ?int $characterSheetId = null;
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
     * @return int
     */
    public function getCharacterSheetId(): ?int
    {
        return $this->characterSheetId;
    }

    /**
     * @param int $characterSheetId
     * @return CharacterSheet
     */

    public function setCharacterSheetId(int $characterSheetId): CharacterSheet
    {
        $this->characterSheetId = $characterSheetId;
        return $this;
    }

    /**
     * @return string
     */
    public function getCharacterSheetName(): string
    {
        return $this->characterSheetName;
    }

    /**
     * @param string $characterSheetName
     * @return CharacterSheet
     */
    public function setCharacterSheetName(string $characterSheetName): CharacterSheet
    {
        $this->characterSheetName = $characterSheetName;
        return $this;
    }

    /**
     * @return string
     */
    public function getCharacterSheetRace(): string
    {
        return $this->characterSheetRace;
    }

    /**
     * @param string $characterSheetRace
     * @return CharacterSheet
     */
    public function setCharacterSheetRace(string $characterSheetRace): CharacterSheet
    {
        $this->characterSheetRace = $characterSheetRace;
        return $this;
    }

    /**
     * @return string
     */
    public function getCharacterSheetClass(): string
    {
        return $this->characterSheetClass;
    }

    /**
     * @param string $characterSheetClass
     * @return CharacterSheet
     */
    public function setCharacterSheetClass(string $characterSheetClass): CharacterSheet
    {
        $this->characterSheetClass = $characterSheetClass;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getCharacterSheetStatus(): ?int
    {
        return $this->characterSheetStatus;
    }

    /**
     * @param int|null $characterSheetStatus
     * @return CharacterSheet
     */
    public function setCharacterSheetStatus(?int $characterSheetStatus): CharacterSheet
    {
        $this->characterSheetStatus = $characterSheetStatus;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getCharacteristicInitiative(): ?int
    {
        return $this->characteristicInitiative;
    }

    /**
     * @param int|null $characteristicInitiative
     * @return CharacterSheet
     */
    public function setCharacteristicInitiative(?int $characteristicInitiative): CharacterSheet
    {
        $this->characteristicInitiative = $characteristicInitiative;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getCharacteristicHpMax(): ?int
    {
        return $this->characteristicHpMax;
    }

    /**
     * @param int|null $characteristicHpMax
     * @return CharacterSheet
     */
    public function setCharacteristicHpMax(?int $characteristicHpMax): CharacterSheet
    {
        $this->characteristicHpMax = $characteristicHpMax;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getCharacteristicActualHp(): ?int
    {
        return $this->characteristicActualHp;
    }

    /**
     * @param int|null $characteristicActualHp
     * @return CharacterSheet
     */
    public function setCharacteristicActualHp(?int $characteristicActualHp): CharacterSheet
    {
        $this->characteristicActualHp = $characteristicActualHp;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getCharacteristicMpMax(): ?int
    {
        return $this->characteristicMpMax;
    }

    /**
     * @param int|null $characteristicMpMax
     * @return CharacterSheet
     */
    public function setCharacteristicMpMax(?int $characteristicMpMax): CharacterSheet
    {
        $this->characteristicMpMax = $characteristicMpMax;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getCharacteristicActualMp(): ?int
    {
        return $this->characteristicActualMp;
    }

    /**
     * @param int|null $characteristicActualMp
     * @return CharacterSheet
     */
    public function setCharacteristicActualMp(?int $characteristicActualMp): CharacterSheet
    {
        $this->characteristicActualMp = $characteristicActualMp;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getCharacteristicStrength(): ?int
    {
        return $this->characteristicStrength;
    }

    /**
     * @param int|null $characteristicStrength
     * @return CharacterSheet
     */
    public function setCharacteristicStrength(?int $characteristicStrength): CharacterSheet
    {
        $this->characteristicStrength = $characteristicStrength;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getCharacteristicDexterity(): ?int
    {
        return $this->characteristicDexterity;
    }

    /**
     * @param int|null $characteristicDexterity
     * @return CharacterSheet
     */
    public function setCharacteristicDexterity(?int $characteristicDexterity): CharacterSheet
    {
        $this->characteristicDexterity = $characteristicDexterity;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getCharacteristicStamina(): ?int
    {
        return $this->characteristicStamina;
    }

    /**
     * @param int|null $characteristicStamina
     * @return CharacterSheet
     */
    public function setCharacteristicStamina(?int $characteristicStamina): CharacterSheet
    {
        $this->characteristicStamina = $characteristicStamina;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getCharacteristicIntelligence(): ?int
    {
        return $this->characteristicIntelligence;
    }

    /**
     * @param int|null $characteristicIntelligence
     * @return CharacterSheet
     */
    public function setCharacteristicIntelligence(?int $characteristicIntelligence): CharacterSheet
    {
        $this->characteristicIntelligence = $characteristicIntelligence;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getCharacteristicWisdom(): ?int
    {
        return $this->characteristicWisdom;
    }

    /**
     * @param int|null $characteristicWisdom
     * @return CharacterSheet
     */
    public function setCharacteristicWisdom(?int $characteristicWisdom): CharacterSheet
    {
        $this->characteristicWisdom = $characteristicWisdom;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getCharacteristicLuck(): ?int
    {
        return $this->characteristicLuck;
    }

    /**
     * @param int|null $characteristicLuck
     * @return CharacterSheet
     */
    public function setCharacteristicLuck(?int $characteristicLuck): CharacterSheet
    {
        $this->characteristicLuck = $characteristicLuck;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getGameId(): ?int
    {
        return $this->gameId;
    }

    /**
     * @param int|null $gameId
     * @return CharacterSheet
     */
    public function setGameId(?int $gameId): CharacterSheet
    {
        $this->gameId = $gameId;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getUserrId(): ?int
    {
        return $this->userrId;
    }

    /**
     * @param int|null $userrId
     * @return CharacterSheet
     */
    public function setUserrId(?int $userrId): CharacterSheet
    {
        $this->userrId = $userrId;
        return $this;
    }

    public function getCharacterSheetStatusLabel(): string
    {
        return self::CHARACTER_SHEET_STATUS_LIST[$this->characterSheetStatus];
    }
}

?>