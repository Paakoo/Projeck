<x-filament-panels::page.simple>
    <style>
        /* Hover button login */
        button[type="submit"]:hover {
            background-color: #1e40af !important; /* Blue-800 */
            transform: scale(1.02);
            transition: all 0.2s ease;
        }
        
        /* Hover input fields */
        input:hover {
            border-color: #3b82f6 !important; /* Blue-500 */
        }
        
        /* Hover input focus */
        input:focus {
            border-color: #2563eb !important; /* Blue-600 */
            ring-color: #3b82f6 !important;
        }
        
        /* Hover link */
        a:hover {
            color: #1d4ed8 !important; /* Blue-700 */
            text-decoration: underline;
        }
    </style>
    <x-filament-panels::form wire:submit="authenticate">
        {{ $this->form }}

        <x-filament-panels::form.actions
            :actions="$this->getCachedFormActions()"
            :full-width="$this->hasFullWidthFormActions()"
        />
    </x-filament-panels::form>

    {{-- Custom Section - Anda bisa edit di sini --}}
    <div class="mt-4 text-center text-sm text-gray-600">
        <p>Selamat datang di Admin Panel</p>
        <p class="mt-2">Gunakan kredensial Anda untuk login</p>
    </div>
</x-filament-panels::page.simple>
