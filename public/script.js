$(document).ready(function () {

    var north = $("input[name=north]");
    var east = $("input[name=east]");
    var south = $("input[name=south]");
    var west = $("input[name=west]");

    $('#gameInfo').show();
    $('#chooseContract').show();
    $('#scoreJacks').hide();
    $('#scoreKing').hide();
    $('#scoreQueens').hide();
    $('#scoreTricks').hide();
    $('#input').hide();
    $('#save').hide();
    $('#btnNextHand').hide();


    $('#btnScores').click(function (event) {
        event.preventDefault();
        var contract = $("input[name=contract]:checked").val();
        console.log(contract);
        $('#gameInfo').hide();
        $('#chooseContract').hide();
        switch (contract) {
            case ('j'):
                $('#scoreJacks').show();
                $('#input').show();
                $('#save').show();
                north.attr({min: '1', max: '4'});
                east.attr({min: '1', max: '4'});
                south.attr({min: '1', max: '4'});
                west.attr({min: '1', max: '4'});

                break;
            case ('q'):
                $('#scoreQueens').show();
                $('#input').show();
                $('#save').show();
                north.attr({min: '0', max: '4'});
                east.attr({min: '0', max: '4'});
                south.attr({min: '0', max: '4'});
                west.attr({min: '0', max: '4'});

                break;
            case ('k'):
                $('#scoreKing').show();
                $('#save').show();

                break;
            case ('nt'):
                $('#scoreTricks').show();
                $('#input').show();
                $('#save').show();
                north.attr({min: '0', max: '13'});
                east.attr({min: '0', max: '13'});
                south.attr({min: '0', max: '13'});
                west.attr({min: '0', max: '13'});

                break;
            case ('d'):
                $('#scoreTricks').show();
                $('#input').show();
                $('#save').show();
                north.attr({min: '0', max: '13'});
                east.attr({min: '0', max: '13'});
                south.attr({min: '0', max: '13'});
                west.attr({min: '0', max: '13'});

                break;
            default:
                $('#gameInfo').show();
                $('#chooseContract').show();
                break;
        }
    })

    $('#btnKingN').click(function (event) {
        event.preventDefault();
        north.val(-75);
        east.val('0');
        south.val('0');
        west.val('0');
        $('#btnKingN').attr("class", "btn btn-light");
        $('#btnKingE').attr("class", "btn");
        $('#btnKingS').attr("class", "btn");
        $('#btnKingW').attr("class", "btn");

    });

    $('#btnKingE').click(function (event) {
        event.preventDefault();
        north.val('0');
        east.val('-75');
        south.val('0');
        west.val('0');
        $('#btnKingN').attr("class", "btn");
        $('#btnKingE').attr("class", "btn btn-light");
        $('#btnKingS').attr("class", "btn");
        $('#btnKingW').attr("class", "btn");

    });

    $('#btnKingS').click(function (event) {
        event.preventDefault();
        north.val('0');
        east.val('0');
        south.val(-75);
        west.val('0');
        $('#btnKingN').attr("class", "btn");
        $('#btnKingE').attr("class", "btn");
        $('#btnKingS').attr("class", "btn  btn-light");
        $('#btnKingW').attr("class", "btn");


    });

    $('#btnKingW').click(function (event) {
        event.preventDefault();
        north.val('0');
        east.val('0');
        south.val('0');
        west.val(-75);
        $('#btnKingN').attr("class", "btn");
        $('#btnKingE').attr("class", "btn");
        $('#btnKingS').attr("class", "btn");
        $('#btnKingW').attr("class", "btn btn-light");
    });

    $('#btnSubmit').click(function (event) {
       // event.preventDefault();

       $('#input').hide();

        console.log(north.val() * -25);
        console.log(north.val());
        console.log(east.val() * -25);
        console.log(east.val());

        var contract = $("input[name=contract]:checked").val();
        north.removeAttr('min').removeAttr('max');
        east.removeAttr('min').removeAttr('max');
        south.removeAttr('min').removeAttr('max');
        west.removeAttr('min').removeAttr('max');


        switch (contract) {
            case ('j'):
                var places = [north, east, south, west];
               
                    switch (true) {
                        case (north.val() == 1):
                            north.val('200');
                            break;
                        case (north.val() == 2):
                            north.val('150');
                            break;
                        case (north.val() == 3):
                            north.val('100');
                            break;
                        case (north.val() == 4):
                            north.val('50');
                            break;
                        default:
                            break;
                    }
                                   
                    switch (true) {
                        case (east.val() == 1):
                            east.val('200');
                            break;
                        case (east.val() == 2):
                            east.val('150');
                            break;
                        case (east.val() == 3):
                            east.val('100');
                            break;
                        case (east.val() == 4):
                            east.val('50');
                            break;
                        default:
                            break;
                    }               
                    switch (true) {
                        case (south.val() == 1):
                            south.val('200');
                            break;
                        case (south.val() == 2):
                            south.val('150');
                            break;
                        case (south.val() == 3):
                            south.val('100');
                            break;
                        case (south.val() == 4):
                            south.val('50');
                            break;
                        default:
                            break;
                    }               
                    switch (true) {
                        case (west.val() == 1):
                            west.val('200');
                            break;
                        case (west.val() == 2):
                            west.val('150');
                            break;
                        case (west.val() == 3):
                            west.val('100');
                            break;
                        case (west.val() == 4):
                            west.val('50');
                            break;
                        default:
                            break;
                    }

                if (parseInt(north.val()) + parseInt(east.val()) + parseInt(south.val()) + parseInt(west.val()) != 500) {
                    event.preventDefault();
                    console.log(north.val());
                    console.log(east.val());
                    console.log(south.val());
                    console.log(west.val());
                    console.log(parseInt(north.val()) + parseInt(east.val()) + parseInt(south.val()) + parseInt(west.val()));
                }
                break;
            case ('q'):
                north.val(north.val() * -25);
                east.val(east.val() * -25);
                south.val(south.val() * -25);
                west.val(west.val() * -25);
                if (parseInt(north.val()) + parseInt(east.val()) + parseInt(south.val()) + parseInt(west.val()) != -100) {
                    event.preventDefault();
                }
                break;
            case ('k'):
                if (parseInt(north.val()) + parseInt(east.val()) + parseInt(south.val()) + parseInt(west.val()) != -75) {
                    event.preventDefault();
                }
                break;
            case ('nt'):
                north.val(north.val() * -15);
                east.val(east.val() * -15);
                south.val(south.val() * -15);
                west.val(west.val() * -15);

                // if (parseInt(north.val()) + parseInt(east.val()) + parseInt(south.val()) + parseInt(west.val()) != -195) {
                //     event.preventDefault();
                // }
                break;
            case ('d'):
                north.val(north.val() * -10);
                east.val(east.val() * -10);
                south.val(south.val() * -10);
                west.val(west.val() * -10);
                if (parseInt(north.val()) + parseInt(east.val()) + parseInt(south.val()) + parseInt(west.val()) != -130) {
                    event.preventDefault();
                }
                break;
            default:
                break;
        }
    });

});