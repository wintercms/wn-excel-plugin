<?php

namespace Winter\Excel\Classes\Sheets;

use Illuminate\Contracts\View\View as ViewContract;
use Maatwebsite\Excel\Concerns\FromView;

class PartialSheet extends BaseSheet implements FromView
{
    use \System\Traits\ViewMaker;

    /**
     * The path to the partial to be rendered
     */
    protected string $partial = 'sheet';

    public function __construct(string $title, array $vars = [])
    {
        $this->viewPath = $this->guessViewPath('/partials');
        $this->title = $title;
        $this->vars = $vars;
    }

    public function setPartial(string $partial): static
    {
        $this->partial = $partial;
        return $this;
    }

    /**
     * Returns the ViewContract to be rendered
     */
    public function view(): ViewContract
    {
        // @TODO: Make it easier to get a ViewContract from the ViewMaker trait instead of this
        return (new class($this, $this->partial) implements ViewContract {
            protected $outer;
            protected $partial;
            protected $vars = [];

            public function __construct($outer, $partial)
            {
                $this->outer = $outer;
                $this->partial = $partial;
            }

            public function render()
            {
                return $this->outer->makePartial($this->partial, $this->getData());
            }

            public function name()
            {
                return 'sheet';
            }

            public function with($key, $value = null)
            {
                if (is_array($key)) {
                    $this->vars = array_merge($this->vars, $key);
                } elseif (isset($value)) {
                    $this->vars[$key] = $value;
                }
                return $this;
            }

            public function getData()
            {
                return $this->vars;
            }
        })->with($this->vars);
    }
}
