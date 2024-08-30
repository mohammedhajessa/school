<?php
namespace App\Repository;
interface StudentsPromotionRepositoryInterface{
    public function  index();
    public function  store($request);
    public function  create();
    public function  rolback($request);
}

