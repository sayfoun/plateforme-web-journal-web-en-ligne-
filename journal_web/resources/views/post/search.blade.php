@extends('layouts.entete')
@section('sayfoun')
  <br><br><br>
<section class="resume-section p-3 p-lg-5  d-column" id="ajoute">
       <div class="my-auto">   
     @foreach($postes as $post)
     <div class="card" style="background-color:#D3D3D3;" ><h3 style="padding-left: 35%; ">{{$post->titre}}</h3></div>
          <p>publié à {{$post->created_at}} en domaine <span>{{$post->category}}</span></p>
          <hr>
                                                      <button style="border:none; margin-left: 98%;"
                                                      "  data-toggle="dropdown">...
                                                      </button>
                                                      <ul class="dropdown-menu" style="border:none;"">
                                                      <li>
                                                      <form method="post" action="/profil/article/{{$post->id}}/supprimer">
                                                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                       <input  name="post_id" type="hidden" value="{{$post->id}}">
                                                      <button type="submit">supprimer</button>    
                                                      </form>
                                                      </li>
                                                      </ul>



    @if(!empty($post->description))
    <div class="card">
        {!!$post->description!!}
        </div>
    @endif
      @if(!($post->image=="null"))
    <div>{{$post->sujet}}</div>
   <img style="width: 600px; height: 450px; margin-left: 20%;" src="/uploads/post_image/{{$post->image}}">
       @endif
       @if(!($post->video=="null"))
       <div>{{$post->sujet}}</div>
        <iframe width="600" height="450" style=" margin-left: 20%;"  src="{{$post->video}}">
</iframe>
       @endif
 

 <div class=" container" style="padding-left: 60% ; border: none;">
@php
$X=DB::table('likes')->where('like',1)->where('post_id', $post->id)->whereuser_id(Auth::user()->id)->count();
@endphp
@if( $X ===0)
 <button type="button" id="btn{{$post->id}}" value="{{$post->id}}"    class="  btn btn-default"> like <i class="far fa-thumbs-up"></i><span id="count{{$post->id}}" > 
    {{ DB::table('likes')->where('like',1)->where('post_id', $post->id)->count()}} </span></button>
@else
 <button type="button" id="btn{{$post->id}}" value="{{$post->id}}"   class="  btn btn-success"> like<i class="far fa-thumbs-up"></i><span id="count{{$post->id}}" > {{ DB::table('likes')->where('like',1)->where('post_id', $post->id)->count()}} </span></button>
@endif





@php
$X=DB::table('likes')->where('post_id', $post->id)->where('like',0)->whereuser_id(Auth::user()->id)->count();
@endphp
@if( $X ===0)
     <button type="button" id="dis{{$post->id}}"  value="{{$post->id}}" class="btn btn-default" >
      dislike<i class="fas fa-thumbs-down"></i>
      <span id="count_dis{{$post->id}}" > 
    {{ DB::table('likes')->where('like',0)->where('post_id', $post->id)->count()}} </span></button>
@else
<button type="button" id="dis{{$post->id}}"  value="{{$post->id}}" class="btn btn-danger" >
      dislike<i class="fas fa-thumbs-down"></i>
      <span id="count_dis{{$post->id}}" > 
    {{ DB::table('likes')->where('like',0)->where('post_id', $post->id)->count()}} </span></button>
@endif
@php
$y=DB::table('singales')->where('post_id', $post->id)->whereuser_id(Auth::user()->id)->count();
@endphp
@if( $y ===0)
 <button type="button" id="signaler{{$post->id}}" value="{{$post->id}}"  class="btn btn-secondry"> signaler <i class="fas fa-exclamation-circle"></i><span id="count_singale{{$post->id}}" > 
    {{ DB::table('singales')->where('post_id', $post->id)->count()}} </span></button>
 
 @else
 <button type="button" id="signaler{{$post->id}}" value="{{$post->id}}"  class="btn btn-dark"> signaler <i class="fas fa-exclamation-circle"></i><span id="count_singale{{$post->id}}" > 
    {{ DB::table('singales')->where('post_id', $post->id)->count()}} </span></button>
    @endif 
