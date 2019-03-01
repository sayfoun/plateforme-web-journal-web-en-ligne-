<!DOCTYPE html>
<html lang="en">
    <head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="/index/style.css" rel="stylesheet"  >
        <link href="/index/web-fonts-with-css/css/fontawesome-all.min.css" rel="stylesheet"  >
        <link href="/index/animate.css" rel="stylesheet"  >
        <link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">
    </head>
    <body>
       <header>

           <div class="headerleft">
          <a href="" class="item1"> Acceuill</a>
           <a href="#Apropos" class="item2"><i class="fas fa-exclamation-circle"></i> A propos</a>
           <a href="#notreservice" class="item4"><i class="fas fa-dolly-flatbed"></i> Notre service</a>
           <a href="#contact" class="item3"><i class="fas fa-envelope"></i> Contact</a>
       </div>   
            
                            
                        
            <div class="headerright">
            @if (Auth::guest())
            <a  class="item5 itemr"  href="{{ url('/login') }}"><i class="fas fa-sign-in-alt"></i> Login</a>
                        <a class="item6 itemr" href="{{ url('/register') }}"><i class="fas fa-user-plus"></i> Register</a>

          @else
           <a  class="item6 itemr" style="margin-left: 50%" href="/profil"><i class="fas fa-user-md"></i> profil</a>
            @endif
       </div>  
                  
       </header>
       
        <div class="container">
          
            <p class="animated infinite flash">Rejoindre-nous dans notre reseau des journalistes professionels</p>
            <a class="insbtn" href="{{ url('/register') }}"><i class="fas fa-edit"></i> Inscription </a>
        </div>
        <a name="Apropos"></a>
        <div name="Apropos" class="apropos" >
           
           <img src="/img/apropos.png" class="aproposimg" data-aos="fade-up">
           <p data-aos="fade-up">
               Notre Journal Web presente une solution efficace pour les<br> journalistes pour partager leurs articles a travers une<br> plateforme web dedié pour eux.<br >
               Notre plateforme se caracterise par la simplicité d'utlisation<br> a travers des technologies web modernes.
           </p>
            
            
        </div>
        <a name="notreservice"></a>
        <div name="notreservice" class="notreservice">
           
           <img src="/img/service.png" class="serviceimg" data-aos="fade-up">
           <p data-aos="fade-up">
               Notre Journal Web presente une solution efficace pour les<br> journalistes pour partager leurs articles a travers une <br>plateforme web dedié pour eux.<br >
               Notre plateforme se caracterise par la simplicité d'utlisation<br> a travers des technologies web modernes.
           </p>
            
            
        </div>
        <a name="contact"></a>
        <div name="contact" class="contact">
           
          <form>
             <div class="divcontact" data-aos="fade-up">
                  <input type="text" name="name" class="input" placeholder="votre nom ...">
              
                  <input type="email" class="input" name="mail" placeholder="votre email ...">
                 
             </div>
             
             <div class="divcontact" data-aos="fade-up">
                  <textarea placeholder="votre message ..."></textarea>
                 
             </div>
             
              <div class="divcontact" data-aos="fade-up">
                 <br>
                  <input  type="submit" value="Envoyer">
              </div>
          </form>
            
            
        </div>
        <script src="/index/wow.min.js"></script>
        <script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>
        <script>
        AOS.init();
        </script>
        <script>
        wow.init();
        </script>
        
    </body>
</html>


     
      
                        
               
  

        