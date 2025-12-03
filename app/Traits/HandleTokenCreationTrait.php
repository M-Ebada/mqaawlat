<?php

namespace App\Traits;

use DateTimeInterface;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Sanctum\NewAccessToken;

trait HandleTokenCreationTrait
{
    use HasApiTokens;

    public function setTokenLength(): int
    {
        return 500;
    }

    public function createToken(string $name, array $abilities = ['*'], DateTimeInterface $expiresAt = null): NewAccessToken
    {
        $token = $this->tokens()->create([
            'name' => $name,
            'token' => hash('sha256', $plainTextToken = Str::random($this->setTokenLength())),
            'abilities' => $abilities,
            'expires_at' => $expiresAt,
        ]);

        return new NewAccessToken($token, $plainTextToken);
    }

    public function createPlainAccessToken($key, $resource): array
    {
        return [
            "access_token" => $this->createToken("Login Token")->plainTextToken,
            $key => $resource
        ];
    }
}
