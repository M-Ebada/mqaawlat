<?php

namespace App\Models;

use App\Enums\AdminEnum;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Permission\Traits\HasRoles;
use App\Traits\HandleTokenCreationTrait;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\Admin\AdminResetPasswordNotification;
use App\Notifications\Admin\AdminVerificationEmailNotification;

class Admin extends Authenticatable implements MustVerifyEmail, HasMedia
{
    use HandleTokenCreationTrait, HasFactory, Notifiable, InteractsWithMedia, HasRoles;

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token): void
    {
        $this->notify(new AdminResetPasswordNotification($token));
    }

    public function sendEmailVerificationNotification(): void
    {
        $this->notify(new AdminVerificationEmailNotification());
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection(AdminEnum::ADMIN_PROFILE_IMAGE_COLLECTION->name)->singleFile();
    }

    public function profileImage(): Attribute
    {
        return Attribute::get(function () {
            if($this->hasMedia(AdminEnum::ADMIN_PROFILE_IMAGE_COLLECTION->name)){
                return $this->getFirstMediaUrl(AdminEnum::ADMIN_PROFILE_IMAGE_COLLECTION->name);
            }
            return asset('logo.png');
        });
    }

    public function role()
    {
        $this->hasMany(Role::class, 'model_id');
    }

}
