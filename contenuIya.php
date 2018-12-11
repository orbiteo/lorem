<?php
  //affichage dynamique de contenu.php en f° des données déjà présentes dans la bdd
  include_once('donnees_contenu.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <title>IYA, Conseil et Stratégie</title>
    </head>
    
    <body>
    <!-- message d'erreur -->
    <?php if(isset($_GET['err']) && $_GET['err'] == '1') { ?>
        <div class="alert alert-danger">
          <strong>Erreur!</strong> Une erreur est survenue lors de l'envoi des informations, veuillez recommencer.
        </div>
      <?php
        }
        elseif(isset($_GET['err']) && $_GET['err'] == '2') { ?>
        <div class="alert alert-warning">
          <strong>Erreur!</strong> Le poids des images ne doit pas excéder 250Mo.
        </div>
      <?php
        }
      ?>
        <nav>
            <ul class="main-nav nav nav-tabs">
                <li class="nav-item active"><a href="#accueil" class="nav-link" data-toggle="tab">Accueil</a></li>
                <li class="nav-item active"><a href="#commInterne" class="nav-link" data-toggle="tab">Communication Interne</a></li>
                <li class="nav-item active"><a href="#commExt" class="nav-link" data-toggle="tab">Communication Externe</a></li>
                <li class="nav-item active"><a href="#accompagnement" class="nav-link" data-toggle="tab">Accompagnement</a></li>
                <li class="nav-item active"><a href="#evenementiel" class="nav-link" data-toggle="tab">Evenementiel</a></li>
                <li class="nav-item"><a href="#apropos" class="nav-link" data-toggle="tab">À Propos</a></li>
                <li class="nav-item"><a href="inc.php/?act=dec" class="nav-link">Se déconnecter</a></li>
            </ul>
        </nav>
        <form method="post" action="modif.php" class="tab-content" enctype="multipart/form-data">
            <!-- PAGE ACCEUIL -->
            <div id="accueil" class="tab-pane fade in active show">
            
                <header>
                    <div class="header">
                        <div class="logo-nav">
                            <div class="logo">
                                <a href="#"><img src="img/logo-iya.jpg" alt="logo"></a>
                            </div>
                        </div> 

                        <div class="titre_principal">
                            <h1>Conseil & Stratégie</h1>
                        </div>
                        
                        <div class="text-header">
                            <textarea placeholder="Rédigez un texte de 50 mots svp" class="comments200words" name="texte1" rows="5" cols="50"><?php if(isset($contenuTexte1)){echo $contenuTexte1;} ?></textarea>
                            <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /50</p>
                        </div>
                    </div>    
                </header>
                <section class="section1">
                    <div>
                        <img src="img/logo-iya.jpg" alt="logo"/>
                    </div>
                    <div>
                        <textarea placeholder="Rédigez un texte de 200 mots svp" class="comments200words" name="texte2" rows="10" cols="50"><?php if(isset($contenuTexte2)){echo $contenuTexte2;} ?></textarea>
                        <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /200</p>
                    </div>
                    <div class="w3-container">
                        <a href="#" class="w3-button w3-black">Nos Services</a>
                    </div>
                </section>
                <section class="section3">
                    <div class="blocs">
                        <div class="txt-btn">
                            <h2>Communication interne</h2>
                                <textarea placeholder="Rédigez un texte de 200 mots svp" class="comments200words" name="texte3" rows="10" cols="50"><?php if(isset($contenuTexte3)){echo $contenuTexte3;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /200</p>
                            <div class="w3-container">
                                <a href="#" class="w3-button w3-black">En savoir plus</a>
                            </div>
                        </div>
                    </div>

                    <div class="blocs">
                        <div class="txt-btn">
                            <h2>Communication externe</h2>
                                <textarea placeholder="Rédigez un texte de 200 mots svp" class="comments200words" name="texte4" rows="10" cols="50"><?php if(isset($contenuTexte4)){echo $contenuTexte4;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /200</p>
                            <div class="w3-container">
                                <a href="#" class="w3-button w3-black">En savoir plus</a>
                            </div>
                        </div> 
                    </div>   
                </section>

                <section class="section3"> 
                    <div class="blocs">
                        <div class="txt-btn">
                            <h2>Accompagnement</h2>
                                <textarea placeholder="Rédigez un texte de 200 mots svp" class="comments200words" name="texte5" rows="10" cols="50"><?php if(isset($contenuTexte5)){echo $contenuTexte5;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /200</p>
                            <div class="w3-container"> 
                                <a href="#" class="w3-button w3-black">En savoir plus</a>
                            </div>
                        </div>
                    </div>

                    <div class="blocs">
                        <div class="txt-btn">
                            <h2>Événementiel</h2>
                                <textarea placeholder="Rédigez un texte de 200 mots svp" class="comments200words" name="texte6" rows="10" cols="50"><?php if(isset($contenuTexte6)){echo $contenuTexte6;}?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /200</p>
                            <div class="w3-container">                             
                                <a href="#" class="w3-button w3-black">En savoir plus</a>
                            </div>
                        </div>  
                    </div>      
                </section>

                <section>
                    <div>
                        <img src="img/slide-logo.jpg" alt="banniere" id="slidelogo"/>
                    </div>
                </section>
            </div>

            <!-- PAGE SERVICES => COMM INTERNE -->
            <div id="commInterne" class="tab-pane fade in">
                <header>
                    <div class="header">
                        <div class="logo-nav">
                            <div class="logo">
                                <a href="#accueil"><img src="img/logo-iya.jpg" alt="logo"></a>
                            </div> 
                        </div> 

                        <div class="titre_principal">
                            <h1>Communication interne</h1>
                        </div>
                        
                    </div>    
                </header>
                <section class="section1">
                    <div>
                        <h2>Communication interne</h2>
                    </div>
                    <div class="text1">
                        <textarea placeholder="Rédigez un texte de 200 mots svp" class="comments200words" name="texte45" rows="10" cols="50"><?php if(isset($contenuTexte45)){echo $contenuTexte45;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /200</p>
                    </div>
                </section>

                <section class="section2">
                    <div class="blocs">
                        <div class="txt-btn">
                            <textarea placeholder="TITRE" class="comments200words" name="texte46" rows="2" cols="50"><?php if(isset($contenuTexte46)){echo $contenuTexte46;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /5</p>
                            <textarea placeholder="Rédigez un texte de 200 mots svp" class="comments200words" name="texte47" rows="10" cols="50"><?php if(isset($contenuTexte47)){echo $contenuTexte47;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /200</p>
                        </div>
                    </div>

                    <div class="blocs">
                        <div class="txt-btn">
                            <textarea placeholder="TITRE" class="comments200words" name="texte48" rows="2" cols="50"><?php if(isset($contenuTexte48)){echo $contenuTexte48;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /5</p>
                            <textarea placeholder="Rédigez un texte de 200 mots svp" class="comments200words" name="texte49" rows="10" cols="50"><?php if(isset($contenuTexte49)){echo $contenuTexte49;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /200</p>
                        </div> 
                    </div>   
                </section>

                <section class="section3"> 
                    <div class="blocs">
                        <div class="txt-btn">
                            <textarea placeholder="TITRE" class="comments200words" name="texte50" rows="2" cols="50"><?php if(isset($contenuTexte50)){echo $contenuTexte50;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /5</p>
                            <textarea placeholder="Rédigez un texte de 200 mots svp" class="comments200words" name="texte51" rows="10" cols="50"><?php if(isset($contenuTexte51)){echo $contenuTexte51;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /200</p>
                        </div>
                    </div>

                    <div class="blocs">
                        <div class="txt-btn">
                            <textarea placeholder="TITRE" class="comments200words" name="texte52" rows="2" cols="50"><?php if(isset($contenuTexte52)){echo $contenuTexte52;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /5</p>
                            <textarea placeholder="Rédigez un texte de 200 mots svp" class="comments200words" name="texte53" rows="10" cols="50"><?php if(isset($contenuTexte53)){echo $contenuTexte53;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /200</p>
                        </div>  
                    </div>      
                </section>

                <section class="section4">
                    <div class="blocs">
                        <div class="txt-btn">
                            <textarea placeholder="TITRE" class="comments200words" name="texte54" rows="2" cols="50"><?php if(isset($contenuTexte54)){echo $contenuTexte54;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /5</p>
                            <textarea placeholder="Rédigez un texte de 200 mots svp" class="comments200words" name="texte55" rows="10" cols="50"><?php if(isset($contenuTexte55)){echo $contenuTexte55;} ?></textarea> 
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /200</p>
                        </div>
                    </div>
        
                    <div class="blocs">
                        <div class="txt-btn">
                            <textarea placeholder="TITRE" class="comments200words" name="texte56" rows="2" cols="50"><?php if(isset($contenuTexte56)){echo $contenuTexte56;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /5</p>
                            <textarea placeholder="Rédigez un texte de 200 mots svp" class="comments200words" name="texte76" rows="10" cols="50"><?php if(isset($contenuTexte76)){echo $contenuTexte76;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /200</p>
                            </div> 
                        </div>   
                </section>
        
                <section class="section5">
                    <div>
                        <img src="img/image_carre.jpg" alt="carre gris" class="centre"/>
                    </div>
                </section>
            
                <section class="section6">
                    <div class="blocs">
                        <div class="txt-btn">
                            <h2>Communication externe</h2>
                                <textarea placeholder="Rédigez un texte de 100 mots svp" class="comments200words" name="texte57" rows="8" cols="40"><?php if(isset($contenuTexte57)){echo $contenuTexte57;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /100</p>
                            <div class="w3-container">
                                <a href="#" class="w3-button w3-black">A Propos</a>
                            </div>
                        </div>
                    </div>
        
                    <div class="blocs">
                        <div class="txt-btn">
                            <h2>Accompagnement</h2>
                                <textarea placeholder="Rédigez un texte de 100 mots svp" class="comments200words" name="texte58" rows="8" cols="40"><?php if(isset($contenuTexte58)){echo $contenuTexte58;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /100</p>
                            <div class="w3-container">
                                <a href="#" class="w3-button w3-black">A Propos</a>
                            </div>
                        </div> 
                    </div>   
        
                    <div class="blocs">
                        <div class="txt-btn">
                            <h2>Evènementiel</h2>
                                <textarea placeholder="Rédigez un texte de 100 mots svp" class="comments200words" name="texte59" rows="8" cols="40"><?php if(isset($contenuTexte59)){echo $contenuTexte59;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /100</p>
                            <div class="w3-container">
                                <a href="#" class="w3-button w3-black">A Propos</a>
                            </div>
                        </div> 
                    </div>   
                </section>
            </div>

            <!-- PAGE SERVICES => COMM EXTERNE -->
            <div id="commExt" class="tab-pane fade in">
                <header>
                    <div class="header">
                        <div class="logo-nav">
                            <div class="logo">
                                <a href="#accueil"><img src="img/logo-iya.jpg" alt="logo"></a>
                            </div> 
                        </div> 

                        <div class="titre_principal">
                            <h1>Communication externe</h1>
                        </div>
                        
                    </div>    
                </header>
                <section class="section1">
                    <div>
                        <h2>Communication externe</h2>
                    </div>
                    <div class="text1">
                        <textarea placeholder="Rédigez un texte de 200 mots svp" class="comments200words" name="texte29" rows="10" cols="50"><?php if(isset($contenuTexte29)){echo $contenuTexte29;} ?></textarea>
                        <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /200</p>
                    </div>
                </section>

                <section class="section2">
                    <div class="blocs">
                        <div class="txt-btn">
                            <textarea placeholder="TITRE" class="comments200words" name="texte30" rows="2" cols="50"><?php if(isset($contenuTexte30)){echo $contenuTexte30;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /5</p>
                            <textarea placeholder="Rédigez un texte de 200 mots svp" class="comments200words" name="texte31" rows="10" cols="50"><?php if(isset($contenuTexte31)){echo $contenuTexte31;} ?></textarea>
                            <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /200</p>
                        </div>
                    </div>

                    <div class="blocs">
                        <div class="txt-btn">
                            <textarea placeholder="TITRE" class="comments200words" name="texte32" rows="2" cols="50"><?php if(isset($contenuTexte32)){echo $contenuTexte32;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /5</p>
                            <textarea placeholder="Rédigez un texte de 200 mots svp" class="comments200words" name="texte33" rows="10" cols="50"><?php if(isset($contenuTexte33)){echo $contenuTexte33;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /200</p>
                        </div> 
                    </div>   
                </section>

                <section class="section3"> 
                    <div class="blocs">
                        <div class="txt-btn">
                            <textarea placeholder="TITRE" class="comments200words" name="texte34" rows="2" cols="50"><?php if(isset($contenuTexte34)){echo $contenuTexte34;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /5</p>
                            <textarea placeholder="Rédigez un texte de 200 mots svp" class="comments200words" name="texte35" rows="10" cols="50"><?php if(isset($contenuTexte35)){echo $contenuTexte35;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /200</p>
                        </div>
                    </div>

                    <div class="blocs">
                        <div class="txt-btn">
                            <textarea placeholder="TITRE" class="comments200words" name="texte36" rows="2" cols="50"><?php if(isset($contenuTexte36)){echo $contenuTexte36;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /5</p>
                            <textarea placeholder="Rédigez un texte de 200 mots svp" class="comments200words" name="texte37" rows="10" cols="50"><?php if(isset($contenuTexte37)){echo $contenuTexte37;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /200</p>
                        </div>  
                    </div>      
                </section>

                <section class="section4">
                    <div class="blocs">
                        <div class="txt-btn">
                            <textarea placeholder="TITRE" class="comments200words" name="texte38" rows="2" cols="50"><?php if(isset($contenuTexte38)){echo $contenuTexte38;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /5</p>
                            <textarea placeholder="Rédigez un texte de 200 mots svp" class="comments200words" name="texte39" rows="10" cols="50"><?php if(isset($contenuTexte39)){echo $contenuTexte39;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /200</p>
                        </div>
                    </div>
        
                    <div class="blocs">
                        <div class="txt-btn">
                            <textarea placeholder="TITRE" class="comments200words" name="texte40" rows="2" cols="50"><?php if(isset($contenuTexte40)){echo $contenuTexte40;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /5</p>
                            <textarea placeholder="Rédigez un texte de 200 mots svp" class="comments200words" name="texte41" rows="10" cols="50"><?php if(isset($contenuTexte41)){echo $contenuTexte41;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /200</p>
                        </div>
                    </div>
                </section>
        
                <section class="section5">
                    <div>
                        <img src="img/image_carre.jpg" alt="carre gris" class="centre"/>
                    </div>
                </section>
            
                <section class="section6">
                    <div class="blocs">
                        <div class="txt-btn">
                            <h2>Communication interne</h2>
                                <textarea placeholder="Rédigez un texte de 100 mots svp" class="comments200words" name="texte42" rows="8" cols="40"><?php if(isset($contenuTexte42)){echo $contenuTexte42;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /100</p>
                            <div class="w3-container">
                                <a href="#" class="w3-button w3-black">A Propos</a>
                            </div>
                        </div>
                    </div>
        
                    <div class="blocs">
                        <div class="txt-btn">
                            <h2>Accompagnement</h2>
                                <textarea placeholder="Rédigez un texte de 100 mots svp" class="comments200words" name="texte43" rows="8" cols="40"><?php if(isset($contenuTexte43)){echo $contenuTexte43;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /100</p>
                            <div class="w3-container">
                                <a href="#" class="w3-button w3-black">A Propos</a>
                            </div>
                        </div> 
                    </div>   
        
                    <div class="blocs">
                        <div class="txt-btn">
                            <h2>Evènementiel</h2>
                                <textarea placeholder="Rédigez un texte de 100 mots svp" class="comments200words" name="texte44" rows="8" cols="40"><?php if(isset($contenuTexte44)){echo $contenuTexte44;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /100</p>
                            <div class="w3-container">
                                <a href="#" class="w3-button w3-black">A Propos</a>
                            </div>
                        </div> 
                    </div>   
                </section>
            </div>

            <!-- PAGE SERVICES => ACCOMPAGNEMENT -->
            <div id="accompagnement" class="tab-pane fade in">
                <header>
                    <div class="header">
                        <div class="logo-nav">
                            <div class="logo">
                                <a href="#accueil"><img src="img/logo-iya.jpg" alt="logo"></a>
                            </div> 
                        </div> 

                        <div class="titre_principal">
                            <h1>Accompagnement</h1>
                        </div>
                        
                    </div>    
                </header>
                <section class="section1">
                    <div>
                        <h2>Accompagnement</h2>
                    </div>
                    <div class="text1">
                        <textarea placeholder="Rédigez un texte de 200 mots svp" class="comments200words" name="texte14" rows="10" cols="50"><?php if(isset($contenuTexte14)){echo $contenuTexte14;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /200</p>
                    </div>
                </section>

                <section class="section2">
                    <div class="blocs">
                        <div class="txt-btn">
                            <textarea placeholder="TITRE" class="comments200words" name="texte15" rows="2" cols="50"><?php if(isset($contenuTexte15)){echo $contenuTexte15;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /5</p>
                            <textarea placeholder="Rédigez un texte de 200 mots svp" name="ameliorer" id="area2" rows="10" cols="50"></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /200</p>
                        </div>
                    </div>

                    <div class="blocs">
                        <div class="txt-btn">
                            <textarea placeholder="TITRE" class="comments200words" name="texte16" rows="2" cols="50"><?php if(isset($contenuTexte16)){echo $contenuTexte16;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /5</p>
                            <textarea placeholder="Rédigez un texte de 200 mots svp" class="comments200words" name="texte17" rows="10" cols="50"><?php if(isset($contenuTexte16)){echo $contenuTexte16;} ?></textarea>
                            <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /200</p>
                        </div> 
                    </div>   
                </section>

                <section class="section3"> 
                    <div class="blocs">
                        <div class="txt-btn">
                            <textarea placeholder="TITRE" class="comments200words" name="texte18" rows="2" cols="50"><?php if(isset($contenuTexte18)){echo $contenuTexte18;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /5</p>
                            <textarea placeholder="Rédigez un texte de 200 mots svp" class="comments200words" name="texte19" rows="10" cols="50"><?php if(isset($contenuTexte19)){echo $contenuTexte19;} ?></textarea>
                            <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /200</p>
                        </div>
                    </div>

                    <div class="blocs">
                        <div class="txt-btn">
                            <textarea placeholder="TITRE" class="comments200words" name="texte20" rows="2" cols="50"><?php if(isset($contenuTexte20)){echo $contenuTexte20;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /5</p>
                            <textarea placeholder="Rédigez un texte de 200 mots svp" class="comments200words" name="texte21" rows="10" cols="50"><?php if(isset($contenuTexte21)){echo $contenuTexte21;} ?></textarea>
                            <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /200</p>
                        </div>  
                    </div>      
                </section>

                <section class="section4">
                        <div class="blocs">
                            <div class="txt-btn">
                                <textarea placeholder="TITRE" class="comments200words" name="texte22" rows="2" cols="50"><?php if(isset($contenuTexte22)){echo $contenuTexte22;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /5</p>
                                <textarea placeholder="Rédigez un texte de 200 mots svp" class="comments200words" name="texte23" rows="10" cols="50"><?php if(isset($contenuTexte23)){echo $contenuTexte23;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /200</p>
                            </div>
                        </div>
    
                        <div class="blocs">
                            <div class="txt-btn">
                                <textarea placeholder="TITRE" class="comments200words" name="texte24" rows="2" cols="50"><?php if(isset($contenuTexte24)){echo $contenuTexte24;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /5</p>
                                <textarea placeholder="Rédigez un texte de 200 mots svp" class="comments200words" name="texte25" rows="10" cols="50"><?php if(isset($contenuTexte25)){echo $contenuTexte25;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /200</p>
                            </div> 
                        </div>   
                </section>

                <section class="section5">
                    <div>
                        <img src="img/image_carre.jpg" alt="carre gris" class="centre"/>
                    </div>
                </section>
    
                <section class="section6">
                    <div class="blocs">
                        <div class="txt-btn">
                            <h2>Communication interne</h2>
                                <textarea placeholder="Rédigez un texte de 100 mots svp" class="comments200words" name="texte26" rows="8" cols="40"><?php if(isset($contenuTexte26)){echo $contenuTexte26;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /100</p>
                            <div class="w3-container">
                                <a href="#" class="w3-button w3-black">A Propos</a>
                            </div>
                        </div>
                    </div>

                    <div class="blocs">
                        <div class="txt-btn">
                            <h2>Communication Externe</h2>
                                <textarea placeholder="Rédigez un texte de 100 mots svp" class="comments200words" name="texte27" rows="8" cols="40"><?php if(isset($contenuTexte27)){echo $contenuTexte27;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /100</p>
                            <div class="w3-container">
                                <a href="#" class="w3-button w3-black">A Propos</a>
                            </div>
                        </div> 
                    </div>   

                    <div class="blocs">
                        <div class="txt-btn">
                            <h2>Evènementiel</h2>
                                <textarea placeholder="Rédigez un texte de 100 mots svp" class="comments200words" name="texte28" rows="8" cols="40"><?php if(isset($contenuTexte28)){echo $contenuTexte28;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /100</p>
                            <div class="w3-container">
                                <a href="#" class="w3-button w3-black">A Propos</a>
                            </div>
                        </div> 
                    </div>   
                </section>
            </div>

            <!-- PAGE SERVICES => ÉVÈNEMENTIEL -->
            <div id="evenementiel" class="tab-pane fade in">
                <header>
                    <div class="header">
                        <div class="logo-nav">
                            <div class="logo">
                                <a href="#accueil"><img src="img/logo-iya.jpg" alt="logo"></a>
                            </div> 
                        </div> 

                        <div class="titre_principal">
                            <h1>ÉVÈNEMENTIEL</h1>
                        </div>
                        
                    </div>    
                </header>
                <section class="section1">
                    <div>
                        <h2>ÉVÈNEMENTIEL</h2>
                    </div>
                    <div class="text1">
                        <textarea placeholder="Rédigez un texte de 200 mots svp" class="comments200words" name="texte60" rows="10" cols="50"><?php if(isset($contenuTexte60)){echo $contenuTexte60;} ?></textarea>
                        <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /200</p>
                    </div>
                </section>

                <section class="section2">
                    <div class="blocs">
                        <div class="txt-btn">
                            <textarea placeholder="TITRE" class="comments200words" name="texte61" rows="2" cols="50"><?php if(isset($contenuTexte61)){echo $contenuTexte61;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /5</p>
                            <textarea placeholder="Rédigez un texte de 200 mots svp" class="comments200words" name="texte62" rows="10" cols="50"><?php if(isset($contenuTexte62)){echo $contenuTexte62;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /200</p>
                        </div>
                    </div>

                    <div class="blocs">
                        <div class="txt-btn">
                            <textarea placeholder="TITRE" class="comments200words" name="texte63" rows="2" cols="50"><?php if(isset($contenuTexte63)){echo $contenuTexte63;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /5</p>
                            <textarea placeholder="Rédigez un texte de 200 mots svp" class="comments200words" name="texte64" rows="10" cols="50"><?php if(isset($contenuTexte64)){echo $contenuTexte64;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /200</p>
                        </div> 
                    </div>   
                </section>

                <section class="section3"> 
                    <div class="blocs">
                        <div class="txt-btn">
                            <textarea placeholder="TITRE" class="comments200words" name="texte65" rows="2" cols="50"><?php if(isset($contenuTexte65)){echo $contenuTexte65;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /5</p>
                            <textarea placeholder="Rédigez un texte de 200 mots svp" class="comments200words" name="texte66" rows="10" cols="50"><?php if(isset($contenuTexte66)){echo $contenuTexte66;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /200</p>
                        </div>
                    </div>

                    <div class="blocs">
                        <div class="txt-btn">
                            <textarea placeholder="TITRE" class="comments200words" name="texte67" rows="2" cols="50"><?php if(isset($contenuTexte67)){echo $contenuTexte67;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /5</p>
                            <textarea placeholder="Rédigez un texte de 200 mots svp" class="comments200words" name="texte68" rows="10" cols="50"><?php if(isset($contenuTexte68)){echo $contenuTexte68;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /200</p>
                        </div>  
                    </div>      
                </section>

                <section class="section4">
                    <div class="blocs">
                        <div class="txt-btn">
                            <textarea placeholder="TITRE" class="comments200words" name="texte69" rows="2" cols="50"><?php if(isset($contenuTexte69)){echo $contenuTexte69;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /5</p>
                            <textarea placeholder="Rédigez un texte de 200 mots svp" class="comments200words" name="texte70" rows="10" cols="50"><?php if(isset($contenuTexte70)){echo $contenuTexte70;} ?></textarea> 
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /200</p>
                        </div>
                    </div>
        
                    <div class="blocs">
                        <div class="txt-btn">
                            <textarea placeholder="TITRE" class="comments200words" name="texte71" rows="2" cols="50"><?php if(isset($contenuTexte71)){echo $contenuTexte71;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /5</p>
                            <textarea placeholder="Rédigez un texte de 200 mots svp" class="comments200words" name="texte72" rows="10" cols="50"><?php if(isset($contenuTexte72)){echo $contenuTexte72;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /200</p>
                            </div> 
                        </div>   
                </section>
        
                <section class="section5">
                    <div>
                        <img src="img/image_carre.jpg" alt="carre gris" class="centre"/>
                    </div>
                </section>
            
                <section class="section6">
                    <div class="blocs">
                        <div class="txt-btn">
                            <h2>Communication INterne</h2>
                                <textarea placeholder="Rédigez un texte de 100 mots svp" class="comments200words" name="texte73" rows="8" cols="40"><?php if(isset($contenuTexte73)){echo $contenuTexte73;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /100</p>
                            <div class="w3-container">
                                <a href="#" class="w3-button w3-black">A Propos</a>
                            </div>
                        </div>
                    </div>
        
                    <div class="blocs">
                        <div class="txt-btn">
                            <h2>Accompagnement</h2>
                                <textarea placeholder="Rédigez un texte de 100 mots svp" class="comments200words" name="texte74" rows="8" cols="40"><?php if(isset($contenuTexte74)){echo $contenuTexte74;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /100</p>
                            <div class="w3-container">
                                <a href="#" class="w3-button w3-black">A Propos</a>
                            </div>
                        </div> 
                    </div>   
        
                    <div class="blocs">
                        <div class="txt-btn">
                            <h2>Communication externe</h2>
                                <textarea placeholder="Rédigez un texte de 100 mots svp" class="comments200words" name="texte75" rows="8" cols="40"><?php if(isset($contenuTexte75)){echo $contenuTexte75;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /100</p>
                            <div class="w3-container">
                                <a href="#" class="w3-button w3-black">A Propos</a>
                            </div>
                        </div> 
                    </div>   
                </section>
            </div>

            <!-- PAGE A PROPOS -->
            <div id="apropos" class="tab-pane fade in">
            
                <header>
                    <div class="header">
                        <div class="logo-nav">
                            <div class="logo">
                                <a href="#"><img src="img/logo-iya.jpg" alt="logo"></a>
                            </div> 
                        </div> 

                        <div class="titre_principal">
                            <h1>A propos</h1>
                        </div>
                    </div>    
                </header>
                <section>
                    <div>
                        <div class="flex1">
                            <div class="sect1">
                                <h2>Citation ?</h2>
                                    <textarea placeholder="Rédigez un texte de 50 mots svp" class="comments200words" name="texte7" rows="5" cols="50"><?php if(isset($contenuTexte7)){echo $contenuTexte7;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /50</p>
                            </div>
                            <div class="sect1">
                                <h2>Phrase / Slogan</h2>
                                    <textarea placeholder="Rédigez un texte de 50 mots svp" class="comments200words" name="texte8" rows="5" cols="50"><?php if(isset($contenuTexte8)){echo $contenuTexte8;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /50</p>
                            </div>
                        </div>    
                    </div>
                </section>  

                <section class="flex2">
                    <div class="info">
                        <h2>Marie Beauchaud</h3>
                        <ul>
                            <li>Directrice / IYA</li>
                            <li>Conseil et stratégie de communication</li>
                            <li>Accompagnement</li>
                            <li>Transformation Evenement</li>
                        </ul>
                    </div>
                        <textarea placeholder="Rédigez un texte de 200 mots svp" class="comments200words" name="texte9" rows="16" cols="50"><?php if(isset($contenuTexte9)){echo $contenuTexte9;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /200</p>
                </section>

                <section class="bg-grey section-portrait">  
                  <div class="form-group">
                    <img src="<?php if(isset($contenuImage1)){echo $contenuImage1;}else{echo 'img/img-portrait.png';} ?>" class="img-fluid img-portrait">
                  </div>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile1" name="image1">
                    <label class="custom-file-label" for="customFile1">Cliquez pour télécharger une image</label>
                  </div>
                  <h3>Directrice / IYA</h3>
                  <h2>Marie BEAUCHAUD</h2>
                </section>

                <section class="qualites">
                    <div>
                        <h2>Atouts</h2>
                        <textarea placeholder="Rédigez un texte de 100 mots svp" class="comments200words" name="texte10" rows="7" cols="30"><?php if(isset($contenuTexte10)){echo $contenuTexte10;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /100</p>
                    </div>
                    <div>
                        <h2>Valeurs</h2>
                        <textarea placeholder="Rédigez un texte de 100 mots svp" class="comments200words" name="texte11" rows="7" cols="30"><?php if(isset($contenuTexte11)){echo $contenuTexte11;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /100</p>
                    </div>
                    <div>
                        <h2>Objectifs</h2>
                        <textarea placeholder="Rédigez un texte de 100 mots svp" class="comments200words" name="texte12" rows="7" cols="30"><?php if(isset($contenuTexte12)){echo $contenuTexte12;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /100</p>
                    </div>
                </section>

                <section class="textcenter">
                    <div>
                        <textarea placeholder="Rédigez un texte de 300 mots svp" class="comments200words" name="texte13" rows="5" cols="120"><?php if(isset($contenuTexte13)){echo $contenuTexte13;} ?></textarea>
                                <p class="after-amount">Nombre de mots saisis <span class="wordcount">0</span> /300</p>
                    </div>
                </section>
            </div>

            <button type="submit" class="btn btn-primary btn-lg">Sauvegarder</button>
        </form>
        <script>
            $(function(){
                var wordCounts = {};
                $('.comments200words').on('keyup', function(){
                    var matches = this.value.match(/\b/g);
                    wordCounts[this.id] = matches ? matches.length / 2 : 0;
                    var finalCount = 0;
                    $.each(wordCounts, function(k, v) {
                        finalCount += v;
                    });
                    $(this).next().find('.wordcount').html(finalCount);
                });
            });
        </script>
    </body>

</html>