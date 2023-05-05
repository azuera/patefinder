<?php
namespace Model;

class Skill
{
    protected ?int $skillId;

    protected ?string $skillName;

    protected ?int $skillLevel;

    public function __construct(array $data = [])
    {
        // $this->setSkillId($data[$skillId])
        if (!empty($data["skillName"])) {
            $this->setSkillName($data["skillName"]);
        }
        if (!empty($data["skillName"])) {
            $this->setSkillLevel($data["skillLevel"]);
        }
    }

    /**
     * @return 
     */
    public function getSkillId(): int
    {
        return $this->skillId;
    }

    /**
     * @param  $skillId 
     * @return self
     */
    public function setSkillId(int $skillId): self
    {
        $this->skillId = $skillId;
        return $this;
    }

    /**
     * @return 
     */
    public function getSkillName(): ?string
    {
        return $this->skillName;
    }

    /**
     * @param  $skillName 
     * @return self
     */
    public function setSkillName(?string $skillName): self
    {
        $this->skillName = $skillName;
        return $this;
    }

    /**
     * @return 
     */
    public function getSkillLevel(): ?int
    {
        return $this->skillLevel;
    }

    /**
     * @param  $skillLevel 
     * @return self
     */
    public function setSkillLevel(?int $skillLevel): self
    {
        $this->skillLevel = $skillLevel;
        return $this;
    }
}


?>