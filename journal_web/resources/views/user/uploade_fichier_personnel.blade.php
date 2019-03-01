@extends('layouts.entete')
@section('sayfoun')
 <section class="resume-section p-3 p-lg-5 d-flex d-column" id="ajoute"> <!-- section start-->
     <div class="my-auto"><!-- my-auto start-->

                                 @if ($errors->any())
           <div class="alert alert-danger">
               <ul>
                   @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                   @endforeach
               </ul>
           </div>
                                       @endif 
  <div><p>
  Un paragraphe est une section de texte en prose vouée au développement d'un point particulier souvent au moyen de plusieurs phrases, dans la continuité du précédent et du suivant. Sur le plan typographique, le début d'un paragraphe est marqué par un léger renfoncement (alinéa) ou par un saut de ligne. Le symbole .
  </p>
  </div>
<form class="" action="/profil/uploade_file" enctype="multipart/form-data"  method="post" style="padding-bottom: center">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="row m-b-1">
    <div class="col-sm-6 offset-sm-3">

      <div class="form-group inputDnD">
        <label class="sr-only" for="inputFile" required>TECH</label>
        <input type="file" name="officialDocument"  >
      </div>
      <button type="submit" class="btn btn-danger btn-block" >télécharger </button>
      
    </div>
  </div>
</div>
</form>
</div>
</section>

@endsection
