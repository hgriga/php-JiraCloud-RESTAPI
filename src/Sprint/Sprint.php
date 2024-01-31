<?php

declare(strict_types=1);

namespace JiraCloud\Sprint;

use JiraCloud\JsonSerializableTrait;

class Sprint implements \JsonSerializable
{
    use JsonSerializableTrait;

    public string $self;

    public int $id;

    public string $name;

    public string $state;
    public string $startDate;

    public string $endDate;

    public string $activatedDate;

    public string $completeDate;

    public int $originBoardId;

    public string $goal;

    public ?string $rankBeforeIssue;
    public ?string $rankAfterIssue;
    public int $rankCustomFieldId;

    public array $issues;

    public function setNameAsString(string $sprintName): self
    {
        $this->name = $sprintName;

        return $this;
    }

    public function setGoalAsString(string $sprintGoal): self
    {
        $this->goal = $sprintGoal;

        return $this;
    }

    /**
     * @param string|int $originBoardId
     */
    public function setOriginBoardIdAsStringOrInt($originBoardId): self
    {
        $this->originBoardId = $originBoardId;

        return $this;
    }

    public function setStartDateAsDateTime(\DateTimeInterface $startDate, string $format = 'Y-m-d'): self
    {
        $this->startDate = $startDate->format($format);

        return $this;
    }

    public function setStartDateAsString(string $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function setEndDateAsDateTime(\DateTimeInterface $endDate, string $format = 'Y-m-d'): self
    {
        $this->endDate = $endDate->format($format);

        return $this;
    }

    public function setEndDateAsString(string $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function setMoveIssues(array $issues): self
    {
        $this->issues = $issues;

        return $this;
    }
}
