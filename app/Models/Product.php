<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string name
 * @property int stock
 * @property float price
 * @property float total_price
 */
class Product extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
      'name',
      'stock',
      'price',
      'total_price',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'stock'       => 'integer',
        'price'       => 'decimal:2',
        'total_price' => 'decimal:2',
    ];

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'id'          => $this->getKey(),
            'name'        => $this->name,
            'stock'       => $this->stock,
            'price'       => '€ ' . number_format($this->price, 2, ',', '.'),
            'total_price' => '€ ' . number_format($this->total_price, 2, ',', '.'),
        ];
    }
}
