
@foreach($ProjectsEX as $project)
    <div class="well">
        <div class="row">
            <div class="col-md-8 col-sm-8">
                <h3><a href="/projects/{{$project->id}}">{{$project->title}}</a></h3>
                <small>Written on {{$project->created_at}} by {{$project->user->name}}</small>
            </div>
        </div>
    </div>
@endforeach
