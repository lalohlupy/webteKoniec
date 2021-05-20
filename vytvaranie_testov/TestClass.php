<?php


class TestClass
{
    private int $id;
    private int $ucitel_id;
    private string $test_id;
    private string $date;
    private string $name;
    private int $time;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getUcitelId(): int
    {
        return $this->ucitel_id;
    }

    /**
     * @param int $ucitel_id
     */
    public function setUcitelId(int $ucitel_id): void
    {
        $this->ucitel_id = $ucitel_id;
    }

    /**
     * @return string
     */
    public function getTestId(): string
    {
        return $this->test_id;
    }

    /**
     * @param string $test_id
     */
    public function setTestId(string $test_id): void
    {
        $this->test_id = $test_id;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getTime(): int
    {
        return $this->time;
    }

    /**
     * @param int $time
     */
    public function setTime(int $time): void
    {
        $this->time = $time;
    }


}