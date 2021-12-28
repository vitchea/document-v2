

<div class="">
    <div class="max-w-screen mx-auto sm:px-6 lg:px-8 h-screen">
        {{-- <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4"> --}}
            @if (session()->has('message'))
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                role="alert">
                <div class="flex">
                    <div>
                        <p class="text-sm">{{ session('message') }}</p>
                    </div>
                </div>
            </div>
            @endif
            <div class="flex justify-between py-4 px-4" style="font-family: 'Noto Sans Khmer', sans-serif;">
                
                    <input wire:model="search" type="search" placeholder="ស្វែងរក . . ." class="border border-gray-400 my-4 rounded-lg focus:ring-2 focus:ring-blue-600" style="width: 40%" > 
                
                
                <button wire:click="create()"
                class=" my-4 rounded-md border border-transparent px-4 py-2 bg-blue-600 text-sm font-bold text-white shadow-sm hover:bg-blue-700">
                បញ្ចូលឯកសារ
                
                </button> 
                
            </div>
            
             @if($isModalOpen)
            @include('livewire.fileout-create')
            @endif 
             <table class="table-auto w-full" style="font-family: 'Noto Sans Khmer', sans-serif;">
                <thead>
                    <tr class="bg-blue-600 text-sm text-blue-200 border border-blue-800">
                        <th class="px-4 py-2 w-1/12"></th>
                        <th class="px-4 py-2 w-2/12 ">កាលបរិច្ជេទចូល</th>
                        <th class="px-4 py-2 w-3/12">ប្រភពឯកសារ</th>
                        <th class="px-4 py-2 w-3/12">ប្រធានបទ</th>
                        <th class="px-4 py-2 w-1/12">លេខឯកសារ</th>
                        
                        
                    </tr>
                </thead>
                <tbody>
                  
                    @foreach($fileins as $filein)
                    <tr class="hover:bg-blue-50 text-xs  ">
                        <td class="border px-4 py-1 hover:bg-white flex justify-start ">
                            <a href="{{ asset('storage/fileout/'.$filein->file) }}" target="_blank" class=" px-4 py-2 cursor-pointer  hover:text-blue-600"> 
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </a>
                        
                            <button  wire:click="edit({{ $filein->id }})"
                                class=" px-4 py-2 cursor-pointer  hover:text-green-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>    
                            </button>
                            <button wire:click="delete('{{ $filein->id }}','{{$filein->file}}')"
                                class=" px-4 py-2 cursor-pointer  hover:text-red-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>    
                            </button>
                        </td>
                        <td class="border px-4 py-1">{{ $filein->date }}</td>
                        <td class="border px-4 py-1">{{ $filein->filesource }}</td>
                        <td class="border px-4 py-1 ">{{ $filein->subject }}</td>
                        <td class="border px-4 py-1 truncate">{{ $filein->fileid }}</td>
                       
                    </tr>
                    @endforeach
                  
                </tbody>
            </table>
        {{-- </div> --}}
        <div class="px-6 py-6">
             {{$fileins->links()}}
        </div>
      
    </div>
</div>






{{-- <x-slot name="header">
    <h2 class="text-center">Laravel 8 Livewire CRUD Demo</h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                role="alert">
                <div class="flex">
                    <div>
                        <p class="text-sm">{{ session('message') }}</p>
                    </div>
                </div>
            </div>
            @endif
            <button wire:click="create()"
                class="my-4 inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base font-bold text-white shadow-sm hover:bg-red-700">
                Create File
            </button>
            @if($isModalOpen)  
            @include('livewire.create') 
            @endif  
             @include('livewire.create') 
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        
                        <th class="px-4 py-2">Title</th>
                        <th class="px-4 py-2">Filename</th>
                        <th class="px-4 py-2">File</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>`
                    
                     @foreach($fileins as $filein)
                    <tr>
                       
                        <td class="border px-4 py-2">{{ $filein->title }}</td>
                        <td class="border px-4 py-2">{{ $filein->filename}}</td>
                        <td class="border px-4 py-2">{{ $filein->file}}</td>
                        <td class="border px-4 py-2">
                            <button wire:click="edit({{ $filein->id }})"
                                class="flex px-4 py-2 bg-gray-500 text-gray-900 cursor-pointer">Edit</button>
                            <button wire:click="delete({{ $filein->id }})"
                                class="flex px-4 py-2 bg-red-100 text-gray-900 cursor-pointer">Delete</button>
                        </td>
                    </tr>
                    @endforeach 
                </tbody>
            </table>
        </div>
    </div>
</div> --}}
