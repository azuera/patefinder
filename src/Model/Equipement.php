<?php

namespace Model;

class Equipement
{
    protected ?int $equipementId;
    protected ?string $equipementName;
    protected ?int $equipementDamage;
    protected ?int $equipementRange;

    public function __construct(array $data = []){
        if (isset($data['equipementName'])) {
            $this->setEquipementName($data['equipementName']);
        }
        if (isset($data['equipementRange'])) {
            $this->setEquipementRange($data['equipementRange']);
        }
        if (isset($data['equipementId'])) {
            $this->setEquipementId($data['equipementId']);
        }
        if (isset($data['equipementDamage'])) {
            $this->setEquipementDamage($data['equipementDamage']);
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
    public function getEquipementName(): ?string
    {
        return $this->equipementName;
    }

    /**
     * @param string|null $equipementName
     * @return Equipement
     */
    public function setEquipementName(?string $equipementName): Equipement
    {
        $this->equipementName = trim($equipementName);
        return $this;
    }

    /**
     * @return int|null
     */
    public function getEquipementDamage(): ?int
    {
        return $this->equipementDamage;
    }

    /**
     * @param int|null $equipementDamage
     * @return Equipement
     */
    public function setEquipementDamage(?int $equipementDamage): Equipement
    {
        $this->equipementDamage = $equipementDamage;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getEquipementRange(): ?int
    {
        return $this->equipementRange;
    }

    /**
     * @param int|null $equipementRange
     * @return Equipement
     */
    public function setEquipementRange(?int $equipementRange): Equipement
    {
        $this->equipementRange = $equipementRange;
        return $this;
    }
}