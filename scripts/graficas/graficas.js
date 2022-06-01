window.addEventListener("DOMContentLoaded", ()=>{
    /*-----------INGRESOS-----------*/
    Plotly.newPlot("ingreso", /* JSON object */ {
        "data": [{ "y": [1, 2, 3] }],
        "layout": { "width": 600, "height": 400}
    });

    /*-----------GASTOS-----------*/
    // GRÁFICA DE PASTEL (POR CATEGORÍA)
    var data = [{
        values: [19, 26, 55],
        labels: ['Residential', 'Non-Residential', 'Utility'],
        type: 'pie'
    }];
    var layout = {
        height: 400,
        width: 500
    };
    Plotly.newPlot('gasto_categoria', data, layout);

    // GRÁFICA POR FECHAS (SEMANAL)
    var data = [
    {
        x: ['2013-10-04 22:23:00', '2013-11-04 22:23:00', '2013-12-04 22:23:00'],
        y: [1, 3, 6],
        type: 'scatter'
    }
    ];

    Plotly.newPlot('gasto_semana', data);
});