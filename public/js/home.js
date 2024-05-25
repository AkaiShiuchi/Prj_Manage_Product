// $(document).ready(function () {
//     $('tbody #tr').each(function (index) {
//         $(this).find('td:first').text(index + 1);
//     });
// });

$(document).ready(function () {
    $('tbody #tr2').each(function (index) {
        $(this).find('td:first').text(index + 1);
    });
});


// thống kê doanh số đơn hàng đã bán theo ngày
// $(document).ready(function() {
//     $('#get-stats').on('click', function() {
//         var selectedDate = $('#date').val();
//         if (!selectedDate) {
//             alert('Vui lòng chọn ngày!');
//             return;
//         }
//         $.ajax({
//             url: '/statistics/sales',
//             method: 'GET',
//             data: { date: selectedDate },
//             success: function(response) {
//                 var options = {
//                     series: [{
//                         name: 'Doanh số',
//                         data: response.sales
//                     }],
//                     chart: {
//                         type: 'bar',
//                         height: 350
//                     },
//                     plotOptions: {
//                         bar: {
//                             horizontal: false,
//                             columnWidth: '55%',
//                             endingShape: 'rounded'
//                         },
//                     },
//                     dataLabels: {
//                         enabled: false
//                     },
//                     stroke: {
//                         show: true,
//                         width: 2,
//                         colors: ['transparent']
//                     },
//                     xaxis: {
//                         categories: response.categories,
//                     },
//                     yaxis: {
//                         title: {
//                             text: 'Doanh số (₫)'
//                         }
//                     },
//                     fill: {
//                         opacity: 1
//                     },
//                     tooltip: {
//                         y: {
//                             formatter: function (val) {
//                                 return val + "₫";
//                             }
//                         }
//                     }
//                 };

//                 var chart = new ApexCharts(document.querySelector("#chart"), options);
//                 chart.render();
//             },
//             error: function() {
//                 alert('Có lỗi xảy ra khi lấy thống kê. Vui lòng thử lại sau.');
//             }
//         });
//     });
// });

$(document).ready(function(){
    $('#get-stats').click(function(){
        var selectedMonth = $('#month').val();
        
        $.ajax({
            url: '/statistics/sales',
            method: 'GET',
            data: {
                month: selectedMonth
            },
            success: function(response) {
                // Xử lý kết quả trả về từ máy chủ
                var categories = response.categories;
                var sales = response.sales;
                
                // Gọi hàm vẽ biểu đồ với dữ liệu mới
                drawChart(categories, sales);
            },
            error: function() {
                alert('Có lỗi xảy ra khi lấy dữ liệu.');
            }
        });
    });
    
    // Hàm vẽ biểu đồ
    function drawChart(categories, sales) {
        // Logic vẽ biểu đồ ở đây
        // Bạn có thể sử dụng thư viện biểu đồ như Chart.js hoặc ApexCharts
        // Ví dụ: ApexCharts
        var options = {
            chart: {
                type: 'line',
                height: 350
            },
            series: [{
                name: 'Doanh số',
                data: sales
            }],
            xaxis: {
                categories: categories
            }
        };
        
        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    }
});
