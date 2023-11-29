<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Category
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">User Id</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
              @foreach($categories as $category)
                    <tr>
                        <th scope="row">{{$category->id}}</th>
                        <td>{{$category->category_name}} </td>
                        <td>{{$category->user->name}} </td>
                        <td>{{$category->created_at}} </td>
                        <td>
                            <a href="{{ route('editCategory', $category->id) }}" class="btn btn-info">Update</a>
                            <!-- admin.category.category.blade.php -->

                            <a href="{{ route('removeCategory', $category->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to remove this category?')">Remove</a>

                        </td>
                    </tr>
                        </td>


                    </tr>
                @endforeach 
                </tbody>
            </table>
            {{$categories->links()}}
            </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <form method="POST" action="{{ route('Store') }}">
                        @csrf <!-- CSRF Protection -->
                        <div class="mb-3">
                            <label for="category_name" class="form-label">Category Name</label>
                            <input type="text" class="form-control" name="category_name">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
            </div>
        </div>
    </div>


<!-- trash -->
    
<div class="py-12">
    Trash Category
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">User Id</th>
                    <th scope="col">Deleted At</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
          @foreach($trashCat as $trash)
                <tr>
                    <th scope="row">{{$trash->id}}</th>
                    <td>{{$trash->category_name}} </td>
                    <td>{{$trash->user->name}} </td>
                    <td>{{$trash->created_at}} </td>
                    <td>
                        <a href="{{ route('restoreCategory', $trash->id) }}" class="btn btn-info"  onclick="return confirm('Are you sure you want to Restore this category?')">Restore</a>
                        <!-- admin.category.category.blade.php -->

                        <a href="{{ route('deleteCategory', $trash->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">Delete</a>

                    </td>
                </tr>
                    </td>


                </tr>
            @endforeach 
            </tbody>
        </table>
        {{$trashCat->links()}}
        </div>
        </div>

</x-app-layout>