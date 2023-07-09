<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            期限切れ一覧
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100"> 
                                      
                    <section class="text-gray-200 body-font">
                        <div class="container px-5  mx-auto">
                            <x-flash-message status="session('status')" />
                            <div class="flex justify-end m-4">
                                <button  onclick="location.href='{{route('admin.owners.create')}}'" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">登録する</button>
                            </div>

                            
                          <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                            <table class="table-auto w-full text-left whitespace-no-wrap">
                              <thead>
                                <tr>
                                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-600 rounded-tl rounded-bl">名前</th>
                                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-600">メールアドレス</th>
                                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-600">期限が切れた日</th>
                                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-600"></th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($expiredOwners as $owner)
                                <tr>
                                    <td class="px-4 py-3 text-gray-100">{{$owner->name}}</td>
                                    <td class="px-4 py-3 text-gray-100">   {{$owner->email}}</td>
                                    <td class="px-4 py-3 text-lg text-gray-100">   {{$owner->deleted_at->diffForHumans()}} </td>
                                    <form method="post" id='delete_{{$owner->id}}' action='{{route('admin.expired-owners.destroy',['owner' =>$owner->id])}}'>
                                        @csrf
                                    <td class="px-4 py-3">
                                        <a  data-id='{{$owner->id}}'  onclick='deletePost(this)' class="text-white bg-red-400 border-0 py-2 px-4 focus:outline-none hover:bg-red-500 rounded">完全に削除</a>
                                    </td>
                                    </form>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                      </section>
                </div>
            </div>
        </div>
    </div>
    <script>
        function deletePost(e){
            'use strict';
            if(confirm('本当に削除してもよろしいですか')){
                document.getElementById('delete_' + e.dataset.id).submit();
            }
        }
    </script>
</x-app-layout>