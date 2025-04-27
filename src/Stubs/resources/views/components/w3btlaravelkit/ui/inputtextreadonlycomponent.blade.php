<div class="mx-auto w-full max-w-xs input-group">
    <input type="{{ $type }}" placeholder="{{ $placeholder }}"
        class="w-full max-w-xs uppercase input input-bordered input-sm input-primary {{ $class }}"
        wire:model="{{ $model }}" value="{{ $value }}" readonly>
    <div class="label">
        @error($model)
            <span class="error">{{ $message }}</span>
        @enderror
    </div>
</div>
{{-- @include('components.w3btlaravelkit.ui.inputtextreadonlycomponent', [
  'type' => 'text',
  'placeholder' => 'Nombre',
  'model' => 'name',
  'value' => 'Valor',
  'class' => '',
]) --}}