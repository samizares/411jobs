@extends('master')

@section('styles')
   <!-- <link href="{{asset('plugins/datatable/css/datatables.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/datatable/css/dataTables.bootstrap.css')}}" rel="stylesheet"> -->
    <link href="{{asset('css/datatable.min.css')}}" rel="stylesheet">

@stop

@section('nav')
 @include('admin.partials.nav')
@stop

@section('sub-title')
 
@stop

@section('content')
<div class="col-md-2">
               <div class="panel panel-default">
                <div class="panel-body">
                <legend>Settings</legend>
                <ul class="list-group nav nav-tabs nav-stacked">
                  <li><a href="#overview" data-toggle="tab">Overview</a></li>
                  <li class="active"><a href="#posts" data-toggle="tab">Posts</a></li>
                  <li><a href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
                </div>
               </div>
              </div>
              
              <div class="col-md-10">
                <div class="tab-content" id="adminTab">
                  <div id="overview" class="tab-pane fade">
                    <p>hello</p>
                  </div>
                  <div id="posts" class="tab-pane fade active in">
                    @include('admin.partials.errors')
                     @include('admin.partials.success')
                    <table id="table_id" class="display">
                        <thead>
                            <tr>
                                <th>Post Title</th>
                                <th>Tags</th>
                                <th>Author</th>
                                <th>Status</th>
                                <th>Date Posted</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($posts as $post)
                            <tr>
                                <td>{{$post->title}}</td>
                                <td> @foreach($post->tags as $tag)<span> {{$tag->name}}</span>,@endforeach</td>
                                <td>Bolaji Alade</td>
                                <td>{{ $post->active ? 'Published' : 'Draft' }}</td>
                                <td>{{$post->created_at}}</td>
                                <td><span class="btn btn-sm fa fa-pencil"></span><span class="btn btn-sm fa fa-eye"></span><span class="btn btn-sm fa fa-trash"></span></td>
                            </tr>
            
                        </tbody>
                        @endforeach
                    </table>
                  </div>
                  <di id="settings" class="tab-pane fade"><p>hi</p></div>
                </div>
              </div>
            </div> <!-- row ends -->


  @endsection
@section('script')
 <script src="{{asset('plugins/datatable/js/datatables.js')}}"></script>
  <script src="{{asset('plugins/bootstrap-editable/bootstrap-editable.min.js')}}"></script>
      <script type="text/javascript">
          // datatables
          $(document).ready( function () {
              $('#table_id').DataTable({
                order: [[0, "desc"]]
              });
          });
          // tooltip
          $(document).ready(function(){
              $('[data-toggle="tooltip"]').tooltip(); 
          });
          // tinymce
          $(document).ready(function(){
            tinymce.init({selector:'textarea.textArea'});
          });
      </script>
  @stop