@extends('acc.contact')
@section('page')

            <div class="world-latest-articles">

                <div class="row">

                    <div class="col-12 col-lg-8">  
<div class="single-blog-post post-style-4 d-flex  wow== fadeInUpBig" data-wow-delay="0.3s">
                          
                           <div class="post-thumbnail">
                               </div>
                            
                            <!-- Post Content -->
                  <div class="post-content">
					                            <img class="rounded-circle avatar" src="/uploads/avatars/{{DB::table('users')->where('id','=',$post->user_id)->value('avatar') }}"  alt="{{DB::table('users')->where('id','=',$post->user_id)->value('name') }}">  {{DB::table('users')->where('id','=',$post->user_id)->value('name') }}
					                                
                             						 <h3>{{$post->titre}}</h3>
                              						 @if(!empty($post->description))
                                 					   <h5>{!!$post->description!!}</h5>
                               									 @endif
                               							
								                                @if(!($post->image=="null"))
								    							<div>{{$post->sujet}}</div>
								  								 <img style="width: 450px; height: 450px; margin-left: 20%;" src="/uploads/post_image/{{$post->image}}">
								     							  @endif
							     							  @if(!($post->video=="null"))
														       <div>{{$post->sujet}}</div>
														        <div width="450" height="450" style=" margin-left: 20%;">
                                    {!! LaravelVideoEmbed :: parse ( $post->video ) !!}
                                    </div>

														       @endif
						
					                                <!-- Post Meta -->
					                                <div class="post-meta">
					                                    <p><a href="#" class="post-author">publié </a> à <a href="#" class="post-date" style="color:red;">{{$post->created_at}}</a>  </p>                      
					                                </div>
				         <div class="post-meta">
				                                  
				                                   
				         <div class=" container" style="padding-left: 30% ; border: none;">
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
                            @if(Auth::user()->journaliste=1)
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
				                   </div>
                               @endif
                               
                  				 <img class="rounded-circle avatar" src="/uploads/avatars/{{ Auth::user()->avatar }}"  alt="">
          						  <div class="media-body">
               						<h5 class="mt-0">Commenter </h5>
              						<div class="card-body">
             							 
             							 <form method="post" action="/article/comentaire/{{$post->id}}" >
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
								                       <button type="submit" class="btn btn-primary">commenter</button>
								         </form>

                                  </div>
                                  </div>

					          @foreach(DB::table('comentaires')->where('post_id','=',$post->id)->orderby('created_at','desc')->get() as $comentaire)
					         
					            <img class="rounded-circle avatar" src="/uploads/avatars/{{DB::table('users')->where('id','=',$comentaire->user_id)->value('avatar') }}"  alt="{{DB::table('users')->where('id','=',$comentaire->user_id)->value('name') }}">
					            
                            
                             <p>
                             {{$comentaire->content}} ...
                             </p>
                             <p style="margin-left: 60%">
								   {{$comentaire->created_at}}
						     </p>
						
								 
                             
								          @endforeach
			          
            
            </div></div></div></div></div>

<script type="text/javascript" src="{{url('/js/jquery-3.3.1.js')}}"></script>
<script type="text/javascript" >

$.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });



  $("#btn{{$post->id}}").on('click',function()
{

var post_id = $(this).attr('value');
var x={
  "post_id":post_id, 

'_token': '{{ csrf_token() }}'
} ;
$.ajax({
        type: "POST",
        url: "/likes", 
        data: x,
        cache: false,

   


        success: function (data) {
             if(data.is_like==1)
             {
              $("#btn{{$post->id}}").removeClass("btn-default");
              $("#btn{{$post->id}}").addClass( "btn-success" );
               $("#count{{$post->id}}").text( data.count_like);

             }
            
            if(data.is_like==0){
               $("#btn{{$post->id}}").removeClass("btn-success");
              $("#btn{{$post->id}}").addClass( "btn-default" );
               $("#count{{$post->id}}").text( data.count_like);

            }
            else{
              $("#btn{{$post->id}}").removeClass("btn-default");
              $("#btn{{$post->id}}").addClass( "btn-success");
              $("#count{{$post->id}}").text( data.count_like);

              $("#dis{{$post->id}}").removeClass("btn-danger");
              $("#dis{{$post->id}}").addClass( "btn-default" );
              $("#count_dis{{$post->id}}").text( data.count_dislike);


            }


        },

       

    });

});


</script>









<script type="text/javascript" >

$.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });




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
           if(data.is_dislike==1){

              $("#dis{{$post->id}}").removeClass("btn-default");
              $("#dis{{$post->id}}").addClass( "btn-danger");
               $("#count_dis{{$post->id}}").text( data.count_dislike);
                                }
           if(data.is_dislike==0){
               $("#dis{{$post->id}}").removeClass("btn-danger");
              $("#dis{{$post->id}}").addClass( "btn-default" );
               $("#count_dis{{$post->id}}").text( data.count_dislike);
            }
            else
            {
              $("#btn{{$post->id}}").removeClass("btn-success");
              $("#btn{{$post->id}}").addClass( "btn-default" );
              $("#count{{$post->id}}").text( data.count_like);
              $("#dis{{$post->id}}").removeClass("btn-default");
              $("#dis{{$post->id}}").addClass( "btn-danger");
              $("#count_dis{{$post->id}}").text(data.count_dislike);

            }

        },

       

    });


    });



</script>






<script type="text/javascript">

   $("#signaler{{$post->id}}").on('click',function()
{
var post_id = $(th is).attr('value'); 
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


</script>




@endsection