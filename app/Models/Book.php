<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'isbn',
        'title',
        'author',
        'description',
        'categories',
        'publisher',
        'publication_date',
        'pages',
        'cover',
        'available',
    ];
    
    protected function casts(): array
    {
        return [
            'publication_date' => 'datetime',
            'categories' => 'array',
            'pages' => 'integer',
            'available' => 'boolean',
        ];
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'book_id');
    }
}
