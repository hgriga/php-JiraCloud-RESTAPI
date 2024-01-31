<?php

namespace JiraCloud\Issue;

use DateTimeInterface;

class Version implements \JsonSerializable
{
    public string $self;

    public string $id;

    /** Version name: ex: 4.2.3 */
    public ?string $name;

    /** version description: ex; improvement performance */
    public ?string $description;

    public bool $archived;

    public bool $released;

    public string $releaseDate;

    public bool $overdue;

    public ?string $userReleaseDate;

    public string $projectId;

    public ?string $startDate;
    public ?string $userStartDate;

    public function __construct($name = null)
    {
        $this->name = $name;
    }

    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return array_filter(get_object_vars($this));
    }

    public function setProjectId(string $id): self
    {
        $this->projectId = $id;

        return $this;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function setArchived(bool $archived): self
    {
        $this->archived = $archived;

        return $this;
    }

    public function setReleased(bool $released): self
    {
        $this->released = $released;

        return $this;
    }

    public function setReleaseDateAsDateTime(DateTimeInterface $releaseDate, string $format = 'Y-m-d'): self
    {
        $this->releaseDate = $releaseDate->format($format);

        return $this;
    }

    public function setReleaseDateAsString(string $releaseDate): self
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    public function setUserReleaseDate(string $userReleaseDate): self
    {
        $this->userReleaseDate = $userReleaseDate;

        return $this;
    }

    public function setStartDateAsDateTime(\DateTimeInterface $startDate, string $format = 'Y-m-d'): self
    {
        $this->startDate = $startDate->format($format);

        return $this;
    }

    public function setStartDateAsString(?string $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function setUserStartDateAsDateTime(\DateTimeInterface $userStartDate, string $format = 'Y-m-d'): self
    {
        $this->userStartDate = $userStartDate->format($format);

        return $this;
    }

    public function setUserStartDateAsString(?string $userStartDate): self
    {
        $this->userStartDate = $userStartDate;

        return $this;
    }
}
