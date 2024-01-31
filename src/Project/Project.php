<?php

namespace JiraCloud\Project;

use JiraCloud\AssigneeTypeEnum;
use JiraCloud\ClassSerialize;
use JiraCloud\JiraException;

class Project implements \JsonSerializable
{
    use ClassSerialize;

    /**
     * return only if Project query by key(not id).
     */
    public string $expand;

    /**
     * Project URI.
     */
    public string $self;

    /**
     * Project id.
     */
    public string $id;

    /**
     * Project key.
     */
    public ?string $key;

    /**
     * Project name.
     */
    public string $name;

    /**
     * avatar URL.
     */
    public \stdClass $avatarUrls;

    /**
     * Project category.
     */
    public \stdClass $projectCategory;

    public ?string $description = null;

    // Project leader info.
    public array $lead;

    private string $leadName;

    /**
     * The account ID of the project lead.
     *
     * @var string
     */
    public string $leadAccountId;

    /**
     * ComponentList [\JiraCloud\Project\Component].
     *
     * @var \JiraCloud\Project\Component[]
     */
    public $components;

    /**
     * IssueTypeList [\JiraCloud\Issue\IssueType].
     *
     * @var \JiraCloud\Issue\IssueType[]
     */
    public $issueTypes;

    public ?string $assigneeType;

    public ?array $versions = [];

    public ?array $roles;

    public string $url;

    public string $projectTypeKey;

    public ?string $projectTemplateKey;

    public int $avatarId;

    public int $issueSecurityScheme;

    public int $permissionScheme;

    public int $notificationScheme;

    public int $categoryId;

    public int $workflowScheme;

    public int $issueTypeScreenScheme;

    public int $issueTypeScheme;

    public int $fieldConfigurationScheme;

    public string $simplified;

    public string $style;

    public bool $isPrivate;

    public array $properties;

    public string $entityId;

    public string $uuid;

    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        $params = array_filter(get_object_vars($this), function ($var) {
            return !is_null($var);
        });
        if (!empty($this->leadName)) {
            $params['lead'] = $this->leadName;
            unset($params['leadName']);
        }
        if ($this->versions === null or count($this->versions) === 0) {
            unset($params['versions']);
        }

        return $params;
    }

    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function setKey(string $key): self
    {
        $this->key = $key;

        return $this;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function setAvatarUrls(\stdClass $avatarUrls): self
    {
        $this->avatarUrls = $avatarUrls;

        return $this;
    }

    public function setProjectCategory(\stdClass $projectCategory): self
    {
        $this->projectCategory = $projectCategory;

        return $this;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function setLeadName(string $leadName): self
    {
        $this->leadName = $leadName;

        return $this;
    }

    public function setLeadAccountId(string $leadAccountId): self
    {
        $this->leadAccountId = $leadAccountId;

        return $this;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function setProjectTypeKey(string $projectTypeKey): self
    {
        $this->projectTypeKey = $projectTypeKey;

        return $this;
    }

    public function setProjectTemplateKey(string $projectTemplateKey): self
    {
        $this->projectTemplateKey = $projectTemplateKey;

        return $this;
    }

    public function setAvatarId(int $avatarId): self
    {
        $this->avatarId = $avatarId;

        return $this;
    }

    public function setIssueSecurityScheme(int $issueSecurityScheme): self
    {
        $this->issueSecurityScheme = $issueSecurityScheme;

        return $this;
    }

    public function setPermissionScheme(int $permissionScheme): self
    {
        $this->permissionScheme = $permissionScheme;

        return $this;
    }

    public function setNotificationScheme(int $notificationScheme): self
    {
        $this->notificationScheme = $notificationScheme;

        return $this;
    }

    public function setCategoryId(int $categoryId): self
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    /**
     * $assigneeType value available for "PROJECT_LEAD" and "UNASSIGNED".
     */
    public function setAssigneeType(?string $assigneeType): self
    {
        if (!in_array($assigneeType, ['PROJECT_LEAD', 'UNASSIGNED'])) {
            throw new JiraException('invalid assigneeType:'.$assigneeType);
        }

        $this->assigneeType = $assigneeType;

        return $this;
    }

    public function setAssigneeTypeAsEnum(AssigneeTypeEnum $assigneeType): self
    {
        $this->assigneeType = $assigneeType->type();

        return $this;
    }

    public function setWorkflowScheme(int $workflowScheme): self
    {
        $this->workflowScheme = $workflowScheme;

        return $this;
    }

    public function setIssueTypeScreenScheme(int $issueTypeScreenScheme): self
    {
        $this->issueTypeScreenScheme = $issueTypeScreenScheme;

        return $this;
    }

    public function setIssueTypeScheme(int $issueTypeScheme): self
    {
        $this->issueTypeScheme = $issueTypeScheme;

        return $this;
    }

    public function setFieldConfigurationScheme(int $fieldConfigurationScheme): self
    {
        $this->fieldConfigurationScheme = $fieldConfigurationScheme;

        return $this;
    }
}
