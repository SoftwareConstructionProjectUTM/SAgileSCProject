
@extends('layouts.app2')
@include('inc.style')
@include('inc.navbar')

@section('content')
@include('inc.title')

<br><br>
<form action="{{route('userstory.store')}}" method="post" enctype="multipart/form-data">
    @csrf

    <!--Sprint Name Value -->
    <input type="hidden" name="sprint_id" value="{{ $sprint_id }}"> 

    <div>
        <label for="role">Role : As a</label>
        <select name="role" id="role" class="form-control" onchange="updateUserStory()">
            <option value="" selected disabled>Select</option>
            @foreach($roles as $role)
                <option value="{{ $role }}"> {{ $role }}</option>
            @endforeach
        </select> 
        <div class="error"><font color="red" size="2">{{ $errors->first('role') }}</p></font></div>
    </div>
    <br>
    
    Means : I am able to<input type="text" name="means" id="means" style="margin-left:2.6em" onchange="updateUserStory()">
    <div class="error"><font color="red" size="2">{{ $errors->first('means') }}</p></font></div>
    <br>
    
    Ends :so that I can<input type="text" name="ends" id="ends" style="margin-left:2.6em" onchange="updateUserStory()"> (optional)
    {{-- <div class="error"><font color="red" size="2">{{ $errors->first('ends') }}</p></font></div> --}}
    <br><br>
    
    User Story :<input type="text" name="user_story" id="user_story" style="margin-left:2.5em; width: 1000px; height:50px"  >
    <div class="error"><font color="red" size="2">{{ $errors->first('user_story') }}</p></font></div>
    <br>
    
    {{-- Priority : 
    <select name="prio_story">
    @foreach($prios as $prio)
        <option value="{{ $prio->prio_name}}" {{ ((isset($prio->prio_name) && $prio->prio_name== $prio->prio_name)? "selected":"") }}>{{$prio->prio_name}}</option>
    @endforeach
    </select>

    <br><br><br> --}}
    <div>
        <label for="status_id">Status :</label>
        <select name="status_id" id="status_id" class="form-control">
            <option value="" selected disabled>Select</option>
            @foreach($statuses as $status)
                <option value="{{ $status->id }}">{{ $status->title }}</option>
            @endforeach
        </select> 
        <div class="error"><font color="red" size="2">{{ $errors->first('status_id') }}</font></div>
    </div>
    

    {{-- Status : <select name="title">
        @foreach($statuses as $statuses)
            <option value="{{ $statuses->title}}" {{ ((isset($statuses->title) && $statuses->title== $statuses->title)? "selected":"") }}>{{$statuses->title}}</option>
        @endforeach
    </select> --}}
    <br> <br>

    Assigned to :
    <select name="user_names[]" multiple>
        @foreach($teamlist as $teammember)
            <option value="{{ $teammember['username'] }}" {{ (old('user_names') && in_array($teammember['username'], old('user_names')) ? 'selected' : '') }}>
                {{ $teammember['username'] }} (Team: {{ $teammember['team_name'] }})
            </option>
        @endforeach
    </select>
    <div class="error"><font color="red" size="2">{{ $errors->first('user_id') }}</p></font></div>
    <br>
    
    <div>
        <label for="secfeatures">Security Features:</label>
        <br><br>
        @foreach($secfeatures as $secfeature)
            <label class="checkbox-inline">
                <input type="checkbox" id="secfeature_id" name="secfeature_id[]" value="{{ $secfeature->secfeature_name }}"> {{ $secfeature->secfeature_name }}
            </label>
        @endforeach
        <br><br><br>
    </div>

    <div>
        <label for="perfeatures">Performance Features:</label>
        <br><br>
        @foreach($perfeatures as $perfeature)
            <label class="checkbox-inline">
                <input type="checkbox" id="perfeature_id" name="perfeature_id[]" value="{{ $perfeature->perfeature_name }}"> {{ $perfeature->perfeature_name }}
            </label>
        @endforeach
        <br><br><br>
    </div>

    <button type="submit">Add User Story</button>
   
    </form>
    <br><br><br>

    <script>
        function updateUserStory() {
        var role = document.getElementById("role").value;
        var means = document.getElementById("means").value;
        var ends = document.getElementById("ends").value;
        var userStory = "As a " + role + ", I am able to " + means;
        if (ends.trim() !== "") {
            userStory += " so that I can " + ends;
        }
        document.getElementById("user_story").value = userStory;
    }
    </script>
@endsection
