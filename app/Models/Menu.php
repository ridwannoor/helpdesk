<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';
    protected $fillable = ['parent_id','deskripsi','icon', 'link'];


    public function parent()
    {
        return $this->belongsTo('App\Models\Menu', 'parent_id');
    }
     
    public function childs()
    {
     
        return $this->hasMany('App\Models\Menu', 'parent_id', 'id');
    }
     
    // public static function tree()
    // {
    //     return static::with(implode('.', array_fill(0, 100, 'children')))->where('parentmenu', '=', '0')->orderBy('sort_order')->get();
    // }

    public function userdetails()
    {
        return $this->hasMany('App\Models\Userdetail');
    }
    
}
