$(document).ready(function(){
    displayDate("d");
    displayDate("m");
    displayDate("y");
    displayCities();
    $(".gender").change(changeSelectedGender)


    // 31. 12. pol m
    x = birthdayC([31,1,1900]);
    console.log(x);

    var newDate = new Date(1900, 1, 19);
    console.log(newDate);
})

function changeSelectedGender(){
    $('.gender').each(function(){
        $(this).prop("checked", false)
    })
    $(this).prop("checked", true)
}

function getData(){
    event.preventDefault();
    //var dataString = $("#form").serialize();
    //let firstName = document.getElementsByName("firstName").value;
    var firstName = $("#firstName").val();
    var lastName = $("#lastName").val();
    var city = $("#city").val(); // $("#city").children(":selected").attr("id");
    var address = $("#address").val();
    var birthday = [$("#d").val(), $("#m").val(), $("#y").val()]; //selektovani
    var gender = $(".gender:checked").val(); //selektovan


   if (formCheck(firstName,lastName,city,address,birthday,gender)){
        $.ajax({
            url: 'proba.php',
            method: 'POST',
            data: {
                firstName: firstName,
                lastName: lastName,
                city:city,
                address:address,
                birthday:birthday,
                gender:gender
            },
            success: function (){
                console.log("Uspesno");
                var cityName = $("#city").children(":selected").text();
                var gen = gender === "fr" ? "Zenski" : "Muski";
                let html="<div id='podaci'><h1>Unos uspesan!</h1><h2>Uneti podaci:</h2>";
                    html+=`<p> Ime i prezime: ` + firstName +' ' + lastName + `</p>`;
                    html+=`<p> Pol: ` + gen + `</p>`;
                    html+=`<p> Prebivaliste: ` + address +', ' + cityName + `</p>`;
                    html+=`<p> Datum rodjenja: ` + birthday[0] +". "+ birthday[1] +". "+ birthday[2] +". "+`</p></div>`;
                document.querySelector("#content").innerHTML = html;
            },
            error: function(xhr, status, message){
                console.log(status);
            }
        })
    }
    else
        alert("ne");
}

//FJE ZA PROVERU UNETIH PODATAKA
function xName(xName){
    var pattern = /^[A-ZČĆŽŠĐ][a-zčćžš]{1,11}$/

    return pattern.test(xName);
    //pol 100% i nek ide levo
}
function cityC(city){
    var cities = [];

    $('#city option').each(function(){
        cities.push($(this).val());
    })

    return cities.includes(city, 1);
}
function addressC(address){
    //Naziv Neke ulice 3/18
    //Rec \s (jedna rec) | (rec sa razmakom pre prethodne) \s broj (\ brstana ako ima)
    var pattern = /^([A-ZČĆŽŠĐ][a-zčćžš]+)\s(([A-ZČĆŽŠĐ]?[a-zčćžš]+\s)*)([1-9][0-9]*(\/[1-9][0-9]*)?)$/

    return pattern.test(address);
}
function birthdayC(birthday){

    //default prosao idk
    if(birthday.includes("default"))
        return false;

    // jan - 0, dec - 11
    else
    var date = parseInt(birthday[0]);
    var month = parseInt(birthday[1])-1;
    var year = parseInt(birthday[2]);

    //31: jan, mar, maj, jul, avg, oct, dec
    //30: apr, jun, sep, nov
    //feb: 28/29

    //da ne bi bilo ifova
    var newDate = new Date(year, month, date);

    return (newDate.getFullYear() === year && newDate.getMonth() === month && newDate.getDate() === date);
}
function genderC(gender){
    return gender === "mg" || gender === "fg";
}

function formCheck(firstName,lastName,city,address,birthday,gender){
    return (xName(firstName) && xName(lastName) && cityC(city) && addressC(address) && birthdayC(birthday) && genderC(gender));
}

// OPTIONS ZA GRADOVE I DATUM
function displayCities(){
    let gradovi = ["Beograd", "Bor", "Valjevo", "Vranje", "Vršac", "Zaječar", "Zrenjanin", "Jagodina", "Kikinda", "Kragujevac", "Kraljevo", "Kruševac", "Leskovac", "Loznica", "Niš", "Novi Pazar", "Novi Sad", "Pančevo", "Pirot", "Požarevac", "Priština", "Prokuplje", "Smederevo", "Sombor", "Sremska Mitrovica", "Subotica", "Užice", "Čačak", "Šabac"];
    let html=`<option selected value="default" id="default" > Izaberite... </option>>`;

    gradovi.forEach((e, i) => {
        html += `<option id="` + i + `" value="` + i + `">` + e + `</option>>`;
    })

    document.querySelector("#city").innerHTML = html;
}
function displayDate(param){
    let i, x, y;
    let html=`<option id="default" value="default"> Izaberite... </option>>`;

    param === "d" ? x=31 : (param === "m"? x=12 : x = 2022);
    param === "y" ? y=1900 : y=1;

    //najstariji covek na svetu (Juan Vincete Perez) je rodjen 1907 godine, zato sam stavila to ogranicenje OD 1900
    for (i=y; i<=x; i++)
        html += `<option id="` + i + `" value="` + i + `">` + i + `</option>>`;

    document.querySelector("#"+param).innerHTML = html;
}
