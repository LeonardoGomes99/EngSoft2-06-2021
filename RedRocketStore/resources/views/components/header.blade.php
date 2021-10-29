@props(['search' => true])

<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    const setup = () => {
        return {
            loading: true,
            isSidebarOpen: false,
            toggleSidbarMenu() {
                this.isSidebarOpen = !this.isSidebarOpen
            },
            isSettingsPanelOpen: false,
            isSearchBoxOpen: false,
        }
    }
</script>

<header class="flex-shrink-0 border-b">
    <div class="flex items-center justify-between p-2">
        <!-- Pushes content to the right of the navbar -->
        <div class="flex items-center space-x-3">
            <span class="p-2 text-xl font-semibold tracking-wider uppercase lg:hidden"></span>
        </div>

        <!-- Search box -->
        <div class="items-center hidden px-2 space-x-2 md:flex-1 md:flex md:mr-auto md:ml-5">
            <!-- Search button-->
            @if ($search == true)
                <x-search-box :placeholder="'Pesquise produtos. Ex: ps9 cinza'" />
            @else
                <span> RedRocketStore - Gerenciamento de Estoque</span>
            @endif

        </div>

        <!-- Pushes content to the right of the navbar -->
        <div class="relative flex items-center space-x-3">

            <div class="items-center hidden space-x-3 md:flex">

                <!-- Options -->
                <x-dropdown-button :name="'Opções'">
                    <x-slot name="icon">
                        <x-default-svg class="w-6 h-6"
                            :d="'M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4'" />
                    </x-slot>

                    <x-dropdown :title="'Opções'">
                        <x-dropdown-item :name="'Link'" />
                        <x-dropdown-item :name="'Link 2'" />
                    </x-dropdown>

                </x-dropdown-button>
            </div>

            @auth
                <!-- user avatar -->
                <div class="relative" x-data="{ isOpen: false }">
                    <x-dropdown-button>
                        <x-slot name="icon">
                            <img class="object-cover w-8 h-8 rounded-full"
                                src="https://www.pngkey.com/png/full/263-2635979_admin-abuse.png" alt="Usuário" />
                        </x-slot>

                        <x-dropdown :title="'Opções'">
                            <x-dropdown-item :name="auth()->user()->name" :nolink="true" />
                            <x-dropdown-item :name="auth()->user()->email" :nolink="true" />
                            <x-dropdown-item href="#" x-data="{}"
                                @click.prevent="document.querySelector('#logout-form').submit()" :name="'Logout'"
                                :color="'bg-blue-500 bg-blue-400'" class="rounded-none text-white" />
                        </x-dropdown>
                        <form id="logout-form" method="POST" action="{{ route('logout') }}" class="hidden">
                            @csrf
                        </form>
                    </x-dropdown-button>
                </div>
            @endauth
        </div>
    </div>
    </div>
</header>
