<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body>


    <div class="container">
        <h2>Vos coordonnées</h2>

        <form id="form1" name="form1" action="script.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="societe">Société : </label>
                <input type="text" id="societe" name="societe" placeholder="Jauron" />
               
            </div>

            <div class="form-group">
                <label for="contact">Contact : </label>
                <input type="text" name="contact" id="contact" placeholder="Eric dupont" />
               
            </div>

            <div class="form-group">
                <label for="adEntreprise">Adresse entreprise : </label>
                <input type="textarea" name="adEntreprise" id="adEntreprise" placeholder="12 rue ..." />
               
            </div>

            <div class="form-group">
                <label for="CP">Code postal : </label>
                <input type="Number" name="CP" id="CP" maxlength="5" placeholder="00000" />
               
            </div>

            <div class="form-group">
                <label for="ville">Ville : </label>
                <input type="text" name="ville" id="ville" placeholder="Lille" />
                
            </div>

            <div class="form-group">
                <label for="mail">Email : </label>
                <input type="email" name="mail" id="mail" placeholder="ch@ch.f" />
                
            </div>

            <div class="form-group">
                <label for="tel">Tel : </label>
                <input type="Number" name="tel" id="tel" minlength="10" maxlength="10" placeholder="0600000000" />
                
            </div>

            <div class="form-group">
                <label for="env">Environnement tech du projet : </label>
                <select name="env" id="env">
                    <option value="access">access</option>
                    <option value="java">java</option>
                    <option value="delphi">delphi</option>
                    <option value="windev">windev</option>
                    <option value="visualBasic">visual basic</option>
                    <option value="powerBuilder">power builder</option>
                    <option value="internet">internet</option>
                    <option value="intranet">intranet</option>
                    <option value="windowsNT">windows NT</option>
                    <option value="Unix">unix</option>
                    <option value="SQLServer">sql server</option>
                    <option value="oracle">oracle</option>
                    <option value="autre">autre ...</option>
                </select>
                
            </div>

            <div class="form-group">
                <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
                <input type="file" name="fichier" id="fichier">
            </div>

            <button class="btn btn-primary" type="submit" id="idSubForm1" name="submit">Envoyer</button>


        </form>


        <div class="case">
        <div class="base" draggable="true"></div>
    </div>

    <div class="case"></div>
    <div class="case"></div>
    <div class="case"></div>

    </div>

    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>