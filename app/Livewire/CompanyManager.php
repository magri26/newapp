<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Company;

class CompanyManager extends Component
{
    public $companies;
    public $name, $email, $phone, $companyId;
    public $isEditing = false;
    public $showAlert = false;
    public $showModal = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'nullable|string|max:255',
        'phone' => 'nullable|string|max:20',
    ];

    public function render()
    {
        $this->companies = Company::all();
        return view('livewire.company-manager')
        ->layout('layouts.app');
    }

    public function resetFields()
    {
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->companyId = null;
        $this->isEditing = false;
    }

    public function store()
    {
        $this->validate();

        Company::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
        ]);

        $this->resetFields();
        session()->flash('message', 'Empresa creada exitosamente.');
        $this->showAlert = true;

    }

    public function edit($id)
    {
        $company = Company::findOrFail($id);
        $this->name = $company->name;
        $this->email = $company->email;
        $this->phone = $company->phone;
        $this->companyId = $company->id;
        $this->isEditing = true;
    }

    public function update()
    {
        $this->validate();

        $company = Company::findOrFail($this->companyId);
        $company->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
        ]);

        $this->resetFields();
        session()->flash('message', 'Empresa actualizada exitosamente.');
    }

    public function delete($id)
    {
        Company::findOrFail($id)->delete();
        session()->flash('message', 'Empresa borada exitosamente.');
    }
}
