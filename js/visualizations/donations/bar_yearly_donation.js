
function barYearlyDonation(data)
{

    console.log(data[0][0]['total']);

    var years = ['year'];
    var donations = ['donation'];
    var blank_donations = ['donation'];

    for(var i = 1; i <= data.length; i++)
    {
        years[i] = data[i-1][0]['year'];
        donations[i] = parseInt(data[i-1][0]['total']);
        blank_donations[i] = 0;
    }

    var num_years = years.length - 1;

    console.log(years);
    console.log(donations);

    var blank = [years, blank_donations];
    var bar_data = [years, donations];





    var chart = c3.generate({
        bindto: '#donation_by_year',
        data: {
            x: 'year',
            columns:blank,
            type: 'bar'
        },
        axis: {
            x: {
                tick: {
                    count: num_years
                }
            }
        },
        bar: {
            width: {
                ratio: 0.5 // this makes bar width 50% of length between ticks
            }
            // or
            //width: 100 // this makes bar width 100px
        }
    });

    setTimeout(function () {
        chart.load({
            columns:bar_data
        });
    }, 10);

}


function callbystringtest(text) {
    console.log(text);

}


/**
 * Created by qiwzhu on 3/8/2017.
 */
