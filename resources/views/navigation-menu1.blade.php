<nav x-data="{ open: false }" class="bg-black border-b border-black">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            @guest
            <div class="flex">
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ url('/home') }}">
                        <x-jet-application-mark class="block h-9 w-auto" />
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link href="{{ url('/home') }}" :active="request()->is('home')">
                        {{ __('Home') }}
                    </x-jet-nav-link>

                    <x-jet-nav-link href="{{ url('/aboutUs') }}" :active="request()->is('aboutUs')">
                        {{ __('About Us') }}
                    </x-jet-nav-link>

                    <x-jet-nav-link href="{{ url('/terms&policy') }}" :active="request()->is('terms&policy')">
                        {{ __('Terms & Policy') }}
                    </x-jet-nav-link> 

                    <x-jet-nav-link href="{{ url('/challenges') }}" :active="request()->is('challenges')">
                        {{ __('Challenges') }}
                    </x-jet-nav-link>

                    <x-jet-nav-link href="{{ url('/blog') }}" :active="request()->is('blog')">
                        {{ __('Blog') }}
                    </x-jet-nav-link>

                    <x-jet-nav-link href="{{ url('/contactUs') }}" :active="request()->is('contactUs')">
                        {{ __('Contact Us') }}
                    </x-jet-nav-link>

                    <x-jet-nav-link href="{{ url('/login') }}" :active="request()->is('login')">
                        {{ __('login') }}
                    </x-jet-nav-link>

                    <x-jet-nav-link href="{{ url('/register') }}" :active="request()->is('register')">
                        {{ __('Register') }}
                    </x-jet-nav-link>
                </div>

                <!-- Hamburger -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
            @else
            <div class="flex">
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ url('/home') }}">
                        <x-jet-application-mark class="block h-9 w-auto" />
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link href="{{ url('/home') }}" :active="request()->is('home')">
                        {{ __('Home') }}
                    </x-jet-nav-link>

                    <x-jet-nav-link href="{{ url('/aboutUs') }}" :active="request()->is('aboutUs')">
                        {{ __('About Us') }}
                    </x-jet-nav-link>

                    <x-jet-nav-link href="{{ url('/terms&policy') }}" :active="request()->is('terms&policy')">
                        {{ __('Terms & Policy') }}
                    </x-jet-nav-link> 

                    <x-jet-nav-link href="{{ url('/challenges') }}" :active="request()->is('challenges')">
                        {{ __('Challenges') }}
                    </x-jet-nav-link>

                    <x-jet-nav-link href="{{ url('/blog') }}" :active="request()->is('blog')">
                        {{ __('Blog') }}
                    </x-jet-nav-link>

                    <x-jet-nav-link href="{{ url('/contactUs') }}" :active="request()->is('contactUs')">
                        {{ __('Contact Us') }}
                    </x-jet-nav-link>
                {{-- <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-jet-application-mark class="block h-9 w-auto" />
                    </a>
                </div> --}}

                <!-- Navigation Links -->
                {{-- <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex"> --}}
                    {{-- <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-jet-nav-link> --}}
                {{-- @if(Auth::user()->type=='admin')
                    <!--IsAdmin-->
                    <x-jet-nav-link href="{{ url('/panels/AdminPanel/generalSettings') }}" :active="request()->is('/panels/AdminPanel/generalSettings')">
                        {{ __('General Settings') }}
                    </x-jet-nav-link>

                    <x-jet-nav-link href="{{ url('/panels/AdminPanel/reportsPanel') }}" :active="request()->is('/panels/AdminPanel/reportsPanel')">
                        {{ __('Reports Panel') }}
                    </x-jet-nav-link>

                    <x-jet-nav-link href="{{ url('/panels/AdminPanel/clientsPanel') }}" :active="request()->is('/panels/AdminPanel/clientsPanel')">
                        {{ __('Clients') }}
                    </x-jet-nav-link>

                    <x-jet-nav-link href="{{ url('/panels/AdminPanel/DesignersPanel') }}" :active="request()->is('/panels/AdminPanel/DesignersPanel')">
                        {{ __('Designers') }}
                    </x-jet-nav-link>
                    <!--End IsAdmin-->
                @endif

                    <!--IsDesigner-->
                @if(Auth::user()->type=='designer')
                    <x-jet-nav-link href="{{ url('/panels/DesignerPanel/MyProfile/about') }}" :active="request()->is('/panels/DesignerPanel/MyProfile/about')">
                        {{ __('My Profile') }}
                    </x-jet-nav-link>

                    <x-jet-nav-link href="{{ url('/panels/DesignerPanel/Orders') }}" :active="request()->is('/panels/DesignerPanel/Orders')">
                        {{ __('Orders') }}
                    </x-jet-nav-link>

                    <x-jet-nav-link href="{{ url('/panels/DesignerPanel/Orders/MyOrders') }}" :active="request()->is('/panels/DesignerPanel/Orders/MyOrders')">
                        {{ __('My Orders') }}
                    </x-jet-nav-link>

                    <x-jet-nav-link href="{{ url('/panels/DesignerPanel/Challenges') }}" :active="request()->is('/panels/DesignerPanel/Challenges')">
                        {{ __('Challenges') }}
                    </x-jet-nav-link>

                    <x-jet-nav-link href="{{ url('/panels/DesignerPanel/MyChallenges') }}" :active="request()->is('/panels/DesignerPanel/MyChallenges')">
                        {{ __('My Challenges') }}
                    </x-jet-nav-link>

                    <x-jet-nav-link href="{{ url('/panels/DesignerPanel/Orders/MyClients') }}" :active="request()->is('/panels/DesignerPanel/Orders/MyClients')">
                        {{ __('My Clients') }}
                    </x-jet-nav-link>

                    <x-jet-nav-link href="{{ url('/panels/DesignerPanel/MyFavorites') }}" :active="request()->is('/panels/DesignerPanel/MyFavorites')">
                        {{ __('My Favorites') }}
                    </x-jet-nav-link>
                    <!--End IsDesigner-->
                @endif
                @if(Auth::user()->type=='user')   <!--IsUser-->
                    <x-jet-nav-link href="{{ url('/panels/UserPanel/MyProfile') }}" :active="request()->is('/panels/UserPanel/MyProfile')">
                        {{ __('My Profile') }}
                    </x-jet-nav-link>

                    <x-jet-nav-link href="{{ url('/panels/UserPanel/Orders') }}" :active="request()->is('/panels/UserPanel/Orders')">
                        {{ __('Orders') }}
                    </x-jet-nav-link>

                    <x-jet-nav-link href="{{ url('/panels/UserPanel/Challenges') }}" :active="request()->is('/panels/UserPanel/Challenges')">
                        {{ __('Challenges') }}
                    </x-jet-nav-link>

                    <x-jet-nav-link href="{{ url('/panels/UserPanel/MyChallenges') }}" :active="request()->is('/panels/UserPanel/MyChallenges')">
                        {{ __('My Challenges') }}
                    </x-jet-nav-link>

                    <x-jet-nav-link href="{{ url('/panels/UserPanel/MyDesigners') }}" :active="request()->is('/panels/UserPanel/MyDesigners')">
                        {{ __('My Designers') }}
                    </x-jet-nav-link>

                    <x-jet-nav-link href="{{ url('/panels/UserPanel/MyFavorites') }}" :active="request()->is('/panels/UserPanel/MyFavorites')">
                        {{ __('My Favorites') }}
                    </x-jet-nav-link>
                    <!--End IsUser-->
                @endif                  --}}
                    <!-- Notifications Dropdown Menu -->
                    @php
                    $user =Auth::user();
                    $notificationes = $user->unreadNotifications;
                    @endphp
                    @if (count($notificationes)>0)
                        <span id="not" class="dot" ></span>
                    @else
                        <span id="not" class="" ></span>
                    @endif

                    <x-jet-nav-link href="{{ url('/panels/Notifications') }}" :active="request()->is('/panels/Notifications')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                          </svg>
                    </x-jet-nav-link>

                    @php
                        $user = Auth::user();
                        $chats = $user->conversations()->with([
                            'lastMessage',
                            'participants'=>function($builder) use($user) {
                                $builder->where('id','<>',$user->id);
                            }
                        ])->get();
                                    
                        $i=0;
                        foreach ($chats as  $chat) {
                            $msg = $chat->messages()->with(['recipients'=>function($q){
                                $q->where('user_id',Auth::id());
                            }])->get();
                            
                            $read_at = '';
                            foreach ($msg as $message) {
                                foreach ($message->recipients as $recipient) {
                                    $read_at = $recipient->pivot;
                                    if ($read_at->read_at == null) {
                                    $i++;
                                    }
                                }
                            }
                        }
                    @endphp
                    @if ($i>0)
                        <span id="msg" class="dot" ></span>
                    @else
                        <span id="msg" class="" ></span>
                    @endif
                    <x-jet-nav-link href="{{ route('messenger') }}" :active="request()->is('/Messages')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                          </svg>
                    </x-jet-nav-link>
                </div>
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                        <div class="ml-3 relative">
                            <x-jet-dropdown align="right" width="60">
                                <x-slot name="trigger">
                                    <span class="inline-flex rounded-md">
                                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                                            {{ Auth::user()->currentTeam->name }}
                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </span>
                                </x-slot>
    
                                <x-slot name="content">
                                    <div class="w-60">
                                        <!-- Team Management -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Manage Team') }}
                                        </div>
    
                                        <!-- Team Settings -->
                                        <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                            {{ __('Team Settings') }}
                                        </x-jet-dropdown-link>
    
                                        @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                            <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                                {{ __('Create New Team') }}
                                            </x-jet-dropdown-link>
                                        @endcan
    
                                        <div class="border-t border-gray-100"></div>
    
                                        <!-- Team Switcher -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Switch Teams') }}
                                        </div>
    
                                        @foreach (Auth::user()->allTeams() as $team)
                                            <x-jet-switchable-team :team="$team" />
                                        @endforeach
                                    </div>
                                </x-slot>
                            </x-jet-dropdown>
                        </div>
                    @endif
    
                    @guest
                    @else
                    <div class="ml-3 relative">
                        <x-jet-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                        <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                    </button>
                                @else
                                    <span class="inline-flex rounded-md">
                                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                            {{ Auth::user()->name }}
    
                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </span>
                                @endif
                            </x-slot>
    
                            <x-slot name="content">
                                @if(Auth::user()->type=='admin')
                                    <!--IsAdmin-->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Account') }}
                                    </div>

                                    <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                        {{ __('Account Settings') }}
                                    </x-jet-dropdown-link>

                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Settings') }}
                                    </div>

                                    <x-jet-dropdown-link href="{{ url('/panels/AdminPanel/generalSettings') }}">
                                        {{ __('General Settings') }}
                                    </x-jet-dropdown-link>

                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Reports') }}
                                    </div>

                                    <x-jet-dropdown-link href="{{ url('/panels/AdminPanel/reportsPanel') }}">
                                        {{ __('Reports Panel') }}
                                    </x-jet-dropdown-link>

                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Clients Panel') }}
                                    </div>

                                    <x-jet-dropdown-link href="{{ url('/panels/AdminPanel/clientsPanel') }}">
                                        {{ __('Clients') }}
                                    </x-jet-dropdown-link>

                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Designers Panel') }}
                                    </div>

                                    <x-jet-dropdown-link href="{{ url('/panels/AdminPanel/DesignersPanel') }}">
                                        {{ __('Designers') }}
                                    </x-jet-dropdown-link>
                                    <!--End IsAdmin-->
                                @endif
                                
                                @if(Auth::user()->type=='designer')

                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Account') }}
                                    </div>

                                    <x-jet-dropdown-link href="{{ url('/panels/DesignerPanel/MyProfile/about') }}">
                                        {{ __('My Profile') }}
                                    </x-jet-dropdown-link>

                                    <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                        {{ __('Account Settings') }}
                                    </x-jet-dropdown-link>

                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Orders') }}
                                    </div>

                                    <x-jet-dropdown-link href="{{ url('/panels/DesignerPanel/Orders') }}">
                                        {{ __('Orders') }}
                                    </x-jet-dropdown-link>

                                    <x-jet-dropdown-link href="{{ url('/panels/DesignerPanel/Orders/MyOrders') }}">
                                        {{ __('My Orders') }}
                                    </x-jet-dropdown-link>

                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Challenges') }}
                                    </div>

                                    <x-jet-dropdown-link href="{{ url('/panels/DesignerPanel/Challenges') }}">
                                        {{ __('Challenges') }}
                                    </x-jet-dropdown-link>

                                    <x-jet-dropdown-link href="{{ url('/panels/DesignerPanel/MyChallenges') }}">
                                        {{ __('My Challenges') }}
                                    </x-jet-dropdown-link>

                                    <x-jet-dropdown-link href="{{ url('/panels/DesignerPanel/MyFavorites') }}">
                                        {{ __('My Favorites') }}
                                    </x-jet-dropdown-link>

                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Orders') }}
                                    </div>
                                    
                                    <x-jet-dropdown-link href="{{ url('/panels/DesignerPanel/Orders/MyClients') }}" :active="request()->is('/panels/DesignerPanel/Orders/MyClients')">
                                        {{ __('My Clients') }}
                                    </x-jet-dropdown-link>
                                    <!--End IsDesigner-->
                                @endif

                                @if(Auth::user()->type=='user')
                                   <!--IsUser-->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Account') }}
                                    </div>

                                    <x-jet-dropdown-link href="{{ url('/panels/UserPanel/MyProfile') }}">
                                        {{ __('My Profile') }}
                                    </x-jet-dropdown-link>

                                    <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                        {{ __('Account Settings') }}
                                    </x-jet-dropdown-link>

                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Orders') }}
                                    </div>

                                    <x-jet-dropdown-link href="{{ url('/panels/UserPanel/Orders') }}">
                                        {{ __('Orders') }}
                                    </x-jet-dropdown-link>

                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Challenges') }}
                                    </div>

                                    <x-jet-dropdown-link href="{{ url('/panels/UserPanel/Challenges') }}">
                                        {{ __('Challenges') }}
                                    </x-jet-dropdown-link>

                                    <x-jet-dropdown-link href="{{ url('/panels/UserPanel/MyChallenges') }}">
                                        {{ __('My Challenges') }}
                                    </x-jet-dropdown-link>

                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Designers') }}
                                    </div>

                                    <x-jet-dropdown-link href="{{ url('/panels/UserPanel/MyDesigners') }}">
                                        {{ __('My Designers') }}
                                    </x-jet-dropdown-link>

                                    <x-jet-dropdown-link href="{{ url('/panels/UserPanel/MyFavorites') }}" :active="request()->is('/panels/UserPanel/MyFavorites')">
                                        {{ __('My Favorites') }}
                                    </x-jet-dropdown-link>
                                @endif
    
                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                    <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                        {{ __('API Tokens') }}
                                    </x-jet-dropdown-link>
                                @endif
    
                                <div class="border-t border-gray-100"></div>
    
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
    
                                    <x-jet-dropdown-link href="{{ route('logout') }}"
                                             onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                        {{ __('Logout') }}
                                    </x-jet-dropdown-link>
                                </form>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                    @endguest
                    
                </div>

                <div class="-mr-2 flex items-center sm:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
    
                {{-- <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-t-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                        {{ Auth::user()->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-jet-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-jet-dropdown-link>
                            @endif

                            <div class="border-t border-gray-100"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-jet-dropdown-link>
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
                </div> --}}
            </div>
            

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="ml-3 relative">
                        <x-jet-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                                        {{ Auth::user()->currentTeam->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                        {{ __('Team Settings') }}
                                    </x-jet-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                            {{ __('Create New Team') }}
                                        </x-jet-dropdown-link>
                                    @endcan

                                    <div class="border-t border-gray-100"></div>

                                    <!-- Team Switcher -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Switch Teams') }}
                                    </div>

                                    @foreach (Auth::user()->allTeams() as $team)
                                        <x-jet-switchable-team :team="$team" />
                                    @endforeach
                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                @endif


            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-jet-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="flex-shrink-0 mr-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                <div>
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-jet-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-jet-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-jet-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-gray-200"></div>

                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Team') }}
                    </div>

                    <!-- Team Settings -->
                    <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                        {{ __('Team Settings') }}
                    </x-jet-responsive-nav-link>

                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-jet-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                            {{ __('Create New Team') }}
                        </x-jet-responsive-nav-link>
                    @endcan

                    <div class="border-t border-gray-200"></div>

                    <!-- Team Switcher -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Switch Teams') }}
                    </div>

                    @foreach (Auth::user()->allTeams() as $team)
                        <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    @endguest
</nav>

       
  <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('919d23b51605144faf79', {
      cluster: 'ap2',
      authEndpoint: "/broadcasting/auth"

    });

    var channel = pusher.subscribe('private-App.Models.User.{{Auth::id()}}');
   
    channel.bind('Illuminate\\Notifications\\Events\\BroadcastNotificationCreated', function(data) {
        $('#not').addClass('dot');
        const audio = new Audio("{{asset('not.mp3')}}");
       audio.play(); 
    });
  </script>
