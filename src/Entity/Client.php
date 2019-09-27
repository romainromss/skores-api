<?php

declare(strict_types = 1);

/*
 * This file is part of the skores-api project.
 *
 * (c) Romain Bayette <romain.romss@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Client
 *
 * @author Romain Bayette <romainromss@posteo.net>
 *
 * @ORM\Entity(repositoryClass="App\Repository\ClientRepository")
 * @ORM\Table(name="Client")
 */
class Client extends AbstractEntity implements UserInterface
{
    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $username;
    
    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $name;
    
    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $lastname;
    
    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $password;
    
    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $email;
    
    /**
     * @var array
     *
     * @ORM\Column(type="array")
     */
    protected $role;

    /**
     * Client constructor.
     *
     * @param string $username
     * @param string $name
     * @param string $lastname
     * @param string $password
     * @param string $email
     *
     * @throws \Exception
     */
    public function __construct(
        string $username,
        string $name,
        string $lastname,
        string $password,
        string $email
    ) {
        $this->username = $username;
        $this->name = $name;
        $this->lastname = $lastname;
        $this->password = $password;
        $this->email = $email;
        $this->role = ['ROLE_CLIENT'];
        parent::__construct();
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return array|string
     */
    public function getRoles()
    {
       return $this->role;
    }

    public function getSalt()
    {
       return;
    }

    public function eraseCredentials()
    {

    }
}
