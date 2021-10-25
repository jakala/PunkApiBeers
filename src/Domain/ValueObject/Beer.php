<?php

declare(strict_types=1);

namespace App\Domain\ValueObject;

final class Beer
{
    public function __construct(
        private Id $id,
        private Name $name,
        private Description $description,
        private Image $image,
        private Tagline $tagline,
        private FirstBrewed $firstBrewed
    ) {
    }

    public function id(): Id
    {
        return $this->id;
    }

    public function name(): Name
    {
        return $this->name;
    }

    public function description(): Description
    {
        return $this->description;
    }

    public function image(): Image
    {
        return $this->image;
    }

    public function tagline(): Tagline
    {
        return $this->tagline;
    }

    public function firstBrewed(): FirstBrewed
    {
        return $this->firstBrewed;
    }
}
