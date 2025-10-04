<script src="{{asset('template/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('template/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('template/vendors/apexcharts/apexcharts.js')}}"></script>
<script src="{{asset('template/js/pages/dashboard.js')}}"></script>

<script src="{{asset('template/js/main.js')}}"></script>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('container', {
    chart: { type: 'pie' },
    title: { text: 'Test Chart' },
    series: [{ data: [1,2,3,4,5] }]
});
</script>