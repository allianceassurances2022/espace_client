<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['id', 'devis_id', 'montant', 'orderNumber','orderId', 'ErrorCode', 'respCode_desc'];

  protected $table = 'order';
}
