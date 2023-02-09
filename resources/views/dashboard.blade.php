<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>

        <!-- Button Add product -->
   
      <div class="col">
        <div class="d-flex justify-content-lg-end ps-2 mt-3">
          {{-- <button type="button" class="btn btn-dark fw-bold text-black p-2" data-bs-toggle="modal" data-bs-target="#modal-game">
            Add Dish
          </button> --}}
          <a href="" type="button" class="btn btn-dark fw-bold text-black p-2" data-bs-toggle="modal" data-bs-target="#modal-game">
            Add Dish
          </a>
        </div>

    </x-slot>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div> --}}

    <!-- Tableau des elements -->
              
    <div class="overflow-scroll tab1 w-100" style="height:27rem;">
        <table class="table-striped  table table-hover">
          <thead>
                  <tr>
                    <th scope="col">Id</th> 
                    <th scope="col">Image</th>
                    <th scope="col">Plat</th>
                    <th scope="col">Description</th>
                    <th scope="col">Date</th>
                    {{-- <th scope="col">Price</th> --}}
                    <th scope="col">Actions</th>
                    {{-- <th scope="col">Delete</th> --}}
                  </tr>
          </thead>
          <tbody>
                @foreach($menus as $menu)
              <tr>
                {{-- <th scope="row"></th> --}}
                <td></td>
                <td><img src="{{asset('/storage/'. $menu->image)}}" style="width: 90px;"></td>
                {{-- <td>lorem</td> --}}
                <td>{{$menu->name}}</td>
                <td>{{$menu->description}}</td>
                <td>{{$menu->date}}</td>

                <td>
                  <a href="" title="View Menu"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                  <a href="" title="Edit Menu"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                  <form method="GET" action="Delete/{{$menu->id}}" accept-charset="UTF-8" style="display:inline">
                      {{-- {{ method_field('DELETE') }} --}}
                      {{-- {{ csrf_field() }} --}}
                      <button href="" type="submit" class="btn btn-danger btn-sm" title="Delete Menu" onclick=""><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                  </form>
              </td>




                {{-- <td><span onclick="" class="btn btn-success text-black"><i class="fas fa-edit text-white"></i></span></a></td>
                      
                <td>
                  <a href="#" onclick="if(confirm('Are you sure want to delete this record !')){ document.querySelector('#delete-product-').submit();}"><span class="btn btn-danger text-black"><i class="fas fa-trash text-white"></i></span></a>
                        <form action="" method="post" id="delete-product-">
                          <input type="hidden" name="delete" value="">
                        </form>
                      </td> --}}
                    </tr>
                    @endforeach
                     
            </tbody>
        </table>   
      </div>

      <!-- Game Product MODAL -->

        <div class="modal fade" id="modal-game">
          <div class="modal-dialog">
            <div class="modal-content">
              <form action="{{route('menus.store')}}  " method="post" id="form-game" enctype="multipart/form-data">
                @csrf
                {{-- {!!csrf_field() !!} --}}
                <div class="modal-header">
                  <h5 class="modal-title">Add Dish</h5>
                  <a href="#" class="btn-close" data-bs-dismiss="modal"></a>
                </div>
                <div class="modal-body">

                  <!-- This Input Allows Storing Product Index  -->
                  <input type="hidden" id="dish-id" name="dishId">
                  <div class="mb-3">
                    <label class="form-label">Image</label>
                    <input type="file" class="form-control" name="image" id="dish-image"/>
                  </div>
                  
                  <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" name="name" id="dish-title" required/>
                  </div>
                  
                    
                    <div class="mb-3">
                      <label class="form-label">Description</label>
                      <textarea name="description" id="" cols="30" rows="10"></textarea>
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Date</label>
                      <input type="Date" class="form-control" name="date" id="dish-date" required/>
                    </div>
                  
                  </div>
                <div class="modal-footer">
                  <a href="#" class="btn btn-white" data-bs-dismiss="modal">Cancel</a>
                  <button type="submit" name="saveDish" class="btn btn-primary text-black task-action-btn" id="dish-save-btn">Save</button>
                </div> 
              </form>
            </div>
          </div>
        </div>
        </div>    
</div>
</body>
</html>
</x-app-layout>
