<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Brand
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Brand Name</th>
                        <th scope="col">Brand Image</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($brands as $brand)
                 @php ($i=1)
               

                    <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{$brand->brand_name}} </td>
                        <td><img src="{{asset($brand->brand_image)}}" alt=""></td>
                        <td>{{$brand->created_at}} </td>
                        <td>
                            <a href="" class="btn btn-info">Update</a>
                            <!-- admin.category.category.blade.php -->

                            <a href="" class="btn btn-danger">Delete</a>

                        </td>
                    </tr>
                        </td>


                    </tr>
                
                @endforeach 
                
                </tbody>
            </table>
            {{$brands->links()}}
            </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Add Brand
                    </div>
                    <form method="POST" action="{{route('add.brand')}}" enctype="multipart/form-data">
                        @csrf <!-- CSRF Protection -->
                        <div class="mb-3">
                            <label for="brandname" class="form-label">Brand Name</label>
                            <input type="text" class="form-control" name="brand_name">
                            @error('brand_name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="brandname" class="form-label">Brand Image</label>
                            <input type="file" class="form-control" name="brand_image">
                            @error('brand_image')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
            </div>
        </div>
    </div>



</x-app-layout>