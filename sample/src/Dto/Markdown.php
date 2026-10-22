<?php

namespace App\Dto;

class Markdown
{
    private ?string $markdown = null;

    public function getMarkdown(): ?string
    {
        return $this->markdown;
    }

    public function setMarkdown(?string $markdown): self
    {
        $this->markdown = $markdown;

        return $this;
    }
}
