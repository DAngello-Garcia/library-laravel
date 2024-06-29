<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'book_id',
        'reservation_date',
        'reservation_end',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'reservation_date' => 'datetime',
            'reservation_end' => 'datetime',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
}