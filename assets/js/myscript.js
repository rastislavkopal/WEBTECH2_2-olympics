$(document).ready( function () {
    updateListOfOlympicWinners();

    let searchParams = new URLSearchParams(window.location.search);

    // if (searchParams.has('floatingresponse')){
    //     let param = searchParams.get('floatingresponse');
    //     displayMessage(param);
    // }
} );

function displayMessage(response)
{
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
    $.get("http://wt78.fei.stuba.sk/zadanie2/controllers/GetTopTen.php",
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
                    { "data" : "name", title:'Meno' },
                    { "data" : "surname", title:'Priezvisko'  },
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
    let url = "http://wt78.fei.stuba.sk/zadanie2/controllers/OlympicsController.php";
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
                    { "data" : "name", title:'Meno'  },
                    { "data" : "surname", title:'Priezvisko'  },
                    { "data" : "year", title:'Rok výhry'  },
                    { "data" : "city", title:'Miesto konania'  },
                    { "data" : "type", title:'Typ OH'  },
                    { "data" : "discipline", title:'Disciplína'  }
                ],
            });
        });
}

function updateRowById(action)
{
    $.get("http://wt78.fei.stuba.sk/zadanie2/controllers/PersonController.php",
        function (data) {

        }
    );
    window.location.href = "http://wt78.fei.stuba.sk/zadanie2/useredit.php?" + action;
}

function deleteRowById(action)
{
    let url ="http://wt78.fei.stuba.sk/zadanie2/controllers/PersonController.php?" + action;
    console.log(url);
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

function createPlacement()
{
    let data = $('#formAddPlacement').serializeArray();
    console.log(data);
    var formData = {
        "person_id": data[0]["value"],
        "oh_id": data[1]["value"],
        "placing": data[2]["value"],
        "discipline": data[3]["value"]
    };
    console.log(formData);
    $.ajax({
        url: 'http://wt78.fei.stuba.sk/zadanie2/controllers/AddPlacement.php',
        type: 'POST',
        data: formData,
        dataType: 'text',
       success: displayMessage,
    });
}
