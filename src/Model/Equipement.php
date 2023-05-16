<?php

namespace Model;

class Equipement
{
    protected ?int $equipementId = null;
    protected string $equipementName = "";
    protected int $equipementDamage = 0;
    protected int $equipementRange = 0;
    protected ?int $idCharacterSheet = null;

    /**
     * @return int|null
     */
    public function getIdCharacterSheet(): ?int
    {
        return $this->idCharacterSheet;
    }

    /**
     * @param int|null $idCharacterSheet
     * @return Equipement
     */
    public function setIdCharacterSheet(?int $idCharacterSheet): Equipement
    {
        $this->idCharacterSheet = $idCharacterSheet;
        return $this;
    }



    public function __construct(array $data = [])
    {
        if (isset($data['equipementId'])) {
            $this->setEquipementId(intval($data['equipementId']));
        }
        if (isset($data['equipementName'])) {
            $this->setEquipementName(trim($data['equipementName']));
        }
        if (isset($data['equipementDamage'])) {
            $this->setEquipementDamage(intval($data['equipementDamage']));
        }
        if (isset($data['equipementRange'])) {
            $this->setEquipementRange(intval($data['equipementRange']));
        }


    }

    /**
     * @return int|null
     */
    public function getEquipementId(): ?int
    {
        return $this->equipementId;
    }

    /**
     * @param int|null $equipementId
     * @return Equipement
     */
    public function setEquipementId(?int $equipementId): Equipement
    {
        $this->equipementId = $equipementId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEquipementName(): string
    {
        return $this->equipementName;
    }

    /**
     * @param string|null $equipementName
     * @return Equipement
     */
    public function setEquipementName(string $equipementName): Equipement
    {
        $this->equipementName = trim($equipementName);
        return $this;
    }

    /**
     * @return int|null
     */
    public function getEquipementDamage(): int
    {
        return $this->equipementDamage;
    }

    /**
     * @param int|null $equipementDamage
     * @return Equipement
     */
    public function setEquipementDamage(int $equipementDamage): Equipement
    {
        if ($equipementDamage >= 0) {

            $this->equipementDamage = $equipementDamage;
        }
        return $this;
    }

    /**
     * @return int|null
     */
    public function getEquipementRange(): int
    {
        return $this->equipementRange;
    }

    /**
     * @param int|null $equipementRange
     * @return Equipement
     */
    public function setEquipementRange(int $equipementRange): Equipement
    {
        $this->equipementRange = $equipementRange;
        return $this;
    }
}