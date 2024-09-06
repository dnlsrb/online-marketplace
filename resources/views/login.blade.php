<x-main.base >
    <x-notauth.nav/>
  
    <section class="flex   sm:bg-orange-400 bg-white min-h-[calc(40em)]  flex justify-evenly items-center">
        <div class="md:hidden lg:block">
        </div>
 

        <div class="w-full max-w-sm p-4 bg-white  md:border  border-gray-200 rounded md:shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700  ">
            
        <a class=" text-center title-font font-medium  text-gray-900 mb-4  md:mb-0 block sm:hidden">
            <i class="fa-solid fa-shop  stroke-2 text-2xl"></i>
            </svg>
            <span class="ml-3 text-xl  ">Online Marketplace</span>
          </a>
            <form class="space-y-6" action="#">
                @csrf
                <h5 class="text-xl font-medium text-gray-900 dark:text-white mb-6">Log In</h5>
                <x-elements.error message="Account not found"/>
                <div>
                    <input type="email" name="email" id="email"  placeholder="Username" class="mb-4  bg-gray-50 border border-gray-300 text-gray-900 text-sm roundedfocus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"  required />
                </div>
                <div>
                    <input type="password" name="password" id="password" placeholder="Password" class="mb-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                </div>
                <div class="flex justify-between mb-4">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" required />
                        </div>
                        <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember me</label>
                    </div>
                    <a href="#" class="ms-auto text-sm text-blue-700 hover:underline dark:text-blue-500">Forgot Password?</a>
                </div>
                <button type="submit" class="w-full mb-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 rounded-sm">Login to your account</button>
                <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                    Not registered? <a href="/register" class="text-blue-700 hover:underline dark:text-blue-500">Create account</a>
                </div>
            </form>
        </div>

    </section>
 
    <x-notauth.footer/>
</x-main.base>