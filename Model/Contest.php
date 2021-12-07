<?php

class Contest {
    private  $id_contest;
    private  $start_date;
    private  $id_winner;
    private  $id_game;

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
    public function getStartDate(): string
    {
        return $this->start_date;
    }

    /**
     * @param string $start_date
     */
    public function setStartDate(string $start_date): self
    {
        $this->start_date = $start_date;
        return $this;
    }

    /**
     * Get the value of id_contest
     *
     * @return  string
     */
    public function getIdContest()
    {
        return $this->id_contest;
    }

    /**
     * Set the value of id_contest
     *
     * @param  string  $id_contest
     *
     * @return  self
     */
    public function setIdContest(string $id_contest)
    {
        $this->id_contest = $id_contest;

        return $this;
    }

    /**
     * Get the value of id_winner
     */
    public function getIdWinner()
    {
        return $this->id_winner;
    }

    /**
     * Set the value of id_winner
     *
     * @return  self
     */
    public function setIdWinner($id_winner)
    {
        $this->id_winner = $id_winner;

        return $this;
    }
}