</div>
 <div class="media mb-4">
            <img class="rounded-circle avatar" src="/uploads/avatars/{{ Auth::user()->avatar }}"  alt="">
            <div class="media-body">
               <h5 class="mt-0">Commenter </h5>
              <div class="card-body">
              <form method="post" action="/article/{{$post->id}}/comentaire" >
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input  name="post_id" type="hidden" value="{{$post->id}}">  
              <div class="form-group" > 
               <textarea class="form-control" stlye="border-radius: 35px;" tpye="submit" name="content" rows="1"  value="{{ old('content') }}"required=""></textarea>
                               @if ($errors->has('content'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                @endif
                </div>
                <button type="submit" class="btn btn-primary">comenter</button>
              </form>
            
            </div>
           
          @foreach(DB::table('comentaires')->where('post_id','=',$post->id)->orderby('created_at')->get() as $comentaire)
      <div class="media mb-4">
            <img class="rounded-circle avatar" src="/uploads/avatars/{{DB::table('users')->where('id','=',$comentaire->user_id)->value('avatar') }}"  alt="{{DB::table('users')->where('id','=',$comentaire->user_id)->value('name') }}">
            <div class="media-body">

  {{$comentaire->content}}

   <a class="text-danger">...</a>
   <div class="text-muted" style="margin-left: 60%">
   {{$comentaire->created_at}}
   </div>
  </div>
  </div>

          @endforeach
          
          </div>


        </div >
      </div>
     </div>
     
   
     
@endforeach

<!--<iframe width="420" height="345" src="https://www.youtube.com/embed/tgbNymZ7vqY">
</iframe>
-->
 <div class="pagination">{!!$postes->links()!!}</div>
    </div>     
</section>
<script type="text/javascript" src="{{url('/js/jquery-3.3.1.js')}}"></script>
<script type="text/javascript" >

$.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


@foreach($postes as $post )

  $("#btn{{$post->id}}").on('click',function()
{

var like_s=$(this).attr('data_like');
var post_id = $(this).attr('value');


var x={
  "post_id":post_id, 
"like_s":like_s,
'_token': '{{ csrf_token() }}'
} ;
$.ajax({
        type: "POST",
        url: "/likes", 
        data: x,
        cache: false,

   


        success: function (data) {
        
            
            if(data.is_like==0){
               $("#btn{{$post->id}}").removeClass("btn-success");
              $("#btn{{$post->id}}").addClass( "btn-default" );
               $("#count{{$post->id}}").text( data.count_like);
            }
            else{
              $("#btn{{$post->id}}").removeClass("btn-default");
              $("#btn{{$post->id}}").addClass( "btn-success");
              $("#count{{$post->id}}").text( data.count_like);

            }

        },

       

    });

});
@endforeach

</script>









<script type="text/javascript" >

$.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


@foreach($postes as $post )

  $("#dis{{$post->id}}").on('click',function()
{
var post_id = $(this).attr('value');
var x={
  "post_id":post_id, 
'_token': '{{ csrf_token() }}'
} ;
$.ajax({
        type: "POST",
        url: "/dislikes", 
        data: x,
        cache: false,

   


        success: function (data) {
        if(data.is_dislike==0){
               $("#dis{{$post->id}}").removeClass("btn-danger");
              $("#dis{{$post->id}}").addClass( "btn-default" );
               $("#count_dis{{$post->id}}").text( data.count_dislike);
            }
            elseif(data.is_dislike==1)
            {
              $("#dis{{$post->id}}").removeClass("btn-default");
              $("#dis{{$post->id}}").addClass( "btn-danger");
              $("#count_dis{{$post->id}}").text(data.count_dislike);

            }

        },

       

    });


    });

@endforeach

</script>






<script type="text/javascript">
@foreach($postes as $post)
   $("#signaler{{$post->id}}").on('click',function()
{
var post_id = $(this).attr('value'); 
var x={
  "post_id":post_id, 
'_token': '{{ csrf_token() }}'
} ;


     $.ajax({
        type: "POST",
        url: "/signaler", 
        data: x,
        cache: false,
beforeSend: function()
            {
     console.log( this.data );
            },
        success: function (data) 
        {
        
          if(data.is_singale==0){
              $("#signaler{{$post->id}}").removeClass("btn-dark");
              $("#signaler{{$post->id}}").addClass("btn-secondry");
              $("#count_singale{{$post->id}}").text( data.count_singale);
            }
          if(data.is_singale==1){
                $("#signaler{{$post->id}}").removeClass("btn-secondry");
                $("#signaler{{$post->id}}").addClass("btn-dark"); 
                $("#count_singale{{$post->id}}").text( data.count_singale);
            }

        },
        error : function(resultat, statut, erreur)
        {
          console.log(erreur);

       }

    });

});

@endforeach
</script>

 @endsection

