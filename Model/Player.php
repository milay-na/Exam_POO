<?php

class Player {
    private  $id_player;
    private  $email;
    private $nickname;
    


    /**
     * Get the value of id_player
     *
     * @return  int
     */
    public function getIdPlayer()
    {
        return $this->id_player;
    }

    /**
     * Set the value of id_player
     *
     * @param  int  $id_player
     *
     * @return  self
     */
    public function setIdPlayer(int $id_player)
    {
        $this->id_player = $id_player;

        return $this;
    }

    /**
     * Get the value of email
     *
     * @return  string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @param  string  $email
     *
     * @return  self
     */
    public function setEmail(string $email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of nickname
     *
     * @return  string
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * Set the value of nickname
     *
     * @param  string  $nickname
     *
     * @return  self
     */
    public function setNickname(string $nickname)
    {
        $this->nickname = $nickname;

        return $this;
    }
}