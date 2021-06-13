<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['code', 'user_id', 'expired_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeGenerateCode($query, $user)
    {

        if ($code = $this->codeCheckIsLife($user)) {
            $code = $code->code;
        } else {
            do {
                $code = random_int(100000, 999999);
            } while ($this->checkCodeIsUnique($user, $code));
            //store the code

            $user->codes()->create([
                'code' => $code,
                'expired_at' => now()->addMinute(2),
            ]);

        }
        return $code;

    }

    public function scopeVerifyCode($query, $user, $code)
    {
        return !!$user->codes()->whereCode($code)->where('expired_at', '>', now())->first();
    }

    private function checkCodeIsUnique($user, int $code)
    {
        return !!$user->codes()->where('code', $code)->first();
    }

    private function codeCheckIsLife($user)
    {
        return $user->codes()->where('expired_at', '>', now())->first();
    }

}