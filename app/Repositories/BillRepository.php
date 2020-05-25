<?php
namespace App\Repositories;

interface BillRepository extends Repository
{
    public function getTrash();
}