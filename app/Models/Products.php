<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'Name', 'Color', 'Size','Price','Gender', 'Date','Weight','Image' , 'Desc' , 'Status', 'Order_status', 'Fabric_ID ', 'Model_ID',  'Sewing_ID ',   'Catagories_ID'];

}


