<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    protected $fillable = [
        'item', 'value', 'status_id', 'registered_at', 'finalized_at', 'user_id'
    ];

    protected $dates = ['registered_at', 'finalized_at'];

    public function status()
    {
        return $this->belongsTo(ProposalStatus::class, 'status_id');
    }

    public function logs()
    {
        return $this->hasMany(ProposalLog::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
