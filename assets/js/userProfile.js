$(document).ready( function () {
    updateListOfOlympicWinners();
} );

function clearTableZone()
{
    $('#table_div').empty();
    $('#table_div').html('<table id="table_id" class="display"></table>');
}

function updateListOfOlympicWinners()
{
    clearTableZone();
    let searchParams = new URLSearchParams(window.location.search);
    let url = "http://wt78.fei.stuba.sk/zadanie2/controllers/OlympicsController.php?id=" + searchParams.get('id');
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
                    { "data" : "type", title:'Typ OH'  },
                    { "data" : "discipline", title:'Disciplína'  }
                ],
            });
        });
}