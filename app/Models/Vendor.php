<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
// use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vendor extends Authenticatable
{
    use HasApiTokens,Notifiable;
    use SoftDeletes;

    protected $guard = 'vendor';
   
    protected $table = 'vendors';
    protected $dates = ['deleted_at'];
    protected $fillable = 
    [
    'badanusaha_id',
    'namaperusahaan', 
    'kode',
    'terms',
    'alamat', 
    'provinsi_id',
    // 'alamat_domisili',
    'npwp',
    'product', 
    // 'jenisusaha_id', 
    // 'category_id', 
    // 'lokasi_id', 
    'email', 
    'contactperson',     
    'notelp',
    'handphone',
    'alternative_person',
    'alternative_phone',
    'website',
    'catatan',
    'image',
    'is_published',
    'password',
    'is_email_verified'
    ];

    protected $hidden = [
        'password', 
        'remember_token'
    ];

    protected $casts = [
        'notelp' => 'array',
        'email_verified_at' => 'datetime',
    ];

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($vendor) {
    //         if(is_null($vendor->user_id)) {
    //             $vendor->user_id = auth()->user()->id;
    //         }
    //     });

    // }

    public function scopePublished($query)
    {
        return $query->where(['is_published'], true);
    }

    public function scopeDrafted($query)
    {
        return $query->where(['is_published'], false);
    }
 
    public function getPublishedAttribute()
    {
        return ([$this->is_published]) ? 'Yes' : 'No';
    }

    public function serviceorders()
    {
        return $this->hasMany('App\Models\SO\serviceorder');
    }
    
    public function doheaders()
    {
        return $this->hasMany('App\Models\Transaksi\Doheader');
    }

    public function itemdetails(){
        return $this->hasMany('App\Models\Itemdetail');
    }

    public function jenisusahas(){
        return $this->belongsToMany('App\Models\Jenisusaha');
    }

    public function jenispekerjaans(){
        return $this->belongsToMany('App\Models\Jenispekerjaan');
    }

    public function categories(){
        return $this->belongsToMany('App\Models\Category');
    }

    // public function lokasi(){
    //     return $this->belongsTo('App\Models\Lokasi');
    // }

    public function banego(){
        return $this->hasMany('App\Models\Banego');
    }

    public function badanusaha(){
        return $this->belongsTo('App\Models\Badanusaha');
    }

    public function bank(){
        return $this->belongsTo('App\Models\Bank');
    }

    public function provinsi(){
        return $this->belongsTo('App\Models\Provinsi');
    }

    public function barangs(){
        return $this->hasMany('App\Models\Barang');
    }

    public function hargabarangs(){
        return $this->hasMany('App\Models\Hargabarang');
    }

    public function vendorkontrak(){
        return $this->hasMany('App\Models\Vendorkontrak');
    }

    public function vendormaillogs(){
        return $this->hasMany('App\Models\Vendormaillog');
    }

    public function barangmaintenance(){
        return $this->hasMany('App\Models\Barangmaintenance');
    }

    
    public function tender()
    {
        return $this->hasMany('App\Models\Pengadaan\Tender');
    }

    public function tenderpenawaran()
    {
        return $this->hasMany('App\Models\Pengadaan\Tenderpenawaran');
    }

    public function rekappos()
    {
        return $this->hasMany('App\Models\Po\Rekappo');
    }

    public function poheader()
    {
        return $this->hasMany('App\Models\Po\Poheader');
    }

    public function vendorverify()
    {
        return $this->hasMany('App\Models\VendorVerify');
    }
    // public function user()
    // {
    //     return $this->belongsTo('App\Models\User');
    // }

    public function banegopengadaans()
    {
        return $this->hasMany('App\Models\Pengadaan\Banego\Banegopengadaan');
    }

    public function vendorbod()
    {
        return $this->hasMany('App\Models\Vendorbod');
    }

    public function vendordoc()
    {
        return $this->hasMany('App\Models\Vendordoc');
    }

    public function vendorbank()
    {
        return $this->hasMany('App\Models\Vendorbank');
    }

    public function vendorlisensi()
    {
        return $this->hasMany('App\Models\Vendorlisensi');
    }

    public function vendorpengurus()
    {
        return $this->hasMany('App\Models\Vendorpengurus');
    }

    public function vendorlap()
    {
        return $this->hasMany('App\Models\Vendorlap');
    }

    public function vendorfasilitas()
    {
        return $this->hasMany('App\Models\Vendorfasilitas');
    }

    public function vendorsertifikat()
    {
        return $this->hasMany('App\Models\Vendorsertifikat');
    }

    public function vendortenaga()
    {
        return $this->hasMany('App\Models\Vendortenaga');
    }

    public function vendorpengalaman()
    {
        return $this->hasMany('App\Models\Vendorpengalaman');
    }

    // public function vendorklasifikasi()
    // {
    //     return $this->hasMany('App\Models\Vendorklasifikasi');
    // }

    // public function vendorsubkla()
    // {
    //     return $this->hasMany('App\Models\Vendorsubkla');
    // }

}
