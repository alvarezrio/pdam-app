<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pelanggan;
use App\Models\Tagihan;

class MeteranForm extends Component
{
    public $show = false;
    public $pelanggan;
    public $currentReading;
    public $masaTagihan;

    protected $listeners = ['openModal' => 'showModal'];

    public function showModal(Pelanggan $pelanggan)
    {
        $this->pelanggan = $pelanggan;
        $this->show = true;
    }

    public function submitMeterReading()
    {
        $validatedData = $this->validate([
            'currentReading' => 'required|numeric',
            'masaTagihan' => 'required|string',
        ]);

        Tagihan::create([
            'tagihan_nik' => $this->pelanggan->nik,
            'tagihan_jmlMeteran' => $this->currentReading,
            'tagihan_masaTagihan' => $this->masaTagihan,
            // Add other fields as necessary
        ]);

        $this->reset(['currentReading', 'masaTagihan']);
        $this->show = false;

        session()->flash('message', 'Meteran berhasil dicatat.');
    }

    public function render()
    {
        return view('livewire.meteran-form');
    }
}
