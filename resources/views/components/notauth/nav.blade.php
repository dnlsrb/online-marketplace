<header class="text-gray-600 body-font p-3">
    <div class="container  px-0 md:px-40 mx-auto flex justify-between   p-5   items-center">
      <x-shared.logo class=" md:mb-0 hidden sm:block font-medium title-font text-2xl" />
     
      @if(!Auth::user() && request()->route()->getName() !==  'login' && request()->route()->getName() !==  'register')
      <a href="/login"
      class="text-white bg-indigo-500 border-0 py-2 px-4 focus:outline-none hover:bg-indigo-600 rounded"> 
      Login
    </a>
      @endif
    </div>
  </header>