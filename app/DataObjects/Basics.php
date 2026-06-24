<?php

namespace App\DataObjects;

readonly class Basics
{
    public function __construct(
        public string $name = '',
        public string $label = '',
        public string $image = '',
        public string $email = '',
        public string $phone = '',
        public string $url = '',
        public string $summary = '',
        public ?Location $location = null,
        public array $profiles = [],
    ) {}

    public static function fromArray(array $data): self
    {
        $location = Location::fromArray($data['location'] ?? []);
        $profiles = [];
        if (isset($data['profiles']) && is_array($data['profiles'])) {
            foreach ($data['profiles'] as $profile) {
                $profiles[] = SocialProfile::fromArray($profile);
            }
        }

        return new self(
            name: $data['name'] ?? '',
            label: $data['label'] ?? '',
            image: $data['image'] ?? '',
            email: $data['email'] ?? '',
            phone: $data['phone'] ?? '',
            url: $data['url'] ?? '',
            summary: $data['summary'] ?? '',
            location: $location,
            profiles: $profiles,
        );
    }
}
