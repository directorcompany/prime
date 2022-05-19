@extends('layouts.app')
@section('content')
<div class="container">     
		<div class="card border-silver">
			<div class="card-header">Laravel TreeView</div>
	  		<div class="card-body">
	  			<div class="row">
	  				<div class="col-md-6">
	  					<h3>Category List</h3>
                        <p>Click to lists</p>
				        <ul id="tree1">
				            @forelse($categories as $category)
				                <li>
								<i class="fa fa-angle-right arrow"></i>
				                    {{ $category->title }}
				                    @if(count($category->childs))
				                        @include('manageChild',['childs' => $category->childs])
				                    @endif
				                </li>
								@empty
								<h1> Пустой </h1>
				            @endforelse
				        </ul>
	  				</div>
	  				<div class="col-md-6">
	  					<h3>Add New Category</h3>
						  <form action="{{ route('category')}}" method="post">
							  @csrf
                        @csrf
                         @if(count($errors) > 0)
                                  <div class="alert alert-danger  alert-dismissible">
                                      <button type="button" class="close" data-dismiss="alert">×</button>
                                      @foreach($errors->all() as $error)
                                              {{ $error }}<br>
                                      @endforeach
                                  </div>
                              @endif
                          @if ($message = Session::get('success'))
                           <div class="alert alert-success  alert-dismissible">
                               <button type="button" class="close" data-dismiss="alert">×</button>   
                                   <strong>{{ $message }}</strong>
                           </div>
                        @endif
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label>Title</label>
                                 <input type="text" name="title" class="form-control">   
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label>Parent</label>
                                 <select class="form-control" name="parent_id">
                                    <option selected disabled>Select Parent Menu</option>
                                    @foreach($allCategories as $key => $value)
									<option value="{{ $key }}">{{ $value}}</option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-12">
                              <button class="btn btn-success">Save</button>
                           </div>
                        </div>
                     </form>
					


	  				</div>
	  			</div>

	  			
	  		</div>
        </div>
    </div>
    @endsection