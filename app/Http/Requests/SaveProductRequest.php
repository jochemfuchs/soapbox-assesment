<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveProductRequest extends FormRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'name'        => 'required|string',
            'stock'       => 'required|integer',
            'price'       => 'required|numeric',
            'total_price' => 'required|numeric',
        ];
    }

    /**
     * @return array
     */
    public function getProduct(): array
    {
        return [
            'name'        => $this->get('name'),
            'stock'       => (int) $this->get('stock'),
            'price'       => number_format($this->get('price'), 2),
            'total_price' => number_format($this->get('total_price'), 2),
        ];
    }
}