{{-- @include('components.w3btlaravelkit.design.appmenucomponent') --}}
<div
    class="fixed z-50 left-0 top-1/2 -translate-y-1/2 flex flex-col items-center gap-2 px-2 py-4 bg-base-200 rounded-r-lg shadow-md">
    <div class="divider divider-neutral w-full"></div>

    <!-- Links -->

    <div class="divider divider-neutral w-full"></div>

    <!-- Selector de temas -->
    <x-w3btlaravelkit.ui.themedropdowncomponent :themes="[
    'light', 'night', 'cupcake', 'bumblebee', 'dark', 'lofi', 'emerald', 'corporate', 'synthwave', 'retro', 'cyberpunk', 'valentine',
    'halloween', 'garden', 'forest', 'aqua', 'pastel', 'fantasy', 'wireframe', 'black', 'luxury', 'dracula', 'cmyk', 'autumn',
    'business', 'acid', 'lemonade', 'coffee', 'dim', 'nord', 'sunset', 'caramellatte', 'abyss', 'silk', 'winter',
    'irongoblin', 'afkalmost', 'wigglycake', 'ironicflip', 'superschool', 'goatedburn', 'nextfox'
    ]" />

    <div class="divider divider-neutral w-full"></div>
</div>