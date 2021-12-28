<?php

namespace App\Http\Livewire\Category;

use Livewire\Component;
use App\Models\Category;

class CategoryForm extends Component
{
    public $idKey = 0;
    public $cate_name;
    public $cate_status = 1;
    public $cate_desc;

    protected $listeners = [
        'editCategory' => 'edit',
        'btnCreateCategory' => 'resetInput'
    ];

    protected $rules = [
        'cate_name' => 'required'
    ];

    protected $messages = [
        'cate_name.required' => 'กรุณากรอกชื่อประเภท'
    ];

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $this->idKey = $category->id;
        $this->cate_name = $category->cate_name;
        $this->cate_status = $category->cate_status;
        $this->cate_desc = $category->cate_desc;
    }

    public function resetInput()
    {
        $this->reset('cate_name');
        $this->reset('cate_status');
        $this->reset('cate_desc');
    }

    public function save()
    {
        $this->validate($this->rules,$this->messages);

        Category::updateOrCreate([
            'id' => $this->idKey
        ],[
            'cate_name' => $this->cate_name,
            'cate_status' => $this->cate_status,
            'cate_desc' => $this->cate_desc,
        ]);

        $this->resetInput();

        $this->emit("refreshCategoryList");

        $this->dispatchBrowserEvent('swal',[
            'title' => 'บันทึกข้อมูลประเภทเรียบร้อย',
            'timer' => 3000,
            'icon' => 'success'
        ]);

        $this->emit("modalHide");
    }

    public function render()
    {
        return view('livewire.category.category-form');
    }
}
