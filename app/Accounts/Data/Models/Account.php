<?php

namespace App\Accounts\Data\Models;

use App\Accounts\Data\Factories\AccountFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $table = 'tb_contas';
    protected $primaryKey = 'conta_id';
    public $timestamps = false;

    protected static function newFactory(): AccountFactory
    {
        return new AccountFactory;
    }
}
