<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vanceleather extends Model
{
    use HasFactory;
    protected $fillable = [
        'id','Handle', 'Title', 'Body (HTML)', 'Vendor', 'Product Category', 'Type', 'Tags', 'Published', 'Option1 Name', 'Option1 Value', 'Option2 Name', 'Option2 Value', 'Option3 Name', 'Option3 Value', 'Variant SKU', 'Variant Inventory Tracker', 'Image Src', 'Image Position', 'Image Alt Text', 'Gift Card', 'SEO Title', 'Variant Image', 'Variant Weight Unit', 'Compare At Price / International', 'Status',
    ];
}
