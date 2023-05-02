<?php

class CharacterSheet
{

    protected string $character_sheet_name;
    protected string $character_sheet_race;
    protected string $character_sheet_class;
    protected int $character_sheet_status;
    protected int $characteristic_initiative;
    protected int $characteristic_hp_max;
    protected int $characteristic_actual_hp;
    protected int $characteristic_mp_max;
    protected int $characteristic_actual_mp;
    protected int $characteristic_strength;
    protected int $characteristic_dexterity;
    protected int $characteristic_stamina;
    protected int $characteristic_intelligence;
    protected int $characteristic_wisdom;
    protected int $characteristic_luck;
    protected int $game_id;
    protected array $skills = [];
    protected array $equipments = [];


    public function getCharacter_sheet_name(): string
    {
        return $this->character_sheet_name;
    }

    public function setCharacter_sheet_name(string $character_sheet_name): self
    {
        $this->character_sheet_name = $character_sheet_name;
        return $this;
    }


    public function getCharacteristic_initiative(): int
    {
        return $this->characteristic_initiative;
    }

    public function setCharacteristic_initiative(int $characteristic_initiative): self
    {
        $this->characteristic_initiative = $characteristic_initiative;
        return $this;
    }

    public function getCharacteristic_hp_max(): int
    {
        return $this->characteristic_hp_max;
    }

    public function setCharacteristic_hp_max(int $characteristic_hp_max): self
    {
        $this->characteristic_hp_max = $characteristic_hp_max;
        return $this;
    }

    public function getCharacteristic_actual_hp(): int
    {
        return $this->characteristic_actual_hp;
    }

    public function setCharacteristic_actual_hp(int $characteristic_actual_hp): self
    {
        $this->characteristic_actual_hp = $characteristic_actual_hp;
        return $this;
    }

    public function getCharacteristic_mp_max(): int
    {
        return $this->characteristic_mp_max;
    }

    public function setCharacteristic_mp_max(int $characteristic_mp_max): self
    {
        $this->characteristic_mp_max = $characteristic_mp_max;
        return $this;
    }

    public function getCharacteristic_actual_mp(): int
    {
        return $this->characteristic_actual_mp;
    }


    public function setCharacteristic_actual_mp(int $characteristic_actual_mp): self
    {
        $this->characteristic_actual_mp = $characteristic_actual_mp;
        return $this;
    }

    public function getCharacteristic_strength(): int
    {
        return $this->characteristic_strength;
    }

    public function setCharacteristic_strength(int $characteristic_strength): self
    {
        $this->characteristic_strength = $characteristic_strength;
        return $this;
    }

    public function getCharacteristic_dexterity(): int
    {
        return $this->characteristic_dexterity;
    }

    public function setCharacteristic_dexterity(int $characteristic_dexterity): self
    {
        $this->characteristic_dexterity = $characteristic_dexterity;
        return $this;
    }

    public function getCharacteristic_stamina(): int
    {
        return $this->characteristic_stamina;
    }

    public function setCharacteristic_stamina(int $characteristic_stamina): self
    {
        $this->characteristic_stamina = $characteristic_stamina;
        return $this;
    }

    public function getCharacteristic_intelligence(): int
    {
        return $this->characteristic_intelligence;
    }

    public function setCharacteristic_intelligence(int $characteristic_intelligence): self
    {
        $this->characteristic_intelligence = $characteristic_intelligence;
        return $this;
    }

    public function getCharacteristic_wisdom(): int
    {
        return $this->characteristic_wisdom;
    }

    public function setCharacteristic_wisdom(int $characteristic_wisdom): self
    {
        $this->characteristic_wisdom = $characteristic_wisdom;
        return $this;
    }

    public function getCharacteristic_luck(): int
    {
        return $this->characteristic_luck;
    }

    public function setCharacteristic_luck(int $characteristic_luck): self
    {
        $this->characteristic_luck = $characteristic_luck;
        return $this;
    }

    public function getSkills(): array
    {
        return $this->skills;
    }

    public function setSkills(array $skills): self
    {
        $this->skills = $skills;
        return $this;
    }

    public function getEquipments(): array
    {
        return $this->equipments;
    }

    public function setEquipments(array $equipments): self
    {
        $this->equipments = $equipments;
        return $this;
    }

    /**
     * @return string
     */
    public function getCharacter_sheet_race(): string
    {
        return $this->character_sheet_race;
    }

    /**
     * @param string $character_sheet_race 
     * @return self
     */
    public function setCharacter_sheet_race(string $character_sheet_race): self
    {
        $this->character_sheet_race = $character_sheet_race;
        return $this;
    }

    /**
     * @return string
     */
    public function getCharacter_sheet_class(): string
    {
        return $this->character_sheet_class;
    }

    /**
     * @param string $character_sheet_class 
     * @return self
     */
    public function setCharacter_sheet_class(string $character_sheet_class): self
    {
        $this->character_sheet_class = $character_sheet_class;
        return $this;
    }

    /**
     * @return int
     */
    public function getCharacter_sheet_status(): int
    {
        return $this->character_sheet_status;
    }

    /**
     * @param int $character_sheet_status 
     * @return self
     */
    public function setCharacter_sheet_status(int $character_sheet_status): self
    {
        $this->character_sheet_status = $character_sheet_status;
        return $this;
    }

    /**
     * @return int
     */
    public function getGame_id(): int
    {
        return $this->game_id;
    }

    /**
     * @param int $game_id 
     * @return self
     */
    public function setGame_id(int $game_id): self
    {
        $this->game_id = $game_id;
        return $this;
    }
}



?>