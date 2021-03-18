$(document).ready( function () {
    updateListOfOlympicWinners();
} );

function displayMessage(response)
{
    if($('#uploader_div').css('display') != 'none')
        $('#uploader_div').hide('slow');
    var message = $('<div class="alert alert-error error-message" style="display: none;">');
    var close = $('<button type="button" class="close" data-dismiss="alert">&times</button>');
    message.append(close); // adding the close button to the message
    message.append(response);
    message.appendTo($('body')).fadeIn(300).delay(3000).fadeOut(1500);
}

function clearTableZone()
{
    $('#table_div').empty();
    $('#table_div').html('<table id="table_id" class="display"></table>');
}

function showAddForm()
{
    if($('#uploader_div').css('display') == 'none'){
        $('#uploader_div').show('slow');
    } else {
        $('#uploader_div').hide('slow');
    }
}

function showTopTen()
{
    clearTableZone();
    $.get("https://wt78.fei.stuba.sk/zadanie2/controllers/GetTopTen.php",
        function (data) {
            json = JSON.parse(data)
            $("#table_id").DataTable({
                data: json,
                "searching": false,
                "paging": false,
                "bInfo": false,
                "scrollY":"80%",
                "scrollCollapse": true,
                "destroy": true,
                "order": [[ 2, "desc" ]],
                "columns" : [
                    { "data" : "name", title:'Celé meno' },
                    { "data" : "wins", title:'Počet medailí'  },
                    { "data" : "update" },
                    { "data" : "delete" },
                ],
            });
        });
}
function updateListOfOlympicWinners()
{
    clearTableZone();
    let url = "https://wt78.fei.stuba.sk/zadanie2/controllers/OlympicsController.php";
    $.get(url,
        function (data) {
            $("#table_id").DataTable({
                data: JSON.parse(data),
                "searching": false,
                "paging": false,
                "bInfo": false,
                "scrollY":"80%",
                "scrollCollapse": true,
                "destroy": true,
                "columns" : [
                    { "data" : "name", title:'Celé meno' },
                    { "data" : "year", title:'Rok výhry'  },
                    { "data" : "city", title:'Miesto konania'  },
                    { "data" : "type", title:'Typ OH', "orderData": [ 3, 1 ] },
                    { "data" : "discipline", title:'Disciplína'  }
                ],
            });
        });
}

function updateRowById(action)
{
    $.get("https://wt78.fei.stuba.sk/zadanie2/controllers/PersonController.php",
        function (data) {}
    );
    window.location.href = "https://wt78.fei.stuba.sk/zadanie2/views/useredit.php?" + action;
}

function deleteRowById(action)
{
    let url ="https://wt78.fei.stuba.sk/zadanie2/controllers/PersonController.php?" + action;
    $.get(url,
        function (response) {
            displayMessage(response);
        });
}

$(".form-check-input").change(function() {
    switch($(this).attr('id')) {
        case 'selectedAddPerson' :
            $('#divAddPerson').css('display', 'block');
            $('#divAddPlacement').css('display','none');
            break;
        case 'selectedAddPlacement' :
            $('#divAddPerson').css('display', 'none');
            $('#divAddPlacement').css('display','block');
            break;
    }
});

function createPerson()
{
    let data = $('#formAddPerson').serializeArray();

    for (let i = 0; i < 5; i++)
        if (!data[i].value.length) {
            displayMessage("Hodnota '" + data[i]["name"] + "' nesmie byt prazdna");
            return;
        }

    var formData = {
        "name": data[0]["value"],
        "surname": data[1]["value"],
        "birth_day": data[2]["value"],
        "birth_place": data[3]["value"],
        "birth_country": data[4]["value"],
        "death_day": data[5]["value"],
        "death_place": data[6]["value"],
        "death_country": data[7]["value"]
    };

    $.ajax({
        url: 'https://wt78.fei.stuba.sk/zadanie2/controllers/CreatePerson.php',
        type: 'POST',
        data: formData,
        dataType: 'text',
        success: displayMessage,
    });
}

function createPlacement()
{
    let data = $('#formAddPlacement').serializeArray();

    for (let i = 0; i < data.length; i++)
        if (!data[i].value.length) {
            displayMessage("Hodnota '" + data[i]["name"] + "' nesmie byt prazdna");
            return;
        }

    var formData = {
        "person_id": data[0]["value"],
        "oh_id": data[1]["value"],
        "placing": data[2]["value"],
        "discipline": data[3]["value"]
    };

    $.ajax({
        url: 'https://wt78.fei.stuba.sk/zadanie2/controllers/AddPlacement.php',
        type: 'POST',
        data: formData,
        dataType: 'text',
       success: displayMessage,
    });
}
