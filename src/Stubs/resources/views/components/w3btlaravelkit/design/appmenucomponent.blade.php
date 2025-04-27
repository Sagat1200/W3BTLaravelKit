{{-- @include('components.w3btlaravelkit.design.appmenucomponent') --}}
<div
    class="fixed z-50 left-0 top-1/2 -translate-y-1/2 flex flex-col items-center gap-2 px-2 py-4 bg-base-200 rounded-r-lg shadow-md">
    <div class="divider divider-neutral w-full"></div>

    @include('components.w3btlaravelkit.ui.linkcomponent', [
        'route' => 'admin.dasboard',
        'text' => '',
        'icon' => 'fa-solid fa-house',
        'class' => 'btn btn-outline btn-primary btn-sm',
        'tooltip' => 'Home',
        'tooltipPosition' => 'right',
    ])

    <div class="divider divider-neutral w-full"></div>

    @include('components.w3btlaravelkit.ui.linkcomponent', [
        'route' => 'contabilidad',
        'text' => '',
        'icon' => 'fa-solid fa-handshake',
        'class' => 'btn btn-outline btn-primary btn-sm',
        'tooltip' => 'Contabilidad',
        'tooltipPosition' => 'right',
    ])

    @include('components.w3btlaravelkit.ui.linkcomponent', [
        'route' => 'controlpersonas',
        'text' => '',
        'icon' => 'fa-solid fa-address-card',
        'class' => 'btn btn-outline btn-primary btn-sm',
        'tooltip' => 'Mesa de Control Personas Fisicas',
        'tooltipPosition' => 'right',
    ])

    @include('components.w3btlaravelkit.ui.linkcomponent', [
        'route' => 'crm',
        'text' => '',
        'icon' => 'fa-solid fa-handshake',
        'class' => 'btn btn-outline btn-primary btn-sm',
        'tooltip' => 'CRM Personas Fisicas',
        'tooltipPosition' => 'right',
    ])

    @include('components.w3btlaravelkit.ui.linkcomponent', [
        'route' => 'documentos',
        'text' => '',
        'icon' => 'fa-regular fa-folder-open',
        'class' => 'btn btn-outline btn-primary btn-sm',
        'tooltip' => 'Control Documental',
        'tooltipPosition' => 'right',
    ])

    @include('components.w3btlaravelkit.ui.linkcomponent', [
        'route' => 'firmadigital',
        'text' => '',
        'icon' => 'fa-solid fa-signature',
        'class' => 'btn btn-outline btn-primary btn-sm',
        'tooltip' => 'Documentos de Firma Digital',
        'tooltipPosition' => 'right',
    ])

    @include('components.w3btlaravelkit.ui.linkcomponent', [
        'route' => 'pld',
        'text' => '',
        'icon' => 'fa-solid fa-shield',
        'class' => 'btn btn-outline btn-primary btn-sm',
        'tooltip' => 'Prevencion de Lavado de Dinero',
        'tooltipPosition' => 'right',
    ])

    <div class="divider divider-neutral w-full"></div>

    <!-- Selector de temas -->
    @persist('theme-dropdown')
        <div x-data="{ open: false }" @click.away="open = false" class="relative">
            <!-- Botón para abrir el menú -->
            <button @click="open = !open" class="btn btn-outline btn-primary btn-sm mx-1 my-2">
                <i class="fa-solid fa-palette"></i>
            </button>

            <!-- Menú desplegable con 7 columnas y hasta 5 filas -->
            <ul x-show="open" x-transition
                class="grid absolute z-20 grid-cols-7 gap-2 p-2 mt-1 w-[28rem] max-h-[16rem] overflow-auto text-gray-500 shadow-lg dropdown-content menu bg-base-300 rounded-box"
                style="top: 100%;">
                @foreach (['light', 'night', 'cupcake', 'bumblebee', 'dark', 'lofi', 'emerald', 'corporate', 'synthwave', 'retro', 'cyberpunk', 'valentine', 'halloween', 'garden', 'forest', 'aqua', 'pastel', 'fantasy', 'wireframe', 'black', 'luxury', 'dracula', 'cmyk', 'autumn', 'business', 'acid', 
                           'lemonade', 'coffee', 'dim', 'nord', 'sunset', 'caramellatte', 'abyss', 'silk', 'winter', 'irongoblin', 'afkalmost', 'wigglycake', 'ironicflip', 'superschool', 'goatedburn', 'nextfox'] as $theme)
                    <li>
                        <input type="radio" name="theme-dropdown" class="theme-controller btn btn-sm btn-block btn-ghost"
                            aria-label="{{ ucfirst($theme) }}" value="{{ $theme }}" />
                    </li>
                @endforeach
            </ul>
        </div>
    @endpersist

    <div class="divider divider-neutral w-full"></div>
</div>