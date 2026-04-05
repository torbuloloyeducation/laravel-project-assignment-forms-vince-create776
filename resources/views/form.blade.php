<x-layout>

     @if(session('success'))
        <p class="text-green-500">{{ session('success') }}</p>
    @endif

    @if(session('error'))
        <p class="text-red-500">{{ session('error') }}</p>
    @endif

    @if($errors->any())
        @foreach($errors->all() as $error)
            <p class="text-red-500">{{ $error }}</p>
        @endforeach
    @endif

<form method="POST" action="/form">
        @csrf
    <div class="space-y-12">
        <div class="border-b border-white/10">
            <div class="mt-2 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-12 p-10 bg-gray-800 rounded-lg">
                <div class="sm:col-span-4">
                    <label for="email" class="block text-sm/6 font-medium text-white">Email</label>
                        <div class="mt-2">
                            <div class="flex items-center rounded-md bg-white/5 pl-3 outline-1 -outline-offset-1 outline-white/10 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-500">
                                <input id="email" type="email" name="email" placeholder="juandelacruz@umindanao.edu.ph" class="block min-w-0 grow bg-transparent py-1.5 pr-3 pl-1 text-base text-white placeholder:text-gray-500 focus:outline-none sm:text-sm/6" />
                            </div>
                        </div>
                        <div class="mt-3 flex items-center gap-x-6">
                            <button type="submit" class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

      <div class="p-10">
        <ul>
            @foreach ($forms as $index => $form)
                <li class="flex items-center gap-4 text-white mb-2">
                    {{ $form }}
                    <form method="POST" action="/form/{{ $index }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 text-sm">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>

</x-layout>