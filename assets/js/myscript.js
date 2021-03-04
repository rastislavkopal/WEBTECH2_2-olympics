function displayMessage(response)
{
    var message = $('<div class="alert alert-error error-message" style="display: none;">');
    var close = $('<button type="button" class="close" data-dismiss="alert">&times</button>');
    message.append(close); // adding the close button to the message
    message.append(response);
    message.appendTo($('body')).fadeIn(300).delay(3000).fadeOut(1500);
}

function updateDataTable()
{
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
                    { "data" : "person_id", title:'ID' },
                    { "data" : "name", title:'Meno'  },
                    { "data" : "surname", title:'Priezvisko'  },
                    { "data" : "year", title:'Rok výhry'  },
                    { "data" : "city", title:'Miesto konania'  },
                    { "data" : "type", title:'Štát OH'  },
                    { "data" : "discipline", title:'Disciplína'  }
                ],
            });
        });
}

$(document).ready( function () {
     updateDataTable()
} );
