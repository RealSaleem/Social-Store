@extends('layouts.app')

<style>
    .table.datatable-basic tr th {
        width: 25%;
    }

    table a {
        color: #0c0638 !important;
    }

    table a:hover {
        color: #2196f3 !important;
    }
</style>


@section('content')
<!-- Page header -->
<div class="page-header page-header-light">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-stack4"></i> <span class="font-weight-semibold">{{trans('site.reported_posts')}}</h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>
    </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content">

    <!-- Dashboard content -->
    <div class="row">
        <div class="col-xl-12">
            <div class="actions mb-2" hidden>
                <div class="text-right">
                    <a class="btn btn-primary" href=""><i class="icon-stack4"></i> &nbsp; {{trans('site.reported_posts')}}</a>
                </div>
            </div>
            <div class="card">
                <div class="table-responsive">
                    <table class="table datatable-basic table-bordered" data-order='[[0,"desc"]]'>
                        <thead>
                            <tr>
                                <th>{{trans('site.id')}}</th>
                                <th>{{trans('site.reporter_name')}}</th>
                                <th>{{trans('site.ad_owner')}}</th>
                                <th>{{trans('site.item_name')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reportedposts as $reposts)
                            <tr>
                                <td>{{$reposts->id}}</td>
                                <td><a href="{{route('user.index', ['user_id' => $reposts->appuser->id])}}">{{$reposts->appuser->user_name}}</a></td>
                                <td><a href="{{route('user.index', ['user_id' => $reposts->ads->appuser->id])}}">{{$reposts->ads->appuser->user_name}}</a></td>
                                <td><a href="{{route('ads.index', ['ads_id' => $reposts->ads->id])}}">{{$reposts->ads->product_name}}</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /dashboard content -->

</div>
<!-- /content area -->
@endsection
@section('script')
<script>
    $(document).ready(function() {
        // $('.datatable-basic').DataTable();
    });

    var DatatableBasic = function() {


        //
        // Setup module components
        //

        // Basic Datatable examples
        var _componentDatatableBasic = function() {
            if (!$().DataTable) {
                console.warn('Warning - datatables.min.js is not loaded.');
                return;
            }

            // Setting datatable defaults
            $.extend($.fn.dataTable.defaults, {
                autoWidth: false,
                columnDefs: [{
                    orderable: false,
                    width: 100,
                    targets: [2]
                }],
                dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
                language: {
                    search: '<span>Filter:</span> _INPUT_',
                    searchPlaceholder: 'Type to filter...',
                    lengthMenu: '<span>Show:</span> _MENU_',
                    paginate: {
                        'first': 'First',
                        'last': 'Last',
                        'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;',
                        'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;'
                    }
                }
            });



            // Basic datatable
            $('.datatable-basic').DataTable();

            // Alternative pagination
            $('.datatable-pagination').DataTable({
                pagingType: "simple",
                language: {
                    paginate: {
                        'next': $('html').attr('dir') == 'rtl' ? 'Next &larr;' : 'Next &rarr;',
                        'previous': $('html').attr('dir') == 'rtl' ? '&rarr; Prev' : '&larr; Prev'
                    }
                }
            });

            // Datatable with saving state
            $('.datatable-save-state').DataTable({
                stateSave: true
            });

            // Scrollable datatable
            var table = $('.datatable-scroll-y').DataTable({
                autoWidth: true,
                scrollY: 300
            });

            // Resize scrollable table when sidebar width changes
            $('.sidebar-control').on('click', function() {
                table.columns.adjust().draw();
            });
        };

        // Select2 for length menu styling
        var _componentSelect2 = function() {
            if (!$().select2) {
                console.warn('Warning - select2.min.js is not loaded.');
                return;
            }

            // Initialize
            $('.dataTables_length select').select2({
                minimumResultsForSearch: Infinity,
                dropdownAutoWidth: true,
                width: 'auto'
            });
        };


        //
        // Return objects assigned to module
        //

        return {
            init: function() {
                _componentDatatableBasic();
                _componentSelect2();
            }
        }
    }();


    // Initialize module
    // ------------------------------

    document.addEventListener('DOMContentLoaded', function() {
        DatatableBasic.init();
    });
</script>

<script>
    $('.delete-record').submit(function(e) {
        e.preventDefault();
        // console.log('safsa');
        swal({
                title: "{{trans('site.alert')}}",
                text: "{{trans('site.alert_message')}}",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                buttons: {
                    cancel: {
                        text: "{{trans('site.cancel')}}",
                        value: false,
                        visible: true,
                        className: ""
                    },
                    confirm: {
                        text: "{{trans('site.ok')}}",
                        value: true,
                        visible: true,
                        className: ""
                    }
                },
                closeOnClickOutside: false
            })
            .then((isConfirm) => {
                if (isConfirm) {
                    this.submit();
                    return true;
                } else {
                    return false;
                }
            });
    });
</script>
@endsection