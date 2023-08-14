<?php

namespace Winter\Excel\Classes\Sheets;

use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;

abstract class BaseSheet implements ShouldAutoSize, WithTitle
{
    /**
     * The title of the sheet
     */
    protected string $title = '';

    /**
     * Get the title of this sheet
     */
    public function title(): string
    {
        return $this->title;
    }

    /**
     * Set the title of this sheet
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }
}