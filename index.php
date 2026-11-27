<?php
require __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/fonctions.php';

use Symfony\Component\Asset\Package;
use Symfony\Component\Asset\VersionStrategy\JsonManifestVersionStrategy;
header('Content-Type: text/html; charset=UTF-8');

$package = new Package(new JsonManifestVersionStrategy(__DIR__.'/public/build/manifest.json'));

$success = false;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nom = trim($_POST['nom'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $objet = trim($_POST['objet'] ?? '');
    $message = trim($_POST['message'] ?? '');

    // Validation
    if (!$nom || !$email || !$objet || !$message) {
        $error = "All fields are mendatory";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Email address is bad";
    } elseif (
        preg_match('/[\r\n]/', $email) ||
        preg_match('/[\r\n]/', $objet)
    ) {
        $error = "Wrong choice of letters";
    } else {

        $destinataire = "paul.gilbert@outlook.fr";

        $sujet = "Contact site web : " . $objet;

        $corps = "
        Nouveau message depuis le site web.

        Nom : $nom
        Email : $email

        Message :
        $message
        ";

        $headers = [
            "From" => "gipa9644@gipa9644.odns.fr",
            "Reply-To" => $email,
            "Content-Type" => "text/plain; charset=UTF-8",
            "X-Mailer" => "PHP/" . phpversion()
        ];

        $success = mail(
            $destinataire,
            $sujet,
            $corps,
            $headers
        );

        if (!$success) {
            $error = "There was an error";
        }
    }


}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="IT assistant Toulouse, Help for your projects,
         website developpment, advice for organizing your apps and devices, 
         New performance IT connection for disabled people">
        <meta name="keywords" content="AI dev, fullstack toulouse, IT advice, Development of connected house for disabled people">
        <title>Digital services</title>
        <!-- <link rel="icon" href=""> -->
        <link rel="stylesheet" type="text/css" href=<?php echo $package->getUrl('public/build/app.css')?> >
        
        <script src=<?php echo $package->getUrl('public/build/runtime.js')?> defer></script>
        <script src=<?php echo $package->getUrl('public/build/app.js')?> defer></script>
    </head>

    <body>
        
        <header>
            <h1>Digital services</h1>
            <img class="bandeau-haut" src=<?php echo $package->getUrl('public/build/images/Electric_Blue_Data_Track2.png')?> alt="bandeau-data">
            <div class="h2-header">
            <h2>IT improvement</h2></div>
        </header>
        
        
        <main>
            <div class="nav-group">
                <nav> 
                    <ul>
                        <li><a href="#one-word">One word about what I can do</a></li>
                        <li><a href="#mes-references">Some of my projects</a></li>
                        <li><a href="#technologies">Technologies I use</a></li>
                        <li><a href="#some-pictures-projects">Some screens</a></li>
                        <li><a href="#contact">Contact details</a></li>
                        <li><a href="#un-mot-sur-moi" id="">One word about me</a></li>
                        
                        <!-- <li><a href="#ce-que-je-dis-sur-mes-services">What do I propose</a> 
                            <ul>
                                <li>One page website</li>
                                <li>Advice</li>
                                <li>Symfony website</li>
                                <li>Drupal website</li>
                                <li>Wordpress website</li>
                            </ul>
                        </li> -->
                    </ul>
                </nav>
                <div class="progress-container">
                    <div id="myBar" class="progress-bar"></div>
                </div>
            </div>


            <div class="center">
                <div class="largeur-700">
                    <section id="one-word">
                        <h3>One word about what I can do</h3>
                                <ul>
                                <li>IT development.</li>
                                <li>Advice about digital network.</li>
                                <li>Housing setup for disabled or elder people.</li>
                                </ul>
                    </section>
                </div>
            </div>

            <div class="container">
                <img class="image-milieu" src=<?php echo $package->getUrl('public/build/images/cobalt2.png')?> alt="bandeau-data">
                <div id="bar-mouvante1" class="mybar2"></div>
            </div>
            
            <div class="center">
                <div class="largeur-700">
                    <section id="mes-references">
                        <h3>Some of my projects</h3>
                        <ul>
                            <li>Mask subnet calculator
                                <p>At humans connexion, I develloped using javascript a subnet calculator.</p>
                                <a class="link" target="_blank" href="https://www.data-expertise.com/calculateur/index.php">IP calculator</a>
                            </li>
                            <li>Intranet of humans connexion
                                <p>At humans connexion, I also develloped an intranet. His functions were 
                                    showing of several links used by employees. Hability to make and submit surveys.
                                    Showing birthdays.  
                                </p>
                            </li>
                            <li>Showcase websites
                                <ul>
                                    <li>Sortie de crise (wordpress)</li>
                                    <li>Antiphona (wordpress)
                                        <p>Including an event manager. Made with ajax pagination.</p>
                                        <a class="link" target="_blank" href="https://ensemble-antiphona.org/">Antiphona</a>
                                    </li>
                                    <li>INRAE ODR (drupal)
                                        <p>The website has features of content management</p>
                                    </li>
                                </ul>
                            </li>
                            <li>INRAE ODR web platform to handle demands of researchers
                                <p>ODR researchers, can follow the statement of a demand, including commenting,
                                    submitting answers, a researching engine and statitics.</p>
                            </li>
                            <li>INRAE ODR web platform to publish data about crops
                                <p>In order to publish data about the kinds of crops that are settled on land,
                                    I made a tool to present the numbers.
                                </p>
                                <a class="link" target="_blank" href="https://www.youtube.com/watch?v=V1_lQoo8bKo">Presentation of the work I made for ODR</a>
                            </li>
                            <li>Website Atlas of plans
                                <p>I extended and refactored, the original code of the game. And maintained the website</p>
                                <a class="link" target="_blank" href="https://atlasofplans.com/">Atlas of plans</a>
                            </li> 
                            <li>Preeesents.fr
                                <p>I developped a platform to interact about wishes for christmas.</p>
                                <a class="link" target="_blank" href="https://preeesents.fr/">Preeesents</a> 
                            </li>     
                        </ul>
                    </section>
                </div>
            </div>

            <div class="container">
                <img class="image-milieu" src=<?php echo $package->getUrl('public/build/images/cobalt2.png')?> alt="bandeau-data">
                <div id="bar-mouvante2" class="mybar2"></div>
            </div>
            
            <div class="center">
                <div class="largeur-700">
                    <section id="technologies">
                        <h3>Technology I use</h3>
                        <ul>
                            <li>Html5, Sass, SCSS, Css</li>
                            <li>Wordpress, Drupal, Symfony, Django</li>
                            <li>PostgresSql, Mysql</li>
                            <li>Docker, Git</li>
                            <li>O2switch</li>
                        </ul>
                    </section>
                </div>
            </div>

            <div class="container">
                <img class="image-milieu" src=<?php echo $package->getUrl('public/build/images/cobalt2.png')?> alt="bandeau-data">
                <div id="bar-mouvante3" class="mybar2"></div>
            </div>
            
            <div class="center">
                    <!-- slider -->  
                    <section id="some-pictures-projects">
                        <h3>Some pictures of my projects</h3>
                        <div  class="scroll-container">
                            <div class="slide"><img src="<?php echo $package->getUrl('public/build/images/1.png')?>" alt=""></div>
                            <div class="slide"><img src="<?php echo $package->getUrl('public/build/images/2.png')?>" alt=""></div>
                            <div class="slide"><img src="<?php echo $package->getUrl('public/build/images/3.png')?>" alt=""></div>
                            <div class="slide"><img src="<?php echo $package->getUrl('public/build/images/4.png')?>" alt=""></div>
                            <div class="slide"><img src="<?php echo $package->getUrl('public/build/images/6.png')?>" alt=""></div>
                            <div class="slide"><img src="<?php echo $package->getUrl('public/build/images/7.png')?>" alt=""></div>
                            <div class="slide"><img src="<?php echo $package->getUrl('public/build/images/8.png')?>" alt=""></div>
                            <div class="slide"><img src="<?php echo $package->getUrl('public/build/images/9.png')?>" alt=""></div>
                            <div class="slide"><img src="<?php echo $package->getUrl('public/build/images/10.png')?>" alt=""></div>
                            <div class="slide"><img src="<?php echo $package->getUrl('public/build/images/11.png')?>" alt=""></div>
                            <div class="slide"><img src="<?php echo $package->getUrl('public/build/images/12.png')?>" alt=""></div>
                            <div class="slide"><img src="<?php echo $package->getUrl('public/build/images/13.png')?>" alt=""></div>
                        </div>
                    </section>
            </div>

            <div class="container">
                <img class="image-milieu" src=<?php echo $package->getUrl('public/build/images/cobalt2.png')?> alt="bandeau-data">
                <div id="bar-mouvante4" class="mybar2"></div>
            </div>
            
            
            <div class="center">
                <div class="largeur-700">
                  
                    <section id="contact">
                        <h3>Write to me.</h3>
                        <form method="POST">

                            <?php if ($success): ?>
                                <p class="success">Your message has been sent.</p>
                            <?php endif; ?>

                            <?php if ($error): ?>
                                <p class="error"><?= htmlspecialchars($error) ?></p>
                            <?php endif; ?>

                            <label>Name and nickname</label>
                            <input type="text" name="nom" required>

                            <label>Email address</label>
                            <input type="email" name="email" required>

                            <label>Object</label>
                            <input type="text" name="objet" required>

                            <label>Your message</label>
                            <textarea name="message" required></textarea>

                            <button type="submit">Send.</button>

                        </form>
                    </section>
                </div>
            </div>

            <div class="container">
                <img class="image-milieu" src=<?php echo $package->getUrl('public/build/images/cobalt2.png')?> alt="bandeau-data">
                <div id="bar-mouvante5" class="mybar2"></div>
            </div>
            
            <div class="center">
                <div class="largeur-700">
                    <section id="un-mot-sur-moi">
                        <h3>One word about me:</h3>
                            <p>I Was graduated as architect in 2012, and worked in some offices well knowed.
                            In 2019, as my experiences in housing developpment were poored, I decided
                            to give my profile a more technical dimension and was student at Universite
                            Paul Sabatier in computer technology. Since, I was developper at Humans connexion,
                            during one year, and engineer at Inrae during three years.</p>

                            <p>I focus on the developpment of websites with frameworks, like
                            symfony wordpress and drupal. My experience at inrae was interesting,
                            since she took a more independant dimension, like proposing initiatives
                            for the network. </p>

                            <p>I have developped many sites with symfony 6.4. And always participated to their deployment,
                            if not deploying them. I have at humans connexion, begun to implicate myself into tasks of
                            maintenance, like handling errors registered with google tools. At inrae, i have confirmed my
                            faculties of a more technical computer scientist. </p>

                            <p>These experiences give me an accurate profile of fullstack developper, 
                            and the hability to work on my own. Since I have practiced different sides of web 
                            developpment practices.</p>

                    </section>
                </div>
            </div>
            <div class="container">
                <img class="image-milieu" src=<?php echo $package->getUrl('public/build/images/cobalt2.png')?> alt="bandeau-data">
                <div id="bar-mouvante6" class="mybar2"></div>
            </div>
        </main>
        <footer>

        </footer>
    </body>

</html>
