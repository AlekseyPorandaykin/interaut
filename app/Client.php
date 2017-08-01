<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';
    protected $fillable = ['id', 'name_legal_entity', 'legal_address', 'actual_address', 'ogrn', 'inn', 'kpp', 'okpo', 'okved', 'payment_account', 'correspondent_account', 'bank', 'bik', 'general_director', 'manager', 'phone', 'contract_number', 'date'];
}
