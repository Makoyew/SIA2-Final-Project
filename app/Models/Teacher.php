<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = ['last_name', 'first_name', 'address', 'email', 'phone', 'bdate', 'grade', 'rank', 'pic'];

    protected $casts = [
        'bdate' => 'date'
    ];

    protected $appends = ['formattedBDate','bdate2', 'pic_url'];

    public function getFormattedBDateAttribute() {
        return $this->bdate->format('F d, Y');
    }

    public function getBdate2Attribute() {
        return $this->bdate->format('Y-m-d');
    }

    public function getPicUrlAttribute() {
        $url = $this->pic ? asset('uploads/pic/' . $this->pic) : "https://cdn.vectorstock.com/i/preview-1x/75/37/teacher-thick-line-icon-vector-45687537.jpg";
        return $url;
    }

}
