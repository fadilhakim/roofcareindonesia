$(function () {
	var uri = window.location.href;
	//console.log(uri)
    var arr_menu = uri.split("/");
    //console.log(health_status_color);
    if(arr_menu[4] == "dashboard" && arr_menu[5] == "executive_dashboard"){
        
		/*
        new Chart(document.getElementById("health_status_pie_chart").getContext("2d"),
            getChartJs('pie', health_status_total_data, health_status_label, health_status_data, health_status_color));
        */
		drawPieHighcharts(data_health, health_status_color);
		
		/*
		new Chart(document.getElementById("project_status_pie_chart").getContext("2d"),
            getChartJs('doughnut', project_executive_summary_milestone_status_total_data, project_executive_summary_milestone_status_label, project_executive_summary_milestone_status_data, project_executive_summary_milestone_status_color));
		*/
		drawDoughnutHighcharts(data_milestone, project_executive_summary_milestone_status_color);
		
        $(document).on('click','.btn-detail-issue',function(){
            var project_name = $(this).data('name');            
            var project_issue = $(this).data('issue');            
            var color = $(this).data('color');
            $('#modal-executive-dashboard #project_name').val(project_name);
            $('#modal-executive-dashboard #project_issue_description').val(project_issue);
            $('#modal-executive-dashboard .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
            $('#modal-executive-dashboard').modal('show');    
        });
    }
});

function drawPieHighcharts(data, color){
	Highcharts.chart('health_status_pie_chart', {
		chart: {
			plotBackgroundColor: null,
			plotBorderWidth: null,
			plotShadow: false,
			type: 'pie',
			options3d: {
				enabled: true,
				alpha: 45,
				beta: 0
			}
		},
		title: {
			text: ''
		},
		tooltip: {
			pointFormat: '<b>{point.percentage:.1f}% </b>'
		},
		plotOptions: {
			pie: {
				allowPointSelect: true,
				cursor: 'pointer',
				depth: 50,
				dataLabels: {
					enabled: true,
					format: '<b>{point.name}</b>: {point.percentage:.1f} %'
				},
				colors: color
			},
			series: {
				cursor: 'pointer',
				point: {
					events: {
						click: function (event) {
							// location.href = 'https://en.wikipedia.org/wiki/' +
							// 	this.options.key;
							console.log(this.color)
						   // green
						   if(this.color == "#0af8a0") {

							location.href = hostname+"/dashboard/running_project_by_healthcheck?health_status_id=1";

						   } else if(this.color == "#FFC000") { // yellow

							location.href = hostname+"/dashboard/running_project_by_healthcheck?health_status_id=2";

						   } else if(this.color == "#FF5050") { // red 

							location.href = hostname+"/dashboard/running_project_by_healthcheck?health_status_id=3";

						   }
						}
					}
				}
			}
		},
		series: [{
			name: 'Brands',
			colorByPoint: true,
			data: data
		}],
		credits: {
			enabled: false
		}
	});
}

function drawDoughnutHighcharts(data, color){
	Highcharts.chart('project_status_pie_chart', {
		chart: {
			type: 'pie',
			options3d: {
				enabled: true,
				alpha: 45
			}
		},
		title: {
			text: ''
		},
		plotOptions: {
			pie: {
				innerSize: 100,
				depth: 45,
				colors: color
			}
		},
		series: [{
			name: 'Total Project',
			data: data
		}]
	});
}

function getChartJs(type, total_data, label, data, color) {
    var config = null;

    if (type === 'line') {
        config = {
            type: 'line',
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                    label: "My First dataset",
                    data: [65, 59, 80, 81, 56, 55, 40],
                    borderColor: 'rgba(0, 188, 212, 0.75)',
                    backgroundColor: 'rgba(0, 188, 212, 0.3)',
                    pointBorderColor: 'rgba(0, 188, 212, 0)',
                    pointBackgroundColor: 'rgba(0, 188, 212, 0.9)',
                    pointBorderWidth: 1
                }, {
                        label: "My Second dataset",
                        data: [28, 48, 40, 19, 86, 27, 90],
                        borderColor: 'rgba(233, 30, 99, 0.75)',
                        backgroundColor: 'rgba(233, 30, 99, 0.3)',
                        pointBorderColor: 'rgba(233, 30, 99, 0)',
                        pointBackgroundColor: 'rgba(233, 30, 99, 0.9)',
                        pointBorderWidth: 1
                    }]
            },
            options: {
                responsive: true,
                legend: false
            }
        }
    }
    else if (type === 'bar') {
        config = {
            type: 'bar',
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                    label: "My First dataset",
                    data: [65, 59, 80, 81, 56, 55, 40],
                    backgroundColor: 'rgba(0, 188, 212, 0.8)'
                }, {
                        label: "My Second dataset",
                        data: [28, 48, 40, 19, 86, 27, 90],
                        backgroundColor: 'rgba(233, 30, 99, 0.8)'
                    }]
            },
            options: {
                responsive: true,
                legend: false
            }
        }
    }
    else if (type === 'radar') {
        config = {
            type: 'radar',
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                    label: "My First dataset",
                    data: [65, 25, 90, 81, 56, 55, 40],
                    borderColor: 'rgba(0, 188, 212, 0.8)',
                    backgroundColor: 'rgba(0, 188, 212, 0.5)',
                    pointBorderColor: 'rgba(0, 188, 212, 0)',
                    pointBackgroundColor: 'rgba(0, 188, 212, 0.8)',
                    pointBorderWidth: 1
                }, {
                        label: "My Second dataset",
                        data: [72, 48, 40, 19, 96, 27, 100],
                        borderColor: 'rgba(233, 30, 99, 0.8)',
                        backgroundColor: 'rgba(233, 30, 99, 0.5)',
                        pointBorderColor: 'rgba(233, 30, 99, 0)',
                        pointBackgroundColor: 'rgba(233, 30, 99, 0.8)',
                        pointBorderWidth: 1
                    }]
            },
            options: {
                responsive: true,
                legend: false
            }
        }
    }
    else if (type === 'pie') {
        config = {
            type: 'pie',
            data: {
                datasets: [{
                    data: data,
                    backgroundColor: color,
                }],
                labels: label,
            },
            options: {
                responsive: true,
                legend: false,
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem, data) {
                            var indice = tooltipItem.index;
                            var percentage = ((data.datasets[0].data[indice]/total_data) * 100).toFixed(2);
                            return 'Rp ' + data.labels[indice].toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") +': '+percentage + ' %';
                        }
                    }
                }
            }
        }
    }
    else if (type === 'doughnut') {
        config = {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: data,
                    backgroundColor: color,
                }],
                labels: label,
            },
            options: {
                responsive: true,
                legend: false,
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem, data) {
                            var indice = tooltipItem.index;
                            var percentage = ((data.datasets[0].data[indice]/total_data) * 100).toFixed(2);
                            return  data.labels[indice] +': '+percentage + ' %';
                        }
                    }
                }
            }
        }
    }
    return config;
}
