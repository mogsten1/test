<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    public function makes()
    {
        return $this->belongsTo(Make::class, 'make_id');
    }

    public function years()
    {
        return $this->belongsTo(Year::class, 'year_id');
    }

    public function models()
    {
        return $this->belongsTo(CarModel::class, 'model_id');
    }

    public function bodies()
    {
        return $this->belongsTo(Body::class, 'body_id');
    }

    public function dealer()
    {
        return $this->belongsTo(Dealership::class, 'dealer_id');
    }

    public function current_condition()
    {
        return $this->belongsTo(Condition::class, 'current_condition_id');
    }

    public function last_transaction()
    {
        return $this->belongsTo(Transaction::class, 'last_transaction_id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'listing_id');
    }
}
