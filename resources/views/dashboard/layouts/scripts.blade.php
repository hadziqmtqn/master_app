<!-- General JS Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="{{ asset('theme/assets/js/stisla.js') }}"></script>

<!-- JS Libraies -->
<script src="{{ asset('theme/node_modules/simpleweather/jquery.simpleWeather.min.js') }}"></script>
<script src="{{ asset('theme/node_modules/chart.js/dist/Chart.min.js') }}"></script>
<script src="{{ asset('theme/node_modules/jqvmap/dist/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('theme/node_modules/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
<script src="{{ asset('theme/node_modules/summernote/dist/summernote-bs4.js') }}"></script>
<script src="{{ asset('theme/node_modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

<script src="{{ asset('theme/node_modules/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('theme/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('theme/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>
<script src="https://cdn.datatables.net/scroller/2.0.7/js/dataTables.scroller.min.js"></script>

<!-- Template JS File -->
<script src="{{ asset('theme/assets/js/scripts.js') }}"></script>
<script src="{{ asset('theme/assets/js/custom.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('theme/assets/js/page/index-0.js') }}"></script>
<script src="{{ asset('theme/assets/js/page/modules-ion-icons.js') }}"></script>

<script>
    $(document).ready(function () {
    $('#myTable').DataTable();
});
</script>