<?php

namespace JiraCloud\Issue;

class VersionIssueCounts implements \JsonSerializable
{
    public string $self;

    public int $issuesFixedCount;

    public int $issuesAffectedCount;

    public int $issueCountWithCustomFieldsShowingVersion;

    /** @var \JiraCloud\Issue\CustomFieldUsage[] */
    public array $customFieldUsage;

    public function __construct()
    {
    }

    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return array_filter(get_object_vars($this));
    }

    public function setSelf(string $self): self
    {
        $this->self = $self;

        return $this;
    }

    public function setIssuesFixedCount(int $issuesFixedCount): self
    {
        $this->issuesFixedCount = $issuesFixedCount;

        return $this;
    }

    public function setIssuesAffectedCount(int $issuesAffectedCount): self
    {
        $this->issuesAffectedCount = $issuesAffectedCount;

        return $this;
    }

    public function setIssueCountWithCustomFieldsShowingVersion(int $issueCountWithCustomFieldsShowingVersion): self
    {
        $this->issueCountWithCustomFieldsShowingVersion = $issueCountWithCustomFieldsShowingVersion;

        return $this;
    }

    public function setCustomFieldUsage(array $customFieldUsage): self
    {
        $this->customFieldUsage = $customFieldUsage;

        return $this;
    }
}
