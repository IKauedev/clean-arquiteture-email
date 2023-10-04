<?php

namespace CleanArquiteture\Entity;
use CleanArquiteture\Entity\EmailEntity;

class StudentEntity
{
	/**
	 * Summary of id
	 * @var int
	 */
    private int $id;
    private string $cpf;
	  /**
	   * Summary of name
	   * @var string
	   */
    private string $name;

	/**
	 * Summary of email
	 * @var EmailEntity
	 */
    private EmailEntity $email;

 /**
  * Summary of phone
  * @var string
  */
	private string $phone;

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

	/**
	 * @return EmailEntity
	 */
	public function getEmail(): EmailEntity {
		return $this->email;
	}
	
	/**
	 * @param EmailEntity $email
	 * @return self
	 */
	public function setEmail(EmailEntity $email): self {
		$this->email = $email;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getPhone(): string {
		return $this->phone;
	}
	
	/**
	 * @param string $phone
	 * @return self
	 */
	public function setPhone(string $phone): self {
		$this->phone = $phone;
		return $this;
	}
}