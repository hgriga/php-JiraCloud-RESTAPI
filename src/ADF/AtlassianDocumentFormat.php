<?php

namespace JiraCloud\ADF;

use DH\Adf\Node\Block\Document;
use DH\Adf\Node\Node;

/**
 * Class AtlassianDocumentFormat.
 */
class AtlassianDocumentFormat implements \JsonSerializable
{
    public array $type;

    public array $content;

    public string $version;

    private ?Document $document = null;

    /**
     * @param Document|Node $document
     */
    public function __construct($document)
    {
        $this->document = $document;
    }

    #[\ReturnTypeWillChange]
    public function jsonSerialize(): array
    {
        return $this->document->jsonSerialize();
    }

    /**
     * @param Document|Node $document
     */
    public function setDocument($document)
    {
        $this->document = $document;
    }
}
