@extends('Layouts.Layout')
@extends('Layouts.nav')
@section('content')
<section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Ajouet Member</h3>
                                </div>
                               @if(@session('success'))
                            <div style="margin-bottom:30px;">
                                <span class="font-medium text-success">{{session('success')}}</span>
                            </div>
                            @endif
                                <form method="POST" action="{{route('update.task' , ['id' => $task->id])}}">
                                 @csrf
                                 @method('patch')
                                    <select name="projetId" id="projetId">
                                        @foreach($projects as $project)
                                            <option value="{{ $project->id }}" @if($project->id == $task->projetId) selected @endif>
                                                {{ $project->nom }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="card-body">
                                        <div class="form-group">
                                        <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{$task->nom}}">
            @error('nom')
            <div>{{$message}}</div>
            @enderror
                                        </div>

                                        <div class="form-group">
                                        <label  for="description" class="form-label">Description</label>
            <textarea id="" cols="30" rows="3" class="form-control"  name="description">{{$task->description}}</textarea>
                                        </div>

                                    </div>
                                    @error('nom')
            <div>{{$message}}</div>
            @enderror

                                    <div class="card-footer">
                                        <a href="./index.html" class="btn btn-default">Cancel</a>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>

    </div>
    @endsection