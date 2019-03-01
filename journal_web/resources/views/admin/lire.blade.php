@extends('admin.admin')
@section('amal')
 
 
      <div class="row"><!-- row start-->
          <div class="col-lg-10"><!-- col-lg-8 start-->
          <h5 class="mt-4 ">{{$post->titre}}</h5>
          <hr>
          <p>publié à {{$post->created_at}} en domaine {{$post->category}}</p>
  @if(!empty($post->description))
  <article class="text-justify"><!-- article start-->
  <div class="card">
  <div class="card-body">
   {!! $post->description !!}
   </div>
   </div>
 </article><!-- article end-->
 @endif
   @if(!empty($post->image))

 @endif
    @if(!empty($post->video))
  
 @endif
 @php 
 $like_count=0;
 $dislike_count=0;
 $like_status="btn-secondry";
 $dislike_status="btn-secondry";
 @endphp


 @foreach($post->likes as $like)
 @php
 if($like->like==1)
 {
 $like_count++;
 }
 if($like->like==0)


 {
 $dislike_count++;

 }

if(Auth::check())
{
 if($like->like == 1 && $like->user_id == Auth::user()->id)
 {
 $like_status= "btn-success";
 }
  if($like->like == 0 && $like->user_id == Auth::user()->id)
 {$dislike_status= "btn-danger";}
}
@endphp

@endforeach

 <div style="padding-left: 45% ; border: none;">

 <i class="far fa-thumbs-up"></i><span>{{$like_count}}</span>
 <i class="fas fa-thumbs-down"></i><span> {{$dislike_count}}</span>
 <i class="fas fa-exclamation-circle"></i><span >1</span>
 

  <form  action="/article/{{$post->id}}/supprimer" method="post">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input  name="post_id" type="hidden" value="{{$post->id}}">
                  <button class="btn btn-danger">supprimer</button>
 </form>
 </div>
 <div class="media mb-4">
            
            <div class="media-body">
         
            
							          @foreach(DB::table('comentaires')->where('post_id','=',$post->id)->orderby('created_at')->get() as $comentaire)
							      <div class="media mb-4">
							            <img class="rounded-circle avatar" src="/uploads/avatars/{{DB::table('users')->where('id','=',$comentaire->user_id)->value('avatar') }}"  alt="{{DB::table('users')->where('id','=',$comentaire->user_id)->value('name') }}">
							           
							   <a class="text-danger">...</a>
							   <div class="text-muted" style="margin-left: 60%">
							   {{$comentaire->created_at}}
							  </div>
							  </div>

							          @endforeach
							          
							       


        </div >
     </div></div></div>
       
      
        

@endsection