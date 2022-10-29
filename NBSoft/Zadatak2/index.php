<!DOCTYPE html>
<html lang="en" class="h-100" >
<head>
    <meta charset="UTF-8">
    <title>KRISTINA NANUŠESKI</title>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="h-100">

<!-
Zadatak 2: JS validacija forme
Koristeći Bootstrap, napraviti formu za unos korsinika u bazu. Forma bi trebalo da sadrži: ime, prezime, pol, godinu rođenja, adresu, grad. Na formi je obavezno da se nadje po jedan element: textfield, textarea, select, checkbox.
Uraditi validaciju forme, tako da ne može da se desi da korisnik unese nevalidne podatke.
Formu slati preko ajax funkcije.
Nakon slanja podataka, formu skloniti a na njeno mesto ispisati poruku za uspesno slanje poruke i poslate vrednosti -->

<div class="h-100 d-flex align-items-center">
    <div id="content" class="container">

        <div id="a"> </div>
<!-- onSubmit="return formCheck()" -->
            <form class="mx-5 px-5" onsubmit="getData()">
                <h1>Forma</h1>
                <!-- ime i prezime -->
                <div class="row">
                    <div class="col-md-6">
                        <label for="firstName">Ime</label>
                        <input name="firstName" type="text" class="form-control" id="firstName" placeholder="Ime...">
                    </div>

                    <div class="col-md-6">
                        <label for="lastName">Prezime</label>
                        <input name="lastName" type="text" class="form-control" id="lastName" placeholder="Prezime...">
                    </div>
                </div>

                <!-- datum rodjenja -->
                <div class="row">
                    <div class="col-md-4">
                    <label for="d">Dan</label>
                    <select class="form-control " name="d" id="d">
                        <!--
            <?php /*

                for($i=1; $i<=31; $i++):
                    ?>
                    <option> <?php echo $i ?> </option>>
                    <?php
                endfor */
                        ?> -->
                    </select>
                    </div>

                    <div class="col-md-4">
                    <label for="m">Mesec</label>
                    <select class=" form-control col-md-4" name="m" id="m">
                    </select>
                    </div>
                    <div class="col-md-4">
                    <label for="y">Godina</label>
                    <select class=" form-control col-md-4" id="y" name="y">
                    </select>
                    </div>
                </div>

                <!-- pewbivaliste-->
                <div class="row">
                    <div class="col-3">
                        <label for="city">Grad</label>
                        <select class="form-control" id="city" name="city">
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="address">Adresa</label>
                        <textarea placeholder="Adresa..." class="form-control" id="address" name="address"></textarea>
                    </div>

                </div>

                <div class="row">
                    <div class="col-3">
                        <div class="form-check">
                            <input class="gender" type="checkbox" name="gender" value ="mg" id="mg">
                            <label for="mg" >Muski</label>

                            <input class="gender" type="checkbox" id="fg" name="gender" value ="fg">
                            <label for="fg" >Zenski</label>
                        </div>
                    </div>
                </div>

                <!--type="submit"-->
                <button   name="submit" id="submit" class="btn btn-primary">Unesi</button>
            </form>


</div>
</div>


<script src="assets/js/main.js"></script>
</body>
</html>