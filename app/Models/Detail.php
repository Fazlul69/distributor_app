<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;

    protected $fillable = [
        'website_logo',
        'dashboard_logo',
        'company_name',
        'login_logo',
        'address',
        'mobile_1',
        'mobile_2',
        'agent_1',
        'agent_2',
        'email_1',
        'email_2',
        'facebook_link',
        'whatsapp_link'
    ];
}
