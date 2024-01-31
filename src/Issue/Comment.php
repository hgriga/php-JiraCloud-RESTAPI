<?php

namespace JiraCloud\Issue;

use DateTimeInterface;
use DH\Adf\Node\Block\Document;
use DH\Adf\Node\Node;

class Comment implements \JsonSerializable
{
    use VisibilityTrait;

    public string $self;

    public string $id;

    public Reporter $author;

    public array $body;

    public Reporter $updateAuthor;

    public ?DateTimeInterface $created;

    public ?DateTimeInterface $updated;

    public ?Visibility $visibility = null;

    public bool $jsdPublic;

    public string $renderedBody;

    /**
     * mapping function for json_mapper.
     *
     * @param \stdClass $body
     *
     * @return $this
     */
    public function setBody(\stdClass $body): self
    {
        $this->body = json_decode(json_encode($body), true);

        return $this;
    }

    /**
     * @param Document|Node $body
     */
    public function setBodyByAtlassianDocumentFormat($body): self
    {
        $this->body = $body->jsonSerialize();

        return $this;
    }

    public function jsonSerialize(): array
    {
        return array_filter(get_object_vars($this), function ($var) {
            return !is_null($var);
        });
    }
}
