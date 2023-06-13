<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDoList</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
<div class="flex">
<div class="flex justify-left max-w-xl mx-10 my-20 p-20 bg-indigo-50 rounded-lg">
        <h1 class="border rounded-lg text-center absolute w-100 py-2 px-3 my-3 mx-5 font-bold bg-indigo-100 max-w-xl">
        {{$title}}
        </h1>
        <form id="data" class="mx-5 my-20" method="post" action="{{$url}}">
        @csrf
        @if($arr==null)
            <input type="text" id="name" name="name" placeholder="Project Name" class="w-full py-2 px-3 my-3 rounded-lg border border-gray-300">
            <span class="text-red-500">
                @error('name')
                {{$message}}
                @enderror
            </span>
            <input type="text" id="workinghours" name="workinghours" placeholder="Working Hours" class="w-full py-2 px-3 my-3 rounded-lg border border-gray-300">
            <span class="text-red-500">
                @error('workinghours')
                {{$message}}
                @enderror
            </span>
            <textarea type="text" id="description" name="description" placeholder="Desciption" class="w-full py-2 px-3 my-3 rounded-lg border border-gray-300"></textarea>
            <span class="text-red-500">
                @error('description')
                {{$message}}
                @enderror
            </span>
        @else
            <input type="text" id="name" name="name" placeholder="Project Name" class="w-full py-2 px-3 my-3 rounded-lg border border-gray-300" value="{{$arr['name']}}">
            <span class="text-red-500">
                @error('name')
                {{$message}}
                @enderror
            </span>
            <input type="text" id="workinghours" name="workinghours" placeholder="Working Hours" class="w-full py-2 px-3 my-3 rounded-lg border border-gray-300" value="{{$arr['workinghours']}}">
            <span class="text-red-500">
                @error('workinghours')
                {{$message}}
                @enderror
            </span>
            <textarea type="text" id="description" name="description" placeholder="Desciption" class="w-full py-2 px-3 my-3 rounded-lg border border-gray-300">{{$arr['description']}}</textarea>
            <span class="text-red-500">
                @error('description')
                {{$message}}
                @enderror
            </span>
        @endif
        <div class="flex flex-col items-center justify-center">
            <button type="submit" id="sub" class="mt-2 mx-0 bg-green-500 hover:bg-green-300 text-white py-2 px-4 rounded-lg border-solid">{{$btn}}</button>
        </div>
        </form>
    </div>

    <div class="flex justify-right p-20">
        <table class="table-auto border-seperate bg-indigo-50" id="table">
		    <caption class="caption-top bg-indigo-50 my-2 py-2 font-bold border rounded-lg">ToDo List
		    </caption>
			<thead>
				<tr>
                    <th class="border border-slate-300 w-full py-5 px-8 my-3">ID</th>
					<th class="border border-slate-300 w-full py-5 px-8 my-3">Project Name</th>
					<th class="border border-slate-300 w-full py-5 px-8 my-3">Working Hours</th>
					<th class="border border-slate-300 w-full py-5 px-8 my-3">Description</th>
					<th class="border border-slate-300 max-w-full py-5 px-8 my-3">Action</th>
				</tr>
			</thead>
			<tbody>     
            @foreach($list as $data)
				<tr>
                    <td class="border border-slate-300 w-full py-5 px-8 my-3 text-center">
                        {{$data->id}}
					</td>
				    <td class="border border-slate-300 w-full py-5 px-8 my-3 text-center">
                        {{$data->name}}
					</td>
                    <td class="border border-slate-300 w-full py-5 px-8 my-3 text-center">
                        {{$data->workinghours}}
					</td>
                    <td class="border border-slate-300 w-full py-5 px-8 my-3 text-center">
                        {{$data->description}}
					</td>
					<td>
					<a href="{{url('/lists/edit')}}/{{$data->id}}" class="mx-0 bg-green-500 hover:bg-green-300 text-white py-2 px-2 rounded-lg" id="edit">Edit</a>
					<a href="{{url('/lists/delete')}}/{{$data->id}}" class="mx-0 bg-red-500 text-white py-2 px-2 rounded-lg">Delete</a>
					</td>
				</tr>
                @endforeach
			</tbody>
	    </table>
    </div></div>
</body>
</html>