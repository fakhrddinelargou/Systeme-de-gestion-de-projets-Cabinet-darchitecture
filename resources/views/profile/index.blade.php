<main class="w-full min-h-screen lg:w-[82%] ml-auto bg-slate-50">
    @if ($errors->any())
        <div class="text-red-600 bg-red-50 border border-red-200 px-4 py-3 mb-5 fixed top-4 left-1/2 -translate-x-1/2 rounded-xl shadow-sm z-50">
            <ul class="text-sm space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section class="w-full lg:px-12 px-5 pt-10 pb-10">
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-slate-800">Profil</h2>
            <p class="mt-1 text-sm text-slate-500">Gérez vos informations personnelles et votre mot de passe.</p>
        </div>

        <section class="mb-8">
            <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm flex flex-col sm:flex-row sm:items-center gap-5">
                <div class="relative w-fit">
                    <img
                        src="{{ auth()->user()->avatar ? asset('storage/' . auth()->user()->avatar) : asset('assets/images/gust.jpg') }}"
                        alt="profile"
                        class="w-24 h-24 rounded-full object-cover border border-slate-200"
                    >

                    <x-update-image>
                        <button
                            @click="open = true"
                            type="button"
                            class="absolute bottom-0 right-0 flex items-center justify-center w-8 h-8 rounded-full bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 transition"
                        >
                            <span class="material-symbols-outlined text-[16px]!">draw</span>
                        </button>
                    </x-update-image>
                </div>

                <div>
                    <h3 class="text-xl font-semibold text-slate-800">{{ auth()->user()->fullname }}</h3>
                    <p class="text-sm text-slate-500 mt-1">{{ auth()->user()->email }}</p>
                    <p class="text-xs text-slate-400 mt-2">Vous pouvez modifier vos informations ci-dessous.</p>
                </div>
            </div>
        </section>

        <section class="grid grid-cols-1 lg:grid-cols-3 gap-5">
            <section class="lg:col-span-2 flex flex-col gap-5">
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5">
                    <h2 class="text-base font-semibold text-slate-700 mb-5">Informations personnelles</h2>

                    <form action="{{ route('profile.update') }}" method="POST" class="space-y-4">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="fullname" class="block text-sm font-medium text-slate-600 mb-2">
                                    Nom complet
                                </label>
                                <input
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 text-sm text-slate-700 outline-none focus:border-slate-400 focus:bg-white transition"
                                    name="fullname"
                                    id="fullname"
                                    type="text"
                                    placeholder="John Smith"
                                    value="{{ auth()->user()->fullname }}"
                                >
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-slate-600 mb-2">
                                    Adresse e-mail
                                </label>
                                <input
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 text-sm text-slate-700 outline-none focus:border-slate-400 focus:bg-white transition"
                                    name="email"
                                    id="email"
                                    type="email"
                                    placeholder="john@gmail.com"
                                    value="{{ auth()->user()->email }}"
                                >
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <button
                                type="submit"
                                class="px-5 py-2.5 rounded-xl bg-slate-800 text-white text-sm font-medium hover:bg-slate-700 transition"
                            >
                                Enregistrer
                            </button>
                        </div>
                    </form>
                </div>

                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5">
                    <h2 class="text-base font-semibold text-slate-700 mb-5">Modifier le mot de passe</h2>

                    <form action="{{ route('profile.password') }}" method="POST" class="space-y-4">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="current_password" class="block text-sm font-medium text-slate-600 mb-2">
                                Mot de passe actuel
                            </label>
                            <input
                                class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 text-sm text-slate-700 outline-none focus:border-slate-400 focus:bg-white transition"
                                name="current_password"
                                id="current_password"
                                type="password"
                                placeholder="••••••••"
                                autocomplete="current-password"
                            >
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="password" class="block text-sm font-medium text-slate-600 mb-2">
                                    Nouveau mot de passe
                                </label>
                                <input
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 text-sm text-slate-700 outline-none focus:border-slate-400 focus:bg-white transition"
                                    name="password"
                                    id="password"
                                    type="password"
                                    placeholder="••••••••"
                                >
                            </div>

                            <div>
                                <label for="password_confirmation" class="block text-sm font-medium text-slate-600 mb-2">
                                    Confirmer le mot de passe
                                </label>
                                <input
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 text-sm text-slate-700 outline-none focus:border-slate-400 focus:bg-white transition"
                                    name="password_confirmation"
                                    id="password_confirmation"
                                    type="password"
                                    placeholder="••••••••"
                                >
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <button
                                type="submit"
                                class="px-5 py-2.5 rounded-xl bg-slate-800 text-white text-sm font-medium hover:bg-slate-700 transition"
                            >
                                Mettre à jour
                            </button>
                        </div>
                    </form>
                </div>
            </section>

            <section class="flex flex-col gap-5">
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5">
                    <h4 class="text-base font-semibold text-slate-700 mb-4">Sécurité du compte</h4>

                    <div class="space-y-4">
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-sm text-slate-500">Force du mot de passe</span>
                                <span class="text-sm font-medium text-slate-700">Moyenne</span>
                            </div>

                            <div class="w-full h-2 rounded-full bg-slate-100 overflow-hidden">
                                <div class="h-full w-[60%] bg-slate-500 rounded-full"></div>
                            </div>
                        </div>

                        <p class="text-xs leading-5 text-slate-500">
                            Pensez à mettre à jour votre mot de passe régulièrement pour garder votre compte sécurisé.
                        </p>
                    </div>
                </div>

                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5">
                    <h4 class="text-base font-semibold text-slate-700 mb-3">Session</h4>
                    <p class="text-sm text-slate-500 mb-4">
                        Vous pouvez vous déconnecter de votre compte à tout moment.
                    </p>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button
                            type="submit"
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-white text-slate-700 font-medium text-sm hover:bg-slate-50 transition"
                        >
                            Logout
                        </button>
                    </form>
                </div>
            </section>
        </section>
    </section>
</main>