<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Category
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="container">
        <div class="row">
          
            <div class="col-md-4">
                <div class="card">
                    <form action="{{ url('/category/update', $update->id) }}" method="POST">
                        @csrf 
                        <div class="form-group">
                            <label for="category_name" class="form-label">Edit Category Name</label>
                            <input type="text" class="form-control" name="category_name" value="{{$update->category_name}}">
                            @error('category_name')
                                    <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
            </div>
        </div>
    </div>
</x-app-layout>