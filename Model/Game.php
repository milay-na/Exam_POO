<?php

class Game {
    private  $id_game;
    private  $title;
    private  $min_players;
    private  $max_players;

    /**
     * @return int
     */
    public function getIdGame(): int
    {
        return $this->id_game;
    }

    /**
     * @param int $id_game
     */
    public function setIdGame(int $id_game): self
    {
        $this->id_game = $id_game;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Get the value of min_players
     *
     * @return  string
     */
    public function getMinPlayers()
    {
        return $this->min_players;
    }

    /**
     * Set the value of min_players
     *
     * @param  string  $min_players
     *
     * @return  self
     */
    public function setMinPlayers(string $min_players)
    {
        $this->min_players = $min_players;

        return $this;
    }

    /**
     * Get the value of max_players
     */
    public function getMaxPlayers()
    {
        return $this->max_players;
    }

    /**
     * Set the value of max_players
     *
     * @return  self
     */
    public function setMaxPlayers($max_players)
    {
        $this->max_players = $max_players;

        return $this;
    }
}