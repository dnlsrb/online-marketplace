<x-layouts.app>
    <x-notauth.nav />

    <section class="flex   sm:bg-orange-400 bg-white min-h-[calc(40em)]  flex justify-evenly items-center">
        <div class="md:hidden lg:block">
        </div>


        <div class="w-full  max-w-md p-4 bg-white  md:border  border-gray-200 rounded md:shadow sm:p-6 md:p-8  ">

            <x-shared.logo class="text-2xl stroke-2 block sm:hidden text-center"/>
       
           

            <form class="space-y-6" method="POST" action="{{ route('login') }}" autocomplete="off">
                @csrf
                <h5 class="text-xl font-medium text-gray-900 mb-6">Log In</h5>

                <div>
                    @if ($errors->has('email'))
                    <x-shared.error message="{{ $errors->first('email') }}" />
                @endif
                    <input type="email" name="email" id="email" placeholder="Email" 
                        class="mb-4  bg-gray-50 border border-gray-300 text-gray-900 text-sm roundedfocus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{old('email')}}"
                        required />
                 
                </div>
                <div>
                    <input type="password" name="password" id="password" placeholder="Password"
                        class="mb-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        required  />

                    
                </div>
                <div class="flex justify-between mb-4">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="remember" type="checkbox" value=""
                                class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300" />
                        </div>
                        <label for="remember" class="ms-2 text-sm font-medium text-gray-900">Remember me</label>
                    </div>
                    <a href="#" class="ms-auto text-sm text-blue-700 hover:underline">Forgot Password?</a>
                </div>
                <button type="submit"
                    class="w-full mb-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center rounded-sm">Login
                    to your account</button>
                <div class="text-sm font-medium text-gray-500">
                    Not registered? <a href="{{ route('register') }}" class="text-blue-700 hover:underline">Create
                        account</a>
                </div>
            </form>
        </div>

    </section>

    <x-notauth.footer />
</x-layouts.app>
