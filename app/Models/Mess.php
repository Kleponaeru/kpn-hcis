<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
class Mess extends Model
{
    use HasFactory, HasUuids, SoftDeletes;
    protected $table = 'mess_transactions';

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'user_id', 'id');
    }
    public function businessTrip()
    {
        return $this->belongsTo(BusinessTrip::class, 'no_sppd', 'no_sppd');
    }

    protected $fillable = [
        'no_mess',
        'user_id',
        'unit',
        'no_sppd',
        'nama_mess',
        'lokasi_mess',
        'jmlkmr_mess',
        'bed_mess',
        'tgl_masuk_mess',
        'tgl_keluar_mess',
        'total_hari',
        'approval_status',
        'hotel_only',
        'reject_info',
        'manager_l1_id',
        'manager_l2_id',
        'contribution_level_code',
        'no_sppd_mess',
    ];

    public function getManager1FullnameAttribute()
    {
        // Get the associated BusinessTrip record
        $businessTrip = $this->businessTrip;
        if ($businessTrip && $businessTrip->manager1) {
            return $businessTrip->manager1->fullname;
        }
        return '-';
    }

    // Relationship to Employee through BusinessTrip for Manager 2
    public function getManager2FullnameAttribute()
    {
        // Get the associated BusinessTrip record
        $businessTrip = $this->businessTrip;
        if ($businessTrip && $businessTrip->manager2) {
            return $businessTrip->manager2->fullname;
        }
        return '-';
    }
    public function latestApprovalL1()
    {
        return $this->hasOne(HotelApproval::class, 'mess_id', 'id')
            ->where('layer', 1)
            ->where('approval_status', 'Pending L2')
            ->latest('approved_at');
    }
    public function latestApprovalL2()
    {
        return $this->hasOne(HotelApproval::class, 'mess_id', 'id')
            ->where('layer', 2)
            ->where('approval_status', 'Approved')
            ->latest('approved_at');
    }

    public function latestApprovalL1Id()
    {
        return $this->belongsTo(Employee::class, 'user_id', 'id')->select('manager_l1_id');
    }

    public function getManagerL1Fullname()
    {
        $managerL1Id = $this->latestApprovalL1Id?->manager_l1_id;
        if ($managerL1Id) {
            return Employee::where('employee_id', $managerL1Id)->value('fullname') ?? '-';
        }
        return '-';
    }
    public function latestApprovalL2Id()
    {
        return $this->belongsTo(Employee::class, 'user_id', 'id')->select('manager_l2_id');
    }

    public function getManagerL2Fullname()
    {
        $managerL2Id = $this->latestApprovalL2Id?->manager_l2_id;
        if ($managerL2Id) {
            return Employee::where('employee_id', $managerL2Id)->value('fullname') ?? '-';
        }
        return '-';
    }
    public function latestApprovalL1Name()
    {
        return $this->belongsTo(Employee::class, 'manager_l1_id', 'employee_id')->select('fullname');
    }
    public function latestApprovalL2Name()
    {
        return $this->belongsTo(Employee::class, 'manager_l2_id', 'employee_id')->select('fullname');
    }
    public function hotelApproval()
    {
        return $this->hasOne(HotelApproval::class, 'htl_id', 'id');
    }
}
