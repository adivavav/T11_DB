<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        /* Efek bias cahaya mengkilap di pojok kartu kaca */
        .glass-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 100%;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.15) 0%, rgba(255, 255, 255, 0) 50%);
            border-radius: 24px;
            pointer-events: none;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center bg-[#090521] relative overflow-hidden p-4">

    <div class="absolute top-1/4 left-10 md:left-1/4 w-72 h-72 rounded-full bg-cyan-500/20 blur-[100px] animate-pulse"></div>
    <div class="absolute bottom-1/4 right-10 md:right-1/4 w-[400px] h-[400px] rounded-full bg-fuchsia-600/25 blur-[120px] animate-pulse" style="animation-duration: 4s;"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] rounded-full bg-indigo-600/10 blur-[130px]"></div>

    <div class="glass-card w-full max-w-md bg-white/[0.04] backdrop-blur-2xl border border-white/10 rounded-3xl shadow-[0_0_50px_rgba(0,0,0,0.5)] p-8 md:p-10 relative z-10 ring-1 ring-cyan-400/30">

        <div class="absolute -top-[1px] -left-[1px] w-20 h-20 bg-gradient-to-br from-fuchsia-500 to-transparent opacity-40 blur-[2px] rounded-tl-3xl"></div>
        <div class="absolute -bottom-[1px] -right-[1px] w-20 h-20 bg-gradient-to-tl from-cyan-400 to-transparent opacity-40 blur-[2px] rounded-br-3xl"></div>

        <div class="flex justify-center mb-6">
            <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-white/20 via-indigo-500/40 to-fuchsia-500/40 border border-white/30 flex items-center justify-center shadow-[0_8px_32px_rgba(99,102,241,0.3)] backdrop-blur-md relative overflow-hidden group">
                <div class="absolute inset-0 bg-gradient-to-tr from-cyan-400/20 to-fuchsia-500/20 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <span class="text-2xl font-black text-transparent bg-clip-text bg-gradient-to-r from-white via-cyan-200 to-fuchsia-200 tracking-wider relative z-10">
                    AE
                </span>
            </div>
        </div>

        <h1 class="text-3xl font-bold text-center text-white tracking-tight mb-1 drop-shadow-[0_2px_10px_rgba(255,255,255,0.15)]">
            Admin Login
        </h1>

        <p class="text-center text-slate-300 text-sm mb-8 opacity-80">
            Welcome back to <span class="text-cyan-400 font-semibold drop-shadow-[0_0_10px_rgba(34,211,238,0.3)]">AmikomEventHub</span>
        </p>

        @if ($errors->any())
            <div class="bg-gradient-to-r from-red-500/20 to-orange-500/10 backdrop-blur-md border border-red-500/40 text-red-200 px-4 py-3.5 rounded-xl mb-6 text-sm flex items-start gap-3 shadow-[0_4px_20px_rgba(239,68,68,0.15)] animate-headShake">
                <svg class="w-5 h-5 shrink-0 text-red-400 drop-shadow-[0_0_5px_rgba(239,68,68,0.5)] mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
                <div class="flex-1 leading-tight">
                    <span class="font-semibold block text-red-300 mb-0.5">Error Message</span>
                    <span class="text-xs text-red-200/80">{{ $errors->first() }}</span>
                </div>
            </div>
        @endif

        <form action="{{ route('admin.login.post') }}" method="POST" class="space-y-6 relative z-10">

            @csrf

            <div class="group">
                <label class="block text-xs font-semibold uppercase tracking-widest text-slate-400 mb-2 group-focus-within:text-cyan-400 transition-colors duration-200">
                    Email Address
                </label>

                <div class="relative flex items-center">
                    <div class="absolute left-4 text-slate-500 group-focus-within:text-cyan-400 transition-colors duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" /></svg>
                    </div>
                    <input 
                        type="email"
                        name="email"
                        placeholder="admin@amikom.ac.id"
                        class="w-full pl-12 pr-4 py-3.5 rounded-xl bg-slate-950/40 border border-white/10 text-white placeholder-slate-500 focus:outline-none focus:border-cyan-400 focus:ring-2 focus:ring-cyan-400/20 transition duration-300 text-sm backdrop-blur-sm shadow-inner"
                        required
                    >
                </div>
            </div>

            <div class="group">
                <label class="block text-xs font-semibold uppercase tracking-widest text-slate-400 mb-2 group-focus-within:text-fuchsia-400 transition-colors duration-200">
                    Password
                </label>

                <div class="relative flex items-center">
                    <div class="absolute left-4 text-slate-500 group-focus-within:text-fuchsia-400 transition-colors duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                    </div>
                    
                    <input 
                        id="passwordField"
                        type="password"
                        name="password"
                        placeholder="Masukkan password"
                        class="w-full pl-12 pr-12 py-3.5 rounded-xl bg-slate-950/40 border border-white/10 text-white placeholder-slate-500 focus:outline-none focus:border-fuchsia-400 focus:ring-2 focus:ring-fuchsia-400/20 transition duration-300 text-sm backdrop-blur-sm shadow-inner"
                        required
                    >

                    <button 
                        type="button" 
                        onclick="togglePassword()" 
                        class="absolute right-4 text-slate-500 hover:text-fuchsia-400 transition-colors duration-200 focus:outline-none"
                    >
                        <svg id="eyeOpenIcon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <svg id="eyeCloseIcon" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a10.025 10.025 0 014.132-5.411m0 0L21 21m-1.424-1.424l-1.611-1.611m-3.131-3.131A3 3 0 0012 11.25c-.247 0-.484.03-.711.086m4.656 4.656a3 3 0 01-4.656-4.656m-2.25-2.25a9.96 9.96 0 014.342-1.008c2.197 0 4.236.705 5.922 1.904m-12.7 1.25a10.041 10.041 0 013.111-3.649" />
                        </svg>
                    </button>
                </div>
            </div>
              
            <div class="pt-2 relative group/btn">
                <div class="absolute top-2 left-0 w-full h-full bg-gradient-to-r from-purple-600 to-cyan-500 rounded-xl blur-md opacity-60 group-hover/btn:opacity-100 group-hover/btn:blur-lg transition duration-300"></div>
                
                <button 
                    type="submit"
                    class="w-full bg-gradient-to-r from-indigo-600 via-purple-600 to-cyan-500 hover:from-indigo-500 hover:via-purple-500 hover:to-cyan-400 text-white font-semibold py-3.5 rounded-xl transition duration-300 relative z-10 shadow-lg active:scale-[0.98] transform flex items-center justify-center gap-2 overflow-hidden"
                >
                    <span class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover/btn:animate-[shimmer_1.5s_infinite]"></span>
                    <span>Login Sekarang</span>
                </button>
            </div>

        </form>

    </div>

    <script>
        function togglePassword() {
            const passwordField = document.getElementById('passwordField');
            const eyeOpenIcon = document.getElementById('eyeOpenIcon');
            const eyeCloseIcon = document.getElementById('eyeCloseIcon');

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeOpenIcon.classList.add('hidden');
                eyeCloseIcon.classList.remove('hidden');
            } else {
                passwordField.type = 'password';
                eyeOpenIcon.classList.remove('hidden');
                eyeCloseIcon.classList.add('hidden');
            }
        }
    </script>

</body>
</html>