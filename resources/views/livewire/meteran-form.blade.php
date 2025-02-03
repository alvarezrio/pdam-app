@if($show)
<div class="modal fade show" style="display: block; background-color: rgba(0,0,0,0.5);">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Input Meteran untuk {{ $pelanggan->nama }}</h5>
                <button type="button" class="close" wire:click="$set('show', false)">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="submitMeterReading">
                    <div class="form-group">
                        <label for="currentReading">Pembacaan Meteran Saat Ini:</label>
                        <input type="number" wire:model="currentReading" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="masaTagihan">Masa Tagihan:</label>
                        <input type="text" wire:model="masaTagihan" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endif

