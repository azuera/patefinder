<?php

namespace Model;

class Game
{
    protected ?int $gameId = null;
    protected ?string $gameName = null;
    protected ?string $gameLore = null;

    /**
     * @return string
     */
    public function getGameId(): string
    {
        return $this->gameId;
    }

    /**
     * @param string $gameId
     * @return game
     */
    public function setGameId(string $gameId): game
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


}