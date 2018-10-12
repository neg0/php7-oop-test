<?php
namespace App\Model\Http\Token;

use App\Model\ArrayCollection;

final class AuthToken implements AuthTokenInterface, ArrayCollection
{
    /**
     * @var string
     */
    protected $accessToken;

    /**
     * @var integer
     */
    protected $expiresIn;

    /**
     * @var string
     */
    protected $tokenType;

    /**
     * @var string
     */
    protected $scope;

    private function __construct(
        string $accessToken,
        int $expiresIn,
        string $tokenType,
        string $scope
    ) {
        $this->accessToken = $accessToken;
        $this->expiresIn = $expiresIn;
        $this->tokenType = $tokenType;
        $this->scope = $scope;
    }

    public static function createFrom(array $data): self
    {
        return new self(
            $data[self::FIELD_ACCESS_TOKEN],
            $data[self::FIELD_EXPIRES_IN],
            $data[self::FIELD_TOKEN_TYPE],
            $data[self::FIELD_SCOPE]
        );
    }

    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    public function getExpiresIn(): int
    {
        return $this->expiresIn;
    }

    public function getTokenType(): string
    {
        return $this->tokenType;
    }

    public function getScope(): string
    {
        return $this->scope;
    }
}
