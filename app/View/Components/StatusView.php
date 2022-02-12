<?php

namespace App\View\Components;

use Illuminate\View\Component;

class StatusView extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $type;
    public $status;
    public function __construct($status)
    {
        $this->status = $status;
        $this->statusColor();
    }
    private function statusColor()
    {
        switch($this->status){
            case 'to do':
                $this->type = 'danger';
                break;
            case 'in progress':
                $this->type = 'info';
                break;
            case 'done':
                $this->type = 'success';
                break;
        }

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.status-view');
    }
}
