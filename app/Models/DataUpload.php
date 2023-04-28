<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;

class DataUpload extends Model
{
    use HasFactory, LogsActivity;
    protected $fillable = [
        'multiplier_default',
        'name',
        'quantity',
        'product_id',
        'price_each',
        'printing',
        'total',
    ];

    protected $casts = [
        'quantity' => 'integer',
    ];

    
    protected static $logAttributes = ['product_id','quantity','price_each'];
    protected static $ignoreChangeAttributes = ['product_id','quantity','price_each'];
    protected static $recordEvents = ['created','updated','deleted'];

    public function getDescriptionForEvent(string $eventName): string
    {
        return "Card have been {$eventName}";
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['product_id','quantity','price_each']);
        
        // Chain fluent methods for configuration options
    }

    public function product()
    {
        return $this->hasOne(Product::class, 'tcgplayer_id', 'product_id');
    }
    public function log()
    {
        return $this->hasMany(Activity::class, 'subject_id');
    }

}
