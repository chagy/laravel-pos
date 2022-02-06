<?php

namespace App\Http\Livewire\Setting;

use Livewire\Component;

class SettingPage extends Component
{
    public function render()
    {
        return view('livewire.setting.setting-page')->extends('layouts.main');
    }
}
