<?php

namespace App\Services;

use App\Repositories\UsersRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;


class usersService
{

    protected $usersRepository;


    public function __construct(UsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }

    public function getAll(){
        return   $this->usersRepository->all();
    }


}