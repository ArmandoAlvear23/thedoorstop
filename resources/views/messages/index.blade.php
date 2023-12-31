<x-layout>
    <h1 class="text-center text-2xl text-gray-800 mt-4">{{ $search ? 'Message Search: '.$search['search'] : 'All Messages' }}</h1>
    <div class="bg-gray-50 border border-gray-200 border-y-sky-300 border-y-4 rounded p-10 pb-14 my-8 mx-0 md:mx-8 shadow-xl overflow-auto"> 
        @unless(count($messages) == 0)
        <div class="grid grid-cols-1">
            <div>
                @include('partials._search-messages')
            </div>
            <div>
                <table class="w-full">
                    <thead>
                        <tr>
                            <th class="bg-blue-200 border text-left px-6 py-4">Name</th>
                            <th class="bg-blue-200 border text-left px-6 py-4">Contact</th>
                            <th class="bg-blue-200 border text-left px-6 py-4">Message</th>
                            <th class="bg-blue-200 border text-left px-6 py-4">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($messages as $message)
                            <tr>
                                <td class="border px-6 py-4">{{ $message->name }}</td>
                                <td class="border px-6 py-4">
                                    <div class="flex-cols text-sm text-gray-700">
                                        <span>Email: <a href="mailto:{{ $message->email }}" class="text-blue-600">{{ $message->email }}</a></span> 
                                        <span>Phone: <a href="tel:{{ $message->phone }}">{{ $message->phone }}</a></span>
                                    </div>
                                </td>
                                <td class="border px-6 py-4">{{ $message->message }}</td>
                                <td class="border px-6 py-4">{{ date_format($message->created_at, "m/d/Y") }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-3 p-2">
                {{ $messages->links() }}
            </div>
        </div>
        
        @else
            <p>No messages found...</p>
        @endunless     
    </div>   
</x-layout>