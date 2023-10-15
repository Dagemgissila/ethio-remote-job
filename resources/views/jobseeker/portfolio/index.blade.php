@extends("jobseeker.layouts.app")
@section("content")
<div class="card mt-4">
    @if(session()->has("success"))
    <div class="alert alert-success">
        {{session("success")}}
        </div>
    @endif
    <div class="table-responsive p-3">
        <table class="table table-hover">
        <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Title</th>
                        <th scope="col">Link</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
            @if($portfolio->count() > 0)
               
                <tbody>
                    @php
                        $i = 0;
                    @endphp
                    @foreach($portfolio as $p)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$p->title}}</td>
                            <td><a href="{{$p->link}}" target="_blank">{{$p->link}}</a></td>
                            <td>
                                @foreach($p->images as $image)
                                    <img src="{{ asset($image) }}" alt="Image">
                                @endforeach
                            </td>
                            <td>
                            <form action="{{route('delete.portfolio')}}" method="post">
                               @csrf
                               <input type="hidden" name="id" value="{{$p->id}}">
                               <button class="btn btn-primary"><span class="mdi mdi-trash-can menu-icon fs-5"></span></button>
                              
                            </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            @endif
        </table>
    </div>
</div>
@endsection
