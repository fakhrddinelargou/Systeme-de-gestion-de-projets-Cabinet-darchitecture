<section class="flex items-center justify-center min-h-screen bg-gray-200">
  <div class="bg-white w-full max-w-md rounded-md shadow-lg p-8">

    <!-- Logo / Title -->
    <div class="text-center mb-6">
                <div class='flex items-center justify-center  gap-2 mb-5  '>
                    <img class='w-10 h-10 ' src="{{ asset('assets/images/logo.png') }}" alt="logo">
                    <h4 class='font-bold text-[#515151] '>ARCHITRACK</h4>
                </div>
      <h1 class="text-2xl font-bold mt-2">
        Reset Password
      </h1>
      <p class="text-gray-500 text-sm mt-2">
        Enter your email to receive a reset link
      </p>
    </div>

    <!-- Form -->
    <form class="space-y-5" action="{{ route('send.mail') }}" method="POST" >
     @csrf
      <!-- Email -->
      <div>
        <label class="block text-xs font-semibold text-gray-500 uppercase mb-2">
          Email Address
        </label>
                        <input
                            class="mt-2  text-[14px] w-full px-4 py-3 rounded-md outline-gray-300 outline-1 focus:outline-gray-400 focus:outline-2 border border-gray-100 duration-100"
                            name='email' id='email' type="email" placeholder='Jhon@gmail.com'>
      </div>

      <!-- Button -->
      <button
        class="w-full bg-black text-white py-3 rounded-md font-semibold hover:bg-gray-900 transition"
      >
        Send Reset Link
      </button>

    </form>

    <!-- Back to login -->
    <p class="text-center text-sm text-gray-500 mt-6">
      Remember your password?
      <a href={{ route('login') }} class="text-black font-semibold hover:underline">
        Login
      </a>
    </p>

  </div>
</section>