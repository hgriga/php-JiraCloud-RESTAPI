<?php

namespace JiraCloud\Issue;

trait VisibilityTrait
{
    public function setVisibility(Visibility $type): self
    {
        $this->visibility = $type;

        return $this;
    }

    public function setVisibilityAsArray(array $array): self
    {
        if (is_null($this->visibility)) {
            $this->visibility = new Visibility();
        }

        $this->visibility->setType($array['type']);
        $this->visibility->setValue($array['value']);

        return $this;
    }

    public function setVisibilityAsString(string $type, string $value): self
    {
        if (is_null($this->visibility)) {
            $this->visibility = new Visibility();
        }

        $this->visibility->setType($type);
        $this->visibility->setValue($value);

        return $this;
    }
}
