<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApprovalProcess extends Model
{
    protected  $table = 'approval_process';
    protected $primaryKey ='id';
    protected $fillable = ['driver_id', 'submitted_by', 'reviewed_by', 'status', 'approval_comments'];

    use HasFactory;
    public function driverDetail()
    {
        return $this->belongsTo(DriverDetail::class);
    }

    public function submittedByEmployee()
    {
        return $this->belongsTo(Employee::class, 'submitted_by');
    }

    public function reviewedByEmployee()
    {
        return $this->belongsTo(Employee::class, 'reviewed_by');
    }
}
