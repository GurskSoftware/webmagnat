<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['value'];

    /**
     * @var string
     */
    protected $table = 'questions';

    static function percentValue($total, $count)
    {
        $percent = round(($count / $total) * 100);

        return $percent;
    }
}
