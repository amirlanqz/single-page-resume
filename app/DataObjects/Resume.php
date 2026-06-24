<?php

namespace App\DataObjects;

readonly class Resume
{
    /**
     * @param  Work[]  $work
     * @param  Volunteer[]  $volunteer
     * @param  Education[]  $education
     * @param  Award[]  $awards
     * @param  Certificate[]  $certificates
     * @param  Publication[]  $publications
     * @param  Skill[]  $skills
     * @param  Language[]  $languages
     * @param  Interest[]  $interests
     * @param  Reference[]  $references
     * @param  Project[]  $projects
     */
    public function __construct(
        public ?Basics $basics = null,
        public array $work = [],
        public array $volunteer = [],
        public array $education = [],
        public array $awards = [],
        public array $certificates = [],
        public array $publications = [],
        public array $skills = [],
        public array $languages = [],
        public array $interests = [],
        public array $references = [],
        public array $projects = [],
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            basics: isset($data['basics']) ? Basics::fromArray($data['basics']) : null,
            work: isset($data['work']) ? array_map(fn (array $item) => Work::fromArray($item), $data['work']) : [],
            volunteer: isset($data['volunteer']) ? array_map(fn (array $item) => Volunteer::fromArray($item), $data['volunteer']) : [],
            education: isset($data['education']) ? array_map(fn (array $item) => Education::fromArray($item), $data['education']) : [],
            awards: isset($data['awards']) ? array_map(fn (array $item) => Award::fromArray($item), $data['awards']) : [],
            certificates: isset($data['certificates']) ? array_map(fn (array $item) => Certificate::fromArray($item), $data['certificates']) : [],
            publications: isset($data['publications']) ? array_map(fn (array $item) => Publication::fromArray($item), $data['publications']) : [],
            skills: isset($data['skills']) ? array_map(fn (array $item) => Skill::fromArray($item), $data['skills']) : [],
            languages: isset($data['languages']) ? array_map(fn (array $item) => Language::fromArray($item), $data['languages']) : [],
            interests: isset($data['interests']) ? array_map(fn (array $item) => Interest::fromArray($item), $data['interests']) : [],
            references: isset($data['references']) ? array_map(fn (array $item) => Reference::fromArray($item), $data['references']) : [],
            projects: isset($data['projects']) ? array_map(fn (array $item) => Project::fromArray($item), $data['projects']) : [],
        );
    }
}
