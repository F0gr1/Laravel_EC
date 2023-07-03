<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            オーナー一覧
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100"> 
                                      
                    <section class="text-gray-200 body-font">
                        <div class="container px-5  mx-auto">
                            <div class="flex justify-end m-4">
                                <button  onclick="location.href='{{route('admin.owners.create')}}'" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">登録する</button>
                            </div>
                          <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                            <table class="table-auto w-full text-left whitespace-no-wrap">
                              <thead>
                                <tr>
                                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-600 rounded-tl rounded-bl">名前</th>
                                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-600">メールアドレス</th>
                                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-600">作成日</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($owners as $owner)
                                <tr>
                                    <td class="px-4 py-3 text-gray-100">{{$owner->name}}</td>
                                    <td class="px-4 py-3 text-gray-100">   {{$owner->email}}</td>
                                    <td class="px-4 py-3 text-lg text-gray-100">   {{$owner->created_at->diffForHumans()}} </td>
                                    <td class="w-10 text-center">
                                        <input name="plan" type="radio">
                                      </td>
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
    
</x-app-layout>