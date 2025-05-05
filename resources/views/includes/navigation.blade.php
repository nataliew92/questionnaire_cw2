<nav class="bg-slate-800 p-4">
    <div class="flex justify-between items-center max-w-5xl mx-auto text-white">

        <!-- Left side links -->
        <ul class="flex space-x-4">
            <li><a href="/" class="hover:text-blue-400 font-semibold px-2">Home</a></li>
            <li><a href="/questionnaires" class="hover:text-blue-400 font-semibold px-2">Questionnaires</a></li>

            @auth
                @if (Auth::user()->role === 'admin' || Auth::user()->role === 'user')
                    <li>
                        <a href="{{ route('admin.questionnaires.index') }}" class="hover:text-green-400 font-semibold px-2">
                            Admin Panel
                        </a>
                    </li>
                @endif
            @endauth
        </ul>
        </ul>

        <!-- Right side admin/user links -->
        <ul class="flex space-x-4 items-center">
            @auth
                <li>Welcome, {{ Auth::user()->name }}</li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-red-400 hover:text-red-600 font-semibold">Logout</button>
                    </form>
                </li>
            @endauth

            @guest
                <li><a href="{{ route('login') }}" class="hover:text-green-400 font-semibold">Login</a></li>
                <li><a href="{{ route('register') }}" class="hover:text-green-400 font-semibold">Register</a></li>
            @endguest
        </ul>

    </div>
</nav>
