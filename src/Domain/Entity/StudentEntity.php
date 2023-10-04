<?php

namespace CleanArquiteture\Entity;
use CleanArquiteture\Entity\Email;

class StudentEntity
{
    private int $id;
    private string $cpf;
    private string $name;

    private Email $email;

    public function __construct() { }
	
    /**
	 * @return string
	 */
	public function getName(): string {
		return $this->name;
	}
	
	/**
	 * @param string $name
	 * @return self
	 */
	public function setName(string $name): self {
		$this->name = $name;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getCpf(): string {
		return $this->cpf;
	}
	
	/**
	 * @param string $cpf
	 * @return self
	 */
	public function setCpf(string $cpf): self {
		$this->cpf = $cpf;
		return $this;
	}
}