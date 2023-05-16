<?php

namespace Model;

class Game
{
    protected ?int $gameId = null;
    protected ?string $gameName = null;
    protected ?string $gameLore = null;
    protected ?int $userrId = null;

    /**
     * @return string
     */
    public function getGameId(): int
    {
        return $this->gameId;
    }

    /**
     * @param int $gameId
     * @return game
     */
    public function setGameId(int $gameId): game
    {
        $this->gameId = $gameId;
        return $this;
    }

    /**
     * @return string
     */
    public function getGameName(): string
    {
        return $this->gameName;
    }

    /**
     * @param string $gameName
     * @return game
     */
    public function setGameName(string $gameName): game
    {
        $this->gameName = $gameName;
        return $this;
    }

    /**
     * @return string
     */
    public function getGameLore(): string
    {
        return $this->gameLore;
    }

    /**
     * @param string $gameLore
     * @return game
     */
    public function setGameLore(string $gameLore): game
    {
        $this->gameLore = $gameLore;
        return $this;
    }



	/**
	 * @return 
	 */
	public function getUserrId(): ?int {
		return $this->userrId;
	}
	
	/**
	 * @param  $userrId 
	 * @return self
	 */
	public function setUserrId(?int $userrId): self {
		$this->userrId = $userrId;
		return $this;
	}
}