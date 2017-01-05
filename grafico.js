
function grafico(tipo,disp,per,obj,loader){
	loader.jqxLoader({  width: 100, height: 60, imagePosition: 'top', autoOpen: true });
	if(per==1){
		var baseuni='minute';
		var uniint=7;
		var hora=1;
		}
	
	if(per==2){
		var baseuni='hour';
		var uniint=2;
		var hora=12;
		var interval=0.5;
	}
	if(per==3){
		var baseuni='hour';
		var uniint=4;
		var hora=24;
		var interval=0.5;
	}
	if(per==4){
		var baseuni='day';
		var uniint=7;
		var hora=7;
	}
	if(per==5){
		var baseuni='day';
		var uniint=1;
		var hora=30;
	}
	if(per==6){
		var baseuni='minute';
		var uniint=7;
		var hora=2;
		}
	if(per==7){
		var baseuni='minute';
		var uniint=7;
		var hora=6;
		}
	var source =
	        {
	            datatype: "json",
	    datafields: [ 
	        { name: 'date'}, 
	        { name: 'val1' },
	        { name: 'val2' },
	        { name: 'val3' }
	    ],
	    url: 'graf_func.php?act=graf&per='+per+'&tipo='+tipo+'&hora='+hora+'&disp='+disp
	};
	
	var dataAdapter = new $.jqx.dataAdapter(source, { 
		async: false, 
		autoBind: true, 
		loadError: function (xhr, status, error) { 
			alert('Error loading "' + source.url + '" : ' + error); },
		loadComplete: function () { loader.jqxLoader('close'); }
			});
	// prepare jqxChart settings
	//alert("teste");
	var grafico_bateria = {
	    title: "teste",
	   // description: "Grafico diario da tensao da bateria",
	    enableAnimations: true,
	    showLegend: true,
	    padding: { left: 5, top: 5, right: 25, bottom: 5 },
	    titlePadding: { left: 90, top: 0, right: 0, bottom: 10 },
	    source: dataAdapter,
	    xAxis: {
	        dataField: 'date',
	        type: 'date',
	        baseUnit: baseuni,
	        valuesOnTicks: true,
	        formatFunction: function (value) {
                var date = new Date(value);
                var d = date.getDate();
                var m = date.getMonth();
                var y = date.getFullYear();
                var h = date.getHours();
                var min = date.getMinutes();
                var seg = date.getSeconds(); 
                //return moment(value,"HH");
                return d+'/'+(m + 1) + "/" + y+'<br>'+(h)+':'+min+':'+seg;
            }
	       // unitInterval: uniint 
	        //minValue: 1,
	       // maxValue: 50,
	    },
	    colorScheme: 'scheme04',
	    seriesGroups:
	        [
	            {
	                type: 'spline', 
	                valueAxis:
	                {
	                    //unitInterval: interval,
	                    minvalue: 0,
	                    padding: { left: 10 },
	                    title: { text: "ASDAs" },
	                    gridLines: { visible: true }
	                },
	                series: [
	                        { dataField: 'val1', displayText: "Temperatura entrada" },
	                        { dataField: 'val2', displayText: "Temperatura saida" },
	                        { dataField: 'val3', displayText: "Temperatura ambiente" }
	                    ]
	            }
	        ]
	};
	 obj.jqxChart(grafico_bateria);
	 //return 'var_func.php?act=graf&tipo='+tipo+'&hora='+hora+'&var='+var1;
}
function grafico1(tipo,disp,per,obj,loader){
	loader.jqxLoader({  width: 100, height: 60, imagePosition: 'top', autoOpen: true });
	if(per==1){
		var baseuni='minute';
		var uniint=7;
		var hora=1;
		}
	
	if(per==2){
		var baseuni='hour';
		var uniint=2;
		var hora=12;
		var interval=0.5;
	}
	if(per==3){
		var baseuni='hour';
		var uniint=4;
		var hora=24;
		var interval=0.5;
	}
	if(per==4){
		var baseuni='day';
		var uniint=7;
		var hora=7;
	}
	if(per==5){
		var baseuni='day';
		var uniint=1;
		var hora=30;
	}
	if(per==6){
		var baseuni='minute';
		var uniint=7;
		var hora=2;
		}
	if(per==7){
		var baseuni='minute';
		var uniint=7;
		var hora=6;
		}
	var source =
	        {
	            datatype: "json",
	    datafields: [ 
	        { name: 'date'}, 
	        { name: 'val1' },
	        { name: 'val2' },
	        { name: 'val3' },
	        { name: 'val4' }
	    ],
	    url: 'graf_func.php?act=graf&per='+per+'&tipo='+tipo+'&hora='+hora+'&disp='+disp
	};
	
	var dataAdapter = new $.jqx.dataAdapter(source, { 
		async: false, 
		autoBind: true, 
		loadError: function (xhr, status, error) { 
			alert('Error loading "' + source.url + '" : ' + error); },
		loadComplete: function () { loader.jqxLoader('close'); }
			});
	// prepare jqxChart settings
	//alert("teste");
	var grafico_bateria = {
	    title: "teste",
	   // description: "Grafico diario da tensao da bateria",
	    enableAnimations: true,
	    showLegend: true,
	    padding: { left: 5, top: 5, right: 25, bottom: 5 },
	    titlePadding: { left: 90, top: 0, right: 0, bottom: 10 },
	    source: dataAdapter,
	    xAxis: {
	        dataField: 'date',
	        type: 'date',
	        baseUnit: baseuni,
	        formatFunction: function (value) {
                var date = new Date(value);
                var d = date.getDate();
                var m = date.getMonth();
                var y = date.getFullYear();
                var h = date.getHours();
                var min = date.getMinutes();
                var seg = date.getSeconds();
                return d+'/'+(m + 1) + "/" + y+'<br>'+(h+1)+':'+min+':'+seg;
            }
	       // unitInterval: uniint 
	        //minValue: 1,
	       // maxValue: 50,
	    },
	    colorScheme: 'scheme04',
	    seriesGroups:
	        [
	            {
	                type: 'spline', 
	                valueAxis:
	                {
	                    //unitInterval: interval,
	                    minvalue: 0,
	                    padding: { left: 10 },
	                    title: { text: "" },
	                    gridLines: { visible: true }
	                },
	                series: [
	                        { dataField: 'val1', displayText: "Temperatura entrada" },
	                        { dataField: 'val2', displayText: "Temperatura saida" },
	                        { dataField: 'val3', displayText: "Temperatura ambiente" },
	                        { dataField: 'val4', displayText: "Humidade ambiente" }
	                    ]
	            }
	        ]
	};
	 obj.jqxChart(grafico_bateria);
	 //return 'var_func.php?act=graf&tipo='+tipo+'&hora='+hora+'&var='+var1;
}
function graficoChopeira(tipo,disp,per,obj,loader){
	loader.jqxLoader({  width: 100, height: 60, imagePosition: 'top', autoOpen: true });
	if(per==1){
		var baseuni='minute';
		var uniint=7;
		var hora=1;
		}
	
	if(per==2){
		var baseuni='hour';
		var uniint=2;
		var hora=12;
		var interval=0.5;
	}
	if(per==3){
		var baseuni='hour';
		var uniint=4;
		var hora=24;
		var interval=0.5;
	}
	if(per==4){
		var baseuni='day';
		var uniint=7;
		var hora=7;
	}
	if(per==5){
		var baseuni='day';
		var uniint=1;
		var hora=30;
	}
	if(per==6){
		var baseuni='minute';
		var uniint=7;
		var hora=2;
		}
	if(per==7){
		var baseuni='minute';
		var uniint=7;
		var hora=6;
		}
	var source =
	        {
	            datatype: "json",
	    datafields: [ 
	        { name: 'date'}, 
	        { name: 'val1' },
	        { name: 'val2' },
	        { name: 'val3' },
	        { name: 'val4' },
	        { name: 'val5' }
	    ],
	    url: 'graf_func.php?act=graf&per='+per+'&tipo='+tipo+'&hora='+hora+'&disp='+disp
	};
	
	var dataAdapter = new $.jqx.dataAdapter(source, { 
		async: false, 
		autoBind: true, 
		loadError: function (xhr, status, error) { 
			alert('Error loading "' + source.url + '" : ' + error); },
		loadComplete: function () { loader.jqxLoader('close'); }
			});
	// prepare jqxChart settings
	//alert("teste");
	var grafico_bateria = {
	    title: "Chopeira",
	   // description: "Grafico diario da tensao da bateria",
	    enableAnimations: true,
	    showLegend: true,
	    padding: { left: 5, top: 5, right: 25, bottom: 5 },
	    titlePadding: { left: 90, top: 0, right: 0, bottom: 10 },
	    source: dataAdapter,
	    xAxis: {
	        dataField: 'date',
	        type: 'date',
	        baseUnit: baseuni,
	        formatFunction: function (value) {
                var date = new Date(value);
                var d = date.getDate();
                var m = date.getMonth();
                var y = date.getFullYear();
                var h = date.getHours();
                var min = date.getMinutes();
                var seg = date.getSeconds();
                return d+'/'+(m + 1) + "/" + y+'<br>'+(h)+':'+min+':'+seg;
            }
	       // unitInterval: uniint 
	        //minValue: 1,
	       // maxValue: 50,
	    },
	    colorScheme: 'scheme04',
	    seriesGroups:
	        [
	            {
	                type: 'spline', 
	                valueAxis:
	                {
	                    //unitInterval: interval,
	                    minvalue: 0,
	                    padding: { left: 10 },
	                    title: { text: "" },
	                    gridLines: { visible: true }
	                },
	                series: [
	                        { dataField: 'val1', displayText: "Temperatura Interna" },
	                        { dataField: 'val2', displayText: "Temperatura Externa" },
	                        { dataField: 'val3', displayText: "Temperatura Dissipador" },
	                        { dataField: 'val4', displayText: "Potencia" },
	                        { dataField: 'val5', displayText: "SetPoint" }
	                    ]
	            }
	        ]
	};
	 obj.jqxChart(grafico_bateria);
	 //return 'var_func.php?act=graf&tipo='+tipo+'&hora='+hora+'&var='+var1;
}