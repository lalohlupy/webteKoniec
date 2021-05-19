<?php


class CodeClass
{
    private int $id;
    private string $test_code;

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
     * @return string
     */
    public function getTestCode(): string
    {
        return $this->test_code;
    }

    /**
     * @param string $test_code
     */
    public function setTestCode(string $test_code): void
    {
        $this->test_code = $test_code;
    }

}