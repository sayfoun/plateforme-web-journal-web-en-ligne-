@extends('layouts.entete')
@section('sayfoun')
<br><br><br>

  <section class="resume-section p-3 p-lg-5 d-flex d-column" id="ajoute" ">
         <div class="my-auto" style="padding-bottom: 0px;">
      <div class="card" style="background-color: #E6E6FA;" ><h3 style="padding-left: 35%; ">contact admin</h3></div>
       </br>
                 <div class="card">
                               @if ($errors->any())
                                      <div class="alert alert-danger">
                                         <ul>
                                             @foreach ($errors->all() as $error)
                                                 <li>{{ $error }}</li>
                                             @endforeach
                                         </ul>
                                      </div>
                                       @endif



    
                                 <p>si vous avez des questions sur l'application ou vous avez des propositions d'amélioration de notre site, contacter l'administrateur,  </p>
                                   <form class="mbr-form" action="/profil/Message/store" method="post" data-form-title="Mobirise Form">
                                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  <div class="row row-sm-offset">
                                  <div class="col-md-4 multi-horizontal" data-for="name">
                                  <div class="form-group">
                                  <label class="form-control-label mbr-fonts-style display-7" for="name-form1-4t">Sujet</label>
                                  <input type="text" class="form-control" name="sujet" data-form-field="Name" required="" id="name-form1-4t">
                                  </div>
                                  </div>
                                  </div>
                                  <div class="form-group" data-for="message">
                                <label class="form-control-label mbr-fonts-style display-7" for="message-form1-4t">Message</label>
                                <textarea type="text" class="form-control" name="message" required="" rows="7" data-form-field="Message" id="message-form1-4t"></textarea>
                                </div>
                                <span class="input-group-btn">
                                <button href="" type="submit" class="btn btn-primary btn-form display-4">Envoye</button>
                                </span>
                               </form>
                               @if(Auth::user()->journaliste==0)
                                <p> si vous voulez avoir les droits d'écriture,  ...  <a data-toggle="modal" data-target="#exampleModalCenter" style="color:red;">
                                Cliquez ici</a>
                                </p>
                                @endif
                                

                                                          
              </div>
</div>

              <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">
          <a href="#"  role="button" aria-expanded="false" style="position:relative; padding-left:50px;">
          <img  class="avatar" src="/uploads/avatars/{{ Auth::user()->avatar }}" >
           {{ Auth::user()->name }} {{ Auth::user()->last_name}}<span class="caret"></span>
          </a>
        </h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
                              <div class="modal-body">


                                      @if ($errors->any())
                                      <div class="alert alert-danger">
                                         <ul>
                                             @foreach ($errors->all() as $error)
                                                 <li>{{ $error }}</li>
                                             @endforeach
                                         </ul>
                                      </div>
                                       @endif
                               </form>
                               
                                <p> 
      envoyer votre fichier officiel pour avoir l'accé d'ètre  journaliste 
      si votre vous avez trouvé une difficulté dans l'envoi du fichier,
       contacter nous sur notre e-mail:  horisonlibre@gmail.com</p>
      
            <div class="card">
                  <form  action="/profil/uploade_file" enctype="multipart/form-data"  method="post" >
                  <input type="text" name="cin" placeholder="cin">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="file" name="officialDocument">
                  <button type="submit" class="btn btn-primary btn-block">télécharger</button>
                  </form>
            </div>
              <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button> 
              </div>
             </div>
      
    </div>
  </div>
</div>
</section>
 




    
@endsection
