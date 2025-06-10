<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProposalLog extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'proposal_id',
        'user_id',
        'status_id',
        'action',
        'notes',
        'logged_at'
    ];

    protected $dates = ['logged_at'];

    public function proposal()
    {
        return $this->belongsTo(Proposal::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        return $this->belongsTo(\App\Models\ProposalStatus::class, 'status_id');
    }
}

