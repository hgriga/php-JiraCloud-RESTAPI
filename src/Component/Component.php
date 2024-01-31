<?php

namespace JiraCloud\Component;

use JiraCloud\AssigneeTypeEnum;
use JiraCloud\ClassSerialize;
use JiraCloud\User\User;

/**
 * Class Component.
 *
 *
 * @see https://docs.atlassian.com/jira/REST/server/#api/2/component
 */
class Component implements \JsonSerializable
{
    use ClassSerialize;

    /** uri which was hit.  */
    public string $self;

    public string $id;

    public string $name;

    public string $description;

    public ?User $lead;

    public string $leadUserName;

    public string $assigneeType;

    public int $projectId;

    public string $project;

    public bool $isAssigneeTypeValid;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function setDescription($description): self
    {
        $this->description = $description;

        return $this;
    }

    public function setLeadUserName(string $leadUserName): self
    {
        $this->leadUserName = $leadUserName;

        return $this;
    }

    public function setAssigneeType(string $assigneeType): self
    {
        $this->assigneeType = $assigneeType;

        return $this;
    }

    public function setAssigneeTypeAsEnum(AssigneeTypeEnum $assigneeType): self
    {
        $this->assigneeType = $assigneeType->type();

        return $this;
    }

    public function setProjectKey(string $projectKey): self
    {
        $this->project = $projectKey;

        return $this;
    }

    public function setProject(string $project): self
    {
        $this->project = $project;

        return $this;
    }

    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        $vars = array_filter(get_object_vars($this), function ($var) {
            return !is_null($var);
        });

        return $vars;
    }
}
