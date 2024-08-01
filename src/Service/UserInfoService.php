<?php
namespace App\Service;

use Symfony\Component\Security\Core\Security;
use App\Entity\User;

class UserInfoService
{
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    public function getUserInfo(): ?array
    {
        /** @var User $user */
        $user = $this->security->getUser();

        if (!$user) {
            return null;
        }

        return [
            'id'        => $user->getId(),
            'firstname' => $user->getFirstname(),
            'lastname'  => $user->getLastname(),
            'email'     => $user->getEmail(),
            'roles'     => $user->getRoles(),
            'orders'    => $user->getOrders(),
            'carts'     => $user->getCarts(),
            'address'   => $user->getAddress(),
        ];
    }
}
