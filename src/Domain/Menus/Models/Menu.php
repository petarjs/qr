<?php

namespace Domain\Menus\Models;

use Domain\Companies\Models\Company;
use Domain\Users\Models\User;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Menu extends Model
{
    use LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [

    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [

    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll();
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function menuItemGroups()
    {
        return $this->hasMany(MenuItemGroup::class)->orderBy('order');
    }
}
