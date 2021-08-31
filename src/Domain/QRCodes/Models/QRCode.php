<?php

namespace Domain\QRCodes\Models;

use Domain\QRCodes\QueryBuilders\QRCodeQueryBuilder;
use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class QRCode extends Model implements HasMedia
{
    use LogsActivity;
    use InteractsWithMedia;

    protected $table = 'qr_codes';

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

    public function newEloquentBuilder($query): QRCodeQueryBuilder
    {
        return new QRCodeQueryBuilder($query);
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('qr')
            ->singleFile();
    }
}
