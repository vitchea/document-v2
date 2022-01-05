

<div class="">
    <div class="max-w-screen mx-auto sm:px-6 lg:px-8 h-screen">
        {{-- <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4"> --}}
            @if (session()->has('message'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 2500)" >
                <div class="w-full">
                    <div class="py-3 px-5 mb-4 bg-blue-100 text-blue-900 text-sm rounded-md border border-blue-200 flex items-center" role="alert">
                        <div class="w-4 mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                            </svg>
                        </div>
                        <span><strong>{{ session('message') }}</strong></span>
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
            @include('livewire.create')
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
                        <td class="border px-4 py-1 hover:bg-white">
                            <div class="flex">
                            <a href="{{ asset('storage/file_in/'.$filein->file) }}" target="_blank" class=" px-4 py-2 cursor-pointer  hover:text-blue-600"> 
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
                            <button 
                                class="modal-open px-4 py-2 cursor-pointer  hover:text-red-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>    
                            </button>
                        </div>
                        </td>
                        <td class="border px-4 py-1 ">{{ $filein->date }}</td>
                        <td class="border px-4 py-1 ">{{ $filein->filesource }}</td>
                        <td class="border px-4 py-1 ">{{ $filein->subject }}</td>
                        <td class="border px-4 py-1 truncate">{{ $filein->fileid }}</td>

                    </tr>
                     <!--Modal-->
  <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
    
    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
      
      {{-- <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
        <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
          <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
        </svg>
        <span class="text-sm">(Esc)</span>
      </div> --}}

      <!-- Add margin if you want to see some of the overlay behind the modal-->
      <div class="modal-content py-4 text-left px-6">
        <!--Title-->
        <div class="flex justify-between items-center pb-3">
          <p class="text-2xl font-bold text-red-500">Warning !!!</p>
          {{-- <div class="modal-close cursor-pointer z-50">
            <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
              <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
            </svg>
          </div> --}}
        </div>

        <!--Body-->
        <div class="text-center p-5 flex-auto justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 -m-1 flex items-center text-red-500 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 flex items-center text-red-500 mx-auto" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
        </svg>
                    <h2 class="text-xl font-bold py-4 ">Are you sure?</h3>
                    <p class="text-sm text-gray-500 px-8">តើអ្នកពិតជាចង់លុបមែនទេ?
                        ដំណើរការនេះលុបហើយមិនអាចត្រឡប់វិញបានទេ។</p>    
        </div>
        <!--Footer-->
        <div class="p-3  mt-2 text-center space-x-4 md:block">
            <button class="modal-close mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100">
                បោះបង់
            </button>
            <button wire:click="delete('{{ $filein->id }}','{{$filein->file}}')" class="mb-2 md:mb-0 bg-red-500 border border-red-500 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-red-600">
                លុប</button>
        </div>
        
      </div>
    </div>
  </div>
                    @endforeach
                  
                </tbody>
            </table>
           
            
        {{-- </div> --}}
        <div class="px-6 py-6">
             {{$fileins->links()}}
        </div>
      
    </div>
</div>
<script>
    var openmodal = document.querySelectorAll('.modal-open')
    for (var i = 0; i < openmodal.length; i++) {
      openmodal[i].addEventListener('click', function(event){
    	event.preventDefault()
    	toggleModal()
      })
    }
    
    const overlay = document.querySelector('.modal-overlay')
    overlay.addEventListener('click', toggleModal)
    
    var closemodal = document.querySelectorAll('.modal-close')
    for (var i = 0; i < closemodal.length; i++) {
      closemodal[i].addEventListener('click', toggleModal)
    }
    
    document.onkeydown = function(evt) {
      evt = evt || window.event
      var isEscape = false
      if ("key" in evt) {
    	isEscape = (evt.key === "Escape" || evt.key === "Esc")
      } else {
    	isEscape = (evt.keyCode === 27)
      }
      if (isEscape && document.body.classList.contains('modal-active')) {
    	toggleModal()
      }
    };
    
    
    function toggleModal () {
      const body = document.querySelector('body')
      const modal = document.querySelector('.modal')
      modal.classList.toggle('opacity-0')
      modal.classList.toggle('pointer-events-none')
      body.classList.toggle('modal-active')
    }
     
  </script>