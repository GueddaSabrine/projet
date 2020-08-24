// $.document.getElementById("start").onclick = function(){
//     //ako igramo
//     if(playing == true) {
//         location.reload();
//     }else{
//         playing = true;
//         reponse = 0;
//         document.getElementById("reponse").innerText =bonneReponse;
//         calc();
//     }
// }

//
// function calc() {
//     v1 = 1+ Math.round(9*Math.random())
//     v2 = 1+ Math.round(9*Math.random())
//     bonneReponse = x*y;
//     document.getElementById("question").innerHTML = x + "x" + y;
//     var correct = 1+ Math.round(3*Math.random());
//     document.getElementById("box"+correct).innerHTML = bonneReponse
//     var reponse = [bonneReponse]
//
//     for(i=1; i<5; i++ ){
//         if(i != correctPosition) {
//             var wrongAnswer;
//             do{wrongAnswer = (1+ Math.round(9*Math.random()))*(1+ Math.round(9*Math.random()))}
//             while(answers.indexOf(wrongAnswer)>-1)
//
//             document.getElementById("box"+i).innerHTML = wrongAnswer;
//             answers.push(wrongAnswer);
//         }
//     }
//
// }

// function calc() {
//     var n1 = parsefloat(document.getElementById('n1').value);
//     var n2 = parsefloat(document.getElementById('n2').value);
//     var oper = document.getElementById('operator').value;
//
//     if (oper === '*'){
//         document.getElementById('result').value = n1 * n2;
//     }
//
// }

$(document).ready(function () {

    //On appelle la fonstion de chargement des données
    allDatas();

    //On desactive l'event par defaut du formulaire
    $("#mon_form").on('submit', function (event) {
        event.preventDefault();
    });

    //Insertion en BDD
    $("#submit").on('click', function () {
        insert();
        allDatas();
    });

    //Mise à jour des datas
    $("#submit").on('click', function () {
        allDatas();
    });
});


/**
 * Permet de recuperer
 */
function allDatas() {
    $.ajax({
        method: "GET",
        url: "server.php",
        data: {all: 1},
        dataType: 'json'
    }).done(function (response) {
        //On vide le contenu du tableau
        $("#calculatrice-body").empty();
        response.forEach(ligne => {
            $("#calculatrice-body").append(
                `<tr>`
                + `<td>${ligne.id}</td>`
                + `<td class="multiplication">${ligne.multiplication}</td>`
                + `<td class="reponse">${ligne.reponse}</td>`
                + `<td class="correct">${ligne.correct}</td>`
                + `</tr>`
            );
        });
    });
}


/**
 * Permet de faire une insertion en BDD
 */
function insert() {
    let multiplication = $("#multiplication").val();
    let reponse = $("#reponse").val();
    let correct = $("#correct").val();

    $.ajax({
        method: "POST",
        url: "server.php",
        data: {insert: 1, multiplication: multiplication, reponse: reponse, correct: correct}
    }).then(function () {
        //En cas de succes, on vide les champs
        $("#multiplication").val('');
        $("#reponse").val('');
        $("#correct").val('');
    })
}



