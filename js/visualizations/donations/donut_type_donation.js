
function donutTypeDonation(data)
{


    console.log(data);

    var blank = [];
    var donut_data = [];

    for (var i = 0; i < data.length; i++)
    {
        blank[i] = [data[i][0]['type'], 0];
        donut_data[i] = [data[i][0]['type'], parseInt(data[i][0]['total'])];
    }


    console.log(blank);
    console.log(donut_data);



    var chart = c3.generate({
        bindto: '#donation_by_type',
        data: {
            columns:blank,
            type: 'donut'
        },
        donut: {
            title: "Total Donation per Type"

        },
        tooltip: {
            format: {
                value: function (value, ratio, id) {
                    var format = d3.format('$');
                    return format(value);
                }
            }
        }
    });

    setTimeout(function () {
        chart.load({
            columns:donut_data
        });
    }, 10);

}


function callbystringtest2(text) {
    console.log(text);
}



/**
 * Created by qiwzhu on 3/8/2017.
 */
