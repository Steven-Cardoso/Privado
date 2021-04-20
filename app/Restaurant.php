<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
     protected $guarded = []; 

     protected $appends = ['slug', 'ordersSlug'];

     /*public function owner()
     {
         return $this->belongsTo(User::class, 'owner_id');
     }
*/
     public function orders()  
     {
         return $this->hasMany(Order::class);
     }

     public function getSlugAttribute()
     {
        return route('restos.menu');
     }

     public function getOrdersSlugAttribute()
     {
        return route('restos.orders');
     }
}
