<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
     protected $fillable = ['codeproduct','codejenis','jenis','desc','price','image1','b','total','subtotal'];
}
