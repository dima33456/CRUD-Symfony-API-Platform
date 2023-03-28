<?php

namespace App\Entity;


use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use App\Controller\UserController;
use Doctrine\ORM\Mapping as ORM;



#[ApiResource(
    operations:
    array(
        new post(uriTemplate:'/users',
            controller: UserController::class,
            name:'post'),
        new get(uriTemplate:'/users/{id}',
            controller: UserController::class,
            name:'get'),
        new GetCollection(uriTemplate:'/users',
            controller: UserController::class,
            name:'gets'),
        new Put(uriTemplate:'/users/{id}',
            controller: UserController::class,
            name:'put'),
        new patch(uriTemplate:'/users/{id}',
            controller: UserController::class,
            name:'update'),
        new Delete(uriTemplate:'/users/{id}',
            controller: UserController::class,
            name:'delete')
    ))]

#[ORM\Entity]
class User
{
    #[ORM\Id]
    #[ORM\Column(type: "integer")]
    #[ORM\GeneratedValue(strategy: "AUTO")]
    private ?int $id = null;

    #[ORM\Column]
    private ?string $email = null;
    #[ORM\Column]
    private ?string $name = null;
    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }



    // метод для преобразования объекта в массив
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,

        ];
    }
}

