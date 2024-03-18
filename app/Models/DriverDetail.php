<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverDetail extends Model

{

    protected  $table = 'driver_details';
    protected $primaryKey ='id';
    protected $fillable = ['employee_id', 'driving_license_number', 'background_check_report', 'other_documents', 'picture'];
    use HasFactory;
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
