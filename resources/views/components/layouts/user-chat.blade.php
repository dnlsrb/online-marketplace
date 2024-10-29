@props([
    'conversations' => [],
    'conversation' => null,
])

<x-layouts.app>


    <div class="container-fluid h-screen mx-auto  " x-data="chat">
        <div class="flex flex-row justify-between bg-white h-screen">



            <div class="flex flex-col w-2/5 border-r-2 overflow-y-auto hidden sm:block   relative"
                x-init="initConversation({{ json_encode($conversations) }}, {{Auth::user()->id}})">
                {{-- footer --}}
                <div class="absolute bottom-0 w-full  bg-white shadow-inner py-10 px-5">
                    <a href="/" class="  bg-gray-300 p-5   rounded-xl"><i
                            class="fa-solid fa-right-to-bracket text-lg"></i></a>
                </div>

                {{-- end footer --}}
                <!-- search compt -->
                <div class="border-b-2 py-4 px-2">
                    @include('partials.chat.search-user')
                </div>
                <!-- end search compt -->
                <!-- user list -->

                <template x-if="conversations.length !== 0">
                    <template x-for="conversation in conversations" :key="conversation?.id">
                        <a href="#" @click="selectConversation(conversation)"
                            class="flex flex-row py-4 px-2 justify-center items-center border-b-2  hover:bg-gray-100">

                            <div class="w-1/4">
                                <img src="https://picsum.photos/id/233/600/600"
                                    class="object-cover h-12 w-12 rounded-full" alt="" />
                            </div>
                            <div class="w-full">



                                <template x-if="conversation.owner_id === {{ Auth::user()->id }}">
                                    <div class="text-lg font-semibold flex justify-between">
                                        <span x-text="conversation.participant.name"></span>
                                        <p class="text-xs text-gray-400">
                                            (seller)</p>
                                    </div>
                                </template>
                                <template x-if="conversation.participant_id === {{ Auth::user()->id }}">
                                    <div class="text-lg font-semibold flex justify-between">
                                        <span x-text="conversation.owner.name"></span>
                                        <p class="text-xs text-gray-400">
                                            (customer)</p>
                                    </div>

                                </template>



                                <span class="text-gray-500">Pick me at 9:00 Am</span>
                            </div>
                        </a>
                    </template>

                </template>

                <template x-if="conversations.length === 0">
                    <div class="flex flex-row py-4 px-2 justify-center items-center border-b-2  ">

                        <div class="w-full">
                            <div class="text-lg font-semibold">No Conversation Found</div>
                        </div>
                    </div>
                </template>
                {{--  user list --}}
                <button class="hidden" @click="playRingtone" x-ref="playRingtone"></button>

                <!-- end user list -->
            </div>


            <div class="flex flex-row justify-between bg-white h-screen w-full" x-init="selectConversation({{ json_encode($conversation) }})">

                <!-- message -->
                <template x-if="selectedConversation">
                    <div class="w-full justify-between h-screen  relative ">
                        {{-- HEADER --}}



                        <div class="border-b-2 py-4 px-2 flex justify-between">
                            <div class="flex justify-center items-center">
                                {{-- button  --}}
                                <button aria-controls="logo-sidebar" type="button" class="py-2.5 px-5    rounded ">
                                    <i class="fa-solid fa-arrow-left"></i>
                                </button>
                                {{-- profile and name --}}
                                <img src="https://picsum.photos/id/433/600/600"class="object-cover h-8 w-8 rounded-full"
                                    alt="" />
                                <h1 class="font-bold mx-2">
                                    <span x-text="selectedConversation?.participant.name"></span>
                                </h1>
                            </div>


                            <button aria-controls="logo-sidebar" type="button" class="py-2.5 px-2    rounded ">
                                <i class="fa-solid fa-ellipsis"></i>
                            </button>
                        </div>
                        {{-- HEADER --}}


                        {{-- MESSAGES --}}
                        <div class="flex flex-col  content-end h-screen overflow-y-auto pb-32"
                         x-show="selectedConversation?.messages.length !== 0"
                         x-ref="chatContainer"
                         x-init="$nextTick(() => { $refs.chatContainer.scrollTop = $refs.chatContainer.scrollHeight; })">
                            <div class="p-5 flex flex-col-reverse">

                                <template x-for="convoMessage in selectedConversation?.messages" :key="convoMessage.id">
                                    <div>

                                        <template x-if="convoMessage.sender_id === {{ Auth::user()->id }}">
                                            <x-shared.user-chat message="asdaweaweawe"
                                                profile="https://picsum.photos/id/433/600/600" time="5:09 PM">
                                                <p x-text="convoMessage.content">

                                                </p>
                                            </x-shared.user-chat>

                                        </template>
                                        <template x-if="convoMessage.receiver_id === {{ Auth::user()->id }}">
                                            <x-shared.other-chat time="5:09 PM"
                                                profile="https://picsum.photos/id/433/600/600">
                                                <p x-text="convoMessage.content">

                                                </p>
                                            </x-shared.other-chat>
                                        </template>

                                    </div>


                                </template>




                                {{-- product --}}


                                {{--  --}}
                                {{-- <x-shared.user-product user="You" time="5:09 PM" name="asdaweaweawe"
                                    image="https://picsum.photos/id/433/600/600" price="32"
                                    profile="https://picsum.photos/id/433/600/600" /> --}}



                            </div>
                            <div class="h-full w-full flex items-center justify-center">
                                <h1 class="font-semibold text-gray-400">
                                    Send first Message
                                </h1>

                            </div>
                        </div>
                        {{-- MESSAGES --}}



                        {{-- enter message --}}

                        <div class="py-5 absolute bottom-0 w-full px-3">
                            <form @submit.prevent="sendMessage" class="flex items-center gap-2">
                                <input class="w-full bg-gray-300 py-5   rounded-xl" type="text"
                                    placeholder="Send as ..." x-model="message.content" />
                                <button
                                    class="text-white bg-blue-700 hover:bg-blue-800
                                     focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2
                                      mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none
                                       ">send</button>
                            </form>

                        </div>
                    </div>
                </template>



                <div x-show="!selectedConversation" class="w-full h-full flex  justify-center items-center">
                    <h1 class="bg-gray-300 hover:bg-gray-400 duration-700 hover:scale-105 p-5 rounded-lg">
                        Select Conversations
                    </h1>
                </div>

            </div>

        </div>
    </div>


</x-layouts.app>
